<?php
require_once dirname(__DIR__, 2) . '/resource/dataview/equipamento_dataview.php';
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
                            <h1>Consultar equipamento</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Administrador</a></li>
                                <li class="breadcrumb-item active">Consulta equipamento</li>
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
                        <h3 class="card-title">Aqui você faz a consulta dos seus equipamentos</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="formConsulta" action="consultar_equipamento.php" method="post">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Escolha o filtro</label>
                                    <select id="admPesquise" name="admPesquise" class="form-control select2 obg" style="width: 100%;">
                                        <option value="">Selecione</option>
                                        <option value="<?= FILTRO_TIPO ?>">TIPO</option>
                                        <option value="<?= FILTRO_MODELO ?>">MODELO</option>
                                        <option value="<?= FILTRO_IDENTIFICACAO ?>">IDENTIFICAÇÃO</option>
                                        <option value="<?= FILTRO_DESCRICAO ?>">DESCRIÇÃO</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Escolha o filtro</label>
                                    <input id="filtroPalavra" name="filtroPalavra" class="form-control obg" placeholder="Escolha o filtro">
                                </div>
                                <div class="form-group col-md-4">
                                    <button name="btnPesquisar" id="btnPesquisar" type="button" onclick="return FiltrarPorTipoEquipamento('formConsulta')" class="btn btn-block bg-gradient-primary">Pesquisar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body" id="divResult" style="display: none">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Equipamento cadastrados</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-hover" id="lista">
                                        </table>
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
                </div>
            </section>
        </div>
        <!-- /.card -->
        <!-- /.content -->
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
    <script src="../../resource/ajax/equipamento-ajx.js"></script>
</body>

</html>