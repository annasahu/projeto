@extends('layoutlistas')

@section('titulopagina')
Lista de Clientes
@endsection

@section('titulo', 'Clientes')

@section('campo1', 'Nome')
@section('campo2', 'Endereço')
@section('campo3', 'Telefone')

@section('mensagem')
@if (!empty($mensagem))
<div class="alert alert-success">
    {{ $mensagem }}
</div>
@endif
@endsection

@section('loop')
@foreach ($clientes as $cliente)
<tr>
    <th scope="row">{{ $cliente->id }}</th>
    <td>{{ $cliente->nome }}</td>
    <td>{{ $cliente->endereco }}</td>
    <td>{{ $cliente->telefone }}</td>
    <td class="btn-group" role="group">
      <!-- arrumar o alinhamento dos botões-->  
        <!--adicionar página para edição-->
        <a href="{{route('form_adicionar_cliente')}}" class="btn btn-primary " role="button" aria-pressed="true">Editar</a>
        <form method="post" action="/lanchonete/listarclientes/{{ $cliente->id }}" onsubmit="return confirm('Tem certeza que deseja remover {{ addslashes($cliente->nome) }}?')">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" role="button" aria-pressed="true">Excluir</a>
        </form>
    </td>
</tr>
@endforeach
@endsection

