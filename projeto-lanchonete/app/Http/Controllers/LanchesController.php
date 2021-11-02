<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;
use App\Http\Requests\LancheFormRequest;

class LanchesController extends Controller
{
    ################ referentes a lanches ####################
    // mostra o formulário
    public function adicionarLanche(Request $request)
    {
        $categoria = Produto::query()
            ->with('Categoria')
            ->where('idCat', '3')
            ->get();

        return view('lanchonete.adicionar_lanche', compact('categoria'));
    }

    // salva os dados no BD - via form
    public function storeLanche(LancheFormRequest $request)
    {
        $lanche = Produto::create($request->all());
        $request->session()
            ->flash(
                'mensagem',
                "{$lanche->id} - {$lanche->categoria} adicionado com sucesso"
            );

        $categorias = Categoria::query()
            ->where('categoria', 'Lanche')
            ->get();

        return redirect()->route('listar_lanches');
    }

    // modal de cliente (verificar se realmente precisa de um modal para cada tabela)
    // verificar pq a chamada está sobrescrevendo a outra
    public function storeLancheModal(lancheFormRequest $request)
    {
        $lanche = Produto::create($request->all());
        $request->session()
            ->flash(
                'mensagem',
                "{$lanche->id} - {$lanche->descricao} adicionado com sucesso"
            );

        //return view('lanchonete.index', compact('cliente', 'mensagem'));
        return redirect()->route('index');
    }

    // página inicial de clientes
    public function listarLanches(Request $request)
    {
        $lanches = Produto::query()
            ->with('Categoria')
            ->where('idCat', '3')
            ->get();

        $mensagem = $request->session()->get('mensagem');
        $request->session()->remove('mensagem');

        return view('lanchonete.listar_lanches', compact('lanches', 'mensagem'));
    }

    // deletar cliente
    public function destroyLanche(Request $request)
    {
        Produto::destroy($request->id);

        $request->session()
            ->flash(
                'mensagem',
                "Lanche removido com sucesso"
            );

        return redirect()->route('listar_lanches');
    }
}
