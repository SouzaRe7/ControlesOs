<?php
include_once '_include_autoload.php';

use Src\VO\ModeloVO;
use Src\controller\ModeloController;
use Src\model\ModeloDAO;

$ctrl = new ModeloController();

if (isset($_POST['btnGravar'])) :
    $vo = new ModeloVO();
    $vo->setNomeModelo($_POST['admNome']);
    $ret = $ctrl->CadastrarModelo($vo);
    if ($_POST['btnGravar'] == 'ajx') :
        echo $ret;
    else :
        $dados = $ctrl->SelecioneModeloCtrl();
    endif;
elseif (isset($_POST['btnAlterar'])) :
    $vo = new ModeloVO();
    $vo->setIdM($_POST['modalModeloID']);
    $vo->setNomeModelo($_POST['modalModeloNome']);
    $ret = $ctrl->AlterarModeloCTRL($vo);
    if ($_POST['btnAlterar'] == 'ajx') :
        echo $ret;
    else :
        $dados = $ctrl->SelecioneModeloCtrl();
    endif;
elseif (isset($_POST['btnExcluir'])) :
    $vo = new ModeloVO();
    $vo->setIdM($_POST['modalExcluirID']);
    $ret = $ctrl->ExcluirModeloCTRL($vo);
    if ($_POST['btnExcluir'] == 'ajx') :
        echo $ret;
    else :
        $dados = $ctrl->SelecioneModeloCtrl();
    endif;
elseif (isset($_POST['ConsultarAJX']) and $_POST['ConsultarAJX'] == 'ok') :
    $dados = $ctrl->SelecioneModeloCtrl(); ?>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Ação</th>
                <th>Nome do modelo</th>

            </tr>
        </thead>
        <tbody>
            <?php for ($i = 0; $i < count($dados); $i++) : ?>
                <tr>
                    <td>
                        <a onclick="CarregarAlteracaoModelo('<?= $dados[$i]['id'] ?>','<?= $dados[$i]['nome'] ?>')" data-toggle="modal" data-target="#modal-modelo" class="btn btn-warning btn-xs">Alterar</a>
                        <a onclick="CarregarModalExcluir('<?= $dados[$i]['id'] ?>','<?= $dados[$i]['nome'] ?>')" data-toggle="modal" data-target="#modal-excluir" class="btn btn-danger btn-xs">Excluir</a>
                    </td>
                    <td><?= $dados[$i]['nome'] ?></td>
                </tr>
            <?php endfor; ?>
        </tbody>
    </table>
<?php elseif (isset($_POST['FiltrarAJX']) and isset($_POST['nome_filtro'])) :
    $dados = $ctrl->FiltrarModeloCTRL($_POST['nome_filtro']); ?>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Ação</th>
                <th>Nome do modelo</th>

            </tr>
        </thead>
        <tbody>
            <?php for ($i = 0; $i < count($dados); $i++) : ?>
                <tr>
                    <td>
                        <a onclick="CarregarAlteracaoModelo('<?= $dados[$i]['id'] ?>','<?= $dados[$i]['nome'] ?>')" data-toggle="modal" data-target="#modal-modelo" class="btn btn-warning btn-xs">Alterar</a>
                        <a onclick="CarregarModalExcluir('<?= $dados[$i]['id'] ?>','<?= $dados[$i]['nome'] ?>')" data-toggle="modal" data-target="#modal-excluir" class="btn btn-danger btn-xs">Excluir</a>
                    </td>
                    <td><?= $dados[$i]['nome'] ?></td>
                </tr>
            <?php endfor; ?>
        </tbody>
    </table>
<?php else : $dados = $ctrl->SelecioneModeloCtrl();
endif; ?>