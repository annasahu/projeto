@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="modal fade" id="adicionaisModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cadastro de Adicional</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post">
                    @csrf
                    <div class="form-group">
                        <label for="" class="col-form-label">Código:</label>
                        <input type="number" class="form-control" name="id" id="id" disabled value="">
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">Categoria:</label>
                        <input type="text" class="form-control" name="idCat" id="idCat" value="1">
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">Descrição</label>
                        <input type="text" class="form-control" name="descricao" id="descricao">
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">Preço:</label>
                        <input type="text" onkeypress="$(this).mask('#,##0.00', {reverse: true});" class="form-control" name="preco" id="preco">
                    </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="submit" action="{{ route('index') }}" class="btn btn-primary">Cadastrar</button>
            </div>
        </form>
        </div>
    </div>
</div>
