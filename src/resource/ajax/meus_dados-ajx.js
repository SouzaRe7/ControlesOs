function VerificarSenhaAtual(id_form){
    if(NotificarCamposGenerico(id_form)){
        $.ajax({
            type: "post",
            url: BASE_URL_AJAX("meusDados_dataview"),
            data:{
                btnVerificar: "ajx",
                id_logado: $("#id_logado").val().trim(),
                fuSenhaAtual: $("#fuSenhaAtual").val().trim(),
            },
            success: function(ret){
                if(ret == -1){
                    MensagemGenerica("Senha atual não confere");
                }else if(ret == 1){
                    $("#divSenhaAtual").hide();
                    $("#divSenhaNova").show();
                    LimparCampos(id_form);
                }
            }
        })
    }
    return false;
}

function AtualizarSenha(id_form){
    if(NotificarCamposGenerico(id_form)){
        $.ajax({
            type: "post",
            url: BASE_URL_AJAX("meusDados_dataview"),
            data:{
                btnAlterar: 'ajx',
                id_logado: $("#id_logado").val().trim(),
                fuSenha: $("#fuSenha").val().trim(),
                fuReSenha: $("#fuReSenha").val().trim()
            },
            success: function(ret){
                if (ret == -2){
                    MensagemGenerica("A senha deverá conter no mínimo 6 caracteres");
                } else if (ret == -3){
                    MensagemGenerica("O campo senha e repetir senha não conferem");
                } else if (ret == 1){
                    MensagemSucesso();
                    $("#divSenhaNova").hide();
                    $("#divSenhaAtual").show();
                    $("#fuSenha").val('');
                } else if (ret == -1){
                    MensagemErro();
                }
            }
        })
    }
    return false;
}

function AlterarMeusDados(id_form){
    if (NotificarCamposGenerico(id_form)) {
        $.ajax({
            type: "post",
            url: BASE_URL_AJAX("meusDados_dataview"),
            data:{
                btnGravar: "ajx",
                fuNome: $("#fuNome").val(),
                fuEmail: $("#fuEmail").val(),
                fuFone: $("#fuFone").val(),
                cep: $("#cep").val(),
                rua: $("#rua").val(),
                bairro: $("#bairro").val(),
                cidade: $("#cidade").val(),
                uf: $("#uf").val(),
                id_end: $("#id_end").val(),
                tipo: $("#tipo").val(),
                id_logado: $("#id_logado").val()
            }, success: function(ret){
                console.log(ret);
                if (ret == '1') {
                    MensagemSucesso();
                }else{
                    MensagemErro();
                }
            }
        });    
    }
    return false;
}