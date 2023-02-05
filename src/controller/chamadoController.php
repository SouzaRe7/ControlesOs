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

    public function FiltrarChamadoCTRL($tipo, $id_setor)
    {
        if (empty($tipo))
            return 0;
        return $this->dao->FiltrarChamadoDAO($tipo, $id_setor);    
    }

    public function EncerrarAtendimentoChamadoCTRL(ChamadoVO $vo)
    {
        if(empty($vo->getLaudoTecnico()) Or empty($vo->getIdChamado()) Or empty($vo->getTecnicoEncerramento()))
            return 0;
        $vo->setDataEncerramento(Util::GravaDataHoraAtual());
        $vo->setFuncaoErro(ENCERRAMENTO_CHAMADO);

        return $this->dao->EncerrarAtendimentoChamadoDAO($vo);
    }

    public function AtualizarAtendimentoChamadoCTRL(ChamadoVO $vo)
    {
        if(empty($vo->getTecnicoAtendimento()) Or empty($vo->getIdChamado())) 
            return 0;
        $vo->setDataAtendimento(Util::GravaDataHoraAtual());
        $vo->setFuncaoErro(ATENDIMENTO_CHAMADO);
        return $this->dao->AtualizarAtendimentoChamadoDAO($vo);
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

