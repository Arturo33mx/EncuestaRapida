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
    $filtCre = "'".$_POST["filtCre"]."'";
    $filtMuni = "'".$_POST["filtMuni"]."'";
    if($_POST["filtCre"]==1 && $_POST["filtMuni"]==1){
        $res1 = "'".$_POST["res1"]."'";
        $res2 = "'".$_POST["res2"]."'";
        $res3 = "'".$_POST["res3"]."'";
        $res41 = "'".$_POST["res41"]."'";
        $res42 = "'".$_POST["res42"]."'";
        $res5 = "'".$_POST["res5"]."'";
        $res51 = "'".$_POST["res51"]."'";
        $res6 = "'".$_POST["res6"]."'";
        $res61 = "'".$_POST["res61"]."'";
        $res7 = "'".$_POST["res7"]."'";
        $res8 = "'".$_POST["res8"]."'";
        if($_POST["res8"]==1 || $_POST["res8"]==2 || $_POST["res8"]==3){
            $res9 = "'".$_POST["res9"]."'";
            $res14 = "'".$_POST["res14"]."'";
            $res15 = "'".$_POST["res15"]."'";
        }
        else{
            $res9 ='null';
            $res14 = 'null';
            $res15 = 'null';
        }
        $res10 = "'".$_POST["res10"]."'";
        $res11 = "'".$_POST["res11"]."'";
        $res1211 = "'".$_POST["res1211"]."'";
        $res1221 = "'".$_POST["res1221"]."'";
        $res1231 = "'".$_POST["res1231"]."'";
        $res1241 = "'".$_POST["res1241"]."'";
        $res1251 = "'".$_POST["res1251"]."'";
        $res1212 = "'".$_POST["res1212"]."'";
        $res1222 = "'".$_POST["res1222"]."'";
        $res1232 = "'".$_POST["res1232"]."'";
        $res1242 = "'".$_POST["res1242"]."'";
        $res1252 = "'".$_POST["res1252"]."'";
        $res1213 = "'".$_POST["res1213"]."'";
        $res1223 = "'".$_POST["res1223"]."'";
        $res1233 = "'".$_POST["res1233"]."'";
        $res1243 = "'".$_POST["res1243"]."'";
        $res1253 = "'".$_POST["res1253"]."'";
        $res1214 = "'".$_POST["res1214"]."'";
        $res1224 = "'".$_POST["res1224"]."'";
        $res1234 = "'".$_POST["res1234"]."'";
        $res1244 = "'".$_POST["res1244"]."'";
        $res1254 = "'".$_POST["res1254"]."'";
        $res1215 = "'".$_POST["res1215"]."'";
        $res1225 = "'".$_POST["res1225"]."'";
        $res1235 = "'".$_POST["res1235"]."'";
        $res1245 = "'".$_POST["res1245"]."'";
        $res1255 = "'".$_POST["res1255"]."'";
        $res1216 = "'".$_POST["res1216"]."'";
        $res1226 = "'".$_POST["res1226"]."'";
        $res1236 = "'".$_POST["res1236"]."'";
        $res1246 = "'".$_POST["res1246"]."'";
        $res1256 = "'".$_POST["res1256"]."'";
        $res1217 = "'".$_POST["res1217"]."'";
        $res1227 = "'".$_POST["res1227"]."'";
        $res1237 = "'".$_POST["res1237"]."'";
        $res1247 = "'".$_POST["res1247"]."'";
        $res1257 = "'".$_POST["res1257"]."'";
        $res1218 = "'".$_POST["res1218"]."'";
        $res1228 = "'".$_POST["res1228"]."'";
        $res1238 = "'".$_POST["res1238"]."'";
        $res1248 = "'".$_POST["res1248"]."'";
        $res1258 = "'".$_POST["res1258"]."'";
        $res1219 = "'".$_POST["res1219"]."'";
        $res1229 = "'".$_POST["res1229"]."'";
        $res1239 = "'".$_POST["res1239"]."'";
        $res1249 = "'".$_POST["res1249"]."'";
        $res1259 = "'".$_POST["res1259"]."'";
        $res12110 = "'".$_POST["res12110"]."'";
        $res12210 = "'".$_POST["res12210"]."'";
        $res12310 = "'".$_POST["res12310"]."'";
        $res12410 = "'".$_POST["res12410"]."'";
        $res12510 = "'".$_POST["res12510"]."'";
        $res12111 = "'".$_POST["res12111"]."'";
        $res12211 = "'".$_POST["res12211"]."'";
        $res12311 = "'".$_POST["res12311"]."'";
        $res12411 = "'".$_POST["res12411"]."'";
        $res12511 = "'".$_POST["res12511"]."'";
        $res12112 = "'".$_POST["res12112"]."'";
        $res12212 = "'".$_POST["res12212"]."'";
        $res12312 = "'".$_POST["res12312"]."'";
        $res12412 = "'".$_POST["res12412"]."'";
        $res12512 = "'".$_POST["res12512"]."'";
        $res12113 = "'".$_POST["res12113"]."'";
        $res12213 = "'".$_POST["res12213"]."'";
        $res12313 = "'".$_POST["res12313"]."'";
        $res12413 = "'".$_POST["res12413"]."'";
        $res12513 = "'".$_POST["res12513"]."'";
        $res12114 = "'".$_POST["res12114"]."'";
        $res12214 = "'".$_POST["res12214"]."'";
        $res12314 = "'".$_POST["res12314"]."'";
        $res12414 = "'".$_POST["res12414"]."'";
        $res12514 = "'".$_POST["res12514"]."'";
        $res12115 = "'".$_POST["res12115"]."'";
        $res12215 = "'".$_POST["res12215"]."'";
        $res12315 = "'".$_POST["res12315"]."'";
        $res12415 = "'".$_POST["res12415"]."'";
        $res12515 = "'".$_POST["res12515"]."'";
        $res13 = "'".$_POST["res13"]."'";
       
        $res16 = "'".$_POST["res16"]."'";
        $res17 = "'".$_POST["res17"]."'";
        $res18 = "'".$_POST["res18"]."'";
        $res19 = "'".$_POST["res19"]."'";
        $res20 = "'".$_POST["res20"]."'";
        $res21 = "'".$_POST["res21"]."'";
    }
    else{
        $res1 = 'null';
        $res2 = 'null';
        $res3 = 'null';
        $res41 = 'null';
        $res42 = 'null';
        $res5 = 'null';
        $res51 = 'null';
        $res6 = 'null';
        $res61 = 'null';
        $res7 = 'null';
        $res8 = 'null';
        $res9 = 'null';
        $res10 = 'null';
        $res11 = 'null';
        $res1211 = 'null';
        $res1221 = 'null';
        $res1231 = 'null';
        $res1241 = 'null';
        $res1251 = 'null';
        $res1212 = 'null';
        $res1222 = 'null';
        $res1232 = 'null';
        $res1242 = 'null';
        $res1252 = 'null';
        $res1213 = 'null';
        $res1223 = 'null';
        $res1233 = 'null';
        $res1243 = 'null';
        $res1253 = 'null';
        $res1214 = 'null';
        $res1224 = 'null';
        $res1234 = 'null';
        $res1244 = 'null';
        $res1254 = 'null';
        $res1215 = 'null';
        $res1225 = 'null';
        $res1235 = 'null';
        $res1245 = 'null';
        $res1255 = 'null';
        $res1216 = 'null';
        $res1226 = 'null';
        $res1236 = 'null';
        $res1246 = 'null';
        $res1256 = 'null';
        $res1217 = 'null';
        $res1227 = 'null';
        $res1237 = 'null';
        $res1247 = 'null';
        $res1257 = 'null';
        $res1218 = 'null';
        $res1228 = 'null';
        $res1238 = 'null';
        $res1248 = 'null';
        $res1258 = 'null';
        $res1219 = 'null';
        $res1229 = 'null';
        $res1239 = 'null';
        $res1249 = 'null';
        $res1259 = 'null';
        $res12110 = 'null';
        $res12210 = 'null';
        $res12310 = 'null';
        $res12410 = 'null';
        $res12510 = 'null';
        $res12111 = 'null';
        $res12211 = 'null';
        $res12311 = 'null';
        $res12411 = 'null';
        $res12511 = 'null';
        $res12112 = 'null';
        $res12212 = 'null';
        $res12312 = 'null';
        $res12412 = 'null';
        $res12512 = 'null';
        $res12113 = 'null';
        $res12213 = 'null';
        $res12313 = 'null';
        $res12413 = 'null';
        $res12513 = 'null';
        $res12114 = 'null';
        $res12214 = 'null';
        $res12314 = 'null';
        $res12414 = 'null';
        $res12514 = 'null';
        $res12115 = 'null';
        $res12215 = 'null';
        $res12315 = 'null';
        $res12415 = 'null';
        $res12515 = 'null';
        $res13 = 'null';
        $res14 = 'null';
        $res15 = 'null';
        $res16 = 'null';
        $res17 = 'null';
        $res18 = 'null';
        $res19 = 'null';
        $res20 = 'null';
        $res21 = 'null';
    }
}
else{
	$obs = "'".$_POST["obs"]."'";
	$cmbobs = "'".$_POST["cmbobs"]."'";
    $filtCre ='null';
    $filtMuni = 'null';
    $res1 = 'null';
    $res2 = 'null';
    $res3 = 'null';
    $res41 = 'null';
    $res42 = 'null';
    $res5 = 'null';
    $res51 = 'null';
    $res6 = 'null';
    $res61 = 'null';
    $res7 = 'null';
    $res8 = 'null';
    $res9 = 'null';
    $res10 = 'null';
    $res11 = 'null';
    $res1211 = 'null';
    $res1221 = 'null';
    $res1231 = 'null';
    $res1241 = 'null';
    $res1251 = 'null';
    $res1212 = 'null';
    $res1222 = 'null';
    $res1232 = 'null';
    $res1242 = 'null';
    $res1252 = 'null';
    $res1213 = 'null';
    $res1223 = 'null';
    $res1233 = 'null';
    $res1243 = 'null';
    $res1253 = 'null';
    $res1214 = 'null';
    $res1224 = 'null';
    $res1234 = 'null';
    $res1244 = 'null';
    $res1254 = 'null';
    $res1215 = 'null';
    $res1225 = 'null';
    $res1235 = 'null';
    $res1245 = 'null';
    $res1255 = 'null';
    $res1216 = 'null';
    $res1226 = 'null';
    $res1236 = 'null';
    $res1246 = 'null';
    $res1256 = 'null';
    $res1217 = 'null';
    $res1227 = 'null';
    $res1237 = 'null';
    $res1247 = 'null';
    $res1257 = 'null';
    $res1218 = 'null';
    $res1228 = 'null';
    $res1238 = 'null';
    $res1248 = 'null';
    $res1258 = 'null';
    $res1219 = 'null';
    $res1229 = 'null';
    $res1239 = 'null';
    $res1249 = 'null';
    $res1259 = 'null';
    $res12110 = 'null';
    $res12210 = 'null';
    $res12310 = 'null';
    $res12410 = 'null';
    $res12510 = 'null';
    $res12111 = 'null';
    $res12211 = 'null';
    $res12311 = 'null';
    $res12411 = 'null';
    $res12511 = 'null';
    $res12112 = 'null';
    $res12212 = 'null';
    $res12312 = 'null';
    $res12412 = 'null';
    $res12512 = 'null';
    $res12113 = 'null';
    $res12213 = 'null';
    $res12313 = 'null';
    $res12413 = 'null';
    $res12513 = 'null';
    $res12114 = 'null';
    $res12214 = 'null';
    $res12314 = 'null';
    $res12414 = 'null';
    $res12514 = 'null';
    $res12115 = 'null';
    $res12215 = 'null';
    $res12315 = 'null';
    $res12415 = 'null';
    $res12515 = 'null';
    $res13 = 'null';
    $res14 = 'null';
    $res15 = 'null';
    $res16 = 'null';
    $res17 = 'null';
    $res18 = 'null';
    $res19 = 'null';
    $res20 = 'null';
    $res21 = 'null';
}

$cmd = "UPDATE numeros_distrito22 SET 
FechaUltima=now(),
CveApartado=0,
EstatusNumero='$Esta'
WHERE Clave='".$cve."';";
$usu= $_SESSION['UsuarioIdGeneral'];
if($bd->consulta($cmd)){
	$cmd2 = "
    INSERT INTO encuesta_distrito22
(
`CveNumero`,
`CveUsuario`,
`EstatusNumero`,
`Observaciones`,
`CveMotivo`,
`Fecha`,
`FiltroCredencial`,
`FiltroMuni`,
`Res1`,
`Res2`,
`Res3`,
`Res4-1`,
`Res4-2`,
`Res5`,
`Res5-1`,
`Res6`,
`Res6-1`,
`Res7`,
`Res8`,
`Res9`,
`Res10`,
`Res11`,
`Res12-1-1`,
`Res12-1-2`,
`Res12-1-3`,
`Res12-1-4`,
`Res12-1-5`,
`Res12-2-1`,
`Res12-2-2`,
`Res12-2-3`,
`Res12-2-4`,
`Res12-2-5`,
`Res12-3-1`,
`Res12-3-2`,
`Res12-3-3`,
`Res12-3-4`,
`Res12-3-5`,
`Res12-4-1`,
`Res12-4-2`,
`Res12-4-3`,
`Res12-4-4`,
`Res12-4-5`,
`Res12-5-1`,
`Res12-5-2`,
`Res12-5-3`,
`Res12-5-4`,
`Res12-5-5`,
`Res12-6-1`,
`Res12-6-2`,
`Res12-6-3`,
`Res12-6-4`,
`Res12-6-5`,
`Res12-7-1`,
`Res12-7-2`,
`Res12-7-3`,
`Res12-7-4`,
`Res12-7-5`,
`Res12-8-1`,
`Res12-8-2`,
`Res12-8-3`,
`Res12-8-4`,
`Res12-8-5`,
`Res12-9-1`,
`Res12-9-2`,
`Res12-9-3`,
`Res12-9-4`,
`Res12-9-5`,
`Res12-10-1`,
`Res12-10-2`,
`Res12-10-3`,
`Res12-10-4`,
`Res12-10-5`,
`Res12-11-1`,
`Res12-11-2`,
`Res12-11-3`,
`Res12-11-4`,
`Res12-11-5`,
`Res12-12-1`,
`Res12-12-2`,
`Res12-12-3`,
`Res12-12-4`,
`Res12-12-5`,
`Res12-13-1`,
`Res12-13-2`,
`Res12-13-3`,
`Res12-13-4`,
`Res12-13-5`,
`Res12-14-1`,
`Res12-14-2`,
`Res12-14-3`,
`Res12-14-4`,
`Res12-14-5`,
`Res12-15-1`,
`Res12-15-2`,
`Res12-15-3`,
`Res12-15-4`,
`Res12-15-5`,
`Res13`,
`Res14`,
`Res15`,
`Res16`,
`Res17`,
`Res18`,
`Res19`,
`Res20`,
`Res21`)
VALUES
($cve, $usu, $Esta, $obs, $cmbobs, now(),
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
    $res21
);";
	if($bd->consulta($cmd2)){
		echo "Encuesta guardada Correctamente";
	}
	else{
		echo $cmd2;
	}
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
