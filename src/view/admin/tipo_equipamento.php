<?php
require_once dirname(__DIR__, 2) . '/resource/dataview/tipoEquipamento_dataview.php';
?>
<!DOCTYPE html>
<html>

<head>
    <?php include_once PATH_URL . '/template/_includes/_head.php' ?>
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <?php
        include_once PATH_URL . '/template/_includes/_topo.php';
        include_once PATH_URL . '/template/_includes/_menu.php';
        ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Tipo de equipamento</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Administrador</a></li>
                                <li class="breadcrumb-item active">Gerenciar equipamemto</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content">
                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Aqui você gerencia todos os tipos de equipamentos</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form name="formTipoE" id="formTipoE" action="tipo_equipamento.php" method="post">
                            <div class="form-group">
                                <label>Nome do equipamemto</label>
                                <input id="admNome" name="admNome" class="form-control obg" placeholder="Nome do equipamento">
                            </div>
                            <div class="form-group">
                                <button id="btnGravar" onclick="return CadastrarTipoEquipamentoAjx('formTipoE')" name="btnGravar" type="button" class="btn btn-primary col-md-4">Gravar</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Tipos de equipamentos</h3>
                                        <div class="card-tools">
                                            <div class="input-group input-group-sm" style="width: 150px;">
                                                <input onkeyup="FiltrarTipoEquipamentoAJAX(this.value)" type="text" name="table_search" class="form-control float-right" placeholder="Pesquisa">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-hover" id="lista">
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
                                        <form id="tipo" action="tipo_equipamento.php" method="post">
                                            <?php include_once 'modal/modalAlterarTipoEquipamento.php'; ?>
                                        </form>
                                        <form action="tipo_equipamento.php" method="post">
                                            <?php include_once 'modal/modalExcluir.php'; ?>
                                        </form>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>
                    </div>
                    <div id="divLoad"></div>
                </div>
                <!-- /.card -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php include_once PATH_URL . '/template/_includes/_footer.php' ?>
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <?php include_once PATH_URL . '/template/_includes/_script.php';
    include_once PATH_URL . '/template/_includes/_msg.php'; ?>
    <script src="../../resource/ajax/tipoEquipamento-ajx.js"></script>
</body>

</html>