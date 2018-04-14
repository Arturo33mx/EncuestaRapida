<?php
session_start();
if(!isset($_SESSION['UsuarioIdGeneral'])){
	exit;
}
if(!isset($myvar)):
	include("../class/mysqlServer.php");
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

$Preg1121 = explode(",", substr($_POST["res1121A"],1));
$Preg1122 = explode(",", substr($_POST["res1122A"],1));
$Preg1123 = explode(",", substr($_POST["res1123A"],1));
$Preg1124 = explode(",", substr($_POST["res1124A"],1));

/*
echo "<br>".$_POST["res1121A"];
echo "<br>".$_POST["res1122A"];
echo "<br>".$_POST["res1123A"];
echo "<br>".$_POST["res1124A"];
*/

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
$res7 = "'".$_POST["res7"]."'";
$res8 = "'".$_POST["res8"]."'";
$res9 = "'".$_POST["res9"]."'";
$res10 = "'".$_POST["res10"]."'";
$res1111 = "'".$_POST["res1111"]."'";
$res1121 = "'".$_POST["res1121"]."'";
$res1131 = "'".$_POST["res1131"]."'";
$res1141 = "'".$_POST["res1141"]."'";
$res1112 = "'".$_POST["res1112"]."'";
$res1122 = "'".$_POST["res1122"]."'";
$res1132 = "'".$_POST["res1132"]."'";
$res1142 = "'".$_POST["res1142"]."'";
$res1113 = "'".$_POST["res1113"]."'";
$res1123 = "'".$_POST["res1123"]."'";
$res1133 = "'".$_POST["res1133"]."'";
$res1143 = "'".$_POST["res1143"]."'";
$res1114 = "'".$_POST["res1114"]."'";
$res1124 = "'".$_POST["res1124"]."'";
$res1134 = "'".$_POST["res1134"]."'";
$res1144 = "'".$_POST["res1144"]."'";

$res12 = "'".$_POST["res12"]."'";
$res13 = "'".$_POST["res13"]."'";
$res14 = "'".$_POST["res14"]."'";
$res15 = "'".$_POST["res15"]."'";
$res16 = "'".$_POST["res16"]."'";
$res17 = "'".$_POST["res17"]."'";
$res18 = "'".$_POST["res18"]."'";
if(isset($_POST["res19"]))
    $res19 = "'".$_POST["res19"]."'";
else
    $res19 = "NULL";
$res20 = "'".$_POST["res20"]."'";
$res21 = "'".$_POST["res21"]."'";

$resA = "'".$_POST["resA"]."'";
$resB = "'".$_POST["resB"]."'";
$resC = "'".$_POST["resC"]."'";
$resD = "'".$_POST["resD"]."'";
$resE = "'".$_POST["resE"]."'";
$resF = "'".$_POST["resF"]."'";


$usu= $_SESSION['UsuarioIdGeneral'];
$cmd2 = "
    INSERT INTO captura_dis22_nueva2
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
`Res7`,
`Res8`,
`Res9`,
`Res10`,
`Res11-1-1`,
`Res11-1-2`,
`Res11-1-3`,
`Res11-1-4`,
`Res11-2-1`,
`Res11-2-2`,
`Res11-2-3`,
`Res11-2-4`,
`Res11-3-1`,
`Res11-3-2`,
`Res11-3-3`,
`Res11-3-4`,
`Res11-4-1`,
`Res11-4-2`,
`Res11-4-3`,
`Res11-4-4`,
`Res12`,
`Res14`,
`Res15`,
`Res16`,
`Res17`,
`Res18`,
`Res19`,
`Res20`,
`Res21`,
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
$res7,
$res8,
$res9,
$res10,
$res1111,
$res1121,
$res1131,
$res1141,
$res1112,
$res1122,
$res1132,
$res1142,
$res1113,
$res1123,
$res1133,
$res1143,
$res1114,
$res1124,
$res1134,
$res1144,
$res12,
$res14,
$res15,
$res16,
$res17,
$res18,
$res19,
$res20,
$res21,
$resA,
$resB,
$resC,
$resD,
$resE,
$resF); ";
if($bd->consulta($cmd2)){
    $id=$bd->get_id();
    
    $sql="SELECT * FROM preguntas_dis22_nueva where CveDepende=$mun";
    $categorias=$bd->get_arreglo($sql);
    if(!empty($categorias)){
        foreach ($categorias as $mivalor){
            if($mivalor['PregBase']==11){
                if($mivalor['SubIden']==1){
                    $cmd = "INSERT INTO respuestas_dis22_nueva(CvePregunta, CveEncuesta, Res)
                    VALUES(".$mivalor['Clave'].", $id, ".$Preg1121[($mivalor['Identificador']-1)].");";
                    if(!($bd->consulta($cmd))){
                        echo "<br>Error: ".$cmd;
                    }
                }
                if($mivalor['SubIden']==2){
                    $cmd = "INSERT INTO respuestas_dis22_nueva(CvePregunta, CveEncuesta, Res)
                    VALUES(".$mivalor['Clave'].", $id, ".$Preg1122[($mivalor['Identificador']-1)].");";
                    if(!($bd->consulta($cmd))){
                        echo "<br>Error: ".$cmd;
                    }
                }
                if($mivalor['SubIden']==3){
                    $cmd = "INSERT INTO respuestas_dis22_nueva(CvePregunta, CveEncuesta, Res)
                    VALUES(".$mivalor['Clave'].", $id, ".$Preg1123[($mivalor['Identificador']-1)].");";
                    if(!($bd->consulta($cmd))){
                        echo "<br>Error: ".$cmd;
                    }
                }
                if($mivalor['SubIden']==4){
                    $cmd = "INSERT INTO respuestas_dis22_nueva(CvePregunta, CveEncuesta, Res)
                    VALUES(".$mivalor['Clave'].", $id, ".$Preg1124[($mivalor['Identificador']-1)].");";
                    if(!($bd->consulta($cmd))){
                        echo "<br>Error: ".$cmd;
                    }
                }
            }
            if($mivalor['PregBase']==13){
                $cmd = "INSERT INTO respuestas_dis22_nueva(CvePregunta,CveEncuesta,Res)
                        VALUES(".$mivalor['Clave'].",$id,$res13);";
                if(!($bd->consulta($cmd))){
                    echo "<br>Error: ".$cmd;
                }
            }
        }
    }
    else{
        echo "<br>Error: ".$sql;
    }
    
    
    echo "Encuesta guardada Correctamente";
}
else{
    echo $cmd2;
}

?>