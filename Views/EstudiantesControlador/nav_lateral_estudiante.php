
<nav id="sidebar" class="">
  <div class="sidebar-header">
    <div class="logo-details">
      <h3><img src='<?php echo base_url() ?>Assets/img/EIS-PDM.jpg'  class="img-fluid" />
        <div  class="col-xs-3 logo_name">
          <a href="<?php echo base_url(); ?>Dashboard/mostrarAdministrador" style="color:white">PRACTICAS INDUSTRIALES</a>
        </div></h3>
        <!--<i class='bx bx-menu' id="btn" onclick="w3_close()"></i>las rayitas-->
    </div>
  </div>

    <ul class="list-unstyled components">
      <!--
      <li >
          <i class='bx bx-search' id="search" ></i>
         <input type="text" placeholder="Buscar...">
         <span class="tooltip">Buscar</span>
      </li>
      -->
      <li >  
        <a class="link_name"  href="<?php echo base_url();?>Convenios" >      
          <i class='bx bxs-file-find bx-tada' ></i>
          <span class="links_name">Convenios</span>
        </a>
        <span class="tooltip">Convenios</span>
      </li>

      <!--
      <li>
        <a href="<?php echo base_url();?>estudiantes">
          <i class='bi bi-people' ></i>
          <span class="links_name">Estudiantes</span>
        </a>
        <span class="tooltip">Estudiantes</span>
      </li>
      -->


      <li>
        <a href="<?php echo base_url();?>EstudiantesControlador/ListarPublicaciones">
          <i class="bi bi-file-text-fill"></i>
          <span class="links_name">Publicaciones</span>
        </a>
        <span class="tooltip">Publicaciones</span>
      </li>
      <li>
       <!--<a href="<?php echo base_url();?>solicitudPasantiasEstudiantes">
       
       <a href="" onClick="fntSolicitud('.$arrData[$i]['id_estudiante'].')">-->
       <a href="<?php echo base_url();?>solicitudPasantias">
        <i class='bx bxs-envelope bx-tada bx-rotate-90' ></i>
        <span class="links_name">Solicitud Carta de Pasantia</span>
       </a>
       <span class="tooltip">Solicitud</span>
     </li>
     <li class="dropdown">
        <a href="#submenu5" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> 
          <i class='bx bxs-file-pdf bx-burst' ></i>
          <span class="links_name">Archivos</span>
        </a>
        <span class="tooltip">Archivos</span>
        <!--
        <ul class="collapse list-unstyled menu" id="submenu5" >
          <li class="ms-4">
            <a href="<?php echo base_url();?>SolicitudPasantias/formulario">Formulario Pri-100</a>
          </li>
        </ul>
        -->
        <ul class="collapse list-unstyled menu" id="submenu5" >
          <li class="ms-4">
            <a href="<?php echo base_url();?>SolicitudPasantias/formulario1">Evaluación Pri-100</a>
          </li>
        </ul>
      </li>

     <li>
       <a href="#">
         <i class='bx bx-cog' ></i>
         <span class="links_name">Perfil</span>
       </a>
       <span class="tooltip">Ajustes</span>
     </li>
     <li class="profile">
         <div class="profile-details">
           <!--<img src="<?php echo base_url() ?>Assets/img/EIS-PDM.jpg" alt="profileImg">-->
           <!--
           <div class="name_job">
             <div id="name" class="name">SALIR</div>
             <div class="job"></div>
           </div>
           -->
         </div>
         <a id="salir" href="<?php echo base_url(); ?>Home/salir" style="color:#rgb(22,8,140)"><i class='bx bx-log-out'   id="log_out"  ></i>SALIR</a>
     </li>
    </ul>

  </nav>

  

