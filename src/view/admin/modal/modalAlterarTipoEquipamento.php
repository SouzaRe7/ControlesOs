<div class="modal fade" id="modal-tipoEquipamento">
    <div class="modal-dialog">
        <div class="modal-content bg-warning">
            <div class="modal-header">
                <h4 class="modal-title">Alterar Tipo de Equipamento</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="modalTipoID" name="modalTipoID">
                <label>Nome do equipamemto</label>
                <input id="modalTipoNome" name="modalTipoNome" class="form-control obg" placeholder="Nome do equipamento">
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancelar</button>
                <button onclick="return AlterarTipoEquipamentoAJAX('tipo')" name="btnAlterar" type="submit" class="btn btn-outline-dark">Alterar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->