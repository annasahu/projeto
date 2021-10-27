<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Http\Requests\ClienteFormRequest;

class LanchoneteController extends Controller
{
    public function index(Request $request)
    {

        return view('lanchonete.index');
    }

    // referentes ao cliente

    // mostra o formulário
    public function adicionarCliente(Request $request)
    {
        return view('lanchonete.adicionar_cliente');
    }

    // salva os dados no BD
    public function storeClient(ClienteFormRequest $request)
    {
        $cliente = Cliente::create($request->all());
        $request->session()
            ->flash(
                'mensagem',
                "Cliente {$cliente->id} - {$cliente->nome} adicionado com sucesso"
            );
            
        return redirect()->route('listar_clientes');
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
    public function destroy(Request $request) {
        Cliente::destroy($request->id);

        $request->session()
            ->flash(
                'mensagem', "Cliente removido com sucesso"
            );

            return redirect()->route('listar_clientes');
    }
}
