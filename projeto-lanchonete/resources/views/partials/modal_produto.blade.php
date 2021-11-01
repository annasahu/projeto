<div class="modal fade" id="lanchesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <label for="" class="col-form-label">Tipo:</label>
                        <input type="text" class="form-control" name="">
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
                <button type="submit" action="{{ route('index') }}" class="btn btn-primary">Enviar</button>
            </div>
        </div>
    </div>
</div>