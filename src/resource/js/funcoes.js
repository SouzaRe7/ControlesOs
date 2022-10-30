function Load() {
    $("#divLoad").addClass("overlay dark").html('<div class="overlay dark"><i class="fas fa-2x fa-sync-alt fa-spin"></i></div>');
}
function RemoverLoad() {
    $("#divLoad").removeClass("overlay dark").html('');
}
function BASE_URL_AJAX(dataview) {
    return "../../resource/dataview/" + dataview + ".php";
}
function NotificarCampo(nome_id) {
    if ($("#" + nome_id).val().trim() == '')
        $("#" + nome_id).addClass("is-invalid");
    else
        $("#" + $nome_id).removeClass("is-invalid").addClass("is-valid");
}
function NotificarCamposGenerico(form_id) {
    var ret = true;
    $("#" + form_id + " input, select, textarea ").each(function () {
        if ($(this).hasClass("obg")) {
            if ($(this).val().trim() == "") {
                ret = false;
                $(this).addClass("is-invalid");
            } else {
                $(this).removeClass("is-invalid").addClass("is-valid");
            }
        }
    })
    if (!ret)
        MensagemCamposObrigatorios();
    else
        Load();
    return ret;
}
function LimparCamposGenerico(form_id) {

    $("#" + form_id + " input, select, textarea ").each(function () {
        if ($(this).hasClass("obg")) {
            $(this).val('');
        }
        if($(this).hasClass("is-invalid")){
            $(this).removeClass("is-invalid");
        }else{
            $(this).removeClass("is-valid");
        }
    })
}
function CarregarAlteracaoTipoEquipamento(id, nome) {
    $("#modalTipoID").val(id);
    $("#modalTipoNome").val(nome);
}
function CarregarAlteracaoSetor(id, nome) {
    $("#modalSetorID").val(id);
    $("#modalSetorNome").val(nome);
}
function CarregarAlteracaoModelo(id, nome) {
    $("#modalModeloID").val(id);
    $("#modalModeloNome").val(nome);
}
function CarregarModalExcluir(id, nome) {
    $("#modalExcluirID").val(id);
    $("#modalExcluirNome").html(nome);
}
function CarregarModalStatus(id, nome, statusAtual) {
    $("#idStatus").val(id);
    $("#statusAtual").val(statusAtual);
    $("#nomeUserStatus").html(nome);
}
function LimparNotificarCamposGenerico(form_id){

    $("#" + form_id + " input, select, textarea ").each(function () {
        $(this).removeClass("is-invalid");
        $(this).removeClass("is-valid");
    })
}

function EscolherUsuario(tipo,form_id) {

    LimparNotificarCamposGenerico(form_id);

    switch (tipo) {

        case '1':
            $("#divFunc").hide();
            $("#divNome").show();
            $("#divEmp").hide();
            $("#divGeral").show();
            $("#divButton").show();
            $("#admSetor").removeClass("obg");
            $("#divEmp").removeClass("obg");
            break;

        case '2':
            $("#divNome").show();
            $("#divFunc").show();
            $("#divGeral").show();
            $("#divButton").show();
            $("#admSetor").hasClass("obg");
            $("#divEmp").removeClass("obg");
            break;

        case '3':
            $("#divFunc").hide();
            $("#divNome").show();
            $("#divEmp").show();
            $("#divGeral").show();
            $("#divButton").show();
            $("#admSetor").removeClass("obg");
            $("#divEmp").hasClass("obg");
            break;

        default:
            $("#divEmp").hide();
            $("#divNome").hide();
            $("#divFunc").hide();
            $("#divGeral").hide();
            $("#divButton").hide();
            break;
    }
}
