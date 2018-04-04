<?php
session_start();
header('Content-Type: text/html; charset=ISO-8859-1');

include 'Classes/PHPExcel/IOFactory.php';
$objPHPExcel = PHPExcel_IOFactory::load('./LibroDtto22.xlsx');
/** conexion bd **/
if(!isset($bd)):
	include("../../class/mysql.php");
	$bd = new  MySQL;
endif;

$fecha1 = date('Y-m-d');
$nomb = 'LibroDtto22 '.$fecha1;
$con=1;
$Total=514;
$Total2=419;
$sql="SELECT 
(select count(Res16) FROM encuesta_distrito22 where Res16=1)uno,
(select count(Res16) FROM encuesta_distrito22 where Res16=2)dos;"; 
$Result=$bd->consulta($sql);
$cuantos_registros= $bd->num_rows($Result);
if($cuantos_registros!=0){
    if($MostrarFila=$bd->fetch_array($Result)){
       // $objPHPExcel->setActiveSheetIndex(6);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, 'Sexo');
        $con++;
        $Cant= round(((100/514)*($MostrarFila['uno'])),2);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant= round(((100/514)*($MostrarFila['dos'])),2);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
    }
}

$sql="SELECT 
(select count(Res17)FROM encuesta_distrito22 where Res17=1)uno,
(select count(Res17)FROM encuesta_distrito22 where Res17=2)dos,
(select count(Res17)FROM encuesta_distrito22 where Res17=3)tres,
(select count(Res17)FROM encuesta_distrito22 where Res17=4)cuatro;"; 
$Result=$bd->consulta($sql);
$cuantos_registros= $bd->num_rows($Result);
if($cuantos_registros!=0){
    if($MostrarFila=$bd->fetch_array($Result)){
       // $objPHPExcel->setActiveSheetIndex(6);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, 'Edad');
        $con++;
        $Cant= round(((100/514)*($MostrarFila['uno'])),2);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant= round(((100/514)*($MostrarFila['dos'])),2);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant= round(((100/514)*($MostrarFila['tres'])),2);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant= round(((100/514)*($MostrarFila['cuatro'])),2);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
    }
}

$sql="SELECT 
(select count(Res20)FROM encuesta_distrito22 where Res20=1)uno,
(select count(Res20)FROM encuesta_distrito22 where Res20=2)dos,
(select count(Res20)FROM encuesta_distrito22 where Res20=3)tres,
(select count(Res20)FROM encuesta_distrito22 where Res20=4)cuatro,
(select count(Res20)FROM encuesta_distrito22 where Res20=5)cinco,
(select count(Res20)FROM encuesta_distrito22 where Res20=6)seis;"; 
$Result=$bd->consulta($sql);
$cuantos_registros= $bd->num_rows($Result);
if($cuantos_registros!=0){
    if($MostrarFila=$bd->fetch_array($Result)){
       // $objPHPExcel->setActiveSheetIndex(6);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, 'Escolaridad');
        $con++;
        $Cant= round(((100/514)*($MostrarFila['uno'])),2);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant= round(((100/514)*($MostrarFila['dos'])),2);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant= round(((100/514)*($MostrarFila['tres'])),2);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant= round(((100/514)*($MostrarFila['cuatro'])),2);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant= round(((100/514)*($MostrarFila['cinco'])),2);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant= round(((100/514)*($MostrarFila['seis'])),2);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
    }
}

$sql="SELECT 
(select count(Res18)FROM encuesta_distrito22 where Res18=1)uno,
(select count(Res18)FROM encuesta_distrito22 where Res18=2)dos,
(select count(Res18)FROM encuesta_distrito22 where Res18=3)tres,
(select count(Res18)FROM encuesta_distrito22 where Res18=4)cuatro,
(select count(Res18)FROM encuesta_distrito22 where Res18=5)cinco,
(select count(Res18)FROM encuesta_distrito22 where Res18=6)seis;"; 
$Result=$bd->consulta($sql);
$cuantos_registros= $bd->num_rows($Result);
if($cuantos_registros!=0){
    if($MostrarFila=$bd->fetch_array($Result)){
       // $objPHPExcel->setActiveSheetIndex(6);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, 'Estado civil');
        $con++;
        $Cant=Promedio($Total,$MostrarFila['uno']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total,$MostrarFila['dos']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total,$MostrarFila['tres']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total,$MostrarFila['cuatro']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total,$MostrarFila['cinco']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total,$MostrarFila['seis']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
    }
}

$sql="SELECT 
(select count(Res21)FROM encuesta_distrito22 where Res21=1)uno,
(select count(Res21)FROM encuesta_distrito22 where Res21=2)dos,
(select count(Res21)FROM encuesta_distrito22 where Res21=3)tres,
(select count(Res21)FROM encuesta_distrito22 where Res21=4)cuatro,
(select count(Res21)FROM encuesta_distrito22 where Res21=5)cinco,
(select count(Res21)FROM encuesta_distrito22 where Res21=6)seis,
(select count(Res21)FROM encuesta_distrito22 where Res21=7)OP7;"; 
$Result=$bd->consulta($sql);
$cuantos_registros= $bd->num_rows($Result);
if($cuantos_registros!=0){
    if($MostrarFila=$bd->fetch_array($Result)){
       // $objPHPExcel->setActiveSheetIndex(6);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, 'ingresos');
        $con++;
        $Cant=Promedio($Total,$MostrarFila['uno']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total,$MostrarFila['dos']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total,$MostrarFila['tres']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total,$MostrarFila['cuatro']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total,$MostrarFila['cinco']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total,$MostrarFila['seis']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total,$MostrarFila['OP7']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
    }
}

$sql="SELECT 
(select count(Res19)FROM encuesta_distrito22 where Res19=1)uno,
(select count(Res19)FROM encuesta_distrito22 where Res19=2)dos,
(select count(Res19)FROM encuesta_distrito22 where Res19=3)tres,
(select count(Res19)FROM encuesta_distrito22 where Res19=4)cuatro,
(select count(Res19)FROM encuesta_distrito22 where Res19=5)cinco,
(select count(Res19)FROM encuesta_distrito22 where Res19=6)seis,
(select count(Res19)FROM encuesta_distrito22 where Res19=7)OP7,
(select count(Res19)FROM encuesta_distrito22 where Res19=8)OP8;"; 
$Result=$bd->consulta($sql);
$cuantos_registros= $bd->num_rows($Result);
if($cuantos_registros!=0){
    if($MostrarFila=$bd->fetch_array($Result)){
       // $objPHPExcel->setActiveSheetIndex(6);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, 'Ocupacion');
        $con++;
        $Cant=Promedio($Total,$MostrarFila['uno']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total,$MostrarFila['dos']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total,$MostrarFila['tres']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total,$MostrarFila['cuatro']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total,$MostrarFila['cinco']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total,$MostrarFila['seis']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total,$MostrarFila['OP7']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total,$MostrarFila['OP8']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
    }
}
$sql="SELECT 
(select count(Res1)FROM encuesta_distrito22 where Res1=1)uno,
(select count(Res1)FROM encuesta_distrito22 where Res1=2)dos,
(select count(Res1)FROM encuesta_distrito22 where Res1=3)tres,
(select count(Res1)FROM encuesta_distrito22 where Res1=4)cuatro,
(select count(Res1)FROM encuesta_distrito22 where Res1=5)cinco;"; 
$Result=$bd->consulta($sql);
$cuantos_registros= $bd->num_rows($Result);
if($cuantos_registros!=0){
    if($MostrarFila=$bd->fetch_array($Result)){
       // $objPHPExcel->setActiveSheetIndex(6);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, 'Preg 1');
        $con++;
        $Cant=Promedio($Total,$MostrarFila['uno']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total,$MostrarFila['dos']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total,$MostrarFila['tres']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total,$MostrarFila['cuatro']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total,$MostrarFila['cinco']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, 'Positiva / Negativa');
        $con++;
        
        $Cant=Promedio($Total,($MostrarFila['uno']+$MostrarFila['dos']));
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        
        $Cant=Promedio($Total,($MostrarFila['tres']+$MostrarFila['cuatro']));
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
    }
}
$sql="SELECT 
(select count(Res2)FROM encuesta_distrito22 where Res2=1)uno,
(select count(Res2)FROM encuesta_distrito22 where Res2=2)dos,
(select count(Res2)FROM encuesta_distrito22 where Res2=3)tres,
(select count(Res2)FROM encuesta_distrito22 where Res2=4)cuatro,
(select count(Res2)FROM encuesta_distrito22 where Res2=5)cinco;
"; 
$Result=$bd->consulta($sql);
$cuantos_registros= $bd->num_rows($Result);
if($cuantos_registros!=0){
    if($MostrarFila=$bd->fetch_array($Result)){
       // $objPHPExcel->setActiveSheetIndex(6);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, 'Preg 2');
        $con++;
        $Cant=Promedio($Total,$MostrarFila['uno']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total,$MostrarFila['dos']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total,$MostrarFila['tres']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total,$MostrarFila['cuatro']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total,$MostrarFila['cinco']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, 'Positiva / Negativa');
        $con++;
        
        $Cant=Promedio($Total,($MostrarFila['uno']+$MostrarFila['dos']));
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        
        $Cant=Promedio($Total,($MostrarFila['tres']+$MostrarFila['cuatro']));
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
    }
}
$sql="
SELECT 
(select count(Res3)FROM encuesta_distrito22 where Res3=1)uno,
(select count(Res3)FROM encuesta_distrito22 where Res3=2)dos,
(select count(Res3)FROM encuesta_distrito22 where Res3=3)tres,
(select count(Res3)FROM encuesta_distrito22 where Res3=4)cuatro,
(select count(Res3)FROM encuesta_distrito22 where Res3=5)cinco,
(select count(Res3)FROM encuesta_distrito22 where Res3=6)seis;"; 
$Result=$bd->consulta($sql);
$cuantos_registros= $bd->num_rows($Result);
if($cuantos_registros!=0){
    if($MostrarFila=$bd->fetch_array($Result)){
       // $objPHPExcel->setActiveSheetIndex(6);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, 'Preg 3');
        $con++;
        $Cant=Promedio($Total,$MostrarFila['uno']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total,$MostrarFila['dos']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total,$MostrarFila['tres']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total,$MostrarFila['cuatro']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total,$MostrarFila['cinco']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total,$MostrarFila['seis']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, 'Positiva / Negativa');
        $con++;
        
        $Cant=Promedio($Total,($MostrarFila['uno']+$MostrarFila['dos']));
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        
        $Cant=Promedio($Total,($MostrarFila['cinco']+$MostrarFila['cuatro']));
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
    }
}



$sql="SELECT 
(select count(Res7)FROM encuesta_distrito22 where Res7=1)uno,
(select count(Res7)FROM encuesta_distrito22 where Res7=2)dos,
(select count(Res7)FROM encuesta_distrito22 where Res7=3)tres,
(select count(Res7)FROM encuesta_distrito22 where Res7=4)cuatro,
(select count(Res7)FROM encuesta_distrito22 where Res7=5)cinco;"; 
$Result=$bd->consulta($sql);
$cuantos_registros= $bd->num_rows($Result);
if($cuantos_registros!=0){
    if($MostrarFila=$bd->fetch_array($Result)){
       // $objPHPExcel->setActiveSheetIndex(6);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, 'Preg 7');
        $con++;
        $Cant=Promedio($Total,$MostrarFila['uno']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total,$MostrarFila['dos']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total,$MostrarFila['tres']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total,$MostrarFila['cuatro']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total,$MostrarFila['cinco']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
    }
}

$sql="SELECT 
(select count(Res8)FROM encuesta_distrito22 where Res8=1)uno,
(select count(Res8)FROM encuesta_distrito22 where Res8=2)dos,
(select count(Res8)FROM encuesta_distrito22 where Res8=3)tres,
(select count(Res8)FROM encuesta_distrito22 where Res8=4)cuatro,
(select count(Res8)FROM encuesta_distrito22 where Res8=5)cinco;"; 
$Result=$bd->consulta($sql);
$cuantos_registros= $bd->num_rows($Result);
if($cuantos_registros!=0){
    if($MostrarFila=$bd->fetch_array($Result)){
       // $objPHPExcel->setActiveSheetIndex(6);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, 'Preg 8');
        $con++;
        $Cant=Promedio($Total,$MostrarFila['uno']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total,$MostrarFila['dos']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total,$MostrarFila['tres']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total,$MostrarFila['cuatro']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total,$MostrarFila['cinco']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
    }
}

$sql="SELECT 
(select count(Res9)FROM encuesta_distrito22 where Res9=1)uno,
(select count(Res9)FROM encuesta_distrito22 where Res9=2)dos,
(select count(Res9)FROM encuesta_distrito22 where Res9=3)tres,
(select count(Res9)FROM encuesta_distrito22 where Res9=4)cuatro,
(select count(Res9)FROM encuesta_distrito22 where Res9=5)cinco,
(select count(Res9)FROM encuesta_distrito22 where Res9=6)seis,
(select count(Res9)FROM encuesta_distrito22 where Res9=7)OP7,
(select count(Res9)FROM encuesta_distrito22 where Res9=8)OP8,
(select count(Res9)FROM encuesta_distrito22 where Res9=9)OP9,
(select count(Res9)FROM encuesta_distrito22 where Res9=10)OP10,
(select count(Res9)FROM encuesta_distrito22 where Res9=11)OP11,
(select count(Res9)FROM encuesta_distrito22 where Res9=12)OP12,
(select count(Res9)FROM encuesta_distrito22 where Res9=13)OP13,
(select count(Res9)FROM encuesta_distrito22 where Res9=14)OP14,
(select count(Res9)FROM encuesta_distrito22 where Res9=15)OP15,
(select count(Res9)FROM encuesta_distrito22 where Res9=16)OP16;"; 
$Result=$bd->consulta($sql);
$cuantos_registros= $bd->num_rows($Result);
if($cuantos_registros!=0){
    if($MostrarFila=$bd->fetch_array($Result)){
       // $objPHPExcel->setActiveSheetIndex(6);
        $Total3=0;
        $con2=$con;
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, 'Preg 9 con no');
        $con++;
        $Cant=Promedio($Total2,$MostrarFila['uno']);
        $Total3=$MostrarFila['uno'];
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total2,$MostrarFila['dos']);
        $Total3=$Total3+$MostrarFila['dos'];
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total2,$MostrarFila['tres']);
        $Total3=$Total3+$MostrarFila['tres'];
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total2,$MostrarFila['cuatro']);
        $Total3=$Total3+$MostrarFila['cuatro'];
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total2,$MostrarFila['cinco']);
        $Total3=$Total3+$MostrarFila['cinco'];
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total2,$MostrarFila['seis']);
        $Total3=$Total3+$MostrarFila['seis'];
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total2,$MostrarFila['OP7']);
        $Total3=$Total3+$MostrarFila['OP7'];
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total2,$MostrarFila['OP8']);
        $Total3=$Total3+$MostrarFila['OP8'];
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total2,$MostrarFila['OP9']);
        $Total3=$Total3+$MostrarFila['OP9'];
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total2,$MostrarFila['OP10']);
        $Total3=$Total3+$MostrarFila['OP10'];
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total2,$MostrarFila['OP11']);
        $Total3=$Total3+$MostrarFila['OP11'];
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++; 
        $Cant=Promedio($Total2,($MostrarFila['OP12']+$MostrarFila['OP14']));
        $Total3=$Total3+$MostrarFila['OP12']+$MostrarFila['OP14'];
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total2,$MostrarFila['OP13']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total2,$MostrarFila['OP15']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total2,$MostrarFila['OP16']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        
        $objPHPExcel->getActiveSheet()->setCellValue('B'.$con2, 'Preg 9 con no');
        $con2++;
        $Cant=Promedio($Total3,$MostrarFila['uno']);
        $objPHPExcel->getActiveSheet()->setCellValue('B'.$con2, $Cant);
        $con2++;
        $Cant=Promedio($Total3,$MostrarFila['dos']);
        $objPHPExcel->getActiveSheet()->setCellValue('B'.$con2, $Cant);
        $con2++;
        $Cant=Promedio($Total3,$MostrarFila['tres']);
        $objPHPExcel->getActiveSheet()->setCellValue('B'.$con2, $Cant);
        $con2++;
        $Cant=Promedio($Total3,$MostrarFila['cuatro']);
        $objPHPExcel->getActiveSheet()->setCellValue('B'.$con2, $Cant);
        $con2++;
        $Cant=Promedio($Total3,$MostrarFila['cinco']);
        $objPHPExcel->getActiveSheet()->setCellValue('B'.$con2, $Cant);
        $con2++;
        $Cant=Promedio($Total3,$MostrarFila['seis']);
        $objPHPExcel->getActiveSheet()->setCellValue('B'.$con2, $Cant);
        $con2++;
        $Cant=Promedio($Total3,$MostrarFila['OP7']);
        $objPHPExcel->getActiveSheet()->setCellValue('B'.$con2, $Cant);
        $con2++;
        $Cant=Promedio($Total3,$MostrarFila['OP8']);
        $objPHPExcel->getActiveSheet()->setCellValue('B'.$con2, $Cant);
        $con2++;
        $Cant=Promedio($Total3,$MostrarFila['OP9']);
        $objPHPExcel->getActiveSheet()->setCellValue('B'.$con2, $Cant);
        $con2++;
        $Cant=Promedio($Total3,$MostrarFila['OP10']);
        $objPHPExcel->getActiveSheet()->setCellValue('B'.$con2, $Cant);
        $con2++;
        $Cant=Promedio($Total3,$MostrarFila['OP11']);
        $objPHPExcel->getActiveSheet()->setCellValue('B'.$con2, $Cant);
        $con2++; 
        $Cant=Promedio($Total3,($MostrarFila['OP12']+$MostrarFila['OP14']));
        $objPHPExcel->getActiveSheet()->setCellValue('B'.$con2, $Cant);
        $con2++;
        
        
    }
}

$sql="SELECT 
(select count(Res10)FROM encuesta_distrito22 where Res10=1)uno,
(select count(Res10)FROM encuesta_distrito22 where Res10=2)dos,
(select count(Res10)FROM encuesta_distrito22 where Res10=3)tres,
(select count(Res10)FROM encuesta_distrito22 where Res10=4)cuatro,
(select count(Res10)FROM encuesta_distrito22 where Res10=5)cinco,
(select count(Res10)FROM encuesta_distrito22 where Res10=6)seis,
(select count(Res10)FROM encuesta_distrito22 where Res10=7)OP7,
(select count(Res10)FROM encuesta_distrito22 where Res10=8)OP8,
(select count(Res10)FROM encuesta_distrito22 where Res10=9)OP9,
(select count(Res10)FROM encuesta_distrito22 where Res10=10)OP10,
(select count(Res10)FROM encuesta_distrito22 where Res10=11)OP11,
(select count(Res10)FROM encuesta_distrito22 where Res10=12)OP12,
(select count(Res10)FROM encuesta_distrito22 where Res10=13)OP13,
(select count(Res10)FROM encuesta_distrito22 where Res10=14)OP14,
(select count(Res10)FROM encuesta_distrito22 where Res10=15)OP15,
(select count(Res10)FROM encuesta_distrito22 where Res10=16)OP16;"; 
$Result=$bd->consulta($sql);
$cuantos_registros= $bd->num_rows($Result);
if($cuantos_registros!=0){
    if($MostrarFila=$bd->fetch_array($Result)){
       // $objPHPExcel->setActiveSheetIndex(6);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, 'Preg 10');
        $con++;
        $Cant=Promedio($Total,$MostrarFila['uno']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total,$MostrarFila['dos']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total,$MostrarFila['tres']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total,$MostrarFila['cuatro']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total,$MostrarFila['seis']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total,$MostrarFila['OP7']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total,$MostrarFila['OP8']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total,$MostrarFila['OP9']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total,$MostrarFila['OP10']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total,$MostrarFila['OP11']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total,$MostrarFila['OP12']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total,$MostrarFila['OP13']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total,$MostrarFila['OP14']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total,$MostrarFila['OP15']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total,$MostrarFila['OP16']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
    }
}

$sql="SELECT 
(select count(Res11)FROM encuesta_distrito22 where Res11=1)uno,
(select count(Res11)FROM encuesta_distrito22 where Res11=2)dos,
(select count(Res11)FROM encuesta_distrito22 where Res11=3)tres,
(select count(Res11)FROM encuesta_distrito22 where Res11=4)cuatro,
(select count(Res11)FROM encuesta_distrito22 where Res11=5)cinco,
(select count(Res11)FROM encuesta_distrito22 where Res11=6)seis,
(select count(Res11)FROM encuesta_distrito22 where Res11=7)OP7,
(select count(Res11)FROM encuesta_distrito22 where Res11=8)OP8,
(select count(Res11)FROM encuesta_distrito22 where Res11=9)OP9,
(select count(Res11)FROM encuesta_distrito22 where Res11=10)OP10,
(select count(Res11)FROM encuesta_distrito22 where Res11=11)OP11,
(select count(Res11)FROM encuesta_distrito22 where Res11=12)OP12,
(select count(Res11)FROM encuesta_distrito22 where Res11=13)OP13,
(select count(Res11)FROM encuesta_distrito22 where Res11=14)OP14,
(select count(Res11)FROM encuesta_distrito22 where Res11=15)OP15,
(select count(Res11)FROM encuesta_distrito22 where Res11=16)OP16;"; 
$Result=$bd->consulta($sql);
$cuantos_registros= $bd->num_rows($Result);
if($cuantos_registros!=0){
    if($MostrarFila=$bd->fetch_array($Result)){
       // $objPHPExcel->setActiveSheetIndex(6);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, 'Preg 11');
        $con++;
        $Cant=Promedio($Total,$MostrarFila['uno']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total,$MostrarFila['dos']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total,$MostrarFila['tres']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total,$MostrarFila['cuatro']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total,$MostrarFila['seis']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total,$MostrarFila['OP7']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total,$MostrarFila['OP8']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total,$MostrarFila['OP9']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total,$MostrarFila['OP10']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total,$MostrarFila['OP11']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total,$MostrarFila['OP12']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total,$MostrarFila['OP13']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total,$MostrarFila['OP14']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total,$MostrarFila['OP15']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
        $Cant=Promedio($Total,$MostrarFila['OP16']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$con, $Cant);
        $con++;
    }
}
$index=1;
$objPHPExcel->getActiveSheet()->setCellValue('A'.$con, 'Preg 11');
$con++;
while($index<=15){
    $sql="SELECT 
    (select count(`Res12-".$index."-5`)FROM encuesta_distrito22 where `Res12-".$index."-1`=1)uno,
    (select count(`Res12-".$index."-5`)FROM encuesta_distrito22 where `Res12-".$index."-1`=2)dos,
    (select count(`Res12-".$index."-5`)FROM encuesta_distrito22 where `Res12-".$index."-1`=3)tres,
    (select count(`Res12-".$index."-5`)FROM encuesta_distrito22 where `Res12-".$index."-1`=4)cuatro,
    (select count(`Res12-".$index."-5`)FROM encuesta_distrito22 where `Res12-".$index."-1`=5)cinco,
    (select count(`Res12-".$index."-5`)FROM encuesta_distrito22 where `Res12-".$index."-1`=6)seis;"; 
    $Result=$bd->consulta($sql);
    //echo $sql;
    $cuantos_registros= $bd->num_rows($Result);
    if($cuantos_registros!=0){
        if($MostrarFila=$bd->fetch_array($Result)){
            $Cant=Promedio($Total,($MostrarFila['uno']+$MostrarFila['dos']));
            $objPHPExcel->getActiveSheet()->setCellValue('B'.$con, $Cant);
            $Cant=Promedio($Total,$MostrarFila['tres']);
            $objPHPExcel->getActiveSheet()->setCellValue('C'.$con, $Cant);
            $Cant=Promedio($Total,($MostrarFila['cuatro']+$MostrarFila['cinco']));
            $objPHPExcel->getActiveSheet()->setCellValue('D'.$con, $Cant);
            $Cant=Promedio($Total,$MostrarFila['seis']);
            $objPHPExcel->getActiveSheet()->setCellValue('E'.$con, $Cant);
            $con++;
        }
    }
    $index++;
}

function Promedio ($Tot,$Can){
    return round(((100/$Tot)*$Can),2);
}
$nomb .='.xlsx';
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="'.$nomb.'"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
?>
