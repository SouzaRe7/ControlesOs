<?php

namespace Src\model\SQL;

class UsuarioSQL{
    
    public static function CADASTRAR_USUARIO_SQL()
    {
       $sql = "INSERT INTO tb_usuario (tipo, nome, login, senha, status, fone) VALUES (?,?,?,?,?,?)";
       return $sql;
    }

    public static function CADASTRAR_TECNICO_SQL()
    {
        $sql = "INSERT INTO tb_tecnico (tecnico_id, empresa_tecnico) VALUES (?,?)";
        return $sql;
    }

    public static function CADASTRAR_FUNCIONARIO_SQL()
    {
        $sql = "INSERT INTO tb_funcionario (funcionario_id, setor_id) VALUES (?,?)";
        return $sql;
    }
    
    public static function SELECIONAR_EMAIL($id)
    {
        $sql = "SELECT login FROM tb_usuario WHERE login = ?";

        if(!empty($id))
            $sql .= " AND id != ?";
        return $sql;
    }
}
?>