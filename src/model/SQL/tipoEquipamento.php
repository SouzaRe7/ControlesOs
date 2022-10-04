<?php

namespace Src\model\SQL;

class TipoEquipamento
{

    public static function INSERT_TIPO()
    {
        $sql = 'INSERT INTO tb_tipoequip (nome) VALUES (?)';
        return $sql;
    }
    
    public static function SELECT_TIPO()
    {
        $sql = 'SELECT id, nome FROM tb_tipoequip ORDER BY nome'; 
        return $sql;
    }

    public static function FILTRAR_TIPO($nome_filtro){

        $sql = 'SELECT id, nome FROM tb_tipoequip';
        
        if(!empty($nome_filtro)):
            $sql .= ' WHERE nome LIKE ?';
        endif;

        return $sql;
    }

    public static function UPDATE_TIPO()
    {
        $sql = 'UPDATE tb_tipoequip SET nome = ? WHERE id = ? ';
        return $sql;
    }

    public static function DELETE_TIPO()
    {
        $sql = 'DELETE FROM tb_tipoequip WHERE id = ? ';
        return $sql;
    }
}
