</div>
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p class="copyright d-flex justify-content-end"> Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos los derechos reservados
                                    <i class="ion-ios-heart" style="color:black;" aria-hidden="true"></i>
                                    <a style="color:yellow;" href="https://www.eispdm.com/">www.eispdm.com</a> 
                                </p>
                            </div>
                        </div>
                    </div>
                </footer>

				<!-- base url para js -->
				<script>
							const base_url = "<?= base_url(); ?>";
						</script>
				
				<!---=========== ORDEN EN EL QUE DEBE ESTAR LOS SCRIPTS 
							PRIMERO J QUERY UNA VEZ QUE COMPILE VIENE BOOTSTRAP
													EJEMPLO         ========	

				<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
				========== Latest compiled and minified JavaScript ================
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
				--> 
			<!--==================================================================================
													DATATABLES 
			===================================================================================---->
			<script src="https://code.jquery.com/jquery-3.5.1.js" ></script>
			<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

			
			<!--"Showing 0 to 0 of 0 entries" EN EL DE ARRIBA-->
			<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
			<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
			<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.min.js"></script>

			<script type="application/javascript">
				let tablex = new DataTable('#example', {
					"language": {
					"url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
					},
					responsive: true,
					"bDestroy": true,
					"iDisplayLength": 10,
					//"order":[[0,"desc"]] 
				});
			</script>
			<script type="application/javascript">
				let tablec = new DataTable('#convenios', {
				"language": {
       			 "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
       			 },
					responsive: true,
					"bDestroy": true,
					"iDisplayLength": 10,
					"order":[[0,"desc"]] 
				});
			</script>
			<!--==================================================================================
														END DATATABLES 
			===================================================================================---->	
			<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
			<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
			<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>

			
			<script src="<?php echo base_url(); ?>Assets/js/jquery-3.3.1.min.js"></script> 
			<!--FUNCIONALIDAD AL SIDEBAR Y NAV TOP---  TRADUCIR---->
			<script src="<?php echo base_url(); ?>Assets/js/jquery.min.js"></script>			
			<script src="<?php echo base_url(); ?>Assets/js/popper.js"></script>
			<script src="<?php echo base_url(); ?>Assets/js/bootstrap.min.js"></script>
			<!--==================================================================
										FUNCIONALIDAD COLLAPSE
				===================================================================---->
				
			<script type="text/javascript">
			$(document).ready(function () {
				$('#sidebarCollapse').on('click', function () {
					$('#sidebar').toggleClass('active');
						$('#content').toggleClass('active');
					});
							
					$('.more-button,.body-overlay').on('click', function () {
						$('#sidebar,.body-overlay').toggleClass('show-nav');
					});
							
				});	
			</script>
		
			<!--==================================================================================
													SCRIPTS DE INDEX 3 
			===================================================================================---->			
			<script src="<?php echo base_url() ?>Assets/js/scripts_dash.js"></script>
			<!--<script src="https://cdn.jsdelivr.net/npm/chart.js@latest/dist/Chart.min.js" crossorigin="anonymous"></script>
			<script src="<?php echo base_url() ?>Assets/demo/chart-area-demo.js"></script>
			<script src="<?php echo base_url() ?>Assets/demo/chart-bar-demo.js"></script>-->
			<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
			<script src="<?php echo base_url() ?>Assets/js/datatables-simple-demo.js"></script>
			<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
			<!--==================================================================================
													END SCRIPTS DE INDEX 3 
			===================================================================================---->
			
			<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>	
			<!--==================================================================
									BOOSTRAP 5.1.3
			===================================================================---->				
			<!-- JavaScript Bundle with Popper -->
			<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
			<!--==================================================================
									END	 BOOSTRAP 5.1.3
			===================================================================---->

			<script src="<?php echo base_url() ?>Assets/js/funciones_convenios.js"></script>
			<script src="<?php echo base_url() ?>Assets/js/funciones_tipoConvenio.js"></script>
			<script src="<?php echo base_url() ?>Assets/js/funciones_empresa.js"></script>
			<script src="<?php echo base_url() ?>Assets/js/funciones_administrativo.js"></script>
			<script src="<?php echo base_url() ?>Assets/js/funciones_sedes.js"></script>
			<script src="<?php echo base_url() ?>Assets/js/funciones_carreras.js"></script>
			<script src="<?php echo base_url() ?>Assets/js/funciones_cargo.js"></script>
			<script src="<?php echo base_url() ?>Assets/js/funciones_carrera_sede.js"></script>
			<script src="<?php echo base_url() ?>Assets/js/funciones_publicaciones.js"></script>
			<!-- funciones -->
			<script src="<?php echo media();?>js/<?=$data['page_functions_js']; ?>"></script>
	
		</div>        
    </div>
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>