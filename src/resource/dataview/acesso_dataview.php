<?php
include_once '_include_autoload.php';
use Src\controller\UsuarioController;
use Src\VO\UsuarioVO;
$usuarioCTRL = new UsuarioController;
if (isset($_POST['btnAcessar'])) :
    $ret = $usuarioCTRL->VerificarLoginAcessoCTRL($_POST['login'], $_POST['senha']);
endif;
?>