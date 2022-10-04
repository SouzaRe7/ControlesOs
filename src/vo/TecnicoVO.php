<?php

namespace Src\VO;
use Src\_public\Util;
use Src\VO\UsuarioVO;

class TecnicoVO extends UsuarioVO
{
    private $nome_empresa;
    
    public function setNomeEmpresa($empresa){
       $this->nome_empresa = Util::TratarDados($empresa);
    }
    public function getNomeEmpresa(){
        return $this->nome_empresa;
    }
}
?>