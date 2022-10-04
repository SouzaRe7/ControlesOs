<?php

namespace Src\model;

use Exception;
use Src\model\Conexao;
use Src\model\SQL\UsuariroSQL;
use Src\model\SQL\EnderecoSQL;
use Src\VO\UsuarioVO;

class usuarioDAO extends Conexao
{

    private $conexao;

    public function __construct()
    {
        $this->conexao = parent::retornaConexao();
    }

    public function CadastrarUsuarioDAO($vo)
    {
        $sql = $this->conexao->prepare(UsuariroSQL::CADASTRAR_FUNCIONARIO_SQL());
        $i = 1;
        $sql->bindValue($i++, $vo->getTipo());
        $sql->bindValue($i++, $vo->getNome());
        $sql->bindValue($i++, $vo->getLogin());
        $sql->bindValue($i++, $vo->getSenha());
        $sql->bindValue($i++, $vo->getStatus());
        $sql->bindValue($i++, $vo->getFone());

        $this->conexao->beginTransaction();

        try {
            $sql->execute();
            $ultimoUserID = $this->conexao->lastInsertId();

            $sql = $this->conexao->prepare(EnderecoSQL::SELECIONAR_ESTADO_SQL());
            $sql->bindValue(1, '%' . $vo->getSiglaEstado() . '%');
            $sql->execute();
            $temEstado = $sql->fetchAll(\PDO::FETCH_ASSOC);

            if (count($temEstado) == 0) {
                $sql = $this->conexao->prepare(EnderecoSQL::SELECIONAR_ESTADO_SQL());
                $sql->bindValue(1, $vo->getSiglaEstado());
                $sql->execute();
                $ultimoEstadoID = $this->conexao->lastInsertId();
            } else {
                $ultimoEstadoID = $temEstado[0]['id'];
            }
            return 1;
        } catch (Exception $ex) {
            $vo->setMsgErro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -1;
        }
    }
}
