<?php
require_once dirname(__DIR__, 3) . '/vendor/autoload.php';
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
                            <h1>Atender chamado</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Técnico</a></li>
                                <li class="breadcrumb-item active">Chamado</li>
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
                        <h3 class="card-title">Faça os atendimentos aqui</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="atender_chamado.php" method="post">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Data</label>
                                    <input id="tecDataAt" name="tecDataAt" type="date" class="form-control" />
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Funcionário</label>
                                    <input id="tecNome" name="tecNome" class="form-control" placeholder="Funcionário">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Setor</label>
                                    <input id="tecSetor" name="tecSetor" class="form-control" placeholder="Setor">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Equipamento</label>
                                    <input id="tecEquip" name="tecEquip" class="form-control" placeholder="Equipamento">
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Descrição do problema</label>
                                    <textarea id="tecDesc" name="tecDesc" class="form-control" placeholder="Descrição aqui"></textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Laudo</label>
                                    <textarea id="tecLaudo" name="tecLaudo" class="form-control" placeholder="Laudo aqui"></textarea>
                                </div>
                                <div class="form-group col-md-4">
                                    <button onclick=" return ValidarCampos(14)" name="btnGravar" type="button" class="btn btn-block btn-primary col-md-4">Gravar</button>
                                </div>
                            </div>
                        </form>
                    </div>


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

    <?php include_once PATH_URL . '/template/_includes/_script.php' ?>
</body>

</html>