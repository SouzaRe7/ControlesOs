<?php

namespace Src\controller;

use Src\model\usuarioDAO;
use Src\VO\UsuarioVO;
use Src\VO\SetorVO;
use Src\VO\EnderecoVO;
use Src\VO\TecnicoVO;
use Src\VO\FuncionarioVO;

class UsuarioController
{
    private $dao;

    public function __construct()
    {
        $this->dao = new usuarioDAO;
    }
    
    public function CadastrarUsuarioCTRL($vo)
    {
        if(empty($vo->getTipo()) Or empty($vo->getNome()) Or empty($vo->getLogin()) Or empty($vo->getSenha()) Or empty($vo->getStatus()) Or empty($vo->getTipo())):
            return 0;
        endif;
    }
}
