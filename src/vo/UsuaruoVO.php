<?php

namespace Src\VO;
use Src\_public\Util;
use Src\VO\EnderecoVO;

class UsuarioVO extends EnderecoVO
{

    private $idUser;
    private $tipo;
    private $nome;
    private $login;
    private $senha;
    private $status;
    private $fone;

    public function setId($id){
        $this->idUser =  $id;
    }
    public function getId(){
      return $this->idUser;
    }

    public function setTipo($tipo){
        $this->tipo = $tipo;
    }
    public function getTipo(){
        return $this->tipo;
    }

    public function setNome($nome){
        $this->nome = Util::TratarDados($nome);
    }
    public function getNome(){
        return $this->nome;
    }
    
    public function setSobrenome($nome){
        $this->nome = Util::TratarDados($nome);
    }
    public function getSobrenome(){
        return $this->nome;
    }

    public function setLogin($login){
        $this->login = Util::TratarDados($login);
    }
    public function getLogin(){
        return $this->login;
    }

    public function setSenha($senha){
        $this->senha = Util::TratarDados($senha);
    }
    public function getSenha(){
        return $this->senha;
    }

    public function setStatus($status){
        $this->status = Util::TratarDados($status);
    }
    public function getStatus(){
        return $this->status;
    }

    public function setFone($fone){
        $this->fone = Util::TratarDados($fone);
    }
    public function getFone(){
        return $this->fone;
    }
}
?>