<?php

namespace Src\resource\api\classe;

use Src\controller\ChamadoController;
use Src\resource\api\classe\apiRequest;
use Src\controller\UsuarioController;
use Src\VO\UsuarioVO;
use Src\VO\ChamadoVO;
use Src\VO\TecnicoVO;
use Src\_public\Util;

class TecnicoAPI extends apiRequest
{
    private $ctrl_user;
    private $ctrl_chamado;
    private $params;
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
    }

    public function DetalharMeusDados()
    {
        if (Util::AuthenticationTokenAccess()) {
            if (empty($this->params['id_user']))
                return 0;

            return $this->ctrl_user->DetalharUsuarioCTRL($this->params['id_user']);
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

    public function AlterarTecnico()
    {
        if (Util::AuthenticationTokenAccess()) {
            $vo = new TecnicoVO;
            $vo->setNome($this->params['nome_usuario']);
            $vo->setLogin($this->params['login']);
            $vo->setFone($this->params['telefone']);
            $vo->setCep($this->params['cep']);
            $vo->setRua($this->params['rua']);
            $vo->setBairro($this->params['bairro']);
            $vo->setNomeCiadade($this->params['cidade']);
            $vo->setSiglaEstado($this->params['uf']);
            $vo->setNomeEmpresa($this->params['nome_empresa']);
            $vo->setId($this->params['id_user']);
            $vo->setIdEnd($this->params['id_end']);
            $vo->setTipo($this->params['tipo']);

            return $this->ctrl_user->AlterarUsuarioCTRL($vo);
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

    public function EncerrarAtendimentoChamadoAPI()
    {
        if (Util::AuthenticationTokenAccess()) {
            $vo = new ChamadoVO;
            $vo->setIdChamado($this->params['id_chamado']);
            $vo->setIdAlocar($this->params['alocar_id']);
            $vo->setTecnicoEncerramento($this->params['id_tecnico_encerramento']);
            $vo->setLaudoTecnico($this->params['laudo']);

            return $this->ctrl_chamado->EncerrarAtendimentoChamadoCTRL($vo);
        } else {
            return NAO_AUTORIZADO;
        }
    }

    public function AtualizarAtendimentoChamadoAPI()
    {
        if (Util::AuthenticationTokenAccess()) {
            $vo = new ChamadoVO;
            $vo->setTecnicoAtendimento($this->params['id_tecnico_atendimento']);
            $vo->setIdChamado($this->params['id_chamado']);

            return $this->ctrl_chamado->AtualizarAtendimentoChamadoCTRL($vo);
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
        return $this->ctrl_user->VerificarLoginAcessoTecnicoCTRL($this->params['login'], $this->params['senha']);
    }
}
?>