<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <!--
      <a href="../../index3.html" class="brand-link">
        <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
          style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
      </a> -->

      <!-- Sidebar -->
      <div class="sidebar">
      <center><i class="fas fa-user" style="font-size: 100px;"></i></center>
        <!-- Sidebar user (optional) -->
        <!--
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">Alexander Pierce</a>
          </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                  <a href="inicial_adm.php" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Início</p>
                  </a>
                </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
              <i class="fas fa-solid fa-wrench nav-icon"></i></i>
                <p>
                  Equipamento
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="novo_equipamento.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Novo Equipamento</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="tipo_equipamento.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Tipo Equipamento</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="modelo.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Modelo Equipamento</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="alocar_equipamento.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Alocar Equipamento</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="consultar_equipamento.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                    <p>Consulta Equipamento</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="remover_equipamento.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Remover Equipamento</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="fas fa-thin fa-sitemap nav-icon"></i>
                <p>
                  Setor
                <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="setor.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Novo Setor</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Pessoas
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="novo_usuario.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Nova Pessoa</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="consultar_usuario.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Consultar Pessoa</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                Meu Perfil
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="mudar_senha.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Mudar Senha</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="meus_dados.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Meus Dados</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="login.php?close=1" class="nav-link">
                <i class="fas fa-power-off nav-icon" style="color: red;" ></i>
                <p>Sair</p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>