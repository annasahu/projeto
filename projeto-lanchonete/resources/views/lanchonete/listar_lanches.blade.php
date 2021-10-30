@extends('layout')

@section('titulopagina')
Lista de Lanches
@endsection

@section('conteudo')
<div class="main ">
    <div class="table-container">
        <h2 style="text-align: center">Lanches</h2>
        <a href="/lanchonete/adicionarlanche" class="btn btn-primary " role="button" aria-pressed="true">Adicionar</a>
        @if (!empty($mensagem))
        <div class="alert alert-success">
            {{ $mensagem }}
        </div>
        @endif
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Preço</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lanches as $lanche)
                <tr>
                    <th scope="row">{{ $lanche->id }}</th>
                    <td>{{ $lanche->descricao }}</td>
                    <td>{{ $lanche->preco }}</td>
                    <td class="btn-group" role="group">
                        <!-- arrumar o alinhamento dos botões-->
                        <!--adicionar página para edição-->
                        <a href="{{route('form_adicionar_produto_lanche')}}" class="btn btn-primary " role="button" aria-pressed="true">Editar</a>
                        <form method="post" action="/lanchonete/listarlanches/{{ $lanche->id }}" onsubmit="return confirm('Tem certeza que deseja remover {{ addslashes($lanche->descricao) }}?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" role="button" aria-pressed="true">Excluir</a>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection