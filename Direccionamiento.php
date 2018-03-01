<?php
session_start();
if(!isset($_SESSION['UsuarioIdGeneral'])){
	header('Location:index.php');
}
else{
	switch($_SESSION['UsuarioCveSistema']){
		case 1:
			header('Location:Encuesta/index.php');
			break;
		case 2:
			header('Location:EncuestaTemblor/index.php');
			break;
		case 3:
			header('Location:EncuestaReconstruccion/');
			break;
		case 4:
			header('Location:MedicionRapida/');
			break;
		default:
			echo "Error 1001.......<br>llamar al administrador de Sistemas";
	}
}
echo "Datos<br>";
echo "<br>".$_SESSION['UsuarioIdGeneral'];
echo "<br>".$_SESSION['NombreCompleto'];
echo "<br>".$_SESSION['UsuarioCveSistema'];
?>