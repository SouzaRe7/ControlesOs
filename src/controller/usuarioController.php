<?php

namespace Src\controller;

use Src\_public\Util;
use Src\model\usuarioDAO;

class UsuarioController
{
    private $dao;
    public function __construct()
    {
        $this->dao = new usuarioDAO;
    }

    public function VerificarEmailDuplicadoCTRL($id,$email) : bool
    {
        return $this->dao->VerificarEmailDuplicadoDAO($id,$email);
    }
    
    public function CadastrarUsuarioCTRL($vo)
    {
        if(empty($vo->getTipo()) Or empty($vo->getNome()) Or empty($vo->getFone()) Or empty($vo->getLogin()) Or empty($vo->getRua()) Or empty($vo->getBairro()) Or empty($vo->getCep()) Or empty($vo->getNomeCidade()) Or empty($vo->getSiglaEstado())):
            return 0;
        endif;

        if($vo->getTipo() == PERFIL_FUNCIONARIO):
            if(empty($vo->getIdSetor()))
            return 0;
        elseif($vo->getTipo() == PERFIL_TECNICO)
            if(empty($vo->getNomeEmpresa()))
            return 0;
        endif;
        
        $vo->setStatus(STATUS_ATIVO);
        $vo->setSenha(Util::CriarSenha($vo->getLogin()));

        $vo->setFuncaoErro(CADASTRO_USUARIO);
        $vo->setIdLogado(Util::CodigoLogado());

        return $this->dao->CadastrarUsuarioDAO($vo);
    }
}
