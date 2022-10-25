<?php
include_once '_include_autoload.php';

use Src\_public\Util;
use Src\controller\setorController;
use Src\controller\UsuarioController;
use Src\VO\FuncionarioVO;
use Src\VO\TecnicoVO;
use Src\VO\UsuarioVO;

$setorCTRL = new setorController();
$usuarioCTRL = new UsuarioController();

$setor = $setorCTRL->SelecioneSetorCtrl();

if (isset($_POST['verificarEmail']) and $_POST['verificarEmail'] == 'ajx') :
    $ret = $usuarioCTRL->VerificarEmailDuplicadoCTRL($_POST['Email']);
    if ($ret)
        echo 1; // Não existe
    else
        echo -1; // Já existe, deixa cadastrar o email
elseif (isset($_POST['btnGravar'])) :

    switch ($_POST['Tipo']) {
        case '1':
            $vo = new UsuarioVO();
            $vo->setNome($_POST['Nome']);
            $vo->setLogin($_POST['Email']);
            $vo->setFone($_POST['Fone']);
            $vo->setTipo($_POST['Tipo']);
            break;
        case '2':
            $vo = new FuncionarioVO();
            $vo->setNome($_POST['Nome']);
            $vo->setLogin($_POST['Email']);
            $vo->setFone($_POST['Fone']);
            $vo->setTipo($_POST['Tipo']);
            $vo->setIdSetor($_POST['Setor']);
            break;
        case '3':
            $vo = new TecnicoVO();
            $vo->setNome($_POST['Nome']);
            $vo->setLogin($_POST['Email']);
            $vo->setFone($_POST['Fone']);
            $vo->setTipo($_POST['Tipo']);
            $vo->setNomeEmpresa($_POST['Emp']);
            break;
    }

    $vo->setCep($_POST['cep']);
    $vo->setRua($_POST['rua']);
    $vo->setBairro($_POST['bairro']);
    $vo->setNomeCiadade($_POST['cidade']);
    $vo->setSiglaEstado($_POST['uf']);

    $ret = $usuarioCTRL->CadastrarUsuarioCTRL($vo);

    if($_POST['btnGravar'] == 'ajx'):
        echo $ret;
    endif;

endif;
