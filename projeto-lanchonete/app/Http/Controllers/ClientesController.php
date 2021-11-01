<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Http\Requests\ClienteFormRequest;

class ClientesController extends Controller
{
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
                "{$cliente->id} - {$cliente->nome} adicionado com sucesso"
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
}
