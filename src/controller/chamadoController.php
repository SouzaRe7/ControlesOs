<?php

namespace Src\controller;

use Src\VO\TipoEquipamentoVO;

class ChamadoController
{
    public function CadastrarChamado(TipoEquipamentoVO $VO): int
    {
        if (empty($VO->getTipoEquipamento()) || empty($VO->getObs())) :
            return 0;
        endif;
        return 1;
    }
}
