@extends('layout')

@section('titulo')
Lista de Clientes
@endsection

@section('conteudo')

@if (!empty($mensagem))
<div class="alert alert-success">
    {{ $mensagem }}
</div>
@endif

<div class="main ">
    <div class="table-container">
        <h2 style="text-align: center">Clientes</h2>
        <a href="/lanchonete/adicionarcliente" class="btn btn-primary " role="button" aria-pressed="true">Adicionar</a>
        <table class="table">
            <thead class="thead-dark ">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($clientes as $cliente)
                    <th scope="row">{{ $cliente->id }}</th>
                    <td>{{ $cliente->nome }}</td>
                    <td>{{ $cliente->endereco }}</td>
                    <td>{{ $cliente->telefone }}</td>
                    @endforeach
                    <td>
                        <!--adicionar página para edição-->
                        <a href="/lanchonete/adicionarcliente" class="btn btn-primary " role="button" aria-pressed="true">Editar</a>
                        <form method="post" action="{{}}/lanchonete/clientehomepage/{{ $cliente->id }}" onsubmit="return confirm('Tem certeza que deseja remover {{ addslashes($cliente->nome) }}?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" role="button" aria-pressed="true">Excluir</a>
                        </form>
                    </td>
                </tr>
            </tbody>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
