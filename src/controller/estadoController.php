<?php

namespace Src\controller;

use Src\VO\EstadoVO;

class EstadoController
{

    public function CadastrarEstado(EstadoVO $VO): int
    {
        if (empty($VO->getNomeEstado()) || empty($VO->getSiglaEstado())) :
            return 0;
        endif;
        return 1;
    }
}
