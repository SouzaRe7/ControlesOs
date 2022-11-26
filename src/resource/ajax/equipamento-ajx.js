function CadastrarEquipamentoAjx(id_form) {

    if (NotificarCamposGenerico(id_form)) {

        let identificacao = $("#admIdentificacao").val();
        let obs = $("#admObs").val();
        let idTipoEquipamento = $("#admTipo").val();
        let idModelo = $("#admModelo").val();
        let cod = $("#cod").val();

        $.ajax({
            type: "post",
            url: BASE_URL_AJAX("equipamento_dataview"),
            data: {
                btnGravar: "ajx",
                admIdentificacao: identificacao,
                admObs: obs,
                admTipo: idTipoEquipamento,
                admModelo: idModelo,
                cod: cod
            },
            success: function (ret) {

                switch (ret) {
                    case '1':
                        MensagemSucesso();
                        if ($("#cod").val() == "")
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
function AlocarEquipamentoAjx(id_form) {
    if (NotificarCamposGenerico(id_form)) {
        let idEquipamento = $("#admEquipamento").val();
        let idSetor = $("#admSetor").val();
        $.ajax({
            type: "post",
            url: BASE_URL_AJAX("alocar_dataview"),
            data: {
                btnGravar: "ajx",
                admEquipamento: idEquipamento,
                admSetor: idSetor
            },
            success: function (ret) {
                if(ret == 1){
                    MensagemSucesso();
                    LimparCamposGenerico(id_form);
                }else{
                    MensagemErro();
                }
            }
        })
    }
    return false;
}
function FiltrarPorTipoEquipamento(id_form) {

    let idTipo = $("#admPesquise").val();
    let nomePalavra = $("#filtroPalavra").val();

    if (NotificarCamposGenerico(id_form)) {
        $.ajax({
            type: "post",
            url: BASE_URL_AJAX("equipamento_dataview"),
            data: {
                btnPesquisar: "ajx",
                idTipo: idTipo,
                filtroPalavra: nomePalavra
            },
            success: function (retTipo) {
                if (retTipo != "-3") {
                    $("#lista").html(retTipo);
                    $("#divResult").show();
                } else {
                    MensagemVazio();
                    $("#lista").html('');
                    $("#divResult").hide();
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
        url: BASE_URL_AJAX("equipamento_dataview"),
        data: {
            btnExcluir: "ajx",
            modalExcluirID: id
        },
        success: function (ret) {
            $("#modal-excluir").modal("hide");
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

function RemoverEquipamentoSetor() {
    let id = $("#modalRemoverID").val();
    $.ajax({
        type: "post",
        url: BASE_URL_AJAX("remover_dataview"),
        data: {
            btnRemover: "ajx",
            id_alocar: id
        },
        success: function (ret) {
            if(ret == 1){
                $("#modal-RemoverEqSetor").modal("hide");
                MensagemSucesso();
                CarregarEqSetor();
                //LimparCamposGenerico(id_form);
            }else{
                MensagemErro();
            }
        }
    })
    return false;
}

function CarregarEqSetor(){
    let id_setor_tela = $("#setor").val();
    $.ajax({
        type: "post",
        url: BASE_URL_AJAX("remover_dataview"),
        data: {
            filtrar_equipamento_setor: "ajx",
            idSetor: id_setor_tela
        },
        success: function (dados) {
            $("#tableResult").html(dados);
            $("#divResult").show();
        }
    })
    return false;
}