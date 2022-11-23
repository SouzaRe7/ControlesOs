<div class="modal fade" id="modal-RemoverEqSetor">
    <div class="modal-dialog">
        <div class="modal-content bg-danger">
            <div class="modal-header">
                <h4 class="modal-title">Excluir</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="modalRemoverID" name="modalRemoverID">
                <label>Dejesa remover o registro</label>
                <span id="modalRemoverNome" name="modalRemoverNome"></span>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancelar</button>
                <button onclick="return RemoverEquipamentoSetor()" name="btnExcluir" type="button" class="btn btn-outline-dark">Sim</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->