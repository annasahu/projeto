@extends('layout')

@section('titulo')
Cadastrar Lanche
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
        <h2 style="text-align: center">Novo Lanche</h2>
        @csrf
        <div class="form-group">
            <label for="">Código</label>
            <input type="number" class="form-control" name="id" id="id" disabled value=""> 
        </div>
        <div class="form-group">
            <label for="">Categoria</label>
            <input type="number" class="form-control" name="id" id="idCat" disabled value="3"> 
        </div>
        <div class="form-group">
            <label for="">Descrição</label>
            <input type="text" class="form-control" name="nome" id="nome">
        </div>
        <div class="form-group">
            <label for="">Preço</label>
            <input type="double" class="form-control" name="endereco" id="endereco">
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>
@endsection
