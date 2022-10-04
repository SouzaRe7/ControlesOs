<?php

namespace Src\controller;

use Src\VO\TipoEquipamentoVO;
use Src\VO\ChamadoVO;
use Src\VO\SetorVO;

class atenderChamadoController
{

    public function CadastrarAtenderChamado(ChamadoVO $VO, TipoEquipamentoVO $VOS, SetorVO $VOSS): int
    {
        if (empty($VO->getDataAbertura()) || empty($VO->getIdFuncionario()) || empty($VOSS->getNomeSetor()) || empty($VOS->getTipoEquipamento()) || empty($VO->getDescricaoProblema()) || empty($VO->getLaudoTecnico())) :
            return 0;
        endif;
        return 1;
    }
}
