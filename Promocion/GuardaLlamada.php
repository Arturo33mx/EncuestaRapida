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
$Esta=$_POST["esta"];
$obs="";

if($Esta==1){
	$obs='null';
    $cmbobs = 'null';
    $res1 = "'".$_POST["res1"]."'";
    $res2 = "'".$_POST["res2"]."'";
    $res3 = "'".$_POST["res3"]."'";
    $res4 = "'".$_POST["res4"]."'";
    $res5 = "'".$_POST["res5"]."'";
    $res6 = "'".$_POST["res6"]."'";
}
else{
	$obs = "'".$_POST["obs"]."'";
	$cmbobs = "'".$_POST["cmbobs"]."'";
    $res1 = 'null';
        $res2 = 'null';
        $res3 = 'null';
        $res4 = 'null';
        $res5 = 'null';
        $res6 = 'null';
}

$cmd = "UPDATE numeros_distrito22_promocion SET 
FechaUltima=now(),
CveApartado=0,
EstatusNumero='$Esta'
WHERE Clave='".$cve."';";
$usu= $_SESSION['UsuarioIdGeneral'];
if($bd->consulta($cmd)){
	$cmd2 = "
    INSERT INTO encuesta_promocion
(
`CveNumero`,
`CveUsuario`,
`EstatusNumero`,
`Observaciones`,
`CveMotivo`,
`Fecha`,
`Res1`,
`Res2`,
`Res3`,
`Res4`,
`Res5`,
`Res6`)
VALUES
($cve, $usu, $Esta, $obs, $cmbobs, now(),
    $res1,
    $res2,
    $res3,
    $res4,
    $res5,
    $res6);";
	if($bd->consulta($cmd2)){
		echo "Encuesta guardada Correctamente";
	}
	else{
		echo $cmd2;
	}
}