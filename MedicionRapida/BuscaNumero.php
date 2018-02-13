<?php
session_start();
if(!isset($myvar)){
	include("../../class/mysql.php");
	$bd = new  MySQL;
}
$Clave="";
header('Content-Type:text/html; charset=UTF-8');
$consulta="CALL BuscarNumeroMedicion(".$_SESSION['UsuarioIdGeneral'].");";
$Resultado=$bd->consulta($consulta); 
if($Fila=$bd->fetch_array($Resultado)){
	$Row ['Clave'] = $Fila['Clave'];
	$Row ['Telefono'] = $Fila['Telefono'];
	$Row ['Ciudad'] = $Fila['Ciudad'];
	$nombres[] = $Row;
	$json_response = json_encode($nombres);
	# Return the response
	echo $json_response;
}
else{
	echo "[{}]";
}
?>