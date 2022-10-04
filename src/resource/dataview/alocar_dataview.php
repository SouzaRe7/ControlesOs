<?php
include_once '_include_autoload.php';

use Src\_public\Util;
use Src\controller\NovoEquipController;
use Src\controller\setorController;
use Src\VO\AlocarVO;

$equip = new NovoEquipController();


if (isset($_POST['btnGravar'])) :
    $vo = new AlocarVO();
    $vo->setIdEquipamento($_POST['admEquipamento']);
    $vo->setIdSetor($_POST['admSetor']);
    $vo->setDataAlocacao(date('Y-m-d'));
    $ret = $equip->InsertAlocarEquipamentoCTRL($vo);
    if ($_POST['btnGravar'] == 'ajx') :
        echo $ret;
    endif;
endif;

$setores = (new setorController)->SelecioneSetorCtrl();

$eqs = $equip->SelecionarEquipamentoNaoAlocadosCTRL();
