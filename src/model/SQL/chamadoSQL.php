<?php
namespace Src\model\SQL;

class chamadoSQL{

    public static function ABRIR_CHAMADO_SQL()
    {
        $sql = 'INSERT INTO tb_chamado (data_abertura, descricao_problema, funcionario_id, alocar_id) VALUES (?,?,?,?)';
        return $sql;
    }

    public static function ATUALIZAR_ALOCAMENTO()
    {
        $sql = 'UPDATE tb_alocar SET situacao = ? WHERE id = ?';
        return $sql;
    }
}
?>