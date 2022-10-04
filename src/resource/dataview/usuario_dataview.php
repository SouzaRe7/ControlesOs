<?php
include_once '_include_autoload.php';

use Src\controller\setorController;

$setorCTRL = new setorController();

$setor = $setorCTRL->SelecioneSetorCtrl();
?>