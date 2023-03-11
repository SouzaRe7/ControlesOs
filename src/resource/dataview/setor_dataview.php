<?php
include_once '_include_autoload.php';

use Src\_public\Util;

Util::VerificarLogin();

use Src\VO\SetorVO;
use Src\controller\setorController;

$ctrl = new setorController();

if (isset($_POST['btnGravar'])) :
    $vo = new SetorVO();
    $vo->setNomeSetor($_POST['nome']);
    $ret = $ctrl->CadastrarSetor($vo);
    if ($_POST['btnGravar'] == 'ajx') :
        echo $ret;
    else :
        $dados = $ctrl->SelecioneSetorCtrl();
    endif;
elseif (isset($_POST['btnAlterar'])) :
    $vo = new SetorVO();
    $vo->setIdSetor($_POST['modalSetorID']);
    $vo->setNomeSetor($_POST['modalSetorNome']);
    $ret = $ctrl->AlterarSetorCTRL($vo);
    if ($_POST['btnAlterar'] == 'ajx') :
        echo $ret;
    else :
        $dados = $ctrl->SelecioneSetorCtrl();
    endif;
elseif (isset($_POST['btnExcluir'])) :
    $vo = new SetorVO();
    $vo->setIdSetor($_POST['modalExcluirID']);
    $ret = $ctrl->ExcluirSetorCTRL($vo);
    if ($_POST['btnExcluir'] == 'ajx') :
        echo $ret;
    else :
        $dados = $ctrl->SelecioneSetorCtrl();
    endif;
elseif (isset($_POST['ConsultarAJX']) and $_POST['ConsultarAJX'] == 'ok') :
    $dados = $ctrl->SelecioneSetorCtrl(); ?>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Ação</th>
                <th>Nome do setor</th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i = 0; $i < count($dados); $i++) : ?>
                <tr>
                    <td>
                        <a onclick="CarregarAlteracaoSetor('<?= $dados[$i]['id'] ?>','<?= $dados[$i]['nome_setor'] ?>')" data-toggle="modal" data-target="#modal-setor" class="btn btn-warning btn-xs">Alterar</a>
                        <a onclick="CarregarModalExcluir('<?= $dados[$i]['id'] ?>','<?= $dados[$i]['nome_setor'] ?>')" data-toggle="modal" data-target="#modal-excluir" class="btn btn-danger btn-xs">Excluir</a>
                    </td>
                    <td><?= $dados[$i]['nome_setor'] ?></td>
                </tr>
            <?php endfor; ?>
        </tbody>
    </table>
<?php elseif (isset($_POST['FiltrarAJX']) and isset($_POST['nome_filtro'])) :
    $dados = $ctrl->FiltrarSetorCTRL($_POST['nome_filtro']); ?>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Ação</th>
                <th>Nome do setor</th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i = 0; $i < count($dados); $i++) : ?>
                <tr>
                    <td>
                        <a onclick="CarregarAlteracaoSetor('<?= $dados[$i]['id'] ?>','<?= $dados[$i]['nome_setor'] ?>')" data-toggle="modal" data-target="#modal-setor" class="btn btn-warning btn-xs">Alterar</a>
                        <a onclick="CarregarModalExcluir('<?= $dados[$i]['id'] ?>','<?= $dados[$i]['nome_setor'] ?>')" data-toggle="modal" data-target="#modal-excluir" class="btn btn-danger btn-xs">Excluir</a>
                    </td>
                    <td><?= $dados[$i]['nome_setor'] ?></td>
                </tr>
            <?php endfor; ?>
        </tbody>
    </table>
<?php else : $dados = $ctrl->SelecioneSetorCtrl(); endif; ?>