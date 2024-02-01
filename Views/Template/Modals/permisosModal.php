
<div class="modal fade " id="modalFormPermisos" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Permisos Roles de Usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
    <form action="" id="formPermisos" name="formPermisos" >
      <input type="hidden" name="idRol" id="idRol" value="<?php echo $data['id_rol']; ?>">
      <div class="table-responsive">
        <table class="table ">
        <thead>
            <tr>
                <th scope=" col">#</th>
                <th scope="col">Modulos</th>
                <th scope="col">Ver</th>
                <th scope="col">Crear</th>
                <th scope="col">Actualizar</th>
                <th scope="col">Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $nro = 1;
                $modulos = $data['modulos'];
                for ($i=0; $i <count($modulos) ; $i++) { 
                    $permisos = $modulos[$i]['permisos'];
                    $rCheck = $permisos['r']== 1 ? " checked " : "";
                    $wCheck = $permisos['w']== 1 ? " checked " : "";
                    $uCheck = $permisos['u']== 1 ? " checked " : "";
                    $dCheck = $permisos['d']== 1 ? " checked " : "";

                    $idmod = $modulos[$i]['id_modulo'];
                
            ?>
            <tr>
            <td><?= $nro;?></td>
            <td><?php echo $modulos[$i]['nombre']; ?></td>
            <input class="form-check-input" type="hidden" name="modulos[<?=$i;?>][id_modulo]"value="<?= $idmod;?>" role="switch"  id="toogle">
            <td>
                <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" name="modulos[<?=$i;?>][r]"<?= $rCheck ?> role="switch"  id="toogle">
                <label class="form-check-label" for="toogle">ON</label>
                </div>
            </td>
            <td>
                <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" name="modulos[<?=$i;?>][w]"<?= $wCheck ?> role="switch"  data-toogle-on="ON" data-toogle-off="OFF" >
                <label class="form-check-label" for="toogle">ON</label>
                </div>
            </td>
            <td>
                <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" name="modulos[<?=$i;?>][u]"<?= $uCheck ?> role="switch"  id="toogle">
                <label class="form-check-label" for="toogle">ON</label>
                </div>
            </td>
            <td>
                <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" name="modulos[<?=$i;?>][d]"<?= $dCheck ?>  role="witch"  id="toogle">
                <label class="form-check-label" for="toogle">ON</label>
                </div>
            </td>

            </tr>
            <tr>
            <?php $nro++; } ?>
        </tbody>
        </table>
      </div>
    
      <div class="modal-footer ">
        <button type="button" class="btn btn-secondary text-center" data-bs-dismiss="modal">Cerrar</button>
        <button class="btn btn-primary text-center" type="submit">Guardar</button>
      </div>
      </form>
      </div>
    </div>
  </div>
</div>