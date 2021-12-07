<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cliente;
use App\Models\Produto;
use App\Models\Categoria;
use App\Models\Pedido;
use App\Http\Requests\PedidoFormRequest;
use App\Models\Item;


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

    // public function storePedido(PedidoFormRequest $request)
    // {
        
    //     $pedido = Pedido::create(
    //         $request->idCliente,
    //         $request->data,
    //         $request->observacoes
    //     )->save();

    //     $items = Item::create(
    //         $request->idPedido->$pedido->id,
    //         $request->idProduto
    //     )->save();

    //     // $precoTotal = Item::where(function($query) {
    //     //     $query->sum('valor')
    //     //             ->from('produtos')
    //     //             ->whereColumn('produtos.id','itens.idProduto')
    //     // } )->get();

    //     $request->session()
    //         ->flash(
    //             'mensagem',
    //             "Pedido {$pedido->id} adicionado com sucesso"
    //         );

    //     return redirect()->route('index');
    // }

    // public function relatorioPedidoAtual(PedidoFormRequest $request)
    // {

    //     $precoTotal = Item::where(function($query) {
    //         $query->sum('valor')
    //               ->from('produtos')
    //               ->whereColumn('produtos.id','itens.idProduto')
    //     } )->get();

    //     $itensPedido = Item::addSelect(['idItem' => Pedido::select('id')
    //                 ->whereColumn('idPedido','id')
    //                 ->orderByAsc('idItem')
    //             ])->get();

    //     return redirect()->route('relatorio_atual');
    // }


    

    }
