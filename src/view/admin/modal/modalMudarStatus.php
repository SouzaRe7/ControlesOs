<div class="modal fade" id="modal-status">
    <div class="modal-dialog">
        <div class="modal-content bg-info">
            <div class="modal-header">
                <h4 class="modal-title">Mudar Status</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="idStatus" name="idStatus">
                <input type="hidden" id="statusAtual" name="statusAtual">
                <label>Dejesa mudar o status do usuario:</label> <span id="nomeUserStatus" name="nomeUserStatus"></span>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancelar</button>
                <button onclick="return MudarStatus()" name="btnMudarStatus" type="button" class="btn btn-outline-dark">Sim</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->