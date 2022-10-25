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
                        LimparCamposGenerico(idFrom);
                        MensagemSucesso();
                        
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