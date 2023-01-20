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

    public function VerificarEmailDuplicadoCTRL($email, $id = ''): bool
    {
        return $this->dao->VerificarEmailDuplicadoDAO($id, $email);
    }

    public function AlterarUsuarioCTRL($vo)
    {
        if (empty($vo->getTipo()) or empty($vo->getNome()) or empty($vo->getFone()) or empty($vo->getLogin()) or empty($vo->getRua()) or empty($vo->getBairro()) or empty($vo->getCep()) or empty($vo->getNomeCidade()) or empty($vo->getSiglaEstado())) :
            return 0;
        endif;
        if ($vo->getTipo() == PERFIL_FUNCIONARIO) :
            if (empty($vo->getIdSetor()))
                return 0;
            elseif ($vo->getTipo() == PERFIL_TECNICO)
                if (empty($vo->getNomeEmpresa()))
                    return 0;
        endif;
        $vo->setStatus(STATUS_ATIVO);
        $vo->setSenha(Util::CriarSenha($vo->getLogin()));
        $vo->setFuncaoErro(ALTERAR_USUARIO);
        $vo->setIdlogado(Util::CodigoLogado() == 0 ? $vo->getId() : Util::CodigoLogado());
        return $this->dao->AlterarUsuarioDAO($vo);
    }

    public function CadastrarUsuarioCTRL($vo)
    {
        if (empty($vo->getTipo()) or empty($vo->getNome()) or empty($vo->getFone()) or empty($vo->getLogin()) or empty($vo->getRua()) or empty($vo->getBairro()) or empty($vo->getCep()) or empty($vo->getNomeCidade()) or empty($vo->getSiglaEstado())) :
            return 0;
        endif;

        if ($vo->getTipo() == PERFIL_FUNCIONARIO) :
            if (empty($vo->getIdSetor()))
                return 0;
            elseif ($vo->getTipo() == PERFIL_TECNICO)
                if (empty($vo->getNomeEmpresa()))
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
        if (empty($login) or empty($senha))
            return 0;

        $usuario = $this->dao->VerificarLoginAcessoDAO($login, STATUS_ATIVO);
        # Testa a variavel para ver se encontrou o usuario com o login digitado
        if (empty($usuario))
            return -4;
        # Teste a senha digitada, se bate com a senha criptografada do BD
        if (!Util::ValidarSenhaBanco($senha, $usuario['senha']))
            return -5;

        Util::CriarSessao($usuario['id'], $usuario['nome']);
        Util::ChamarPagina('consultar_usuario.php');
    }

    public function VerificarLoginAcessoFuncionarioCTRL($login, $senha)
    {
        if (empty($login) or empty($senha))
            return 0;

        $usuario = $this->dao->VerificarLoginAcessoFuncionarioDAO($login, STATUS_ATIVO, PERFIL_FUNCIONARIO);

        if (!empty($usuario)) {

            if (password_verify($senha, $usuario['senha'])) {

                $dados_usuario = [
                    'id_funcionario' => $usuario['id'],
                    'nome_usuario' => $usuario['nome'],
                    'setor_usuario' => $usuario['setor_id'],
                    'tipo_usuario' => $usuario['tipo']
                ];

                $token = Util::CreateTokenAuthentication($dados_usuario);
                return $token;
            } else {
                return -3;
            }
        } else {
            return -3;
        }
    }

    public function AtualizarSenhaAtualCTRL(UsuarioVO $vo, $repetir_senha)
    {
        if (empty($vo->getSenha()) or empty($vo->getId()))
            return 0;

        if (strlen($vo->getSenha()) < 6)
            return -2;
        if ($vo->getSenha() != $repetir_senha)
            return -3;
        $vo->setSenha(Util::VerificarSenhaCriptografada($vo->getSenha()));
        $vo->setFuncaoErro(AUALIZAR_SENHA);
        $vo->setIdLogado(Util::CodigoLogado() == 0 ? $vo->getId() : Util::CodigoLogado());
        return $this->dao->AtualizarSenhalDAO($vo);
    }

    public function ValidarSenhaAtualCTRL($id, $senha)
    {
        if(Util::AuthenticationTokenAccess()) {
            if (empty($id) or empty($senha))
                return 0;

            $user_senha = $this->dao->RecuperarSenhaAtualDAO($id);

            if (password_verify($senha, $user_senha['senha'])) :
                return 1;
            else :
                return -1;
            endif;
        } else {
            return NAO_AUTORIZADO;
        }
    }
}
