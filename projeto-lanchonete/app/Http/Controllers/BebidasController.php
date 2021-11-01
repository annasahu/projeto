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
            ->where('idCat', '3')
            ->get();

        return view('lanchonete.adicionar_bebida', compact('categoria'));
    }

    // salva os dados no BD - via form
    public function storeBebida(BebidaFormRequest $request)
    {
        $bebida = Produto::create($request->all());
        // $request->session()
        //     ->flash(
        //         'mensagem',
        //         "{$bebida->idCat->categoria} {$bebida->id} - {$bebida->nome} adicionado com sucesso" //???
        //     );

        $categorias = Categoria::query()
            ->where('categoria', 'Bebida')
            ->get();

        return redirect()->route('listar_bebida');
    }

    
    public function storeBebidaModal(BebidaFormRequest $request)
    {
        $bebida = Produto::create($request->all());
        // $request->session()
        //     ->flash(
        //         'mensagem',
        //         "{$bebida->idCat->categoria} {$bebida->id} - {$bebida->nome} adicionado com sucesso" //???
        //     );

        return redirect()->route('index');
    }

    // página inicial de clientes
    public function listarbebidas(Request $request)
    {
        $bebidas = Produto::query()
            ->with('Categoria')
            ->where('idCat', '3')
            ->get();

        $mensagem = $request->session()->get('mensagem');
        $request->session()->remove('mensagem');

        return view('lanchonete.listar_bebida', compact('bebidas', 'mensagem'));
    }

    // deletar cliente
    public function destroybebida(Request $request)
    {
        Produto::destroy($request->id);

        $request->session()
            ->flash(
                'mensagem',
                "Produto removido com sucesso"
            );

        return redirect()->route('listar_bebida');
    }
}
