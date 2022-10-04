<?php
include_once '_include_autoload.php';

use Src\VO\TipoEquipamentoVO;
use Src\controller\TipoEquipController;
use Src\model\TipoEquipamentoDAO;

$ctrl = new TipoEquipController();

if (isset($_POST['btnGravar'])) :
    $vo = new TipoEquipamentoVO();
    $vo->setNome($_POST['admNome']);
    $ret = $ctrl->CadastrarTipoEquipamento($vo);
    if ($_POST['btnGravar'] == 'ajx') :
        echo $ret;
    else :
        $dados = $ctrl->SelecioneTipoEquipamentoCtrl();
    endif;
elseif (isset($_POST['btnAlterar'])) :
    $vo = new TipoEquipamentoVO();
    $vo->setId($_POST['modalTipoID']);
    $vo->setNome($_POST['modalTipoNome']);
    $ret = $ctrl->AlterarTipoEquipamentoCTRL($vo);
    if ($_POST['btnAlterar'] == 'ajx') :
        echo $ret;
    else :
        $dados = $ctrl->SelecioneTipoEquipamentoCtrl();
    endif;
elseif (isset($_POST['btnExcluir'])) :
    $vo = new TipoEquipamentoVO();
    $vo->setId($_POST['modalExcluirID']);
    $ret = $ctrl->ExcluirTipoEquipamentoCTRL($vo);
    if ($_POST['btnExcluir'] == 'ajx') :
        echo $ret;
    else :
        $dados = $ctrl->SelecioneTipoEquipamentoCtrl();
    endif;
elseif (isset($_POST['ConsultarAJX']) and $_POST['ConsultarAJX'] == 'ok') :
    $dados = $ctrl->SelecioneTipoEquipamentoCtrl(); ?>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Ação</th>
                <th>Nome do equipamento</th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i = 0; $i < count($dados); $i++) : ?>
                <tr>
                    <td>
                        <a onclick="CarregarAlteracaoTipoEquipamento('<?= $dados[$i]['id'] ?>','<?= $dados[$i]['nome'] ?>')" data-toggle="modal" data-target="#modal-tipoEquipamento" class="btn btn-warning btn-xs">Alterar</a>
                        <a onclick="CarregarModalExcluir('<?= $dados[$i]['id'] ?>','<?= $dados[$i]['nome'] ?>')" data-toggle="modal" data-target="#modal-excluir" class="btn btn-danger btn-xs">Excluir</a>
                    </td>
                    <td><?= $dados[$i]['nome'] ?></td>
                </tr>
            <?php endfor; ?>
        </tbody>
    </table>
<?php
elseif (isset($_POST['FiltrarAJX']) and isset($_POST['nome_filtro'])) :
    $dados = $ctrl->FiltrarTipoEquipamentoCTRL($_POST['nome_filtro']); ?>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Ação</th>
                <th>Nome do equipamento</th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i = 0; $i < count($dados); $i++) : ?>
                <tr>
                    <td>
                        <a onclick="CarregarAlteracaoTipoEquipamento('<?= $dados[$i]['id'] ?>','<?= $dados[$i]['nome'] ?>')" data-toggle="modal" data-target="#modal-tipoEquipamento" class="btn btn-warning btn-xs">Alterar</a>
                        <a onclick="CarregarModalExcluir('<?= $dados[$i]['id'] ?>','<?= $dados[$i]['nome'] ?>')" data-toggle="modal" data-target="#modal-excluir" class="btn btn-danger btn-xs">Excluir</a>
                    </td>
                    <td><?= $dados[$i]['nome'] ?></td>
                </tr>
            <?php endfor; ?>
        </tbody>
    </table>
<?php
else :
    $dados = $ctrl->SelecioneTipoEquipamentoCtrl();
endif; ?>