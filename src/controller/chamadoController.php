<?php

namespace Src\controller;
use Src\model\ChamadoDAO;
use Src\VO\ChamadoVO;
use Src\_public\Util;

class ChamadoController{

    private $dao;

    public function __construct()
    {
        $this->dao = new ChamadoDAO();
    }

    public function FiltrarChamadoCTRL($tipo)
    {
        if ($tipo == "")
            return 0;
        return $this->dao->FiltrarChamadoDAO($tipo);    
    }

    public function AbrirChamadoCTRL(ChamadoVO $vo)
    {
        if(empty($vo->getDescricaoProblema()) Or empty($vo->getIdAlocar()))
            return 0;

        $vo->setDataAbertura(Util::GravaDataHoraAtual());
        $vo->setSituacao(SITUACAO_MANUTENCAO_EQUIPAMENTO);
        $vo->setFuncaoErro(ABRIR_CHAMADO);
        $vo->setId($vo->getId());

        return $this->dao->AbrirChamadoDAO($vo);

    }
}

