<?php

namespace Src\VO;

use Src\_public\Util;

class AlocarVO extends LogErroVO
{
    private $situacao;
    private $data_alocacao;
    private $data_remocao;
    private $idSetor;
    private $idEquipamento;

    public function setSituacao($situacao)
    {
        $this->situacao = Util::TratarDados($situacao);
    }
    public function getSituacao()
    {
        return $this->situacao;
    }

    public function setDataAlocacao($data_alocacao)
    {
        $this->data_alocacao = Util::GravaDataAtual($data_alocacao);
    }
    public function getDataAlocacao()
    {
        return $this->data_alocacao;
    }

    public function setDataRemocao($data_remocao)
    {
        $this->data_remocao = Util::TratarDados($data_remocao);
    }
    public function getDataRemocao()
    {
        return $this->data_remocao;
    }

    public function setIdSetor($idSetor)
    {
        $this->idSetor = Util::TratarDados($idSetor);
    }
    public function getIdSetor()
    {
        return $this->idSetor;
    }

    public function setIdEquipamento($idEquipamento)
    {
        $this->idEquipamento = Util::TratarDados($idEquipamento);
    }
    public function getIdEquipamento()
    {
        return $this->idEquipamento;
    }
}
