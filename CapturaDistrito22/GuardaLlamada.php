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

$col= "'".$_POST["col"]."'";
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
$res951 = "'".$_POST["res951"]."'";
$res912 = "'".$_POST["res912"]."'";
$res922 = "'".$_POST["res922"]."'";
$res932 = "'".$_POST["res932"]."'";
$res942 = "'".$_POST["res942"]."'";
$res952 = "'".$_POST["res952"]."'";
$res913 = "'".$_POST["res913"]."'";
$res923 = "'".$_POST["res923"]."'";
$res933 = "'".$_POST["res933"]."'";
$res943 = "'".$_POST["res943"]."'";
$res953 = "'".$_POST["res953"]."'";
$res914 = "'".$_POST["res914"]."'";
$res924 = "'".$_POST["res924"]."'";
$res934 = "'".$_POST["res934"]."'";
$res944 = "'".$_POST["res944"]."'";
$res954 = "'".$_POST["res954"]."'";
$res915 = "'".$_POST["res915"]."'";
$res925 = "'".$_POST["res925"]."'";
$res935 = "'".$_POST["res935"]."'";
$res945 = "'".$_POST["res945"]."'";
$res955 = "'".$_POST["res955"]."'";
$res916 = "'".$_POST["res916"]."'";
$res926 = "'".$_POST["res926"]."'";
$res936 = "'".$_POST["res936"]."'";
$res946 = "'".$_POST["res946"]."'";
$res956 = "'".$_POST["res956"]."'";
$res917 = "'".$_POST["res917"]."'";
$res927 = "'".$_POST["res927"]."'";
$res937 = "'".$_POST["res937"]."'";
$res947 = "'".$_POST["res947"]."'";
$res957 = "'".$_POST["res957"]."'";
$res918 = "'".$_POST["res918"]."'";
$res928 = "'".$_POST["res928"]."'";
$res938 = "'".$_POST["res938"]."'";
$res948 = "'".$_POST["res948"]."'";
$res958 = "'".$_POST["res958"]."'";
$res919 = "'".$_POST["res919"]."'";
$res929 = "'".$_POST["res929"]."'";
$res939 = "'".$_POST["res939"]."'";
$res949 = "'".$_POST["res949"]."'";
$res959 = "'".$_POST["res959"]."'";
$res9110 = "'".$_POST["res9110"]."'";
$res9210 = "'".$_POST["res9210"]."'";
$res9310 = "'".$_POST["res9310"]."'";
$res9410 = "'".$_POST["res9410"]."'";
$res9510 = "'".$_POST["res9510"]."'";
$res9111 = "'".$_POST["res9111"]."'";
$res9211 = "'".$_POST["res9211"]."'";
$res9311 = "'".$_POST["res9311"]."'";
$res9411 = "'".$_POST["res9411"]."'";
$res9511 = "'".$_POST["res9511"]."'";
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
    INSERT INTO captura_distrito22
(
`CveUsuario`,
`Fecha`,
`Seccion`,
`Nip`,
`Numero`,
`Colonia`,
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
`Res9-1-5`,
`Res9-2-1`,
`Res9-2-2`,
`Res9-2-3`,
`Res9-2-4`,
`Res9-2-5`,
`Res9-3-1`,
`Res9-3-2`,
`Res9-3-3`,
`Res9-3-4`,
`Res9-3-5`,
`Res9-4-1`,
`Res9-4-2`,
`Res9-4-3`,
`Res9-4-4`,
`Res9-4-5`,
`Res9-5-1`,
`Res9-5-2`,
`Res9-5-3`,
`Res9-5-4`,
`Res9-5-5`,
`Res9-6-1`,
`Res9-6-2`,
`Res9-6-3`,
`Res9-6-4`,
`Res9-6-5`,
`Res9-7-1`,
`Res9-7-2`,
`Res9-7-3`,
`Res9-7-4`,
`Res9-7-5`,
`Res9-8-1`,
`Res9-8-2`,
`Res9-8-3`,
`Res9-8-4`,
`Res9-8-5`,
`Res9-9-1`,
`Res9-9-2`,
`Res9-9-3`,
`Res9-9-4`,
`Res9-9-5`,
`Res9-10-1`,
`Res9-10-2`,
`Res9-10-3`,
`Res9-10-4`,
`Res9-10-5`,
`Res9-11-1`,
`Res9-11-2`,
`Res9-11-3`,
`Res9-11-4`,
`Res9-11-5`,
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
$col,
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
$res951,
$res912,
$res922,
$res932,
$res942,
$res952,
$res913,
$res923,
$res933,
$res943,
$res953,
$res914,
$res924,
$res934,
$res944,
$res954,
$res915,
$res925,
$res935,
$res945,
$res955,
$res916,
$res926,
$res936,
$res946,
$res956,
$res917,
$res927,
$res937,
$res947,
$res957,
$res918,
$res928,
$res938,
$res948,
$res958,
$res919,
$res929,
$res939,
$res949,
$res959,
$res9110,
$res9210,
$res9310,
$res9410,
$res9510,
$res9111,
$res9211,
$res9311,
$res9411,
$res9511,
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
/*
    $filtCre,
    $filtMuni,
    $res1,
    $res2,
    $res3,
    $res41,
    $res42,
    $res5,
    $res51,
    $res6,
    $res61,
    $res7,
    $res8,
    $res9,
    $res10,
    $res11,
    $res1211,
    $res1221,
    $res1231,
    $res1241,
    $res1251,
    $res1212,
    $res1222,
    $res1232,
    $res1242,
    $res1252,
    $res1213,
    $res1223,
    $res1233,
    $res1243,
    $res1253,
    $res1214,
    $res1224,
    $res1234,
    $res1244,
    $res1254,
    $res1215,
    $res1225,
    $res1235,
    $res1245,
    $res1255,
    $res1216,
    $res1226,
    $res1236,
    $res1246,
    $res1256,
    $res1217,
    $res1227,
    $res1237,
    $res1247,
    $res1257,
    $res1218,
    $res1228,
    $res1238,
    $res1248,
    $res1258,
    $res1219,
    $res1229,
    $res1239,
    $res1249,
    $res1259,
    $res12110,
    $res12210,
    $res12310,
    $res12410,
    $res12510,
    $res12111,
    $res12211,
    $res12311,
    $res12411,
    $res12511,
    $res12112,
    $res12212,
    $res12312,
    $res12412,
    $res12512,
    $res12113,
    $res12213,
    $res12313,
    $res12413,
    $res12513,
    $res12114,
    $res12214,
    $res12314,
    $res12414,
    $res12514,
    $res12115,
    $res12215,
    $res12315,
    $res12415,
    $res12515,
    $res13,
    $res14,
    $res15,
    $res16,
    $res17,
    $res18,
    $res19,
    $res20,
    $res21,
*/
