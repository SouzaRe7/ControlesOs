<?php

namespace Src\model\SQL;

class EquipamentoSQL
{

    public static function INSERT_EQUIPAMENTO()
    {
        $sql = 'INSERT INTO tb_equipamento (identificacao,descricao,tipoequip_id,modelo_id) VALUES (?,?,?,?)';

        return $sql;
    }
    public static function FILTRAR_EQUIPAMENTO($tipo_filtro)
    {
        $sql = 'SELECT equip.id, equip.identificacao, equip.descricao, tbTipo.nome AS nomeTipo, tbModelo.nome AS nomeModelo FROM tb_equipamento AS equip INNER JOIN tb_tipoequip AS tbTipo ON equip.tipoequip_id = tbTipo.id INNER JOIN tb_modelo AS tbModelo ON equip.modelo_id = tbModelo.id ';

        switch ($tipo_filtro) {

            case FILTRO_TIPO:
                $sql .= 'WHERE tbTipo.nome LIKE ?';
                break;
            case FILTRO_IDENTIFICACAO:
                $sql .= 'WHERE equip.identificacao LIKE ?';
                break;
            case FILTRO_MODELO:
                $sql .= 'WHERE tbModelo.nome LIKE ?';
                break;
            case FILTRO_DESCRICAO:
                $sql .= 'WHERE equip.descricao LIKE ?';
                break;
        }
        return $sql;
    }
    public static function DETALHAR_EQUIPAMENTO()
    {
        $sql = 'SELECT id, identificacao, descricao, modelo_id, tipoequip_id FROM tb_equipamento WHERE id = ?';
        return $sql;
    }
    public static function UPDATE_EQUIPAMENTO()
    {
        $sql = 'UPDATE tb_equipamento SET identificacao = ?, descricao = ?, modelo_id = ?, tipoequip_id = ? WHERE id = ?';
        return $sql;
    }
    public static function DELETE_EQUIPAMENTO()
    {
        $sql = 'DELETE FROM tb_equipamento WHERE id = ?';
        return $sql;
    }
    public static function ALOCAR_EQUIPAMENTO()
    {
        $sql = 'INSERT INTO tb_alocar (situacao, data_alocacao, setor_id, equipamento_id) VALUES (?, ?, ?, ?)';
        return $sql;
    }
    public static function SELECT_EQUIPAMENTO()
    {
        $sql = 'SELECT id, identificacao, modelo_id, tipoequip_id FROM tb_equipamento';
        return $sql;
    }
    public static function SELECT_EQUIPAMENTO_NAO_ALOCADO()
    {
        $sql = 'SELECT ti.nome AS nome_tipo, 
                       mo.nome AS nome_modelo, 
                       eq.identificacao, 
                       eq.id 
                  FROM tb_equipamento AS eq 
            INNER JOIN tb_tipoequip AS ti 
                    ON eq.tipoequip_id = ti.id 
            INNER JOIN tb_modelo AS mo 
                    ON eq.modelo_id = mo.id 
                 WHERE eq.id NOT IN (SELECT equipamento_id FROM tb_alocar WHERE situacao != ?)';
        return $sql;
    }

}
