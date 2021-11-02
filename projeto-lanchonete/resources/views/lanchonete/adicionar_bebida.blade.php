@extends('layout')

@section('titulo')
Cadastrar Bebida
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
        <h2 style="text-align: center">Nova Bebida</h2>
        @csrf
        <div class="form-group">
            <label for="">Código</label>
                <input type="number" class="form-control" name="id" id="id" disabled value=""> 
            </div>
        <div class="form-group">
            <label for="">Categoria</label>
            <input type="number" class="form-control" name="idCat" id="idCat"> 
        </div>
        <div class="form-group">
            <label for="">Descrição</label>
            <input type="text" class="form-control" name="descricao" id="descricao">
        </div>
        <div class="form-group">
            <label for="">Preço</label>
            <input type="double" class="form-control" name="preco" id="preco">
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>
@endsection
