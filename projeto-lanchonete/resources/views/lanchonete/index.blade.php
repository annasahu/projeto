{{--
##############################
########### Grupo 4 ###########
#      Anna Sahú              #
#      Alex Silva             #
#      Julia Silva            #
#      Filipi Aniceto         #
#      Raphael Santos         #
###############################
--}}

@include('partials.modal_cliente')
@include('partials.modal_lanche')
@include('partials.modal_bebida')
@include('partials.modal_adicional')

@extends('layout')

@section('titulo','Tela Inicial')

@section('conteudo')

@if (!empty($mensagem))
<div class="alert alert-success">
    {{ $mensagem }}
</div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form class="form-container-fluid" method="post">
    <div class="container-fluid">
        <fieldset>
            <legend>Menu</legend>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <img src="https://img.icons8.com/emoji/48/000000/hamburger-emoji.png" />
                </li>
                <li class="nav-item">
                    <button class="btn btn-link" type="reset">Novo</a>
                </li>

                <li class="nav-item">
                    <button class="btn btn-link" type="submit">Fechar Pedido</a>
                </li>

                <li class="nav-item">
                    <button class="btn btn-link" type="submit" action="{{ route('index') }}">Salvar</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Cadastro</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{route('listar_clientes')}}">Clientes</a>
                        <a class="dropdown-item" href="{{route('listar_bebidas')}}">Bebidas</a>
                        <a class="dropdown-item" href="{{route('listar_lanches')}}">Lanches</a>
                        <a class="dropdown-item" href="{{route('listar_adicionais')}}">Adicionais</a>

                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Relatórios</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Pedido Atual</a>
                        <a class="dropdown-item" href="#">Todos os Pedidos</a>
                </li>
            </ul>
        </fieldset>
    </div>
    @csrf
    <div class="container-fluid">
        <div class="row">
            <div class="col-7">
                <fieldset style="border: 1px solid lightgrey; padding: 18px;">

                    <fieldset>
                        <legend>Dados</legend>
                        <form class=" ">
                            <div>
                                <label for="formGroupExampleInput">Código do Pedido</label>
                                <input type="number" class="form-control" id="id" name="id" disabled>
                            </div>
                            <div class="row">
                                <label class="col-11" for="exampleFormControlSelect1">Nome do Cliente</label>
                                <div class="col-11">
                                    <select class="form-control" id="idCliente" name="idCliente">
                                        <option selected></option>
                                        @foreach ($clientes as $cliente)
                                        <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#clienteModal">
                                    <i class="fas fa-plus"></i>
                                </button>

                            </div>
                        </form>
                    </fieldset>
                    <div class="row">
                        <div class="col-9">
                            <fieldset>
                                <legend>Tipos de Lanche</legend>
                                <div class="row">
                                    <div class="col-11">
                                        <select class="form-control" id="idProduto" name="idProduto">
                                            <option selected></option>
                                            @foreach ($lanches as $lanche)
                                            <option value="{{ $lanche->id }}">{{ $lanche->descricao }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#lanchesModal">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </fieldset>
                            <div class="row">
                                <div class="col-6">
                                    <fieldset>
                                        <legend>Bebidas</legend>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="opcaobebida" id="opcaobebida" value="sim">Sim
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="opcaobebida" id="opcaobebida" value="nao">Não
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-6">
                                    <fieldset>
                                        <legend>Bebida Gelada?</legend>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="bebidagelada" id="bebidagelada" value="sim">Sim
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="bebidagelada" id="bebidagelada" value="nao">Não
                                        </div>
                                    </fieldset>
                                </div>

                            </div>
                            <fieldset>
                                <legend>Tipos de Bebida</legend>
                                <div class="row">
                                    <div class="col-11">
                                        <select class="form-control" id="idProduto" name="idProduto">
                                            <option selected></option>
                                            @foreach ($bebidas as $bebida)
                                            <option value="{{ $bebida->id }}">{{ $bebida->descricao }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#bebidasModal">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend>Data do Pedido</legend>
                                <input class="form-control" type="date" id="data" name="data">
                            </fieldset>
                        </div>
                        <div class="col-3">
                            <fieldset>
                                <legend>Adicionais</legend>
                                <div class="form-check form-check-inline">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="opcaoadicional" id="opcaoadicional" value="sim">Sim
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="opcaoadicional" id="opcaoadicional" value="nao">Não
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#adicionaisModal">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>

                            </fieldset>
                            <fieldset>
                                <legend>Adicionais</legend>
                                @foreach ($adicionais as $adicional)
                                <label class="form-check" for="defaultCheck1">
                                    <input class="form-check-input" type="checkbox" id="idProduto" name="idProduto" value="{{ $adicional->id }}">{{ $adicional->descricao }}
                                </label>
                                @endforeach
                            </fieldset>
                        </div>
                    </div>
                    <fieldset>
                        <legend>Observações</legend>
                        <div>
                            <textarea class="form-control" id="observacao" name="observacao" rows="3"></textarea>
                        </div>
                    </fieldset>
            </div>
            <div class="col-5">
                <fieldset>
                    <legend>Pedido:</legend>
                    <div>
                        <textarea class="form-control" id="relatorioAtual" rows="20" disabled>
                        {{-- @php
                        echo '$data'
                        <b>Data:</b> $data<br>
                        <b>Pedido:</b> $idPedido<br>
                        <b>Cliente:</b> $cliente<br>
                        <b>Lanche:</b> $lanche<br>
                        <b>Bebida?</b> $opcaobebida<br>
                        @if($opcaobebida = 'sim')
                        <b>Bebida Gelada?</b> $bebidagelada<br>
                        <b>Bebida:</b> $bebida<br>
                        @endif
                        <b>Adicional?</b> $opcaoadicional<br>
                        @if($opcaoadicional = 'sim')
                        <b>$adicional</b>
                        @endif
                        <b>Obsercações:</b> $observacao<br>
                        <b>Valor Total:</b>R$  <br>
                        "
                        @endphp --}}
                        </textarea>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
</form>


@endsection
