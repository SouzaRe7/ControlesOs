<?php

namespace Src\controller;

use Src\_public\Util;
use Src\model\TipoEquipamentoDAO;
use Src\VO\TipoEquipamentoVO;

class TipoEquipController
{
    private $dao;
    public function __construct()
    {
        $this->dao = new TipoEquipamentoDAO();
    }
    public function CadastrarTipoEquipamento(TipoEquipamentoVO $VO): int
    {
        if (empty($VO->getNome()))
            return 0;
        $VO->setFuncaoErro(CADASTRO_TIPO_EQUIPAMENTO);
        $VO->setIdlogado(Util::CodigoLogado());
        return $this->dao->CadastrarTipoEquipamento($VO);
    }
    public function SelecioneTipoEquipamentoCtrl()
    {
        return $this->dao->SelecioneTipoEquipamentoDAO();
    }
    public function AlterarTipoEquipamentoCTRL(TipoEquipamentoVO $VO): int
    {
        if (empty($VO->getNome()))
            return 0;
        $VO->setFuncaoErro(ALTERAR_TIPO_EQUIPAMENTO);
        $VO->setIdlogado(Util::CodigoLogado());
        return $this->dao->AlterarTipoEquipamentoDAO($VO);
    }
    public function ExcluirTipoEquipamentoCTRL(TipoEquipamentoVO $VO): int
    {
        if (empty($VO->getId()))
            return 0;
        $VO->setFuncaoErro(EXCLUIR_TIPO_EQUIPAMENTO);
        $VO->setIdlogado(Util::CodigoLogado());
        return $this->dao->DeleteTipoEquipamentoDAO($VO);
    }
    public function FiltrarTipoEquipamentoCTRL($nome_filtro)
    {
       return $this->dao->FiltrarTipoEquipamentoDAO($nome_filtro);
    }
}
