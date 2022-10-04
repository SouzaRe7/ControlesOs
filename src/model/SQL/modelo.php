<?php

namespace Src\model\SQL;

class Modelo
{
    public static function INSERT_MODELO()
    {
        $sql = 'INSERT INTO tb_modelo (nome) VALUES (?)';
        return $sql;
    }

    public static function UPDATE_MODELO()
    {
        $sql = 'UPDATE tb_modelo SET nome = ? WHERE id = ?';
        return $sql;
    }

    public static function DELETE_MODELO()
    {
        $sql = 'DELETE FROM tb_modelo WHERE id = ?';
        return $sql;
    }

    public static function SELECT_MODELO()
    {
        $sql = 'SELECT id, nome FROM tb_modelo ORDER BY nome';
        return $sql;
    }

    public static function FILTRAR_MODELO($nome_filtro)
    {
        $sql = ' SELECT id, nome FROM tb_modelo ';

        if(!empty($nome_filtro)):
            $sql .= ' WHERE nome LIKE ? ';
        endif;

        return $sql;
    }
}
