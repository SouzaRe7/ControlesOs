<?php
include_once '_include_autoload.php';

use Src\_public\Util;

Util::VerificarLogin();

use Src\controller\NovoEquipController;
use Src\controller\setorController;
use Src\VO\AlocarVO;
use Src\VO\SetorVO;

$equip = new NovoEquipController();


if (isset($_POST['btnGravar'])) :
    $vo = new AlocarVO();
    $vo->setIdEquipamento($_POST['admEquipamento']);
    $vo->setIdSetor($_POST['admSetor']);
    $vo->setDataAlocacao(date('Y-m-d'));
    $ret = $equip->InsertAlocarEquipamentoCTRL($vo);
    if ($_POST['btnGravar'] == 'ajx') :
        echo $ret;
    endif;
elseif (isset($_POST['btnPesquisar'])) :  
    $equip = new NovoEquipController();
    $vo = new SetorVO;
    $vo->setIdSetor($_POST['admSetor']);
    $equipamentos = $equip->SelecionarEquipamentoSetorAlocadoCTRL($vo);
    if(count($equipamentos) == 0) :
        echo "-1";  
    else : ?>
    <thead>
        <tr>
            <th>Ação</th>
            <th>Data Alocação</th>
            <th>Tipo Equipamento</th>
            <th>Modelo</th>
            <th>Situação</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($equipamentos as $e) :?>
        <tr>
            <td>
                <a href="#" class="btn btn-danger btn-xs">Excluir</a>
            </td>
            <td><?= $e['data_alocacao'] ?></td>
            <td><?= $e['TipoEnome'] ?></td>
            <td><?= $e['nomeMo'] ?></td>
            <td><?= $e['situacao'] ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
<?php endif;
endif;

$setores = (new setorController)->SelecioneSetorCtrl();

$eqs = $equip->SelecionarEquipamentoNaoAlocadosCTRL();
 ?>

