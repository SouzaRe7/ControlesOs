<?php
include_once '_include_autoload.php';

use Src\controller\setorController;
use Src\controller\UsuarioController;
use Src\VO\FuncionarioVO;
use Src\VO\TecnicoVO;
use Src\VO\UsuarioVO;

$setorCTRL = new setorController();
$usuarioCTRL = new UsuarioController();

$setor = $setorCTRL->SelecioneSetorCtrl();

if (isset($_POST['btnGravar'])) :

    switch ($_POST['admTipo']) {
        case '1':
            $vo = new UsuarioVO();
            $vo->setNome($_POST['admNome']);
            $vo->setLogin($_POST['admEmail']);
            $vo->setFone($_POST['admFone']);
            $vo->setTipo($_POST['admTipo']);
            break;
        case '2':
            $vo = new FuncionarioVO();
            $vo->setNome($_POST['admNome']);
            $vo->setLogin($_POST['admEmail']);
            $vo->setFone($_POST['admFone']);
            $vo->setTipo($_POST['admTipo']);
            $vo->setIdSetor($_POST['admSetor']);
            break;
        case '3':
            $vo = new TecnicoVO();
            $vo->setNome($_POST['admNome']);
            $vo->setLogin($_POST['admEmail']);
            $vo->setFone($_POST['admFone']);
            $vo->setTipo($_POST['admTipo']);
            $vo->setNomeEmpresa($_POST['admNomeEmp']);
            break;
    }

    $vo->setCep($_POST['cep']);
    $vo->setRua($_POST['rua']);
    $vo->setBairro($_POST['bairro']);
    $vo->setNomeCiadade($_POST['cidade']);
    $vo->setSiglaEstado($_POST['uf']);

    $ret = $usuarioCTRL->CadastrarUsuarioCTRL($vo);

endif;
