<?php
require_once dirname(__DIR__, 2) . '/resource/dataview/usuario_dataview.php';
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
                            <h1>Novo usuário</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Administrador</a></li>
                                <li class="breadcrumb-item active">Cadastro de usuário</li>
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
                        <h3 class="card-title">Aqui você poderá cadastrar seus usuários</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="novo_usuario.php" method="post" id="idForm">
                            <div class="row">
                                <div class="form-group col-md-12" id="idtipo">
                                    <label>Tipo</label>
                                    <select id="Tipo" name="Tipo" class="form-control" onchange="EscolherUsuario(this.value,'idForm')">
                                        <option value="">Selecione</option>
                                        <option value="<?= PERFIL_ADM ?>">Administrador</option>
                                        <option value="<?= PERFIL_FUNCIONARIO ?>">Funcionário</option>
                                        <option value="<?= PERFIL_TECNICO ?>">Técnico</option>
                                    </select>
                                </div>
                                <div class="form-group ocultar col-md-12" id="divNome">
                                    <label>Nome</label>
                                    <input id="Nome" name="Nome" class="form-control obg" placeholder="Nome">
                                </div>
                                <div class="form-group ocultar col-md-12" id="divFunc">
                                    <label>Setor</label>
                                    <select id="Setor" name="Setor" class="form-control">
                                    </select>
                                </div>
                                <div class="form-group ocultar col-md-12" id="divEmp">
                                    <label>Empresa</label>
                                    <input id="Emp" name="Emp" class="form-control" placeholder="Empresa">
                                </div>
                            </div>
                            <div id="divGeral" class="ocultar">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>E-mail</label>
                                        <input id="Email" name="Email" onchange="VerificarEmail(this.value)" class="form-control obg" placeholder="E-mail">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Telefone</label>
                                        <input id="Fone" name="Fone" class="form-control cel obg" placeholder="Telefone">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Cep</label>
                                        <input id="cep" name="cep" class="form-control cep obg" onblur="BuscarCep()" placeholder="Cep">
                                    </div>
                                    <div class="form-group col-md-8">
                                        <label>Rua</label>
                                        <input id="rua" name="rua" class="form-control obg" placeholder="Rua">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Bairro</label>
                                        <input id="bairro" name="bairro" class="form-control obg" placeholder="Bairro">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Cidade</label>
                                        <input id="cidade" name="cidade" class="form-control obg" placeholder="Cidade">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Estado</label>
                                        <input id="uf" name="uf" class="form-control obg" placeholder="Estado">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ocultar" id="divButton">
                                <button onclick="return CadastrarNovoUsuarioAJX('idForm')" name="btnGravar" id="btnGravar" type="button" class="btn btn-block btn-primary col-md-4">Gravar</button>
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
    <?php include_once PATH_URL . '/template/_includes/_script.php';
    include_once PATH_URL . '/template/_includes/_msg.php'; ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="../../resource/ajax/buscar_cep-ajx.js"></script>
    <script src="../../resource/ajax/usuario-ajx.js"></script>
</body>

</html>