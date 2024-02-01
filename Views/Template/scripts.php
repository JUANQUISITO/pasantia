
    <script src="<?php echo base_url(); ?>Assets/js/popper.js"></script>
    <script src="<?php echo base_url(); ?>Assets/js/bootstrap.min.js"></script>
   

	<script src="<?php echo base_url(); ?>Assets/js/jquery-3.3.1.min.js"></script>
	<!--FUNCIONALIDAD AL SIDEBAR Y NAV TOP---  TRADUCIR---->
	<script src="<?php echo base_url(); ?>Assets/js/jquery.min.js"></script>

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
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?php echo base_url() ?>Assets/js/scripts_dash.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@latest/dist/Chart.min.js" crossorigin="anonymous"></script>
    <script src="<?php echo base_url() ?>Assets/demo/chart-area-demo.js"></script>
    <script src="<?php echo base_url() ?>Assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="<?php echo base_url() ?>Assets/js/datatables-simple-demo.js"></script>
    
<!--==================================================================================
											END SCRIPTS DE INDEX 3 
===================================================================================---->

<!--==================================================================================
											DATATABLES 
===================================================================================---->
	<script src="https://code.jquery.com/jquery-3.5.1.js" ></script>
	<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
	<!--"Showing 0 to 0 of 0 entries" EN EL DE ABAJO-->
	<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
	
<!--==================================================================================
											END DATATABLES 
===================================================================================---->
