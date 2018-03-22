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

$Preg1021 = explode(",", substr($_POST["res1021A"],1));
$Preg1022 = explode(",", substr($_POST["res1022A"],1));
$Preg1023 = explode(",", substr($_POST["res1023A"],1));
$Preg1024 = explode(",", substr($_POST["res1024A"],1));


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
$res1011 = "'".$_POST["res1011"]."'";
$res1021 = "'".$_POST["res1021"]."'";
$res1031 = "'".$_POST["res1031"]."'";
$res1041 = "'".$_POST["res1041"]."'";
$res1012 = "'".$_POST["res1012"]."'";
$res1022 = "'".$_POST["res1022"]."'";
$res1032 = "'".$_POST["res1032"]."'";
$res1042 = "'".$_POST["res1042"]."'";
$res1013 = "'".$_POST["res1013"]."'";
$res1023 = "'".$_POST["res1023"]."'";
$res1033 = "'".$_POST["res1033"]."'";
$res1043 = "'".$_POST["res1043"]."'";
$res1014 = "'".$_POST["res1014"]."'";
$res1024 = "'".$_POST["res1024"]."'";
$res1034 = "'".$_POST["res1034"]."'";
$res1044 = "'".$_POST["res1044"]."'";

$res11 = "'".$_POST["res11"]."'";
$res12 = "'".$_POST["res12"]."'";
$res13 = "'".$_POST["res13"]."'";
$res14 = "'".$_POST["res14"]."'";

$resA = "'".$_POST["resA"]."'";
$resB = "'".$_POST["resB"]."'";
$resC = "'".$_POST["resC"]."'";
$resD = "'".$_POST["resD"]."'";
$resE = "'".$_POST["resE"]."'";
$resF = "'".$_POST["resF"]."'";


$usu= $_SESSION['UsuarioIdGeneral'];
$cmd2 = "
    INSERT INTO captura_dis22_nueva
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
`Res10-1-1`,
`Res10-1-2`,
`Res10-1-3`,
`Res10-1-4`,
`Res10-2-1`,
`Res10-2-2`,
`Res10-2-3`,
`Res10-2-4`,
`Res10-3-1`,
`Res10-3-2`,
`Res10-3-3`,
`Res10-3-4`,
`Res10-4-1`,
`Res10-4-2`,
`Res10-4-3`,
`Res10-4-4`,
`Res11`,
`Res12`,
`Res14`,
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
$res1011,
$res1021,
$res1031,
$res1041,
$res1012,
$res1022,
$res1032,
$res1042,
$res1013,
$res1023,
$res1033,
$res1043,
$res1014,
$res1024,
$res1034,
$res1044,
$res11,
$res12,
$res14,
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
            if($mivalor['PregBase']==10){
                if($mivalor['SubIden']==1){
                    $cmd = "INSERT INTO respuestas_dis22_nueva(CvePregunta, CveEncuesta, Res)
                    VALUES(".$mivalor['Clave'].", $id, ".$Preg1021[($mivalor['Identificador']-1)].");";
                    if(!($bd->consulta($cmd))){
                        echo "<br>Error: ".$cmd;
                    }
                }
                if($mivalor['SubIden']==2){
                    $cmd = "INSERT INTO respuestas_dis22_nueva(CvePregunta, CveEncuesta, Res)
                    VALUES(".$mivalor['Clave'].", $id, ".$Preg1022[($mivalor['Identificador']-1)].");";
                    if(!($bd->consulta($cmd))){
                        echo "<br>Error: ".$cmd;
                    }
                }
                if($mivalor['SubIden']==3){
                    $cmd = "INSERT INTO respuestas_dis22_nueva(CvePregunta, CveEncuesta, Res)
                    VALUES(".$mivalor['Clave'].", $id, ".$Preg1023[($mivalor['Identificador']-1)].");";
                    if(!($bd->consulta($cmd))){
                        echo "<br>Error: ".$cmd;
                    }
                }
                if($mivalor['SubIden']==4){
                    $cmd = "INSERT INTO respuestas_dis22_nueva(CvePregunta, CveEncuesta, Res)
                    VALUES(".$mivalor['Clave'].", $id, ".$Preg1024[($mivalor['Identificador']-1)].");";
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