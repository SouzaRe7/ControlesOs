<?php

namespace Src\model;

use  Src\model\Conexao;
use Exception;
use Src\VO\TipoEquipamentoVO;
use Src\model\SQL\TipoEquipamento;
use Src\model\SQL\TipoEquipamentoSQL;
use Src\VO\LogErroVO;

class TipoEquipamentoDAO extends Conexao
{

    private $conexao;

    public function __construct()
    {
        $this->conexao = parent::retornaConexao();
    }
    public function CadastrarTipoEquipamento(TipoEquipamentoVO $vo): int
    {
        $sql = $this->conexao->prepare(TipoEquipamento::INSERT_TIPO());
        $sql->bindValue(1, $vo->getNome());
        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            $vo->setMsgErro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -1;
        }
    }
    public function DeleteTipoEquipamentoDAO(TipoEquipamentoVO $vo): int
    {
        $sql = $this->conexao->prepare(TipoEquipamento::DELETE_TIPO());
        $sql->bindValue(1, $vo->getId());
        try {
            $sql->execute();
            return -2;
        } catch (Exception $ex) {
            $vo->setMsgErro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -1;
        }
    }
    public function AlterarTipoEquipamentoDAO(TipoEquipamentoVO $vo): int
    {
        $sql = $this->conexao->prepare(TipoEquipamento::UPDATE_TIPO());
        $sql->bindValue(1, $vo->getNome());
        $sql->bindValue(2, $vo->getId());
        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            $vo->setMsgErro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -1;
        }
    }
    public function SelecioneTipoEquipamentoDAO()
    {
        $sql = $this->conexao->prepare(TipoEquipamento::SELECT_TIPO());
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function FiltrarTipoEquipamentoDAO($nome_filtro)
    {
        $sql = $this->conexao->prepare(TipoEquipamento::FILTRAR_TIPO($nome_filtro));
        if (!empty($nome_filtro)) :
            $sql->bindValue(1, '%' . $nome_filtro . '%');
        endif;
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }
}
