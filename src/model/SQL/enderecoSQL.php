<?php

namespace Src\model\SQL;

class EnderecoSQL{
    
    public static function CADASTRAR_ENDERECO_SQL()
    {
        $sql = "INSERT INTO tb_endereco (rua, bairro, cep, cidade_id, usuario_id) VALUES (?,?,?,?,?)";
        return $sql;
    }

    public static function CADASTRAR_CIDADE_SQL()
    {
        $sql = "INSERT INTO tb_cidade (nome_cidade, estado_id) VALUES (?,?)";
        return $sql;
    }

    public static function CADASTRAR_ESTADO_SQL()
    {
        $sql = "INSERT INTO tb_estado (nome_estado, sigla_estado) VALUES (?,?)";
        return $sql;
    }

    public static function SELECIONAR_CIDADE_SQL()
    {
        $sql = "SELECT id FROM tb_cidade WHERE nome_cidade LIKE ?";
        return $sql;
    }

    public static function SELECIONAR_ESTADO_SQL()
    {
        $sql = "SELECT id FROM tb_estado WHERE sigla_estado LIKE ?";
        return $sql;
    }

    public static function UPDATE_ENDERECO_SQL()
    {
        $sql = "UPDATE tb_endereco SET rua = ?, bairro = ?, cep = ?, cidade_id = ?, WHERE id = ?";
        return $sql;
    }

}
?>