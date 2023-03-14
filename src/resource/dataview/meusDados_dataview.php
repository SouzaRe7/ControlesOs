<?php
include_once '_include_autoload.php';

use Src\_public\Util;

Util::VerificarLogin();

use Src\controller\UsuarioController;
use Src\VO\UsuarioVO;

$ctrl_user = new UsuarioController;

if (isset($_POST['btnVerificar'])) :
    $senha = Util::TratarDados($_POST['fuSenhaAtual']);
    $id = Util::TratarDados($_POST['id_logado']);
    $ret = $ctrl_user->ValidarSenhaAtualCTRL($id, $senha);
    if ($_POST['btnVerificar'] == 'ajx') :
        echo $ret;
    endif;
elseif (isset($_POST['btnAlterar'])) :
    $vo = new UsuarioVO;
    $vo->setId($_POST['id_logado']);
    $vo->setSenha($_POST['fuSenha']);
    $re_senha = Util::TratarDados($_POST['fuReSenha']);
    $ret = $ctrl_user->AtualizarSenhaAtualCTRL($vo, $re_senha);

    if ($_POST['btnAlterar'] == 'ajx') :
        echo $ret;
    endif;
elseif (isset($_POST['btnGravar'])) :
    $vo = new UsuarioVO();

    $vo->setNome($_POST['fuNome']);
    $vo->setLogin($_POST['fuEmail']);
    $vo->setFone($_POST['fuFone']);
    $vo->setTipo($_POST['tipo']);
    $vo->setId($_POST['id_logado']);
    $vo->setCep($_POST['cep']);
    $vo->setRua($_POST['rua']);
    $vo->setBairro($_POST['bairro']);
    $vo->setNomeCiadade($_POST['cidade']);
    $vo->setSiglaEstado($_POST['uf']);
    $vo->setIdEnd($_POST['id_end']);
    $ret = $ctrl_user->AlterarUsuarioCTRL($vo);
    if ($_POST['btnGravar'] == 'ajx') :
        echo $ret;
    endif;
endif;
$id = Util::CodigoLogado();
$user = $ctrl_user->DetalharUsuarioCTRL($id);
