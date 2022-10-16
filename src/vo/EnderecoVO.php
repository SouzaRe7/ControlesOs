<?php

namespace Src\VO;
use Src\_public\Util;
use Src\VO\LogErroVO;

class EnderecoVO extends LogErroVO {

    private $idEnd;
    private $rua;
    private $bairro;
    private $cep;
    private $idCidade;
    private $idEstado;
    private $nome_cidade;
    private $sigla_estado;

    public function setIdCidade($idCidade){
        $this->idCidade = $idCidade; 
    }
    public function getIdCidade(){
        return $this->idCidade;
    }

    public function setIdEstado($idEstado){
        $this->idEstado = $idEstado; 
    }
    public function getIdEstado(){
        return $this->idEstado;
    }
    
    public function setNomeCiadade($nome_cidade)
    {
        $this->nome_cidade = Util::TratarDados($nome_cidade);
    }
    public function getNomeCidade()
    {
        return $this->nome_cidade;
    }

    public function setSiglaEstado($sigla_estado)
    {
        $this->sigla_estado = Util::TratarDados($sigla_estado);
    }
    public function getSiglaEstado()
    {
        return $this->sigla_estado;
    }
    
    public function setIdEnd($idEnd){
        $this->idEnd =  $idEnd;
    }
    public function getIdEnd(){
      return $this->idEnd;
    }

    public function setRua($rua){
        $this->rua = Util::TratarDados($rua);
    }
    public function getRua(){
        return $this->rua;
    }

    public function setBairro($bairro){
        $this->bairro = Util::TratarDados($bairro);
    }
    public function getBairro(){
        return $this->bairro;
    }

    public function setCep($cep){
        $this->cep = Util::remove_especial_char($cep);
    } 
    public function getCep(){
        return $this->cep;
    }

}
?>