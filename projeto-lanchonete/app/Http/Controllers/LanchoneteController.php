<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Produto;
use App\Models\Categoria;
use App\Models\Pedido;
use App\Http\Requests\PedidoFormRequest;

class LanchoneteController extends Controller
{
    // formulário para adicionar pedido
    public function index(Request $request)
    {
        $clientes = Cliente::query()
            ->orderBy('id')
            ->get();

        // seleciona apenas lanches
        $lanches = Produto::query()
            ->orderBy('descricao')
            ->with('Categoria')
            ->where('idCat', '3')
            ->get();

        // seleciona apenas bebidas
        $bebidas = Produto::query()
            ->orderBy('id')
            ->with('Categoria')
            ->where('idCat', '2')
            ->get();

        // seleciona apenas adicionais
        $adicionais = Produto::query()
            ->orderBy('id')
            ->with('Categoria')
            ->where('idCat', '1')
            ->get();
        
        $pedidos = Pedido::query()
            ->orderBy('id')
            ->get();

        $mensagem = $request->session()->get('mensagem');
        $request->session()->remove('mensagem');

    return view('lanchonete.index', compact('clientes', 'lanches', 'bebidas', 'adicionais', 'mensagem', 'pedidos'));
    }

    // salva os dados no BD
    public function storePedido(PedidoFormRequest $request)
    {
        $pedido = Pedido::create($request->all());
        $request->session()
            ->flash(
                'mensagem',
                "Pedido {$pedido->id} adicionado com sucesso"
            );

        return redirect()->route('index');
    }


    

    }
