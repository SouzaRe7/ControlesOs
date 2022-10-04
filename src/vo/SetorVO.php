<?php

namespace Src\VO;

use Src\_public\Util;
use Src\VO\LogErroVO;

class SetorVO extends LogErroVO
{
    private $nomeSetor;
    private $idSetor;
    public function setNomeSetor($nomeSetor)
    {
        $this->nomeSetor = Util::TratarDados($nomeSetor);
    }
    public function getNomeSetor()
    {
        return $this->nomeSetor;
    }

    public function setIdSetor($idSetor)
    {
        $this->idSetor = $idSetor;
    }
    public function getIdSetor()
    {
        return $this->idSetor;
    }
}
