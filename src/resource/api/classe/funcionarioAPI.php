<?php
namespace Src\resource\api\classe;
use Src\resource\api\classe\apiRequest;
use Src\controller\UsuarioController;
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
    public function DetalharMeusDados()
    {   
        if(empty($this->params['id_user']))
            return 0;

        return (new UsuarioController)->DetalharUsuarioCTRL($this->params['id_user']);
    }

    public function AlterarMeusDados(){
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
}
?>