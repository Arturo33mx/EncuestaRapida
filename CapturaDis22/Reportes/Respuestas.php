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
$Abc = array("B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z",
              "AA", "AB", "AC", "AD", "AE", "AF", "AG", "AH", "AI", "AJ", "AK", "AL", "AM", "AN", "AO", "AP", "AQ", "AR", "AS", "AT", "AU", "AV", "AW", "AX", "AY", "AZ",
              "BA", "BB", "BC", "BD", "BE", "BF", "BG", "BH", "BI", "BJ", "BK", "BL", "BM", "BN", "BO", "BP", "BQ", "BR", "BS", "BT", "BU", "BV", "BW", "BX", "BY", "BZ",
              "CA", "CB", "CC", "CD", "CE", "CF", "CG", "CH", "CI", "CJ", "CK", "CL", "CM", "CN", "CO", "CP", "CQ", "CR", "CS", "CT", "CU", "CV", "CW", "CX", "CY", "CZ",);
$consulta="select COLUMN_NAME from INFORMATION_SCHEMA.COLUMNS where TABLE_NAME = 'captura_dis22';"; 
$Resultado=$bd->consulta($consulta);
$cuantos_registros= $bd->num_rows($Resultado);
if($cuantos_registros==0){
	exit;
}
else{
	
	$ini = 0;
	while($MostrarFila=$bd->fetch_array($Resultado)){
        $indx = 4;
        if($ini>8){
            $sql="SELECT `".$MostrarFila['COLUMN_NAME']."` Res, count(*)Total FROM captura_dis22 
                where `".$MostrarFila['COLUMN_NAME']."` <> 0 and `".$MostrarFila['COLUMN_NAME']."` is not null
                group by `".$MostrarFila['COLUMN_NAME']."`"; 
            if($Res=$bd->consulta($sql)){
                $total= $bd->num_rows($Res);
                if($total!=0){
                    $Result=$bd->get_arreglo($sql);
                    if(!empty($Result)){
                        $indice=1;
                        foreach ($Result as $mivalor){
                            //echo "<br>".$Abc[$IdxAbc].": ".$MostrarFila['COLUMN_NAME']."- " .utf8_encode($mivalor['Res'])." - ".$mivalor['Total'];
                            //$objPHPExcel->getActiveSheet()->setCellValue($Abc[$IdxAbc].$indx, $MostrarFila['COLUMN_NAME']);
                            //$objPHPExcel->getActiveSheet()->setCellValue($Abc[$IdxAbc].$indx, $mivalor['Res']);
                            while($indice!=$mivalor['Res']){
                                $objPHPExcel->getActiveSheet()->setCellValue($Abc[$IdxAbc].$indx,'0');
                                $indice++;
                                $indx++;
                            }
                            $objPHPExcel->getActiveSheet()->setCellValue($Abc[$IdxAbc].$indx,($mivalor['Res'].") ".$mivalor['Total']));
                            $indx++;
                            $indice++;
                        }
                    }
                    else{
                        echo "<br>1".$sql;
                    }
                }
                else{
                    echo "<br>2".$sql;
                }
            }
            else{
                echo "<br>3".$sql;
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
