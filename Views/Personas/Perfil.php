<?php require_once 'Views/Template/header_lateral.php'; 

 ?>
  <!--Profile Card 3-->
<div class="row">
  <div class="profile">
    <main class="app-content">
      <div class="row ">
        <div class="card-header">
          <div class="col-md-12">
            <div class="profile">
              <div class="info text-center"><img class="user-img" src="<?= media();?>/img/userbg.png">
                <!-- <h4>Usuario: <?= $_SESSION['userData']['nombre_usuario'].' '.$_SESSION['userData']['apellidos']; ?></h4> -->
                <h4>Bienvenid@ : <?= $data['nombres']?></h4>
                <p> <?= $_SESSION['userData']['nombre']; ?></p>
              </div>
              <div class="cover-image"></div>
            </div>
          </div>
        </div>         
      </div>
    </main>
  <div class="row">  
    <div class="col-md-3">
      <div class="tile p-0">
        <ul class="nav flex-column nav-tabs user-tabs">
          <li class="nav-item"><a class="nav-link active" href="#user-timeline" data-toggle="tab">Datos Personales </a></li> 
        </ul>
      </div>
    </div>
    <div class="col-md-9">
      <div class="tab-content">
        <div class="tab-pane active" id="user-timeline">
          <div class="timeline-post">
            <div class="post-media">
              <div class="content">
                <h5>DATOS PERSONALES  </h5>
                <!-- <button type="button" class="btn btn-primary" onclick="EditarPersona(".<?php echo $_SESSION['idUsuario'];?> ." );" > <ion-icon name="create-outline"></ion-icon></button> -->
                <!-- <h1><button class="btn btn-primary" onclick="EditarPersona(<?php echo $_SESSION['idUsuario']; ?>)"><i class="fas fa-edit "></i> </button></h1> -->
              </div>
            </div>
            <table class="table table-bordered" >
              <tbody>
                <tr>
                  <td style="width:150px;">Carnet:</td>
                  <td><?=  $data['carnet']; ?></td>
                </tr>
				<tr>
					<td>Usuario</td>
					<td><?= $_SESSION['userData']['nombre_usuario']?> </td>
				</tr>
                <tr>
                  <td>Nombres:</td>
                  <td><?=  $data['nombres']; ?></td>
                </tr>
                <tr>
                  <td>Apellidos:</td>
                  <td><?=  $data['apellido_paterno'].' '.$data['apellido_materno'];?></td>
                </tr>
                <tr>
                  <td>Teléfono:</td>
                  <td><?=  $data['telefono']; ?></td>
                </tr>
                <tr>
                  <td>Email:</td>
                  <td><?=  $data['e_mail']; ?></td>
                </tr>
                <tr>
                  <td>Direccion: </td>
                  <td><?=  $data['direccion']; ?></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>        
      </div>
    </div>
</div>
  </div>
</div>

