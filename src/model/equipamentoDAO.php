<?php

namespace Src\model;

use Exception;
use Src\_public\Util;
use Src\model\SQL\EquipamentoSQL;
use Src\model\Conexao;
use Src\VO\AlocarVO;
use Src\VO\EquipamentoVO;
use Src\VO\SetorVO;

class EquipamentoDAO extends Conexao
{

    private $conexao;

    public function __construct()
    {
        $this->conexao = parent::retornaConexao();
    }
    public function SelectEquipamentoDAO()
    {
        $sql = $this->conexao->prepare(EquipamentoSQL::SELECT_EQUIPAMENTO());
        return $sql;
    }
    public function AlocarEquipamentoDAO(AlocarVO $vo)
    {
        $sql = $this->conexao->prepare(EquipamentoSQL::ALOCAR_EQUIPAMENTO());
        $i = 1;
        $sql->bindValue($i++,$vo->getSituacao());        
        $sql->bindValue($i++, Util::GravaDataAtual($vo->getDataAlocacao()));
        $sql->bindValue($i++,$vo->getIdSetor());
        $sql->bindValue($i++,$vo->getIdEquipamento());
        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            $vo->setMsgErro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -1;
        }
    }
    public function CadastrarEquipamentoDAO(EquipamentoVO $vo)
    {
        $sql = $this->conexao->prepare(EquipamentoSQL::INSERT_EQUIPAMENTO());
        $sql->bindValue(1, $vo->getIdentificacao());
        $sql->bindValue(2, $vo->getDescricao());
        $sql->bindValue(3, $vo->getIdTipoEquipamento());
        $sql->bindValue(4, $vo->getIdModelo());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            $vo->setMsgErro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -1;
        }
    }
    public function DetalharEquipamentoDAO($id)
    {
        $sql = $this->conexao->prepare(EquipamentoSQL::DETALHAR_EQUIPAMENTO());
        $sql->bindValue(1,$id);
        $sql->execute();

        return $sql->fetch(\PDO::FETCH_ASSOC);
    }
    public function FiltroEquipamentoDAO($tipo_filtro, $nome_filtro)
    {
        $sql = $this->conexao->prepare(EquipamentoSQL::FILTRAR_EQUIPAMENTO($tipo_filtro));
        $sql->bindValue(1, '%' . $nome_filtro . '%');
        $sql->execute();

        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function AlterarEquipamentoDAO(EquipamentoVO $vo)
    {
        $sql = $this->conexao->prepare(EquipamentoSQL::UPDATE_EQUIPAMENTO());
        $sql->bindValue(1,$vo->getIdentificacao());
        $sql->bindValue(2,$vo->getDescricao());
        $sql->bindValue(3,$vo->getIdModelo());
        $sql->bindValue(4,$vo->getIdTipoEquipamento());
        $sql->bindValue(5,$vo->getIdEquipamento());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            $vo->setMsgErro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -1;
        }        

    }
    public function DeleteEquipamentoDAO(EquipamentoVO $vo) : int
    {
        $sql = $this->conexao->prepare(EquipamentoSQL::DELETE_EQUIPAMENTO());
        $sql->bindValue(1,$vo->getIdEquipamento());

        try{
            $sql->execute();
            return 1;
        } catch (Exception $ex){
            $vo->setMsgErro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -1;
        }
    }
    public function SelecionarEquipamentoNaoAlocadosDAO($situcacao)
    {
        $sql = $this->conexao->prepare(EquipamentoSQL::SELECT_EQUIPAMENTO_NAO_ALOCADO());
        $sql->bindValue(1, $situcacao);
        $sql->execute();

        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function SelecionarEquipamentoSetorAlocadoDAO($situcacao, $idSetor)
    {
        $sql = $this->conexao->prepare(EquipamentoSQL::SELECT_EQUIPAMENTO_DO_SETOR_ALOCADO_SQL());
        $i = 1;
        $sql->bindValue($i++, $situcacao);
        $sql->bindValue($i++, $idSetor);
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function RemoverEquipamentoSetorDAO(AlocarVO $vo)
    {
        $sql = $this->conexao->prepare(EquipamentoSQL::REMOVER_EQUIPAMENTO_SETOR_SQL());
        $sql->bindValue(1,$vo->getSituacao());
        $sql->bindValue(2,$vo->getDataRemocao());
        $sql->bindValue(3,$vo->getId());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            $vo->setMsgErro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -1;
        }        

    }
}
