<?php

namespace Src\model\SQL;

class chamadoSQL
{

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

    public static function FILTAR_CHAMADO_SQL($tipo)
    {
        $sql = 'SELECT  DATE_FORMAT(ch.data_abertura, "%d/%m/%Y às %Hh%i") AS data_abertura,
                        ch.descricao_problema,
                        DATE_FORMAT(ch.data_adendimento, "%d/%m/%Y às %Hh%i") AS data_adendimento,
                        DATE_FORMAT(ch.data_encerramento, "%d/%m/%Y às %Hh%i") AS data_encerramento,
                        ch.laudo_tecnico,
                        us_fu.nome AS nome_func,
                        us_te.nome AS nome_tec,
                        eq.identificacao,
                        mo.nome AS nome_modelo,
                        ti.nome AS nome_tipo
                  FROM  tb_chamado AS ch
            INNER JOIN  tb_funcionario AS fu
                    ON  fu.funcionario_id = ch.funcionario_id
            INNER JOIN  tb_usuario AS us_fu
                    ON	us_fu.id = fu.funcionario_id
             LEFT JOIN  tb_tecnico AS te
                    ON  te.tecnico_id = ch.tecnico_atendimento
             LEFT JOIN  tb_usuario AS us_te
                    ON  us_te.id = te.tecnico_id
            INNER JOIN  tb_alocar AS al
                    ON  al.id = ch.alocar_id
            INNER JOIN  tb_equipamento AS eq
                    ON  eq.id = al.equipamento_id
            INNER JOIN  tb_modelo AS mo
                    ON  mo.id = eq.modelo_id
            INNER JOIN  tb_tipoequip AS ti
                    ON  ti.id = eq.tipoequip_id ';

        switch ($tipo) {
            case SITUACAO_EM_ABERTO:
                $sql .= ' WHERE ch.data_adendimento is null';
                break;
            case SITUACAO_EM_ATENDIMENTO:
                $sql .= ' WHERE ch.data_adendimento is not null AND ch.data_encerramento is null';
                break;
            case SITUACAO_ENCERRADO:
                $sql .= ' WHERE ch.data_encerramento is not null';
                break;
        }

        return $sql;
    }
}
