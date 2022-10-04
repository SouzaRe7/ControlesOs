<?php

#fuções
const CADASTRO_TIPO_EQUIPAMENTO = "CadastrarTipoEquipamento";
const CADASTRO_SETOR = "CadastrarSetor";
const CADASTRO_MODELO = "CadastrarModelo";
const CADASTRO_EQUIPAMENTO = "CadastroEquipamento";
const CADASTRO_ALOCAR_EQUIPAMENTO = "CadastroAlocarEquipamento";

const ALTERAR_TIPO_EQUIPAMENTO = "AlterarTipoEquipamento";
const ALTERAR_SETOR = "AlterarSetor";
const ALTERAR_MODELO = "AlterarModelo";
const ALTERAR_EQUIPAMENTO = "AlterarEquipamento";

const EXCLUIR_TIPO_EQUIPAMENTO = "ExcluirTipoEquipamento";
const EXCLUIR_SETOR = "ExcluirSetor";
const EXCLUIR_MODELO = "ExcluirModelo";
const EXCLUIR_EQUIPAMENTO = "ExcluirEquipamento";

#dados combo filtro
const FILTRO_TIPO = 1;
const FILTRO_MODELO = 2;
const FILTRO_IDENTIFICACAO = 3;
const FILTRO_DESCRICAO = 4;

#SITUAÇÃO EQUIPAMENTO
const SITUACAO_ALOCAR_EQUIPAMENTO = 1;
const SITUACAO_REMOVER_EQUIPAMENTO = 2;
const SITUACAO_MANUTENCAO_EQUIPAMENTO = 3;

#Perfil para logar
const PERFIL_ADM = 1;
const PERFIL_FUNCIONARIO = 2;
const PERFIL_TECNICO = 3;

define('PATH_URL', $_SERVER["DOCUMENT_ROOT"] . '/ControlesOs1/src/');
