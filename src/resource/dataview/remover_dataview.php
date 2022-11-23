<?php
include_once '_include_autoload.php';

use Src\_public\Util;
use Src\controller\NovoEquipController;
use Src\controller\setorController;
use Src\VO\AlocarVO;
use Src\VO\SetorVO;

$equip = new NovoEquipController();


if (isset($_POST['btnRemover'])) :
    $vo = new AlocarVO();
    $vo->setId($_POST['id_alocar']);
    $ret = $equip->RemoverEquipamentoSetorCTRL($vo);
    if ($_POST['btnRemover'] == 'ajx') :
        echo $ret;
    endif;
elseif (isset($_POST['filtrar_equipamento_setor'])) :  
    $equip = new NovoEquipController();
    $equipamentos = $equip->SelecionarEquipamentoSetorAlocadoCTRL($_POST['idSetor']); ?>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Ação</th>
                <th>Data Alocação</th>
                <th>Equipamento</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($equipamentos as $e) :?>
            <tr>
                <td>
                    <a href="#" data-toggle="modal" data-target="#modal-RemoverEqSetor" class="btn btn-danger btn-xs" onclick="CarregarModalRemover('<?= $e['alocID'] ?>','<?= $e['TipoEnome'] .' / '. $e['nomeMo'] .' - '. $e['identificacao'] ?>')" >Remover</a>
                </td>
                <td><?= Util::FormatarDataExibir($e['data_alocacao']) ?></td>
                <td><?= $e['TipoEnome'] .' / '. $e['nomeMo'] .' - '. $e['identificacao'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>    
<?php 
else :

$setores = (new setorController)->SelecioneSetorCtrl();
endif;
?>

