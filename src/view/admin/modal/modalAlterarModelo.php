<div class="modal fade" id="modal-modelo">
    <div class="modal-dialog">
        <div class="modal-content bg-warning">
            <div class="modal-header">
                <h4 class="modal-title">Alterar Modelo</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="modalModeloID" name="modalModeloID">
                <label>Nome do equipamemto</label>
                <input id="modalModeloNome" name="modalModeloNome" class="form-control obg" placeholder="Nome do modelo">
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancelar</button>
                <button onclick="return AlterarModeloAJAX('modelo')" name="btnAlterar" type="submit" class="btn btn-outline-dark">Alterar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->