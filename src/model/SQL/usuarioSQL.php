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

    public static function FILTRAR_USUARIO_SQL($nome)
    {
        $sql = "SELECT nome, tipo, id, status FROM tb_usuario";
        if(!empty($nome))
            $sql.= " WHERE nome LIKE ?";
        return $sql;
    }

    public static function MUDAR_STATUS_SQL()
    {
        $sql = "UPDATE tb_usuario SET status = ? WHERE id = ?";
        return $sql;
    }

    public static function DETALHAR_USUARIO_SQL()
    {
        $sql = "SELECT usu.id AS id_user, 
                       usu.tipo, 
                       usu.nome,
                       usu.login, 
                       usu.fone, 
                       end.rua, 
                       end.bairro, 
                       end.cep, 
                       end.id AS id_end, 
                       cid.nome_cidade AS cidade, 
                       est.sigla_estado, 
                       tec.empresa_tecnico, 
                       fun.setor_id 
                 FROM  tb_usuario AS usu 
           INNER JOIN  tb_endereco AS end 
                   ON  usu.id = end.usuario_id 
           INNER JOIN  tb_cidade AS cid 
                   ON  end.cidade_id = cid.id 
           INNER JOIN  tb_estado AS est 
                   ON  cid.estado_id = est.id 
            LEFT JOIN  tb_funcionario AS fun 
                   ON  usu.id = fun.funcionario_id 
            LEFT JOIN  tb_tecnico AS tec 
                   ON  usu.id = tec.tecnico_id 
                WHERE  usu.id = ?";
        return $sql;
    }
}
?>