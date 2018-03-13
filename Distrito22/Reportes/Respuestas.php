<?php
session_start();
set_time_limit(550);

include ('Classes/PHPExcel.php');
require_once 'Classes/PHPExcel/IOFactory.php';
require_once 'Classes/PHPExcel/Cell/AdvancedValueBinder.php';
PHPExcel_Cell::setValueBinder(new PHPExcel_Cell_AdvancedValueBinder());

$objReader = PHPExcel_IOFactory::createReader('Excel2007');
$objPHPExcel = $objReader->load("Preguntas y respuestas.xlsx");

/** conexion bd **/
if(!isset($bd)):
	include("../../class/mysql.php");
	$bd = new  MySQL;
endif;
header('Content-Type: text/html; charset=ISO-8859-1');

$fecha1 = date('Y-m-d');
$nomb = 'Concentrado Medicion '.$fecha1;

$styleArray = array(
	'borders' => array(
		'allborders' => array(
			'style' => PHPExcel_Style_Border::BORDER_THIN,
			'color' => array('argb' => '255,255,0,0'),
		),
	),
);
$IdxAbc=0;
$Abc = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z",
              "AA", "AB", "AC", "AD", "AE", "AF", "AG", "AH", "AI", "AJ", "AK", "AL", "AM", "AN", "AO", "AP", "AQ", "AR", "AS", "AT", "AU", "AV", "AW", "AX", "AY", "AZ",
              "BA", "BB", "BC", "BD", "BE", "BF", "BG", "BH", "BI", "BJ", "BK", "BL", "BM", "BN", "BO", "BP", "BQ", "BR", "BS", "BT", "BU", "BV", "BW", "BX", "BY", "BZ",
              "CA", "CB", "CC", "CD", "CE", "CF", "CG", "CH", "CI", "CJ", "CK", "CL", "CM", "CN", "CO", "CP", "CQ", "CR", "CS", "CT", "CU", "CV", "CW", "CX", "CY", "CZ",);
$consulta="select COLUMN_NAME from INFORMATION_SCHEMA.COLUMNS where TABLE_NAME = 'encuesta_distrito22';"; 
$Resultado=$bd->consulta($consulta);
$cuantos_registros= $bd->num_rows($Resultado);
if($cuantos_registros==0){
	exit;
}
else{
	
	$ini = 0;
	while($MostrarFila=$bd->fetch_array($Resultado)){
        $indx = 4;
        if($ini>6){
            if(
                $MostrarFila['COLUMN_NAME']=='Res4-1' 
                || $MostrarFila['COLUMN_NAME']=='Res4-2'
                || $MostrarFila['COLUMN_NAME']=='Res5-1'
                || $MostrarFila['COLUMN_NAME']=='Res6-1'
            ){
                $sql="select `".$MostrarFila['COLUMN_NAME']."` Res, count(`".$MostrarFila['COLUMN_NAME']."`)Total
                    from encuesta_distrito22
                    where `".$MostrarFila['COLUMN_NAME']."` is not null and char_length(`".$MostrarFila['COLUMN_NAME']."`)>2
                    group by `".$MostrarFila['COLUMN_NAME']."`
                    having count(`".$MostrarFila['COLUMN_NAME']."`)>=1
                    limit 0,3;";
                //echo $sql;
            }
            elseif($MostrarFila['COLUMN_NAME']=='Res5' || $MostrarFila['COLUMN_NAME']=='Res6'){
                $sql="select '1' as Res,(select count(`".$MostrarFila['COLUMN_NAME']."`) from encuesta_distrito22 where `".$MostrarFila['COLUMN_NAME']."`=1) Total
                    union
                    select '2',(select count(`".$MostrarFila['COLUMN_NAME']."`) from encuesta_distrito22 where `".$MostrarFila['COLUMN_NAME']."`=2)
                    union
                    select '3',(select count(`".$MostrarFila['COLUMN_NAME']."`) from encuesta_distrito22 where `".$MostrarFila['COLUMN_NAME']."`=3)
                    union
                    select '4',(select count(`".$MostrarFila['COLUMN_NAME']."`) from encuesta_distrito22 where `".$MostrarFila['COLUMN_NAME']."`=4)
                    union
                    select '5',(select count(`".$MostrarFila['COLUMN_NAME']."`) from encuesta_distrito22 where `".$MostrarFila['COLUMN_NAME']."`=5)
                    union
                    select '6',(select count(`".$MostrarFila['COLUMN_NAME']."`) from encuesta_distrito22 where `".$MostrarFila['COLUMN_NAME']."`=6)
                    union
                    select '7',(select count(`".$MostrarFila['COLUMN_NAME']."`) from encuesta_distrito22 where `".$MostrarFila['COLUMN_NAME']."`=7)
                    union
                    select '8',(select count(`".$MostrarFila['COLUMN_NAME']."`) from encuesta_distrito22 where `".$MostrarFila['COLUMN_NAME']."`=8)
                    union
                    select '9',(select count(`".$MostrarFila['COLUMN_NAME']."`) from encuesta_distrito22 where `".$MostrarFila['COLUMN_NAME']."`=9)
                    union
                    select '10',(select count(`".$MostrarFila['COLUMN_NAME']."`) from encuesta_distrito22 where `".$MostrarFila['COLUMN_NAME']."`=10)
                    union
                    select '11',(select count(`".$MostrarFila['COLUMN_NAME']."`) from encuesta_distrito22 where `".$MostrarFila['COLUMN_NAME']."`=11)
                    union
                    select '12',(select count(`".$MostrarFila['COLUMN_NAME']."`) from encuesta_distrito22 where `".$MostrarFila['COLUMN_NAME']."`=12)
                    union
                    select '13',(select count(`".$MostrarFila['COLUMN_NAME']."`) from encuesta_distrito22 where `".$MostrarFila['COLUMN_NAME']."`=13)
                    union
                    select '14',(select count(`".$MostrarFila['COLUMN_NAME']."`) from encuesta_distrito22 where `".$MostrarFila['COLUMN_NAME']."`=14)
                    union
                    select '15',(select count(`".$MostrarFila['COLUMN_NAME']."`) from encuesta_distrito22 where `".$MostrarFila['COLUMN_NAME']."`=15)";
            }
            else{
                $sql="SELECT `".$MostrarFila['COLUMN_NAME']."` Res, count(*)Total FROM encuesta_distrito22 
                where `".$MostrarFila['COLUMN_NAME']."` <> 0 and `".$MostrarFila['COLUMN_NAME']."` is not null
                group by `".$MostrarFila['COLUMN_NAME']."`"; 
                
            }
            if($Res=$bd->consulta($sql)){
                $total= $bd->num_rows($Res);
                if($total!=0){
                    $Result=$bd->get_arreglo($sql);
                    if(!empty($Result)){
                        foreach ($Result as $mivalor){
                            //echo "<br>".$Abc[$IdxAbc]." - " .utf8_encode($mivalor['Res'])." - ".$mivalor['Total'];
                            //$objPHPExcel->getActiveSheet()->setCellValue($Abc[$IdxAbc].$indx, $MostrarFila['COLUMN_NAME']);
                            //$objPHPExcel->getActiveSheet()->setCellValue($Abc[$IdxAbc].$indx, $mivalor['Res']);
                            $objPHPExcel->getActiveSheet()->setCellValue($Abc[$IdxAbc].$indx,($MostrarFila['COLUMN_NAME']." - ".$mivalor['Res'].") ".$mivalor['Total']));
                            $indx++;
                        }
                    }
                    else{
                        echo $sql;
                    }
                }
                else{
                    echo $sql;
                }
            }
            else{
                echo $sql;
            }
            $IdxAbc++;
        }
        $ini++;
    }
    
	$nomb .='.xlsx';
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="'.$nomb.'"');
	header('Cache-Control: max-age=0');

	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	$objWriter->save('php://output');
	exit;
}
?>
