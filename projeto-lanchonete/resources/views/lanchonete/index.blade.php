{{-- 
##############################
########### Grupo: ###########
#     Anna Sahú              #
#     Alex Silva             #
#     Julia Silva            #
#     Filipi Aniceto         #
#     Raphael Santos         #
############################## 
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

<form class="form-container-fluid" method="post">
    <div class="container-fluid">
        <fieldset>
            <legend>Menu</legend>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <img src="https://img.icons8.com/emoji/48/000000/hamburger-emoji.png" />

                </li>
                <li class="nav-item">
                    <button class="btn btn-link" >Novo</a>
                </li>

                <li class="nav-item">
                    <button class="btn btn-link" onclick="window.print()">Fechar Pedido</a>
                </li>

                <li class="nav-item">
                    <button class="btn btn-link" type="submit">Salvar</a>
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
                                <input type="text" class="form-control" id="idPedido" disabled>
                                {{-- <label>{{$pedidos->idPedido}}</label>> --}}
                            </div>
                            <div class="row">
                                <label class="col-11" for="exampleFormControlSelect1">Nome do Cliente</label>
                                <div class="col-11">
                                    <select class="form-control" id="cliente">
                                        <option selected></option>
                                        @foreach ($clientes as $cliente)
                                        <option>{{ $cliente->nome }}</option>
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
                                        <select class="form-control" id="lanche">
                                            <option selected></option>
                                            @foreach ($lanches as $lanche)
                                            <option>{{ $lanche->descricao }}</option>
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
                                            <input class="form-check-input" type="radio" name="opcaobebida" id="bebidasim" value="sim">
                                            <label class="form-check-label" for="bebidasim">Sim</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="opcaobebida" id="bebidanao" value="nao">
                                            <label class="form-check-label" for="bebidanao">Não</label>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-6">
                                    <fieldset>
                                        <legend>Bebida Gelada?</legend>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions1" id="inlineRadio3" value="sim">
                                            <label class="form-check-label" for="inlineRadio3">Sim</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions1" id="inlineRadio4" value="nao">
                                            <label class="form-check-label" for="inlineRadio4">Não</label>
                                        </div>
                                    </fieldset>
                                </div>

                            </div>
                            <fieldset>
                                <legend>Tipos de Bebida</legend>
                                <div class="row">
                                    <div class="col-11">
                                        <select class="form-control" id="bebida" name="bebida">
                                            <option selected></option>
                                            @foreach ($bebidas as $bebida)
                                            <option>{{ $bebida->descricao }}</option>
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
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions2" id="inlineRadio5" value="sim">
                                        <label class="form-check-label" for="inlineRadio5">Sim</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions2" id="inlineRadio6" value="nao">
                                        <label class="form-check-label" for="inlineRadio6">Não</label>
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
                                    <input class="form-check-input" type="checkbox" id="adicional" name="adicional" value="{{ $adicional->descricao }}" id="defaultCheck">{{ $adicional->descricao }}
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
                        <textarea class="form-control" id="resumoPedido" rows="20" disabled></textarea>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
</form>

@endsection
