
<nav id="sidebar" class="">
  <div class="sidebar-header" >
     <div class="logo-details">
        <div  class="col-xs-3 ">
          <a href="<?php echo base_url(); ?>Dashboard/mostrarAdministrador" style="color:white"> 
			<img src='<?php echo base_url() ?>Assets/img/EIS-PDM.jpg'   style="width: 50px;" />
			<span class="fs-6 fw-semibold "  >SIWEBPI</span>	
		  </a>
        </div>
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
      <?php if(!empty($_SESSION['permisos'][13]['r']) || !empty($_SESSION['permisos'][14]['r']))
        {?>

      <li class="dropdown" >  
        <a href="#submenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">      
          <i class='bx bxs-file-txt'></i>
          <span class="links_name">Convenios</span></a>
          <span class="tooltip">Convenios</span>
        <ul class="collapse list-unstyled menu" id="submenu1" >
        <?php if(!empty($_SESSION['permisos'][13]['r']))
        {?>
          <li class="ms-4">
            <a class="link_name"  href="<?php echo base_url();?>Convenios" >Convenios</a>
          </li>
        <?php } ?>
          <?php if( !empty($_SESSION['permisos'][14]['r']))
        {?>
          <li class="ms-4">
            <a href="<?php echo base_url();?>TipoConvenios">Tipos de Convenios</a>
          </li>
          <?php } ?>
        </ul>
      </li>
      <?php  } ?>    
     
      <?php if(!empty($_SESSION['permisos'][3]['r']))
        {?>
      <li>
        <a href="<?php echo base_url();?>Estudiantes">
          <i class='bi bi-people' ></i>
          <span class="links_name">Estudiantes</span>
        </a>
        <span class="tooltip">Estudiantes</span>
      </li>
      <?php }?>
      <!-- SOLICITUDES DE ESTUDIANTES ANTIGUOS QUE NO ESTAN REGISTRADOS EN EL SISTEMA-->
      <?php if(!empty($_SESSION['permisos'][18]['r']))
        {?>
      <li>
        <a href="<?php echo base_url();?>SolicitudesEstudiantesAntiguos">
			<i class="bi bi-people-fill"></i>
          <span class="links_name">Solicitud de nuevos usuarios</span>
        </a>
        <span class="tooltip">Estudiantes</span>
      </li>
      <?php }?>
      <?php if(!empty($_SESSION['permisos'][15]['r']) || !empty($_SESSION['permisos'][19]['r']))
        {?>
      <li class="dropdown">
        <a href="#submenu9" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
          <i class="bi bi-people-fill"></i>
          <span class="links_name">Docentes</span>
        </a>
        <span class="tooltip">Docentes</span>
        <ul class="collapse list-unstyled menu" id="submenu9" >
        <?php if(!empty($_SESSION['permisos'][15]['r']))
        {?>
        <li class="ms-4">
            <a href="<?php echo base_url();?>Docentes">Docentes</a>
          </li>
          <?php }?>
          <?php if(!empty($_SESSION['permisos'][19]['r']))
        {?>
          <li class="ms-4">
            <a href="<?php echo base_url();?>Materias">Materias </a>
          </li>
          <?php }?>
        </ul>
      </li>
    
      <?php }?>
      <?php if(!empty($_SESSION['permisos'][6]['r']) ||!empty($_SESSION['permisos'][9]['r'] ) || !empty($_SESSION['permisos'][10]['r']))
        {?>
      <li class="dropdown">
        <a href="#submenu7" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            <i class='bx bx-user' ></i>
            <span class="links_name">Carreras-Sedes</span>
          </a>
          <span class="tooltip">Carreras</span>
          <ul class="collapse list-unstyled menu" id="submenu7" >
          <?php if(!empty($_SESSION['permisos'][6]['r']))
        {?>
            <li class="ms-4">
              <a href="<?php echo base_url();?>CarreraSede">Nueva Carrera-Sede</a>
            </li>
            <?php }?>
            <?php if(!empty($_SESSION['permisos'][9]['r']))
        {?>
            <li class="ms-4">
              <a href="<?php echo base_url();?>Carreras">Carreras</a>
            </li>
            <?php }?>
            <?php if(!empty($_SESSION['permisos'][10]['r']))
        {?>
            <li class="ms-4">
              <a href="<?php echo base_url();?>Sedes">Sedes</a>
            </li>
            <?php }?>
          </ul>
        </li>
        <?php }?>
        <?php if(!empty($_SESSION['permisos'][8]['r']))
        {?>
      <li class="dropdown" >
       <a href="#submenu4" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
         <i class='bx bxs-user-circle  ' ></i>
         <span class="links_name">Administrativos</span>
       </a>
       <span class="tooltip">Administrativos</span>
        <ul class="collapse list-unstyled menu" id="submenu4" >
          <li class="ms-4">
            <a href="<?php echo base_url();?>Administrativos">Administrativos</a>
          </li>
          <li class="ms-4">
            <a href="<?php echo base_url();?>Cargos">Cargos</a>
          </li>
        </ul>
      </li>
      <?php }?>
      <?php if(!empty($_SESSION['permisos'][5]['r']))
        {?>
      <li>
        <a href="<?php echo base_url();?>Empresas">
          <i class='bx bxs-building ' ></i>
          <span class="links_name">Empresas</span>
        </a>
        <span class="tooltip">Empresas</span>
      </li>
      <?php }?>
      <?php if(!empty($_SESSION['permisos'][17]['r']))
        {?>
      <li class="dropdown">
        <a href="#submenu5" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> 
        <i class="bi bi-file-pdf-fill"></i>
          <span class="links_name">Archivos</span>
        </a>
        <span class="tooltip">Archivos</span>
        <ul class="collapse list-unstyled menu" id="submenu5" >
          <li class="ms-4">
            <a href="<?php echo base_url();?>SolicitudPasantias/formulario">Formulario Pri-100</a>
          </li>
        </ul>
        <ul class="collapse list-unstyled menu" id="submenu5" >
          <li class="ms-4">
            <a href="<?php echo base_url();?>SolicitudPasantias/formulario1">Evaluación Pri-100</a>
          </li>
        </ul>
      </li>
      <?php }?>
   
      <?php if(!empty($_SESSION['permisos'][16]['r']))
        { ?>
      <li>
        <a href="<?php echo base_url();?>Publicaciones">
          <i class="bi bi-file-text-fill"></i>
          <span class="links_name">Publicaciones</span>
        </a>
        <span class="tooltip">Publicaciones</span>
      </li>
      <?php } ?>
 
    <?php if(!empty($_SESSION['permisos'][2]['r']) || !empty($_SESSION['permisos'][11]['r']))
        { ?>
     <li class="dropdown">
       <a href="#submenu6" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">

         <i class='bx bx-user' ></i>
         <span class="links_name">Usuarios</span>
       </a>
       <span class="tooltip">Usuarios</span>
       <ul class="collapse list-unstyled menu" id="submenu6" >
       <?php if(!empty($_SESSION['permisos'][2]['r']) ) { ?>
          <li class="ms-4">
            <a href="<?php echo base_url();?>Usuarios">Usuarios</a>
          </li>
          <?php } ?>
          <?php if(!empty($_SESSION['permisos'][11]['r'])) { ?>
          <li class="ms-4">
            <a href="<?php echo base_url();?>Roles">Roles</a>
          </li>
          <?php } ?>
       </ul>
    
     </li>
     <?php } ?>
     <?php if(!empty($_SESSION['permisos'][4]['r']))
        { ?>
     <li>
       <a href="<?php echo base_url();?>SolicitudPasantias">
        <i class='bx bxs-envelope' ></i>
         <span class="links_name">Solicitud de Pasantia</span>
       </a>
       <span class="tooltip">Solicitud</span>
     </li>
     <?php } ?>
     <?php if(!empty($_SESSION['permisos'][14]['r']))
        { ?>
     <!--
	 <li>
       <a href="#">
         <i class='bx bx-cog' ></i>
         <span class="links_name">Ajustes</span>
       </a>
       <span class="tooltip">Ajustes</span>
     </li>
	 -->
     <?php }?>
     <li class="profile">
         <div class="profile-details">
		 <a id="salir" style="color:#rgb(22,8,140)" onclick="salir();"><i class='bx bx-log-out '  ></i> <span class="salir">SALIR</span></a>
         </div>
         
     </li>
    </ul>

  </nav>

  

