<?php

namespace Src\controller;

use Src\VO\UsuarioVO;

class MudarSenhaController
{
    public function MudarSenha(UsuarioVO $VO): int
    {
        if (empty($VO->getSenha())) :
            return 0;
        endif;
        return 1;
    }
}
