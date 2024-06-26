<?php
include_once '_include_autoload.php';

use Src\_public\Util;

Util::VerificarLogin();

use Src\VO\EquipamentoVO;
use Src\controller\TipoEquipController;
use Src\controller\ModeloController;
use Src\controller\NovoEquipController;

$ctrl = new NovoEquipController();

$id = '';
if (isset($_GET['Cod']) and is_numeric($_GET['Cod'])) :
   $ctrlEquipamento = new NovoEquipController();
   $id = $_GET['Cod'];
   $dados = $ctrlEquipamento->DetalharEquipamentoCTRL($id);
   if (empty($dados)) :
      Util::ChamarPagina("consultar_equipamento.php");
   else :
      $tipoEquipamentosCTRL = new TipoEquipController();
      $modeloCTRL = new ModeloController();
      $dadosTipoEquipamentos = $tipoEquipamentosCTRL->SelecioneTipoEquipamentoCtrl();
      $dadosModelo = $modeloCTRL->SelecioneModeloCtrl();
   endif;

elseif (isset($_POST['btnGravar'])) :
   $ctrl = new NovoEquipController();
   $vo = new EquipamentoVO();
   $vo->setIdentificacao($_POST['admIdentificacao']);
   $vo->setDescricao($_POST['admObs']);
   $vo->setIdTipoEquipamento($_POST['admTipo']);
   $vo->setIdModelo($_POST['admModelo']);
   $vo->setIdEquipamento($_POST['cod']);
   
   if (empty($vo->getIdEquipamento())) :
      $ret = $ctrl->CadastrarEquipamentoCTRL($vo);
   else :
      $ret = $ctrl->AlterarEquipamentoCTRL($vo);
   endif;
   if ($_POST['btnGravar'] == 'ajx') :
      echo $ret;
   endif;

elseif(isset($_POST['btnExcluir'])):
   $vo = new EquipamentoVO();
   $vo->setIdEquipamento($_POST['modalExcluirID']);
   $ret = $ctrl->ExcluirEquipamentoCTRL($vo);
   if($_POST['btnExcluir'] == 'ajx'):
      echo $ret;
   endif;
elseif (isset($_POST['btnPesquisar'])) :
   $ctrl = new NovoEquipController();
   $tipo_filtro = $_POST['idTipo'];
   $nome_palavra = $_POST['filtroPalavra'];
   $novosEquipamento = $ctrl->FiltrarEquipamentoCTRL($tipo_filtro, $nome_palavra);
   if (count($novosEquipamento) == 0) :
      echo -3;
   else :
?>
      <table class="table table-hover" id="lista">
         <thead>
            <tr>
               <th>Ação</th>
               <th>Tipo</th>
               <th>Modelo</th>
               <th>Identificação</th>
               <th>Descrição</th>
            </tr>
         </thead>
         <tbody>
         <?php for ($i = 0; $i < count($novosEquipamento); $i++ ) : ?>
               <tr>
                  <td>
                     <a href="novo_equipamento.php?Cod=<?= $novosEquipamento[$i]['id'] ?>" class="btn btn-warning btn-xs">Alterar</a>
                     <a onclick="CarregarModalExcluir('<?= $novosEquipamento[$i]['id'] ?>','<?= $novosEquipamento[$i]['nomeTipo'] ?>')" data-toggle="modal" data-target="#modal-excluir" class="btn btn-danger btn-xs">Excluir</a>
                  </td>
                  <td><?= $novosEquipamento[$i]['nomeTipo'] ?></td>
                  <td><?= $novosEquipamento[$i]['nomeModelo'] ?></td>
                  <td><?= $novosEquipamento[$i]['identificacao'] ?></td>
                  <td><?= $novosEquipamento[$i]['descricao'] ?></td>
               </tr>
            <?php endfor; ?>
         </tbody>
      </table>

<?php endif;
else :
   $tipoEquipamentosCTRL = new TipoEquipController();
   $modeloCTRL = new ModeloController();
  
   $dadosTipoEquipamentos = $tipoEquipamentosCTRL->SelecioneTipoEquipamentoCtrl();
   $dadosModelo = $modeloCTRL->SelecioneModeloCtrl();

endif;
?>