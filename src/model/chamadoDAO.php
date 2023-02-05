<?php

namespace Src\model;

use Exception;
use Src\model\SQL\chamadoSQL;
use Src\VO\ChamadoVO;

class ChamadoDAO extends Conexao
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = parent::retornaConexao();
    }

    public function FiltrarChamadoDAO($tipo, $id_setor)
    {
        $sql = $this->conexao->prepare(chamadoSQL::FILTAR_CHAMADO_SQL($tipo, $id_setor));
        if (!empty($id_setor)) :
            $i = 1;
            $sql->bindValue($i++, $id_setor);
        endif;
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function EncerrarAtendimentoChamadoDAO(ChamadoVO $vo)
    {
        if(empty($vo->getLaudoTecnico()))
        return 0;

        $sql = $this->conexao->prepare(chamadoSQL::ENCERRAR_ATENDIMENTO_CHAMADO_SQL());
        $i = 1;
        $sql->bindValue($i++, $vo->getDataEncerramento());
        $sql->bindValue($i++, $vo->getLaudoTecnico());
        $sql->bindValue($i++, $vo->getTecnicoEncerramento());
        $sql->bindValue($i++, $vo->getIdChamado());
        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            $vo->setMsgErro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -1;
        }         
    }

    public function AtualizarAtendimentoChamadoDAO(ChamadoVO $vo)
    {
        $sql = $this->conexao->prepare(chamadoSQL::ATUALIZAR_ATENDIMENTO_CHAMADO_SQL());
        $i = 1;
        $sql->bindValue($i++, $vo->getDataAtendimento());
        $sql->bindValue($i++, $vo->getTecnicoAtendimento());
        $sql->bindValue($i++, $vo->getIdChamado());
        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            $vo->setMsgErro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -1;
        }        
    }

    public function AbrirChamadoDAO(ChamadoVO $vo)
    {
        $sql = $this->conexao->prepare(chamadoSQL::ABRIR_CHAMADO_SQL());
        $i = 1;
        $sql->bindValue($i++, $vo->getDataAbertura());
        $sql->bindValue($i++, $vo->getDescricaoProblema());
        $sql->bindValue($i++, $vo->getId());
        $sql->bindValue($i++, $vo->getIdAlocar());
        $this->conexao->beginTransaction();
        try {
            $sql->execute();
            $sql = $this->conexao->prepare(chamadoSQL::ATUALIZAR_ALOCAMENTO());
            $i = 1;
            $sql->bindValue($i++, $vo->getSituacao());
            $sql->bindValue($i++, $vo->getIdAlocar());
            $sql->execute();
            $this->conexao->commit();
            return 1;
        } catch (Exception $ex) {
            $this->conexao->rollBack();
            $vo->setMsgErro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -1;
        }
    }
}
