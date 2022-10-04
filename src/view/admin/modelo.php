<?php
require_once dirname(__DIR__, 2) . '/resource/dataview/modelo_dataview.php';
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
                            <h1>Gerenciar modelo de equipamento</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Administrador</a></li>
                                <li class="breadcrumb-item active">Gerenciar modelo</li>
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
                        <h3 class="card-title">Aqui você gerencia todos os modelos de modelos de equipamentos cadastrados</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="formModelo" action="modelo.php" method="post">
                            <div class="form-group">
                                <label>Nome do modelo</label>
                                <input id="admNome" name="admNome" class="form-control obg" placeholder="Nome do modelo">
                            </div>
                            <div class="form-group">
                                <button onclick=" return CadastrarModeloAjx('formModelo')" type="button" id="btnGravar" name="btnGravar" class="btn btn-block btn-primary col-md-4">Gravar</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Modelos cadastrados</h3>
                                        <div class="card-tools">
                                            <div class="input-group input-group-sm" style="width: 150px;">
                                                <input onkeyup="FiltrarModeloAJAX(this.value)" type="text" name="table_search" class="form-control float-right" placeholder="Pesquisa">
                                            </div>
                                        </div>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body table-responsive p-0">
                                            <table class="table table-hover" id="listaModelo">
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
                                            <form id="modelo" action="modelo.php" method="post">
                                                <?php include_once 'modal/modalAlterarModelo.php'; ?>
                                            </form>
                                            <form action="modelo.php" method="post">
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
    <script src="../../resource/ajax/modelo-ajx.js"></script>
</body>

</html>