<?php

namespace Src\controller;

use Src\VO\CidadeVO;

class CidadeController
{
    public function CadastrarCidade(CidadeVO $VO): int
    {
        if (empty($VO->getNomeCidade())) :
            return 0;
        endif;
        return 1;
    }
}
