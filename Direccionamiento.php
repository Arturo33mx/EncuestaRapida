<?php
session_start();
if(!isset($_SESSION['UsuarioIdGeneral'])){
	header('Location:index.php');
}
else{
	switch($_SESSION['UsuarioCveSistema']){
		case 5:
			header('Location:Distrito22/');
			break;
        case 6:
			header('Location:CapturaDis22/');
			break;
        case 7:
			header('Location:CapturaDis22Nueva/');
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