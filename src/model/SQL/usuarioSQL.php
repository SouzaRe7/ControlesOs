<?php

namespace Src\model\SQL;

class UsuarioSQL{

    public static function RECUPERAR_SENHA_ATUAL_SQL()
    {
        $sql = "SELECT senha FROM tb_usuario WHERE id = ?";
        return $sql;
    }

    public static function ATUALIZAR_SENHA_SQL()
    {
        $sql = "UPDATE tb_usuario SET senha = ? WHERE id = ?";
        return $sql;
    }

    public static function UPDATE_USUARIO_SQL()
    {
        $sql = "UPDATE tb_usuario SET nome = ?, login = ?, status = ?, fone = ? WHERE id = ?";
        return $sql;
    }
    
    public static function UPDATE_TECNICO_SQL()
    {
        $sql = "UPDATE tb_tecnico SET empresa_tecnico = ? WHERE tecnico_id = ?";
        return $sql;
    }

    public static function UPDATE_FUNCIONARIO_SQL()
    {
        $sql = "UPDATE tb_funcionario SET setor_id = ? WHERE funcionario_id = ? ";
        return $sql;
    }

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
        $sql = "SELECT login, tipo FROM tb_usuario WHERE login = ?";

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

    public static function BUSCAR_DADOS_ACESSO_SQL()
    {
        $sql = "SELECT  id, 
                        nome, 
                        senha
                  FROM  tb_usuario
                 WHERE  login = ? AND status = ?";
        return $sql;
    }

    public static function BUSCAR_DADOS_ACESSO_FUCIONARIO_SQL()
    {
        $sql = "SELECT  id, 
                        nome, 
                        senha,
                        tipo,
                        setor_id
                  FROM  tb_usuario
             LEFT JOIN  tb_funcionario
                    ON  tb_usuario.id = tb_funcionario.funcionario_id
                 WHERE  login = ? AND status = ? AND tipo = ?";
        return $sql;
    }

    public static function DADOS_ACESSO_TECNICO_SQL()
    {
        $sql = "SELECT  id, 
                        nome, 
                        senha,
                        tipo
                  FROM  tb_usuario
            INNER JOIN  tb_tecnico
                    ON  tb_usuario.id = tb_tecnico.tecnico_id
                 WHERE  login = ? AND status = ? AND tipo = ?";
        return $sql;
    }
}


?>