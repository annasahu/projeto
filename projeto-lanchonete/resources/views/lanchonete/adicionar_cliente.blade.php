@extends('layout')

@section('titulo')
Cadastrar cliente
@endsection

@section('conteudo')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="main">
    <form class="form-container" method="post">
        <h2 style="text-align: center">Novo Cliente</h2>
        @csrf
        <div class="form-group">
            <label for="">Código</label>
            <input type="number" class="form-control" name="id" id="id">
        </div>
        <div class="form-group">
            <label for="">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome">
        </div>
        <div class="form-group">
            <label for="">Endereço</label>
            <input type="text" class="form-control" name="endereco" id="endereco">
        </div>
        <div class="form-group">
            <label for="">Telefone</label>
            <input type="text" class="form-control" name="telefone" id="telefone">
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>
@endsection
