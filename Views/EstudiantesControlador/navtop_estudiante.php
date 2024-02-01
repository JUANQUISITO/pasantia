<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">  
    <button type="button" id="sidebarCollapse" class="d-xl-block d-lg-block d-md-mone d-none">
      <span class=""><i class='bx bx-menu' ></i></span>
    </button>
    					  
<!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item d-none d-sm-inline-block">
        <a class="navbar-brand" href="<?php echo base_url(); ?>EstudiantesControlador/estudiantesListar" class="nav-link">Inicio</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a class="navbar-brand" href="#" class="nav-link">Publicaciones</a>
      </li>
    </ul>

    <button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="material-icons"><i class='bx bx-menu' ></i></span>
    </button>
    <!-- Right navbar links -->
    <div class="collapse navbar-collapse d-lg-block d-xl-block d-sm-none d-md-none d-none" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        


        <!-- Mensajes Dropdown Menu -->
        <li class="dropdown nav-item active">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-comments"></i>
            <span class="badge badge-danger navbar-badge">3</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="#" class="dropdown-item">

              <!-- Message Start -->
              <div class="media">
                <img src='<?php echo base_url() ?>Assets/img/userbg.png' alt="User Avatar" class="img-size-50 mr-3 img-circle">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Brad Diesel
                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">Call me whenever you can...</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src='<?php echo base_url() ?>Assets/img/userbg.png' alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    John Pierce
                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">I got your message bro</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src='<?php echo base_url() ?>Assets/img/userbg.png' alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Nora Silvester
                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">The subject goes here</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>

            <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item dropdown-footer">Ver todos los mensajes</a>
            </div>
        </li>

        <!-- NOTIFICACIONES Dropdown Menu -->

        <li class="dropdown nav-item active">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">3</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">3 Notificaciones</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              
              <span class="float-right text-muted text-sm">3 min</span>
            </a>
            <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-users mr-2"></i> 
                <p>Se requieren nuevos pasantes</p>
                <span class="float-right text-muted text-sm">12 horas</span>
              </a>
            <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                  <i class="fas fa-file mr-2"></i> 3 revise las publicaciones
                  <span class="float-right text-muted text-sm">2 dias</span>
                </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">Ver todas las publicaciones</a>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-capitalize" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">  <?= ( $_SESSION['userData']['nombre_usuario']);?> <i class="fas fa-user fa-fw"></i></a>
                
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="<?php echo base_url(); ?>Personas/getPersona"  >Perfil </a>
                   
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" onclick="salir();" href="<?php echo base_url(); ?>Home/salir">Salir</a>
                </div>
            </li>
        </ul>

              <!-- Log out               
              <div class="list-inline-item logout">
                  <button class="btn btn-light" onclick="salir();" style="background-color: #16088C;color:white;" type="button" data-toggle="modal" data-target="#logout">Salir</button>
              </div>
              -->
              <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
              <script src="<?php echo base_url() ?>Assets/js/funciones_sweetalert.js"></script>
      </ul>
    </div>
  </div>  
</nav>