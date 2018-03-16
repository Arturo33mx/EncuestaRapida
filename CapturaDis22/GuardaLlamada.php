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

//$col= "'".$_POST["col"]."'";
$sec= "'".$_POST["sec"]."'";
$fol= "'".$_POST["fol"]."'";
$nip= "'".$_POST["nip"]."'";
$num= "'".$_POST["num"]."'";
$mun= "'".$_POST["mun"]."'";

$res1 = "'".$_POST["res1"]."'";
$res2 = "'".$_POST["res2"]."'";
$res3 = "'".$_POST["res3"]."'";
$res4 = "'".$_POST["res4"]."'";
$res5 = "'".$_POST["res5"]."'";
$res6 = "'".$_POST["res6"]."'";
$res7 = "'".$_POST["res7"]."'";
$res8 = "'".$_POST["res8"]."'";
$res911 = "'".$_POST["res911"]."'";
$res921 = "'".$_POST["res921"]."'";
$res931 = "'".$_POST["res931"]."'";
$res941 = "'".$_POST["res941"]."'";
$res912 = "'".$_POST["res912"]."'";
$res922 = "'".$_POST["res922"]."'";
$res932 = "'".$_POST["res932"]."'";
$res942 = "'".$_POST["res942"]."'";
$res913 = "'".$_POST["res913"]."'";
$res923 = "'".$_POST["res923"]."'";
$res933 = "'".$_POST["res933"]."'";
$res943 = "'".$_POST["res943"]."'";
$res914 = "'".$_POST["res914"]."'";
$res924 = "'".$_POST["res924"]."'";
$res934 = "'".$_POST["res934"]."'";
$res944 = "'".$_POST["res944"]."'";
$res915 = "'".$_POST["res915"]."'";
$res925 = "'".$_POST["res925"]."'";
$res935 = "'".$_POST["res935"]."'";
$res945 = "'".$_POST["res945"]."'";
$res916 = "'".$_POST["res916"]."'";
$res926 = "'".$_POST["res926"]."'";
$res936 = "'".$_POST["res936"]."'";
$res946 = "'".$_POST["res946"]."'";
$res917 = "'".$_POST["res917"]."'";
$res927 = "'".$_POST["res927"]."'";
$res937 = "'".$_POST["res937"]."'";
$res947 = "'".$_POST["res947"]."'";
$res918 = "'".$_POST["res918"]."'";
$res928 = "'".$_POST["res928"]."'";
$res938 = "'".$_POST["res938"]."'";
$res948 = "'".$_POST["res948"]."'";
$res10 = "'".$_POST["res10"]."'";
$res11 = "'".$_POST["res11"]."'";
$res12 = "'".$_POST["res12"]."'";
$res13 = "'".$_POST["res13"]."'";
$res14 = "'".$_POST["res14"]."'";
$res15 = "'".$_POST["res15"]."'";
$res16 = "'".$_POST["res16"]."'";
$res17 = "'".$_POST["res17"]."'";
$res18 = "'".$_POST["res18"]."'";


$usu= $_SESSION['UsuarioIdGeneral'];
$cmd2 = "
    INSERT INTO captura_dis22
(
`CveUsuario`,
`Fecha`,
`Seccion`,
`Nip`,
`Numero`,
`Folio`,
`CveMunicipio`,
`Res1`,
`Res2`,
`Res3`,
`Res4`,
`Res5`,
`Res6`,
`Res7`,
`Res8`,
`Res9-1-1`,
`Res9-1-2`,
`Res9-1-3`,
`Res9-1-4`,
`Res9-2-1`,
`Res9-2-2`,
`Res9-2-3`,
`Res9-2-4`,
`Res9-3-1`,
`Res9-3-2`,
`Res9-3-3`,
`Res9-3-4`,
`Res9-4-1`,
`Res9-4-2`,
`Res9-4-3`,
`Res9-4-4`,
`Res9-5-1`,
`Res9-5-2`,
`Res9-5-3`,
`Res9-5-4`,
`Res9-6-1`,
`Res9-6-2`,
`Res9-6-3`,
`Res9-6-4`,
`Res9-7-1`,
`Res9-7-2`,
`Res9-7-3`,
`Res9-7-4`,
`Res9-8-1`,
`Res9-8-2`,
`Res9-8-3`,
`Res9-8-4`,
`Res10`,
`Res11`,
`Res12`,
`Res13`,
`Res14`,
`Res15`,
`Res16`,
`Res17`,
`Res18`)
VALUES
($usu,
now(),
$sec,
$nip,
$num,
$fol,
$mun,
$res1,
$res2,
$res3,
$res4,
$res5,
$res6,
$res7,
$res8,
$res911,
$res921,
$res931,
$res941,
$res912,
$res922,
$res932,
$res942,
$res913,
$res923,
$res933,
$res943,
$res914,
$res924,
$res934,
$res944,
$res915,
$res925,
$res935,
$res945,
$res916,
$res926,
$res936,
$res946,
$res917,
$res927,
$res937,
$res947,
$res918,
$res928,
$res938,
$res948,
$res10,
$res11,
$res12,
$res13,
$res14,
$res15,
$res16,
$res17,
$res18);";
if($bd->consulta($cmd2)){
    echo "Encuesta guardada Correctamente";
}
else{
    echo $cmd2;
}