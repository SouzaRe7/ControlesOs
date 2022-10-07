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
    {   # Cadastra usuario
        $sql = $this->conexao->prepare(UsuariroSQL::CADASTRAR_USUARIO_SQL());
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
            # Recupera o ID recem cadastrado
            $idUser = $this->conexao->lastInsertId();
            # Processo de cadastrar a cidade e estado
            $sql = $this->conexao->prepare(EnderecoSQL::SELECIONAR_CIDADE_SQL());
            $sql->bindValue(1, '%' . $vo->getNomeCidade() . '%');
            $sql->execute();
            $temCidade = $sql->fetchAll(\PDO::FETCH_ASSOC);
            # Verifica se encontrou cidade e estado
            if (count($temCidade) == 0) { # Verifica a cidade
                # Seleciona o estado
                $sql = $this->conexao->prepare(EnderecoSQL::SELECIONAR_ESTADO_SQL());
                $sql->bindValue(1, '%' . $vo->getSiglaEstado() . '%');
                $sql->execute();
                $temEstado = $sql->fetchAll(\PDO::FETCH_ASSOC);
                # Verifica o estado
                if (count($temEstado) == 0) {
                    # cadastra o estado
                    $sql = $this->conexao->prepare(EnderecoSQL::CADASTRAR_ESTADO_SQL());
                    $sql->bindValue(1, $vo->getSiglaEstado());
                    $sql->execute();
                    $idEstado = $this->conexao->lastInsertId();
                } else {
                    $idEstado = $temEstado[0]['id'];
                }
                # Cadastra a cidade
                $sql = $this->conexao->prepare(EnderecoSQL::CADASTRAR_CIDADE_SQL());
                $i = 1;
                $sql->bindValue($i++, $vo->getNomeCidade());
                $sql->bindValue($i++, $idEstado);
                $idCidade = $this->conexao->lastInsertId();
            } else {
                $idCidade = $temCidade[0]['id'];
            }
            # Cadastrar endereço
            $sql = $this->conexao->prepare(EnderecoSQL::CADASTRAR_ENDERECO_SQL());
            $i = 1;
            $sql->bindValue($i++, $vo->getRua());
            $sql->bindValue($i++, $vo->getBairro());
            $sql->bindValue($i++, $vo->getCep());
            $sql->bindValue($i++, $idCidade);
            $sql->bindValue($i++, $idUser);
            $sql->execute();
            # Verificar o tipo de usuario 1-Administrador, 2-Funcionário ou 3-Tecnico
            switch ($vo->getTipo()) {
                case 2: # Cadastra Funcionário
                    $sql = $this->conexao->prepare(UsuariroSQL::CADASTRAR_FUNCIONARIO_SQL());
                    $i = 1;
                    $sql->bindValue($i++, $idUser);
                    $sql->bindValue($i++, $vo->getIdSetor());
                    $sql->execute();
                    break;
                case 3: # Cadastra Tecnico
                    $sql = $this->conexao->prepare(UsuariroSQL::CADASTRAR_TECNICO_SQL());
                    $i = 1;
                    $sql->bindValue($i++, $idUser);
                    $sql->bindValue($i++, $vo->getNomeEmpresa());
                    $sql->execute();
                    break;
            }
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
