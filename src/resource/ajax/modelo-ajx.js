function CadastrarModeloAjx(id_form) {

    if (NotificarCamposGenerico(id_form)) {
        let nomeModelo = $("#admNome").val().trim();
        $.ajax({
            type: "post",
            url: BASE_URL_AJAX("modelo_dataview"),
            data: {
                btnGravar: 'ajx',
                admNome: nomeModelo
            },
            success: function (ret) {

                RemoverLoad();
                
                switch (ret) {
                    case '1':
                        MensagemSucesso();
                        LimparCamposGenerico(id_form);
                        ConsultarModeloAjx();
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
function ConsultarModeloAjx() {

    $.ajax({
        type: "post",
        url: BASE_URL_AJAX("modelo_dataview"),
        data: {
            ConsultarAJX: "ok"
        },
        success: function (TabelaModelo) {
            $("#listaModelo").html(TabelaModelo);
        }
    })
    return false;
}
function AlterarModeloAJAX(id_form) {

    if (NotificarCamposGenerico(id_form)) {

        let id = $("#modalModeloID").val();
        let nome = $("#modalModeloNome").val();
        
        $.ajax({
            type: "post",
            url: BASE_URL_AJAX("modelo_dataview"),
            data: {
                btnAlterar: "ajx",
                modalModeloID: id,
                modalModeloNome: nome
            },
            success: function (ret) {
                $("#modal-modelo").modal("hide");
                switch (ret) {
                    case '1':
                        MensagemSucesso();
                        //LimparCamposGenerico(id_form);
                        ConsultarModeloAjx();
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
        url: BASE_URL_AJAX("modelo_dataview"),
        data: {
            btnExcluir: "ajx",
            modalExcluirID: id
        },
        success: function (ret) {
            $("#modal-excluir").modal("hide");
            ConsultarModeloAjx();
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
function FiltrarModeloAJAX(nome_filtro) {

    $.ajax({
        type: "post",
        url: BASE_URL_AJAX("modelo_dataview"),
        data: {
            FiltrarAJX: "ajx",
            nome_filtro: nome_filtro.trim()
        },
        success: function (Filtrar) {
            $("#listaModelo").html(Filtrar);
        }
    })
}