<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;
use App\Http\Requests\AdicionalFormRequest;

class AdicionaisController extends Controller
{
    ################ referentes a adicionais ####################

    // mostra o formulário
    public function adicionarAdicional(Request $request)
    {
        $categoria = Produto::query()
            ->with('Categoria')
            ->where('idCat', '1')
            ->get();

        return view('lanchonete.adicionar_adicional', compact('categoria'));
    }

    // salva os dados no BD - via form
    public function storeAdicional(AdicionalFormRequest $request)
    {
        $adicional = Produto::create($request->all());
        // $request->session()
        //     ->flash(
        //         'mensagem',
        //         "{$adicional->idCat->categoria} {$adicional->id} - {$adicional->nome} adicionado com sucesso" //???
        //     );

        $categorias = Categoria::query()
            ->where('categoria', 'adicional')
            ->get();

        return redirect()->route('listar_adicionais');
    }

    // modal de cliente (verificar se realmente precisa de um modal para cada tabela)
    // verificar pq a chamada está sobrescrevendo a outra
    public function storeAdicionalModal(AdicionalFormRequest $request)
    {
        $adicional = Produto::create($request->all());
        // $request->session()
        //     ->flash(
        //         'mensagem',
        //         "{$adicional->idCat->categoria} {$adicional->id} - {$adicional->nome} adicionado com sucesso" //???
        //     );

        return redirect()->route('index');
    }

    // página inicial de clientes
    public function listaradicionals(Request $request)
    {
        $adicionais = Produto::query()
            ->with('Categoria')
            ->where('idCat', '1')
            ->get();

        $mensagem = $request->session()->get('mensagem');
        $request->session()->remove('mensagem');

        return view('lanchonete.listar_adicionais', compact('adicionais', 'mensagem'));
    }

    // deletar cliente
    public function destroyadicional(Request $request)
    {
        Produto::destroy($request->id);

        $request->session()
            ->flash(
                'mensagem',
                "adicional removido com sucesso"
            );

        return redirect()->route('listar_adicionais');
    }
}
