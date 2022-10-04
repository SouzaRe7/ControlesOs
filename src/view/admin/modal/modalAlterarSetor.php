<div class="modal fade" id="modal-setor">
    <div class="modal-dialog">
        <div class="modal-content bg-warning">
            <div class="modal-header">
                <h4 class="modal-title">Alterar Setor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="modalSetorID" name="modalSetorID">
                <label>Nome do equipamemto</label>
                <input id="modalSetorNome" name="modalSetorNome" class="form-control obg" >
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancelar</button>
                <button onclick="return AlterarSetorAJAX('setor')" name="btnAlterar" type="submit" class="btn btn-outline-dark">Alterar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->