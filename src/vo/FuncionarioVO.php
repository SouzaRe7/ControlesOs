<?php
namespace Src\VO;
use Src\_public\Util;
use Src\VO\UsuarioVO;
class FuncionarioVO extends UsuarioVO{

    private $idSetor;

    public function setIdSetor($idSetor){
        $this->idSetor = Util::TratarDados($idSetor);
    }
    public function getIdSetor(){
        return $this->idSetor;
    }
}
?>