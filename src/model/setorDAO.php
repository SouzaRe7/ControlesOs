<?php

namespace Src\model;

use Src\model\Conexao;
use Exception;
use PDO;
use Src\model\SQL\setor;
use Src\model\SQL\setorSQL;
use Src\VO\SetorVO;
use Src\VO\LogErroVO;

class setorDAO extends Conexao
{

    private $conexao;

    public function __construct()
    {
        $this->conexao = parent::retornaConexao();
    }
    public function CadastrarSetor(SetorVO $vo)
    {
        $sql = $this->conexao->prepare(setor::INSERT_SETOR());
        $sql->bindValue(1, $vo->getNomeSetor());
        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            $vo->setMsgErro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -1;
        }
    }

    public function SelecioneSetorDAO()
    {
        $sql = $this->conexao->prepare(setor::SELECT_SETOR());
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function DeleteSetorDAO(SetorVO $vo): int
    {
        $sql = $this->conexao->prepare(setor::DELETE_SETOR());
        $sql->bindValue(1, $vo->getIdSetor());
        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            $vo->setMsgErro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -1;
        }
    }
    public function AlterarSetorDAO(SetorVO $vo): int
    {
        $sql = $this->conexao->prepare(setor::UPDATE_SETOR());
        $sql->bindValue(1, $vo->getNomeSetor());
        $sql->bindValue(2, $vo->getIdSetor());
        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            $vo->setMsgErro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -1;
        }
    }

    public function FiltroSetorDAO($nome_filtro)
    {
        $sql = $this->conexao->prepare(setor::FILTRAR_SETOR($nome_filtro));

        if (!empty($nome_filtro)) :
            $sql->bindValue(1, '%' . $nome_filtro . '%');
        endif;

        $sql->execute();

        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }
}
