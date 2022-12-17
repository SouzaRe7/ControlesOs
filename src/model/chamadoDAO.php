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

    public function AbrirChamadoDAO(ChamadoVO $vo){

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
?>