<?php
session_start();
if(!isset($_SESSION['UsuarioIdGeneral'])){
	header('Location:../index.php');
}
elseif($_SESSION['UsuarioCveSistema']==4){
	switch($_SESSION['EncuestaCveEncuesta']){
		case 1:
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