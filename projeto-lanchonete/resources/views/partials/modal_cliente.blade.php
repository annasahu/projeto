<div class="modal fade" id="clienteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cadastro de Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Código</label>
                        <input type="number" class="form-control" name="id" id="id" disabled> 
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
                        <input type="text" onkeypress="$(this).mask('(00)0.0000-0000')" class="form-control" name="telefone" id="telefone">
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