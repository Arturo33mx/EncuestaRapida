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
$folR= "'".$_POST["folR"]."'";
$nip= "'".$_POST["nip"]."'";
$num= "'".$_POST["num"]."'";
$mun= "'".$_POST["mun"]."'";


$res1 = "'".$_POST["res1"]."'";
$res2 = "'".$_POST["res2"]."'";
$res3 = "'".$_POST["res3"]."'";
$res4 = "'".$_POST["res4"]."'";
$res5 = "'".$_POST["res5"]."'";
$res6 = "'".$_POST["res6"]."'";
$res71 = "'".$_POST["res71"]."'";
$res72 = "'".$_POST["res72"]."'";
$res8 = "'".$_POST["res8"]."'";
$res9 = "'".$_POST["res9"]."'";
$res10 = "'".$_POST["res10"]."'";
$res11 = "'".$_POST["res11"]."'";
$res12 = "'".$_POST["res12"]."'";
$res13 = "'".$_POST["res13"]."'";
$res1411 = "'".$_POST["res1411"]."'";
$res1421 = "'".$_POST["res1421"]."'";
$res1431 = "'".$_POST["res1431"]."'";
$res1441 = "'".$_POST["res1441"]."'";
$res1412 = "'".$_POST["res1412"]."'";
$res1422 = "'".$_POST["res1422"]."'";
$res1432 = "'".$_POST["res1432"]."'";
$res1442 = "'".$_POST["res1442"]."'";
$res1413 = "'".$_POST["res1413"]."'";
$res1423 = "'".$_POST["res1423"]."'";
$res1433 = "'".$_POST["res1433"]."'";
$res1443 = "'".$_POST["res1443"]."'";
$res1414 = "'".$_POST["res1414"]."'";
$res1424 = "'".$_POST["res1424"]."'";
$res1434 = "'".$_POST["res1434"]."'";
$res1444 = "'".$_POST["res1444"]."'";
$res1415 = "'".$_POST["res1415"]."'";
$res1425 = "'".$_POST["res1425"]."'";
$res1435 = "'".$_POST["res1435"]."'";
$res1445 = "'".$_POST["res1445"]."'";
$res1416 = "'".$_POST["res1416"]."'";
$res1426 = "'".$_POST["res1426"]."'";
$res1436 = "'".$_POST["res1436"]."'";
$res1446 = "'".$_POST["res1446"]."'";
$res1417 = "'".$_POST["res1417"]."'";
$res1427 = "'".$_POST["res1427"]."'";
$res1437 = "'".$_POST["res1437"]."'";
$res1447 = "'".$_POST["res1447"]."'";
$res1418 = "'".$_POST["res1418"]."'";
$res1428 = "'".$_POST["res1428"]."'";
$res1438 = "'".$_POST["res1438"]."'";
$res1448 = "'".$_POST["res1448"]."'";
$res1419 = "'".$_POST["res1419"]."'";
$res1429 = "'".$_POST["res1429"]."'";
$res1439 = "'".$_POST["res1439"]."'";
$res1449 = "'".$_POST["res1449"]."'";

$res15 = "'".$_POST["res15"]."'";
$res16 = "'".$_POST["res16"]."'";
$res17 = "'".$_POST["res17"]."'";
$res18 = "'".$_POST["res18"]."'";
$res19 = "'".$_POST["res19"]."'";

$resA = "'".$_POST["resA"]."'";
$resB = "'".$_POST["resB"]."'";
$resC = "'".$_POST["resC"]."'";
$resD = "'".$_POST["resD"]."'";
$resE = "'".$_POST["resE"]."'";
$resF = "'".$_POST["resF"]."'";


$usu= $_SESSION['UsuarioIdGeneral'];
$cmd2 = "
    INSERT INTO captura_lafragua
(
`CveUsuario`,
`Fecha`,
`Seccion`,
`Nip`,
`Numero`,
`Folio`,
`FolioR`,
`CveMunicipio`,
`Res1`,
`Res2`,
`Res3`,
`Res4`,
`Res5`,
`Res6`,
`Res71`,
`Res72`,
`Res8`,
`Res9`,
`Res10`,
`Res11`,
`Res12`,
`Res13`,
`Res14-1-1`,
`Res14-1-2`,
`Res14-1-3`,
`Res14-1-4`,
`Res14-2-1`,
`Res14-2-2`,
`Res14-2-3`,
`Res14-2-4`,
`Res14-3-1`,
`Res14-3-2`,
`Res14-3-3`,
`Res14-3-4`,
`Res14-4-1`,
`Res14-4-2`,
`Res14-4-3`,
`Res14-4-4`,
`Res14-5-1`,
`Res14-5-2`,
`Res14-5-3`,
`Res14-5-4`,
`Res14-6-1`,
`Res14-6-2`,
`Res14-6-3`,
`Res14-6-4`,
`Res14-7-1`,
`Res14-7-2`,
`Res14-7-3`,
`Res14-7-4`,
`Res14-8-1`,
`Res14-8-2`,
`Res14-8-3`,
`Res14-8-4`,
`Res14-9-1`,
`Res14-9-2`,
`Res14-9-3`,
`Res14-9-4`,
`Res15`,
`Res16`,
`Res17`,
`Res18`,
`Res19`,
`ResA`,
`ResB`,
`ResC`,
`ResD`,
`ResE`,
`ResF`
)
VALUES
($usu,
now(),
$sec,
$nip,
$num,
$fol,
$folR,
$mun,
$res1,
$res2,
$res3,
$res4,
$res5,
$res6,
$res71,
$res72,
$res8,
$res9,
$res10,
$res11,
$res12,
$res13,
$res1411,
$res1421,
$res1431,
$res1441,
$res1412,
$res1422,
$res1432,
$res1442,
$res1413,
$res1423,
$res1433,
$res1443,
$res1414,
$res1424,
$res1434,
$res1444,
$res1415,
$res1425,
$res1435,
$res1445,
$res1416,
$res1426,
$res1436,
$res1446,
$res1417,
$res1427,
$res1437,
$res1447,
$res1418,
$res1428,
$res1438,
$res1448,
$res1419,
$res1429,
$res1439,
$res1449,
$res15,
$res16,
$res17,
$res18,
$res19,
$resA,
$resB,
$resC,
$resD,
$resE,
$resF); ";
if($bd->consulta($cmd2)){
    $id=$bd->get_id();
    echo "Encuesta guardada Correctamente";
}
else{
    echo $cmd2;
}

?>