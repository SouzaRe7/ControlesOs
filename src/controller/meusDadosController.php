<?php

namespace Src\controller;

use Src\VO\UsuarioVO;
use Src\VO\EnderecoVO;

class MeusDadosController
{

    public function CadastrarMeusDados(UsuarioVO $VO, EnderecoVO $VOS): int
    {
        if (empty($VO->getNome()) || empty($VO->getLogin()) || empty($VO->getFone()) || empty($VOS->getRua())) :
            return 0;
        endif;
        return 1;
    }
}
