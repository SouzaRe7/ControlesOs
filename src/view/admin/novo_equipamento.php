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
                            <h1><?= $id == '' ? 'Novo' : 'Alterar' ?> equipamento</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Administrador</a></li>
                                <li class="breadcrumb-item active"><?= $id == '' ? 'Cadastro' : 'Alteração' ?> de equipamento</li>
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
                        <h3 class="card-title">Aqui você poderá <?= $id == '' ? 'cadastrar' : 'alterar' ?> seus equipamentos</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="equipamentoForm" action="novo_equipamento.php" method="post">
                            <input name="cod" id="cod" type="hidden" value="<?= $id ?>">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>Tipo</label>
                                    <select id="admTipo" name="admTipo" class="form-control obg">
                                        <option value="">Selecione</option>
                                        <?php foreach ($dadosTipoEquipamentos as $itemTipoEquipamentos) : ?>
                                            <option value="<?= $itemTipoEquipamentos['id'] ?>" <?= $id == '' ? '' : ($id == $itemTipoEquipamentos['id'] ? '' : 'selected') ?>><?= $itemTipoEquipamentos['nome'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Modelo</label>
                                    <select id="admModelo" name="admModelo" class="form-control select2 obg" style="width: 100%;">
                                        <option value="">Selecione</option>
                                        <?php foreach ($dadosModelo as $itemModelo) : ?>
                                            <option value="<?= $itemModelo['id'] ?>" <?= $id == '' ? '' : ($id == $itemModelo['id'] ? '' : 'selected') ?>><?= $itemModelo['nome'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Identificação</label>
                                    <input id="admIdentificacao" name="admIdentificacao" class="form-control obg" placeholder="Identificação" value="<?= $id == '' ? '' : $dados['identificacao'] ?>">
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Descrição</label>
                                    <textarea id="admObs" name="admObs" class="form-control obg" rows="4" placeholder="Descrição"><?= $id == '' ? '' : $dados['descricao'] ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <button onclick="return CadastrarEquipamentoAjx('equipamentoForm')" name="btnGravar" type="button" class="btn btn-block btn-primary col-md-4">Gravar</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.card -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php include_once PATH_URL . '/template/_includes/_footer.php'; ?>
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