<?php

namespace Src\resource\api\classe;

use Src\controller\ChamadoController;
use Src\resource\api\classe\apiRequest;
use Src\controller\UsuarioController;
use Src\controller\NovoEquipController;
use Src\VO\UsuarioVO;
use Src\VO\ChamadoVO;
use Src\VO\FuncionarioVO;
use Src\_public\Util;

class FuncionarioAPI extends apiRequest
{
    private $params;
    private $ctrl_user;
    private $ctrl_chamado;
    private $ctrl_novo_equip;

    public function AddParameters($p)
    {
        $this->params = $p;
    }

    public function CheckEndPoint($endpoint)
    {
        return method_exists($this, $endpoint);
    }

    public function __construct()
    {
        $this->ctrl_user = new UsuarioController;
        $this->ctrl_chamado = new ChamadoController;
        $this->ctrl_novo_equip = new NovoEquipController;
    }

    public function DetalharMeusDadosAPI()
    {
        if (Util::AuthenticationTokenAccess()) {
            if (empty($this->params['id_user']))
                return 0;

            return $this->ctrl_user->DetalharUsuarioCTRL($this->params['id_user']);
        } else {
            return NAO_AUTORIZADO;
        }
    }

    public function AlterarMeusDadosAPI()
    {
        if (Util::AuthenticationTokenAccess()) {
            $vo = new FuncionarioVO;

            $vo->setId($this->params['id_user']);
            $vo->setNome($this->params['nome']);
            $vo->setLogin($this->params['login']);
            $vo->setFone($this->params['fone']);
            $vo->setCep($this->params['cep']);
            $vo->setRua($this->params['rua']);
            $vo->setBairro($this->params['bairro']);
            $vo->setNomeCiadade($this->params['cidade']);
            $vo->setSiglaEstado($this->params['sigla_estado']);
            $vo->setIdEnd($this->params['id_end']);
            $vo->setTipo(PERFIL_FUNCIONARIO);
            $vo->setIdSetor($this->params['id_setor']);

            return $this->ctrl_user->AlterarUsuarioCTRL($vo);
        } else {
            return NAO_AUTORIZADO;
        }
    }

    public function SelecionarEquipamentosAlocadosAPI()
    {
        if (Util::AuthenticationTokenAccess()) {
            if (empty($this->params['id_setor']))
                return 0;

            return $this->ctrl_novo_equip->SelecionarEquipamentoSetorAlocadoCTRL($this->params['id_setor']);
        } else {
            return NAO_AUTORIZADO;
        }
    }

    public function AbrirChamadoAPI()
    {
        if (Util::AuthenticationTokenAccess()) {
            $vo = new ChamadoVO();

            $vo->setId($this->params['id_user']);
            $vo->setDescricaoProblema($this->params['problema']);
            $vo->setIdAlocar($this->params['id_alocar']);

            return $this->ctrl_chamado->AbrirChamadoCTRL($vo);
        } else {
            return NAO_AUTORIZADO;
        }
    }

    public function FiltrarChamadoAPI()
    {
        if (Util::AuthenticationTokenAccess()) {
            return $this->ctrl_chamado->FiltrarChamadoCTRL($this->params['situacao'], isset($this->params['id_setor']) ? $this->params['id_setor'] : '');
        } else {
            return NAO_AUTORIZADO;
        }
    }

    public function VerificarEmailAPI()
    {
        if (Util::AuthenticationTokenAccess()) {
            return $this->ctrl_user->VerificarEmailDuplicadoCTRL($this->params['fuEmail'], $this->params['id']);
        } else {
            return NAO_AUTORIZADO;
        }
    }

    public function VerificarSenhaAtualAPI()
    {
        if (Util::AuthenticationTokenAccess()) {
            return $this->ctrl_user->ValidarSenhaAtualCTRL($this->params['id'], $this->params['senha']);
        } else {
            return NAO_AUTORIZADO;
        }
    }

    public function AtualizarSenhaAPI()
    {
        if (Util::AuthenticationTokenAccess()) {
            $vo = new UsuarioVO;
            $vo->setId($this->params['id']);
            $vo->setSenha($this->params['senha']);
            return $this->ctrl_user->AtualizarSenhaAtualCTRL($vo, $this->params['repetir_senha']);
        } else {
            return NAO_AUTORIZADO;
        }
    }

    public function AutenticarAPI()
    {
        return $this->ctrl_user->VerificarLoginAcessoFuncionarioCTRL($this->params['login'], $this->params['senha']);
    }
}
?>