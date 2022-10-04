<?php

namespace Src\model;

use Src\model\Conexao;
use Exception;
use Src\model\SQL\Modelo;
use Src\VO\ModeloVO;


class ModeloDAO extends Conexao
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = parent::retornaConexao();
    }

    public function CadastrarModelo(ModeloVO $VO)
    {
        $sql = $this->conexao->prepare(Modelo::INSERT_MODELO());
        $sql->bindValue(1, $VO->getNomeModelo());
        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            $VO->setMsgErro($ex->getMessage());
            parent::GravarLogErro($VO);
            return -1;
        }
    }

    public function SelecioneModeloDAO()
    {
        $sql = $this->conexao->prepare(Modelo::SELECT_MODELO());
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function DeleteModeloDAO(ModeloVO $vo): int
    {
        $sql = $this->conexao->prepare(Modelo::DELETE_MODELO());
        $sql->bindValue(1, $vo->getIdM());
        try {
            $sql->execute();
            return -2;
        } catch (Exception $ex) {
            $vo->setMsgErro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -1;
        }
    }

    public function AlterarSetorDAO(ModeloVO $vo): int
    {
        $sql = $this->conexao->prepare(Modelo::UPDATE_MODELO());
        $sql->bindValue(1, $vo->getNomeModelo());
        $sql->bindValue(2, $vo->getIdM());
        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            $vo->setMsgErro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -1;
        }
    }

    public function FiltrarModeloDAO($nome_filtro)
    {
        $sql = $this->conexao->prepare(Modelo::FILTRAR_MODELO($nome_filtro));

        if (!empty($nome_filtro)) :
            $sql->bindValue(1, '%' . $nome_filtro . '%');
        endif;

        $sql->execute();

        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }
}
