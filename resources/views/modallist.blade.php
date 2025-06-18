<div class="row">
    <div class="col-md-12">
        <div class="modal-header">
            <h5 class="modal-title h4" id="myLargeModalLabel">Nova Lista</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="/api/lists/create" id="form-cadastro-lista">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="list-name">Nome</label>
                                <input type="text" class="form-control" id="list-name" name="list-name" placeholder="Ex.: Lista de Compras" value="" required>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 20px;">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Criar Lista</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>