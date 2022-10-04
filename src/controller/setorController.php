<?php

namespace Src\controller;

use Src\_public\Util;
use Src\model\setorDAO;
use Src\VO\SetorVO;

class setorController
{
    private $dao;
    public function __construct()
    {
        $this->dao = new setorDAO();
    }
    public function CadastrarSetor(SetorVO $VO): int
    {
        if (empty($VO->getNomeSetor()))
            return 0;
        $VO->setFuncaoErro(CADASTRO_SETOR);
        $VO->setIdlogado(Util::CodigoLogado());
        return $this->dao->CadastrarSetor($VO);
    }
    public function SelecioneSetorCtrl()
    {
        return $this->dao->SelecioneSetorDAO();
    }
    public function AlterarSetorCTRL(SetorVO $VO): int
    {
        if (empty($VO->getNomeSetor()))
            return 0;
            $VO->setFuncaoErro(ALTERAR_SETOR);
            $VO->setIdlogado(Util::CodigoLogado());
        return $this->dao->AlterarSetorDAO($VO);
    }
    public function ExcluirSetorCTRL(SetorVO $VO): int
    {
        if (empty($VO->getIdSetor()))
            return 0;
        $VO->setFuncaoErro(EXCLUIR_SETOR);
        $VO->setIdlogado(Util::CodigoLogado());
        return $this->dao->DeleteSetorDAO($VO);
    }
    public function FiltrarSetorCTRL($nome_filtro)
    {
        return $this->dao->FiltroSetorDAO($nome_filtro);
    }
}
