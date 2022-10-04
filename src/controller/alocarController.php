<?php

namespace Src\controller;

use Src\VO\AlocarVO;

class AlocarController
{

    public function CadastrarAlocar(AlocarVO $VO): int
    {
        if (empty($VO->getIdEquipamento()) || empty($VO->getIdSetor())) :
            return 0;
        endif;
        return 1;
    }
}
