<?php

namespace Src\model\SQL;

class setor
{
    public static function INSERT_SETOR()
    {
        $sql = 'INSERT INTO tb_setor (nome_setor) VALUES (?)';
        return $sql;
    }

    public static function SELECT_SETOR()
    {
        $sql = 'SELECT id, nome_setor FROM tb_setor ORDER BY nome_setor';
        return $sql;
    }

    public static function UPDATE_SETOR()
    {
        $sql = 'UPDATE tb_setor SET nome_setor = ? WHERE id = ? ';
        return $sql;
    }

    public static function DELETE_SETOR()
    {
        $sql = 'DELETE FROM tb_setor WHERE id = ? ';
        return $sql;
    }

    public static function FILTRAR_SETOR($nome_filtro)
    {
        $sql = 'SELECT id, nome_setor FROM tb_setor';

        if(!empty($nome_filtro)):
            $sql .= ' WHERE nome_setor LIKE ? ';
        endif;

        return $sql;
    }
}
