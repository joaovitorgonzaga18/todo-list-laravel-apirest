<div class="row">
    <div class="col-md-12">
        <div class="modal-header">
            <h5 class="modal-title h4" id="myLargeModalLabel">Cadastro/Edição de Tarefa</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="" id="form-cadastro-tarefa">
                        <input type="hidden" id="list_id" name="list_id">
                        <input type="hidden" id="task_id" name="task_id" value="0">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="task-name">Descrição</label>
                                <input type="text" class="form-control" id="task-name" name="task-name" placeholder="Ex.: Lista de Compras" value="" required>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 20px;">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>