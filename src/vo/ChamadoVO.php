<?php

namespace Src\VO;
use Src\VO\FuncionarioVO;
use Src\VO\TecnicoVO;
use Src\_public\Util;

class ChamadoVO extends TecnicoVO
{
    private $id_alocar;
    private $data_abertura;
    private $descricao_problema;
    private $data_atendimento;
    private $data_encerramento;
    private $laudo_tecnico;
    private $id_funcionario;
    private $tecnico_atendimento;
    private $tecnico_encerramento;
    private $Situacao;

    public function setSituacao($Situacao)
    {
        $this->Situacao = $Situacao;
    }
    public function getSituacao()
    {
        return $this->Situacao;
    }

    public function setIdAlocar($id_alocar)
    {
        $this->id_alocar = $id_alocar;
    }
    public function getIdAlocar()
    {
        return $this->id_alocar;
    }

    public function setDataAbertura($data_abertura)
    {
        $this->data_abertura = Util::TratarDados($data_abertura);
    }
    public function getDataAbertura()
    {
        return $this->data_abertura;
    }

    public function setDescricaoProblema($descricao_problema)
    {
        $this->descricao_problema = Util::TratarDados($descricao_problema);
    }
    public function getDescricaoProblema()
    {
        return $this->descricao_problema;
    }

    public function setDataAtendimento($data_atendimento)
    {
        $this->data_atendimento = Util::TratarDados($data_atendimento);
    }
    public function getDataAtendimento()
    {
        return $this->data_atendimento;
    }

    public function setDataEncerramento($data_encerramento)
    {
        $this->data_encerramento = Util::TratarDados($data_encerramento);
    }
    public function getDataEncerramento()
    {
        return $this->data_encerramento;
    }

    public function setLaudoTecnico($laudo_tecnico)
    {
        $this->laudo_tecnico = Util::TratarDados($laudo_tecnico);
    }
    public function getLaudoTecnico()
    {
        return $this->laudo_tecnico;
    }

    public function setIdFuncionario($id_funcionario)
    {
        $this->id_funcionario = Util::TratarDados($id_funcionario);
    }
    public function getIdFuncionario()
    {
        return $this->id_funcionario;
    }

    public function setTecnicoAtendimento($tecnico_atendimento)
    {
        $this->tecnico_atendimento = Util::TratarDados($tecnico_atendimento);
    }
    public function getTecnicoAtendimento()
    {
        return $this->tecnico_atendimento;
    }

    public function setTecnicoEncerramento($tecnico_encerramento)
    {
        $this->tecnico_encerramento = Util::TratarDados($tecnico_encerramento);
    }
    public function getTecnicoEncerramento()
    {
        return $this->tecnico_encerramento;
    }
}
