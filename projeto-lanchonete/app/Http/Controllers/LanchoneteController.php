<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Produto;
use App\Http\Requests\ClienteFormRequest;

class LanchoneteController extends Controller
{
    public function index(Request $request)
    {
        // ver como faz para adicionar todos os dados de BD na index
        $clientes = Cliente::query()
            ->orderBy('id')
            ->get();
        $mensagem = $request->session()->get('mensagem');
        $request->session()->remove('mensagem');

        return view('lanchonete.index', compact('clientes', 'mensagem'));
    }

    ################ referentes a clientes ####################

    // mostra o formulário
    public function adicionarCliente(Request $request)
    {
        return view('lanchonete.adicionar_cliente');
    }

    // salva os dados no BD - via form
    public function storeCliente(ClienteFormRequest $request)
    {
        $cliente = Cliente::create($request->all());
        $request->session()
            ->flash(
                'mensagem',
                "Cliente {$cliente->id} - {$cliente->nome} adicionado com sucesso"
            );

        return redirect()->route('listar_clientes');
    }

    // modal de cliente (verificar se realmente precisa de um modal para cada banco)
    public function storeClienteModal(ClienteFormRequest $request)
    {
        $cliente = Cliente::create($request->all());
        $request->session()
            ->flash(
                'mensagem',
                "Cliente {$cliente->id} - {$cliente->nome} adicionado com sucesso"
            );

        //return view('lanchonete.index', compact('cliente', 'mensagem'));
        return redirect()->route('index');
    }

    // página inicial de clientes
    public function listarClientes(Request $request)
    {
        $clientes = Cliente::query()
            ->orderBy('id')
            ->get();
        $mensagem = $request->session()->get('mensagem');
        $request->session()->remove('mensagem');

        return view('lanchonete.listar_clientes', compact('clientes', 'mensagem'));
    }

    // deletar cliente
    public function destroyCliente(Request $request)
    {
        Cliente::destroy($request->id);

        $request->session()
            ->flash(
                'mensagem',
                "Cliente removido com sucesso"
            );

        return redirect()->route('listar_clientes');
    }

    ################ referentes a lanches ####################
    // mostra o formulário
    public function adicionarLanche(Request $request)
    {
        return view('lanchonete.adicionar_lanche');
    }

    // salva os dados no BD - via form
    public function storeLanche(Request $request)
    {
        $lanche = Produto::create($request->all());
        $request->session()
            ->flash(
                'mensagem',
                "{$lanche->idCat->categoria} {$lanche->id} - {$lanche->nome} adicionado com sucesso" //???
            );

        return redirect()->route('listar_lanches');
    }

    // modal de cliente (verificar se realmente precisa de um modal para cada banco)
    public function storeLancheModal(Request $request)
    {
        $lanche = Produto::create($request->all());
        $request->session()
            ->flash(
                'mensagem',
                "{$lanche->idCat->categoria} {$lanche->id} - {$lanche->nome} adicionado com sucesso" //???
            );

        return redirect()->route('index');
    }

    // página inicial de clientes
    public function listarLanches(Request $request)
    {
        $lanches = Produto::query()
            ->orderBy('id')
            ->where('idCat->categoria = Lanche') //???
            ->get();
        $mensagem = $request->session()->get('mensagem');
        $request->session()->remove('mensagem');

        //return view('lanchonete.listar_lanches')->with('idCat->categoria','Lanche');
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

        return redirect()->route('listar_lanche');
    }

}
