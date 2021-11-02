<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;
use App\Http\Requests\BebidaFormRequest;

class BebidasController extends Controller
{
    ################ referentes a bebidas ####################

    // mostra o formulário
    public function adicionarBebida(Request $request)
    {
        $categoria = Produto::query()
            ->with('Categoria')
            ->where('idCat', '2')
            ->get();

        return view('lanchonete.adicionar_bebida', compact('categoria'));
    }

    // salva os dados no BD - via form
    public function storeBebida(BebidaFormRequest $request)
    {
        $bebida = Produto::create($request->all());
        $request->session()
            ->flash(
                'mensagem',
                "{$bebida->id} - {$bebida->categoria}  adicionado com sucesso" 
            );

        $categorias = Categoria::query()
            ->where('categoria', 'Bebida')
            ->get();

        return redirect()->route('listar_bebidas');
    }

    
    public function storeBebidaModal(BebidaFormRequest $request)
    {
        $bebida = Produto::create($request->all());
        $request->session()
            ->flash(
                'mensagem',
                "{$bebida->id} - {$bebida->descricao} -  adicionado com sucesso"
                //{$bebida->categoria->categoria}: lista o idCat e categoria da tabela Categoria
            );

        return redirect()->route('index');
    }

    // página inicial de clientes
    public function listarBebidas(Request $request)
    {
        $bebidas = Produto::query()
            ->with('Categoria')
            ->where('idCat', '2')
            ->get();

        $mensagem = $request->session()->get('mensagem');
        $request->session()->remove('mensagem');

        return view('lanchonete.listar_bebidas', compact('bebidas', 'mensagem'));
    }

    // deletar cliente
    public function destroyBebida(Request $request)
    {
        Produto::destroy($request->id);

        $request->session()
            ->flash(
                'mensagem',
                "Produto removido com sucesso"
            );

        return redirect()->route('listar_bebidas');
    }
}
