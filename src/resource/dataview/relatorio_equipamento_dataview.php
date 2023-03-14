<?php
include_once '_include_autoload.php';
use Src\_public\Util;
Util::VerificarLogin();
// reference the Dompdf namespace
use Dompdf\Dompdf;
use Src\controller\NovoEquipController;

if (isset($_GET['filtro']) And isset($_GET['desc_filtro'])){
    $ctrl = new NovoEquipController();
    $tipo_filtro = $_GET['filtro'];
    $nome_palavra = $_GET['desc_filtro'];
    $novosEquipamento = $ctrl->FiltrarEquipamentoCTRL($tipo_filtro, $nome_palavra);

    $table_begin = '<h1><center>Equipamento Cadastrados</center></h1><hr>';
    $table_begin .= '
    <table class="table table-hover" width="100%">
         <thead>
            <tr>
               <th>Tipo</th>
               <th>Modelo</th>
               <th>Identificação</th>
               <th>Descrição</th>
            </tr>
         </thead>
         <tbody>';
         $row = '';
          for ($i = 0; $i < count($novosEquipamento); $i++ ) : 
         $row .= '<tr>
                  <td>'. $novosEquipamento[$i]['nomeTipo'] .'</td>'.
                  '<td>'. $novosEquipamento[$i]['nomeModelo'] .'</td>'.
                  '<td>'. $novosEquipamento[$i]['identificacao'] .'</td>'.
                  '<td>'. $novosEquipamento[$i]['descricao'] .'</td>'.
               '</tr>';
             endfor; 
$table_end ='</tbody></table>';

$table_completo = $table_begin.$row.$table_end;
// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml($table_completo);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();
} else {
    Util::ChamarPagina('consultar_equipamento');
}