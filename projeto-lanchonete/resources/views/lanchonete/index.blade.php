@extends('layout')

@section('titulo')
Tela Inicial
@endsection

@section('conteudo')
<div class="container-fluid">
    <fieldset>
        <legend>Menu</legend>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="#">Novo</a>
            </li>

            <li class="nav-item">
                <a class="nav-link " href="#">Fechar Pedido</a>
            </li>

            <li class="nav-item">
                <a class="nav-link " href="#">Salvar</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Cadastro</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Clientes</a>
                    <a class="dropdown-item" href="#">Bebidas</a>
                    <a class="dropdown-item" href="#">Lanches</a>
                    <a class="dropdown-item" href="#">Adicionais</a>

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



<div class="container-fluid">
    <div class="row">
        <div class="col-7">

            <fieldset style="border: 1px solid lightgrey; padding: 18px;">

                <fieldset>
                    <legend>Dados</legend>
                    <form class=" ">
                        <div>
                            <label for="formGroupExampleInput">Código do Pedido</label>
                            <input type="text" class="form-control" id="formGroupExampleInput">
                        </div>
                        <div class="row">
                            <label class="col-11" for="exampleFormControlSelect1">Nome do Cliente</label>
                            <div class="col-11">
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option selected></option>
                                    <option>João Pedro</option>
                                    <option>...</option>
                                </select>
                            </div>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#clienteModal">+</button>

                        </div>
                    </form>
                </fieldset>
                <div class="row">
                    <div class="col-9">
                        <fieldset>
                            <legend>Tipos de Lanche</legend>
                            <div class="row">
                                <div class="col-11">
                                    <select class="form-control" id="exampleFormControlSelect2">
                                        <option selected>Cachorro Quente</option>
                                        <option>X Salada</option>
                                        <option>X Bacon</option>
                                        <option>X Burguer</option>
                                        <option>...</option>
                                    </select>
                                </div>
                                <div class="">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#produtosModal">+</button>
                                </div>
                            </div>
                        </fieldset>
                        <div class="row">

                            <fieldset class="col-6">
                                <legend>Bebidas</legend>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="sim">
                                    <label class="form-check-label" for="inlineRadio1">Sim</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="nao">
                                    <label class="form-check-label" for="inlineRadio2">Não</label>
                                </div>
                            </fieldset>
                            <fieldset class="col-6">
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

                            <div class="col-6">
                                <fieldset>
                                    <legend>Bebidas</legend>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="sim">
                                        <label class="form-check-label" for="inlineRadio1">Sim</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="nao">
                                        <label class="form-check-label" for="inlineRadio2">Não</label>
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
                                    <select class="form-control" id="exampleFormControlSelect3">
                                        <option selected>Coca Cola</option>
                                        <option>Guaraná</option>
                                        <option>Fanta Laranja</option>
                                        <option>Fanta Uva</option>
                                        <option>...</option>
                                    </select>
                                </div>
                                <div class="">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#produtosModal">+</button>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>Data do Pedido</legend>
                            <input class="form-control" type="date" id="datapedido" name="datapedido">
                        </fieldset>
                    </div>
                    <div class="col-3">
                        <fieldset>
                            <legend>Adicionais</legend>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions2" id="inlineRadio5" value="sim">
                                <label class="form-check-label" for="inlineRadio5">Sim</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions2" id="inlineRadio6" value="nao">
                                <label class="form-check-label" for="inlineRadio6">Não</label>
                            </div>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#produtosModal">+</button>
                        </fieldset>
                        <fieldset>
                            <legend>Adicionais</legend>
                            <label class="form-check" for="defaultCheck1"><input class="form-check-input" type="checkbox" value="pimenta" id="defaultCheck1">Pimenta</label>
                            <label class="form-check" for="defaultCheck1"><input class="form-check-input" type="checkbox" value="mostarda" id="defaultCheck2">Mostarda</label>
                            <label class="form-check" for="defaultCheck1"><input class="form-check-input" type="checkbox" value="ketchup" id="defaultCheck3">Ketchup</label>
                            <label class="form-check" for="defaultCheck1"><input class="form-check-input" type="checkbox" value="pure" id="defaultCheck4">Purê</label>
                            <label class="form-check" for="defaultCheck1"><input class="form-check-input" type="checkbox" value="maionese" id="defaultCheck5">Maionese</label>
                            <label class="form-check" for="defaultCheck1"><input class="form-check-input" type="checkbox" value="batata" id="defaultCheck6">Batata Palha</label>
                            <label class="form-check" for="defaultCheck1"><input class="form-check-input" type="checkbox" value="barbecue" id="defaultCheck7">Barbecue</label>
                        </fieldset>
                    </div>
                </div>
                <fieldset>
                    <legend>Observações</legend>
                    <div>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                </fieldset>
        </div>
        <div class="col-5">
            <fieldset>
                <legend>Pedido:</legend>
                <div>
                    <textarea class="form-control" id="exampleFormControlTextarea2" rows="20"></textarea>
                </div>
            </fieldset>
        </div>
    </div>
</div>





<!--Modais-->
<!--Modal Cadastro Cliente-->
<div class="modal fade" id="clienteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cadastro de Cliente</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form>
                <div class="form-group">
                    <label for="" class="col-form-label">Código:</label>
                    <input type="number" class="form-control" name="">
                </div>
                <div class="form-group">
                    <label for="" class="col-form-label">Nome</label>
                    <input type="text" class="form-control" name="">
                </div>
                <div class="form-group">
                    <label for="" class="col-form-label">Endereço:</label>
                    <input type="text" class="form-control" name="">
                </div>
                <div class="form-group">
                    <label for="" class="col-form-label">Número:</label>
                    <input type="text" class="form-control" name="">
                </div>

            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <button type="button" class="btn btn-primary">Enviar</button>
        </div>
    </div>
</div>
</div>






<!--Modal Casdastro Produtos-->


<div class="modal fade" id="produtosModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cadastro de Produtos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="" class="col-form-label">Código:</label>
                        <input type="number" class="form-control" name="">
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">Descrição</label>
                        <input type="text" class="form-control" name="">
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">Preço:</label>
                        <input type="text" class="form-control" name="">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary">Enviar</button>
            </div>
        </div>
    </div>
</div>
@endsection
