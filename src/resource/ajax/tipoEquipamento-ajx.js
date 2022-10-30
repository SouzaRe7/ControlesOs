function CadastrarTipoEquipamentoAjx(id_form) {

    if (NotificarCamposGenerico(id_form)) {
        let nomeTipoEquipamento = $("#admNome").val();
        $.ajax({
            type: "post",
            url: BASE_URL_AJAX("tipoEquipamento_dataview"),
            data: {
                btnGravar: 'ajx',
                admNome: nomeTipoEquipamento
            },
            success: function (ret) {
                RemoverLoad();
                ConsultarTipoEquipamentoAjx();
                switch (ret) {
                    case '1':
                        MensagemSucesso();
                        LimparCamposGenerico(id_form);
                        break;
                    case '-1':
                        MensagemErro();
                        break;
                }
            }
        })
    }
    return false;
}
function ConsultarTipoEquipamentoAjx() {

    $.ajax({
        type: "post",
        url: BASE_URL_AJAX("tipoEquipamento_dataview"),
        data: {
            ConsultarAJX: "ok"
        },
        success: function (Tabela) {
            $("#lista").html(Tabela);
            RemoverLoad();
        }
    })

}
function AlterarTipoEquipamentoAJAX(id_form) {

    if (NotificarCamposGenerico(id_form)) {

        let nome = $("#modalTipoNome").val();
        let id = $("#modalTipoID").val();

        $.ajax({
            type: "post",
            url: BASE_URL_AJAX("tipoEquipamento_dataview"),
            data: {
                btnAlterar: "ajx",
                modalTipoID: id,
                modalTipoNome: nome
            },
            success: function (ret) {
                $("#modal-tipoEquipamento").modal("hide");
                switch (ret) {
                    case '1':
                        MensagemSucesso();
                        //LimparCamposGenerico(id_form);
                        ConsultarTipoEquipamentoAjx();
                        break;
                    case '-1':
                        MensagemErro();
                        break;
                }
            }
        })
    }
    return false;
}
function Excluir() {
    let id = $("#modalExcluirID").val();
    $.ajax({
        type: "post",
        url: BASE_URL_AJAX("tipoEquipamento_dataview"),
        data: {
            btnExcluir: "ajx",
            modalExcluirID: id
        },
        success: function (ret) {
            $("#modal-excluir").modal("hide");
            ConsultarTipoEquipamentoAjx();
            switch (ret) {
                case '1':
                    MensagemSucesso();
                    //LimparCamposGenerico(id_form);                   
                    break;
                case '-1':
                    MensagemExcluirUso();
                    break;
            }
        }
    })
    return false;
}
function FiltrarTipoEquipamentoAJAX(nome_filtro) {

    $.ajax({
        type: "post",
        url: BASE_URL_AJAX("tipoEquipamento_dataview"),
        data: {
            FiltrarAJX: "ajx",
            nome_filtro: nome_filtro.trim()
        },
        success: function (Filtrar) {

            $("#lista").html(Filtrar);

        }

    })

}