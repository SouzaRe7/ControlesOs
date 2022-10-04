<?php

namespace Src\VO;

use Src\_public\Util;
use Src\VO\LogErroVO;

class TipoEquipamentoVO extends LogErroVO
{
    private $nome;
    private $id;
    public function setNome($nome)
    {
        $this->nome = Util::TratarDados($nome);
    }
    public function getNome()
    {
        return $this->nome;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
    }
}
