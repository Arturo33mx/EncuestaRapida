<?php
session_start();
if(!isset($_SESSION['UsuarioIdGeneral'])){
	exit;
}
if(!isset($myvar)):
	include("../class/mysql.php");
	$bd = new  MySQL;
endif;
function conver($var){
	$var=iconv("UTF-8", "ISO-8859-1", $var);
	return $var;
}

function limpia_espacios($cadena){
	$cadena = str_replace(' ', '', $cadena);
	return $cadena;
}
/*datos del servicio*/
$cve = $_POST["cve"];
$Esta=$_POST["Esta"];

if(isset($_POST["res1"])){
	$Res1=$_POST["res1"];
	$Res1=implode(",",$Res1);
}
else{
	$Res1='';
}

$obs="";

if($Esta==1){
	$obs='null';
	$Res1="'".$Res1."'";
	$Res2="'".$_POST["res2"]."'";
	$Res3="'".$_POST["res3"]."'";
	$Res4="'".$_POST["res4"]."'";
}
else{
	$obs="'".$_POST["obs"]."'";
	$Res1='null';
	$Res2='null';
	$Res3='null';
	$Res4='null';
}

$cmd = "UPDATE numeros_izucar SET 
FechaUltima=now(),
CveApartado=0,
EstatusNumero='$Esta'
WHERE Clave='".$cve."';";
$usu= $_SESSION['UsuarioIdGeneral'];
if($bd->consulta($cmd)){
	$cmd2 = "INSERT INTO encuesta_medicion (CveNumero, CveUsuario, EstatusNumero, Observaciones, Fecha, Res1, Res2, Res3, Res4)
	VALUES ($cve, $usu, $Esta, $obs, now(), $Res1, $Res2, $Res3, $Res4)";
	if($bd->consulta($cmd2)){
		echo "Encuesta guardada Correctamente";
	}
	else{
		echo $cmd2;
	}
}
