<?php

namespace Src\controller;

use Src\_public\Util;
use Src\model\usuarioDAO;
use Src\VO\UsuarioVO;

class UsuarioController
{
    private $dao;
    public function __construct()
    {
        $this->dao = new usuarioDAO;
    }

    public function DetalharUsuarioCTRL($idUser)
    {
        return $this->dao->DetalharUsuarioDAO($idUser);
    }

    public function FiltrarUsuarioCTRL($nome)
    {
        return $this->dao->FiltrarUsuarioDAO($nome);
    }

    public function VerificarEmailDuplicadoCTRL($email, $id = '') : bool
    {
        return $this->dao->VerificarEmailDuplicadoDAO($id,$email);
    }
    
    public function AlterarUsuarioCTRL($vo)
    {
        if (empty($vo->getTipo()) Or empty($vo->getNome()) Or empty($vo->getFone()) Or empty($vo->getLogin()) Or empty($vo->getRua()) Or empty($vo->getBairro()) Or empty($vo->getCep()) Or empty($vo->getNomeCidade()) Or empty($vo->getSiglaEstado())) :
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
        $vo->setFuncaoErro(ALTERAR_USUARIO);
        $vo->setIdlogado(Util::CodigoLogado());
        return $this->dao->AlterarUsuarioDAO($vo);    
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

    public function MudarStatusCTRL(UsuarioVO $vo)
    {
        $vo->setStatus($vo->getStatus() == STATUS_ATIVO ? STATUS_INATIVO : STATUS_ATIVO);
        $vo->setFuncaoErro(MUDAR_STATUS);
        $vo->setIdLogado(Util::CodigoLogado());
        return $this->dao->MudarStatusDAO($vo);
    }

    public function VerificarLoginAcessoCTRL($login, $senha)
    {
        if(empty($login) Or empty($senha))
            return 0;

        $usuario = $this->dao->VerificarLoginAcessoDAO($login, STATUS_ATIVO);
        # Testa a variavel para ver se encontrou o usuario com o login digitado
        if(empty($usuario))
            return -4;
        # Teste a senha digitada, se bate com a senha criptografada do BD
        if(!Util::ValidarSenhaBanco($senha, $usuario['senha']));
        return -5;

        Util::CriarSessao($usuario['id'], $usuario['nome']);
        Util::ChamarPagina('consultar_usuario.php');
        
    }
}
