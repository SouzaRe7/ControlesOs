function CadastrarSetorAjx(id_form) {

    if (NotificarCamposGenerico(id_form)) {
        let nomeSetor = $("#nome").val();
        $.ajax({
            type: "post",
            url: BASE_URL_AJAX("setor_dataview"),
            data: {
                btnGravar: 'ajx',
                nome: nomeSetor
            },
            success: function (ret) {
                RemoverLoad();

                switch (ret) {
                    case '1':
                        MensagemSucesso();
                        LimparCamposGenerico(id_form);
                        ConsultarSetorAjx();
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
function ConsultarSetorAjx() {

    $.ajax({
        type: "post",
        url: BASE_URL_AJAX("setor_dataview"),
        data: {
            ConsultarAJX: "ok"
        },
        success: function (Tabela) {
            $("#lista").html(Tabela);
        }
    })
}
function AlterarSetorAJAX(id_form) {

    if (NotificarCamposGenerico(id_form)) {

        let id = $("#modalSetorID").val();
        let nome = $("#modalSetorNome").val();

        $.ajax({
            type: "post",
            url: BASE_URL_AJAX("setor_dataview"),
            data: {
                btnAlterar: "ajx",
                modalSetorID: id,
                modalSetorNome: nome
            },
            success: function (ret) {

                $("#modal-setor").modal("hide");

                switch (ret) {
                    case '1':
                        MensagemSucesso();
                        //LimparCamposGenerico(id_form);
                        ConsultarSetorAjx();
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
        url: BASE_URL_AJAX("setor_dataview"),
        data: {
            btnExcluir: "ajx",
            modalExcluirID: id
        },
        success: function (ret) {
            $("#modal-excluir").modal("hide");
            ConsultarSetorAjx();
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
function FiltrarSetorAJAX(nome_filtro) {

    $.ajax({
        type: "post",
        url: BASE_URL_AJAX("setor_dataview"),
        data: {
            FiltrarAJX: "ajx",
            nome_filtro: nome_filtro.trim()
        },
        success: function (Filtrar) {
            $("#lista").html(Filtrar);
        }
    })
}