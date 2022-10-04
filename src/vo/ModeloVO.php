<?php

namespace Src\VO;

use Src\_public\Util;
use Src\VO\LogErroVO;

class ModeloVO extends LogErroVO
{
    private $nomeModelo;
    private $id;

    public function setNomeModelo($nomeModelo)
    {
        $this->nomeModelo = Util::TratarDados($nomeModelo);
    }
    public function getNomeModelo()
    {
        return $this->nomeModelo;
    }
    public function setIdM($id)
    {
        $this->id = $id;
    }
    public function getIdM()
    {
        return $this->id;
    }
}
