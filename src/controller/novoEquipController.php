<?php

namespace Src\controller;

use Src\_public\Util;
use Src\model\EquipamentoDAO;
use Src\VO\AlocarVO;
use Src\VO\EquipamentoVO;

class NovoEquipController
{
    private $dao;

    public function __construct()
    {
        $this->dao = new EquipamentoDAO();
    }

    public function CadastrarEquipamentoCTRL(EquipamentoVO $VO): int
    {

        if (empty($VO->getIdentificacao()) or empty($VO->getDescricao()) or empty($VO->getIdTipoEquipamento()) or empty($VO->getIdModelo()))
            return 0;
        $VO->setFuncaoErro(CADASTRO_EQUIPAMENTO);
        $VO->setIdlogado(Util::CodigoLogado());
        return $this->dao->CadastrarEquipamentoDAO($VO);
    }

    public function FiltrarEquipamentoCTRL($tipo_filtro, $nome_filtro)
    {
        if (empty(trim($nome_filtro)))
            return 0;
        return $this->dao->FiltroEquipamentoDAO($tipo_filtro, $nome_filtro);
    }

    public function DetalharEquipamentoCTRL($id)
    {
        if (empty($id))
            return 0;
        return $this->dao->DetalharEquipamentoDAO($id);
    }

    public function AlterarEquipamentoCTRL(EquipamentoVO $VO): int
    {
        if (empty($VO->getIdentificacao()) or empty($VO->getDescricao()) or empty($VO->getIdTipoEquipamento()) or empty($VO->getIdModelo()))
            return 0;
        $VO->setFuncaoErro(ALTERAR_EQUIPAMENTO);
        $VO->setIdlogado(Util::CodigoLogado());
        return $this->dao->AlterarEquipamentoDAO($VO);
    }

    public function ExcluirEquipamentoCTRL(EquipamentoVO $VO): int
    {
        if (empty($VO->getIdEquipamento()))
            return 0;
        $VO->setFuncaoErro(EXCLUIR_EQUIPAMENTO);
        $VO->setIdlogado(Util::CodigoLogado());

        return $this->dao->DeleteEquipamentoDAO($VO);
    }

    public function SelectAlocarEquipamentoCTRL()
    {
        return $this->dao->SelectEquipamentoDAO();
    }

    public function InsertAlocarEquipamentoCTRL(AlocarVO $vo)
    {
        if (empty($vo->getIdEquipamento()) || empty($vo->getIdSetor()))
            return 0;

        $vo->setSituacao(SITUACAO_ALOCAR_EQUIPAMENTO);    
        $vo->setDataAlocacao(Util::GravaDataAtual());
        $vo->setFuncaoErro(CADASTRO_ALOCAR_EQUIPAMENTO);
        $vo->setIdlogado(Util::CodigoLogado());
        return $this->dao->AlocarEquipamentoDAO($vo);
    }

    public function SelecionarEquipamentoNaoAlocadosCTRL()
    {
       $lista = $this->dao->SelecionarEquipamentoNaoAlocadosDAO(SITUACAO_REMOVER_EQUIPAMENTO);

       for($i = 0; $i < count($lista); $i++):
        $lista[$i]['nome_modelo'] = $lista[$i]['nome_modelo'] . ' / ' . $lista[$i]['nome_tipo'] . ' / ' . $lista[$i]['identificacao'];
       endfor;
       return $lista;
    }
}
