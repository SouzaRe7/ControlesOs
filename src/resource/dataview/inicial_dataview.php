<?php
include_once '_include_autoload.php';
use Src\_public\Util;

Util::VerificarLogin();

use Src\controller\ChamadoController;

$crtl = new ChamadoController;

$dados = $crtl->FiltrarDadosChamadoCTRL();