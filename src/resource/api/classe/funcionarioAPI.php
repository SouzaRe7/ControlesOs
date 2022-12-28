<?php
namespace Src\resource\api\classe;

use Src\controller\ChamadoController;
use Src\resource\api\classe\apiRequest;
use Src\controller\UsuarioController;
use Src\controller\NovoEquipController;
use Src\VO\UsuarioVO;
use Src\VO\ChamadoVO;
use Src\VO\FuncionarioVO;

class FuncionarioAPI extends apiRequest{

    private $params;
    public function AddParameters($p)
    {
        $this->params = $p;
    }
    public function CheckEndPoint($endpoint)
    {
        return method_exists($this, $endpoint);
    }
    public function DetalharMeusDadosAPI()
    {   
        if(empty($this->params['id_user']))
            return 0;

        return (new UsuarioController)->DetalharUsuarioCTRL($this->params['id_user']);
    }

    public function AlterarMeusDadosAPI(){
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

        return (new UsuarioController)->AlterarUsuarioCTRL($vo);
    }

    public function SelecionarEquipamentosAlocadosAPI(){
        if(empty($this->params['id_setor']))
            return 0;

        return (new NovoEquipController)->SelecionarEquipamentoSetorAlocadoCTRL($this->params['id_setor']);    
    }

    public function AbrirChamadoAPI(){
        $vo = new ChamadoVO();

        $vo->setId($this->params['id_user']);
        $vo->setDescricaoProblema($this->params['problema']);
        $vo->setIdAlocar($this->params['id_alocar']);

        return (new ChamadoController)->AbrirChamadoCTRL($vo);
    }

    public function FiltrarChamadoAPI()
    {
        return (new ChamadoController)->FiltrarChamadoCTRL($this->params['situacao']);
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
        return (new UsuarioController)->VerificarLoginAcessoFuncionarioCTRL($this->params['login'], $this->params['senha']);
    }
}
?>