<?php

namespace Src\VO;

use Src\_public\Util;

class LogErroVO
{

    private $idLogado;
    private $hora;
    private $data;
    private $msg_erro;
    private $funcao;

    public function setIdlogado($id): void
    {
        $this->idLogado = $id;
    }
    public function getIdLogado()
    {
        return $this->idLogado;
    }

    public function setMsgErro($p): void
    {
        $this->msg_erro = $p;
    }
    public function getMsgErro(): string
    {
        return $this->msg_erro;
    }

    public function setFuncaoErro($p): void
    {
        $this->funcao = $p;
    }
    public function getFuncaoErro()
    {
        return $this->funcao;
    }

    public function getHoraErro()
    {
        $this->hora = Util::HoraAtual();
        return $this->hora;
    }

    public function getDataErro()
    {
        $this->data = Util::DataAtual();
        return $this->data;
    }
}
