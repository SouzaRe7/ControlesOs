<?php
namespace Src\resource\api\classe;

use Src\controller\ChamadoController;
use Src\resource\api\classe\apiRequest;
use Src\controller\UsuarioController;
use Src\controller\NovoEquipController;
use Src\VO\UsuarioVO;
use Src\VO\ChamadoVO;
use Src\VO\TecnicoVO;

class TecnicoAPI extends apiRequest{

    private $ctrl_user;
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
    
    }

    public function DetalharMeusDados()
    {
        if(empty($this->params['id_user']))
            return 0;

        return $this->ctrl_user->DetalharUsuarioCTRL($this->params['id_user']);
    }

    public function AlterarTecnico()
    {
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
    }

    public function FiltrarChamadoAPI()
    {
        return (new ChamadoController)->FiltrarChamadoCTRL($this->params['situacao'], isset($this->params['id_setor']) ? $this->params['id_setor'] : '');
    }

    public function EncerrarAtendimentoChamadoAPI()
    {
        $vo = new ChamadoVO;
        $vo->setIdChamado($this->params['id_chamado']);
        $vo->setTecnicoEncerramento($this->params['id_tecnico_encerramento']);
        $vo->setLaudoTecnico($this->params['laudo']);

        return (new ChamadoController)->EncerrarAtendimentoChamadoCTRL($vo);
    }

    public function AtualizarAtendimentoChamadoAPI()
    {
        $vo = new ChamadoVO;
        $vo->setTecnicoAtendimento($this->params['id_tecnico_atendimento']);
        $vo->setIdChamado($this->params['id_chamado']);

        return (new ChamadoController)->AtualizarAtendimentoChamadoCTRL($vo);
    }

    public function VerificarSenhaAtualAPI()
    {
        return (new UsuarioController)->ValidarSenhaAtualCTRL($this->params['id'], $this->params['senha']);
    }

    public function AtualizarSenhaAPI()
    {
        $vo = new UsuarioVO;
        $vo->setId($this->params['id']);
        $vo->setSenha($this->params['senha']);
        return (new UsuarioController)->AtualizarSenhaAtualCTRL($vo, $this->params['repetir_senha']);
    }

    public function AutenticarAPI(){
        return (new UsuarioController)->VerificarLoginAcessoTecnicoCTRL ($this->params['login'], $this->params['senha']);
    }
}