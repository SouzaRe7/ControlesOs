<?php

namespace Src\controller;

use Src\_public\Util;
use Src\model\ModeloDAO;
use Src\VO\LogErroVO;
use Src\VO\ModeloVO;

class ModeloController 
{

    private $dao;
    public function __construct()
    {
        $this->dao = new ModeloDAO();
    }
    public function CadastrarModelo(ModeloVO $VO): int
    {
        if (empty($VO->getNomeModelo())) 
            return 0;
            $VO->setFuncaoErro(CADASTRO_MODELO);
            $VO->setIdlogado(Util::CodigoLogado());
        return $this->dao->CadastrarModelo($VO);
    }
    public function SelecioneModeloCtrl()
    {
        return $this->dao->SelecioneModeloDAO();
    }
    public function AlterarModeloCTRL(ModeloVO $VO): int
    {
        if (empty($VO->getNomeModelo()))
            return 0;
            $VO->setFuncaoErro(ALTERAR_MODELO);
            $VO->setIdlogado(Util::CodigoLogado());
        return $this->dao->AlterarSetorDAO($VO);
    }
    public function ExcluirModeloCTRL(ModeloVO $VO): int
    {
        if (empty($VO->getIdM()))
            return 0;
        $VO->setFuncaoErro(EXCLUIR_MODELO);
        $VO->setIdlogado(Util::CodigoLogado());
        return $this->dao->DeleteModeloDAO($VO);
    }
    public function FiltrarModeloCTRL($nome_filtro)
    {
        return $this->dao->FiltrarModeloDAO($nome_filtro);
    }
}
