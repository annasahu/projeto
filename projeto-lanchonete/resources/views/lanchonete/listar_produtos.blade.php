@extends('layoutlistas')

@section('titulopagina')
Lista de Produtos
@endsection


@section('titulo', 'Produtos')

@section('conteudo')

@if (!empty($mensagem))
<div class="alert alert-success">
    {{ $mensagem }}
</div>
@endif

@section('campo1', 'Tipo')
@section('campo2', 'Descrição')
@section('campo3', 'Preço')


@section('loop')
@foreach ($produtos as $produto)
<tr>
    <th scope="row">{{ $produto->id }}</th>
    <td>{{ $produto->tipo }}</td>
    <td>{{ $produto->descricao }}</td>
    <td>{{ $produto->preco }}</td>
    <td class="btn-group" role="group">
      <!-- arrumar o alinhamento dos botões-->  
        <!--adicionar página para edição-->
        <a href="{{route('form_adicionar_produto')}}" class="btn btn-primary " role="button" aria-pressed="true">Editar</a>
        <form method="post" action="/lanchonete/listarclientes/{{ $produto->id }}" onsubmit="return confirm('Tem certeza que deseja remover {{ addslashes($cliente->nome) }}?')">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" role="button" aria-pressed="true">Excluir</a>
        </form>
    </td>
</tr>
@endforeach
@endsection

@endsection