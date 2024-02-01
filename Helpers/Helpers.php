<?php
	function base_url()
	{
		return BASE_URL;
	}

	function getModal(string $nameModal, $data)
	{
		$view_modal = "Views/Template/Modals/{$nameModal}.php";
		require_once $view_modal;        
	}

	function media()
	{
		return BASE_URL."Assets/";
	}

	function getPersona(int $idPersona)
	{
		require_once ("Models/PersonasModel.php");
		$objPersona = new PersonasModel();
		$idPersona = $_SESSION['userData']['idUsuario'];
		$arPersonas = $objPersona->selectPersona($idPersona);
	}
	function Meses()
	{
		$meses = array(
			'Enero',
			'Febrero',
			'Marzo',
			'Abril',
			'Mayo',
			'Junio',
			'Julio',
			'Agosto',
			'Septiembre',
			'Octubre',
			'Noviembre',
			'Diciembre'
		);
		return $meses;
	}


	 function getPermisos(int $idmodulo)
	{
		require_once('Models/PermisosModel.php');
		$objPermiso = new PermisosModel();
		$idrol = $_SESSION['userData']['id_rol'];
		$arrPermisos = $objPermiso->permisosModulo($idrol);
		$permisos = '';
		$permisosMod = '';

		if(count($arrPermisos) > 0 )
		{
			$permisos = $arrPermisos;
			$permisosMod = isset($arrPermisos[$idmodulo]) ? $arrPermisos[$idmodulo]:"";

		}
		$_SESSION['permisos'] = $permisos;
		$_SESSION['permisosMod'] = $permisosMod;

	}
?>