<?php

namespace Src\VO;

use Src\_public\Util;

class EquipamentoVO extends LogErroVO
{
    private $idEquipamento;
    private $identificacao;
    private $descricao;
    private $idTipoEquipamento;
    private $idModelo;
    
    public function setIdEquipamento($idEquipamento)
    {
        $this->idEquipamento = $idEquipamento;
    }
    public function getIdEquipamento()
    {
        return $this->idEquipamento;
    }

    public function setIdentificacao($identificacao)
    {
        $this->identificacao = Util::TratarDados($identificacao);
    }
    public function getIdentificacao()
    {
        return $this->identificacao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = Util::TratarDados($descricao);
    }
    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setIdTipoEquipamento($idTipoEquipamento)
    {
        $this->idTipoEquipamento = Util::TratarDados($idTipoEquipamento);
    }
    public function getIdTipoEquipamento()
    {
        return $this->idTipoEquipamento;
    }

    public function setIdModelo($idModelo)
    {
        $this->idModelo = Util::TratarDados($idModelo);
    }
    public function getIdModelo()
    {
        return $this->idModelo;
    }
}
