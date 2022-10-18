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