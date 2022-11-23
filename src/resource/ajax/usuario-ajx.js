function VerificarEmail(emailTela)
{
    if(emailTela != "")
    {
        $.ajax({
            type: 'post',
            url: BASE_URL_AJAX("usuario_dataview"),
            data:{
                Email: emailTela,
                verificarEmail: 'ajx'
            },
            success: function(ret){
                if(ret == -1){
                    MensagemGenerica("O e-mail " + emailTela + " já existe!");
                    $("#Email").val('');
                    $("#Email").focus();
                }
            }
        })
    }
}

function CadastrarNovoUsuarioAJX(idFrom)
{
    if(NotificarCamposGenerico(idFrom)){
        $.ajax({
            type: 'post',
            url: BASE_URL_AJAX("usuario_dataview"),
            data:{
                btnGravar: 'ajx',
                Tipo: $("#Tipo").val(),         
                Nome: $("#Nome").val(), 
                Setor: $("#Setor").val(), 
                Emp: $("#Emp").val(), 
                Email: $("#Email").val(), 
                Fone: $("#Fone").val(), 
                cep: $("#cep").val(), 
                rua: $("#rua").val(), 
                bairro: $("#bairro").val(), 
                cidade: $("#cidade").val(), 
                uf: $("#uf").val()
            },
            success: function(ret)
            {
                RemoverLoad();
                switch (ret) {
                    case '1':
                        //LimparCamposGenerico(idFrom);
                        MensagemSucesso();
                        //ChamarOutraPagina("novo_usuario");
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

function AlterarUsuarioAJX(idFrom)
{
    if(NotificarCamposGenerico(idFrom)){
        $.ajax({
            type: 'post',
            url: BASE_URL_AJAX("usuario_dataview"),
            data:{
                btnAlterar: 'ajx',
                Tipo: $("#Tipo").val(),         
                Nome: $("#Nome").val(), 
                Setor: $("#Setor").val(), 
                Emp: $("#Emp").val(), 
                Email: $("#Email").val(), 
                Fone: $("#Fone").val(), 
                cep: $("#cep").val(), 
                rua: $("#rua").val(), 
                bairro: $("#bairro").val(), 
                cidade: $("#cidade").val(), 
                uf: $("#uf").val(),
                idEnd: $("#idEnd").val(),
                idUser: $("#idUser").val()
            },
            success: function(ret)
            {   
                RemoverLoad();
                switch (ret) {
                    case '1':
                        //LimparCamposGenerico(idFrom);
                        MensagemSucesso();
                        //ChamarOutraPagina("consultar_usuario");
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

function FiltrarUsuarioAJX(nomeFiltro)
{
    $.ajax({
        type: 'post',
        url: BASE_URL_AJAX("usuario_dataview"),
        data: {
            nome: nomeFiltro,
            filtrarPessoa: 'ajx'
        },
        success: function(Filtrar){
            $("#listaPessoas").html(Filtrar);
            $("#divPessoa").show();
        }
    })
}

function MudarStatus()
{
    $.ajax({
        type: 'post',
        url: BASE_URL_AJAX("usuario_dataview"),
        data:{
            mudarStatus: 'ajx',
            idStatus: $("#idStatus").val(),
            statusAtual: $("#statusAtual").val()
        },
        success: function(ret){
            if (ret == 1){
                MensagemSucesso();
                FiltrarUsuarioAJX($("#nome").val());
                $("#modal-status").modal("hide");
            }else{
                MensagemErro();
            }

        }
    })
}