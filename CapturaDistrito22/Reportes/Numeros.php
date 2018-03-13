<?php
session_start();
set_time_limit(550);

include ('Classes/PHPExcel.php');
require_once 'Classes/PHPExcel/IOFactory.php';
require_once 'Classes/PHPExcel/Cell/AdvancedValueBinder.php';
PHPExcel_Cell::setValueBinder(new PHPExcel_Cell_AdvancedValueBinder());

$objReader = PHPExcel_IOFactory::createReader('Excel2007');
$objPHPExcel = $objReader->load("ReporteGeneral2.xlsx");

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

$consulta="SELECT 
    A.Clave,
    A.Telefono,
    A.Tipo,
    A.Nombres,
    A.ApePaterno,
    A.ApeMaterno,
    A.Domicilio,
    A.CP,
    A.Colonia,
    A.Ciudad,
    case A.EstatusNumero
    when 1 then 'Concretada'
    when 0 then 'Fuera De Linea'
    when 2 then 'Fuera De Linea'
    when 3 then 'Fuera De Linea'
    end as Estatus,
    group_concat(B.Observaciones) as Observaciones
FROM
    numeros_izucar A,
    encuesta_medicion B
WHERE
    A.Clave = B.CveNumero
    group by A.Clave;"; 
$Resultado=$bd->consulta($consulta);
//echo $consulta;
$cuantos_registros= $bd->num_rows($Resultado);
if($cuantos_registros==0){
	exit;
}
else{
	
	$indx = 4;
	while($MostrarFila=$bd->fetch_array($Resultado)){
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$indx, $MostrarFila['Clave']);
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$indx, utf8_encode($MostrarFila['Telefono']));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$indx, ($MostrarFila['Tipo']));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$indx, utf8_encode($MostrarFila['Nombres']));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$indx, utf8_encode($MostrarFila['ApePaterno']));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$indx, utf8_encode($MostrarFila['ApeMaterno']));
		$objPHPExcel->getActiveSheet()->setCellValue('G'.$indx, $MostrarFila['Domicilio']);
		$objPHPExcel->getActiveSheet()->setCellValue('H'.$indx, $MostrarFila['CP']);
		$objPHPExcel->getActiveSheet()->setCellValue('I'.$indx, $MostrarFila['Colonia']);
		$objPHPExcel->getActiveSheet()->setCellValue('J'.$indx, $MostrarFila['Ciudad']);
		$objPHPExcel->getActiveSheet()->setCellValue('K'.$indx, $MostrarFila['Estatus']);
		$objPHPExcel->getActiveSheet()->setCellValue('L'.$indx, ($MostrarFila['Observaciones']));
		$indx++; 
	}
	
	$limite = $indx - 1;
	$objPHPExcel->getActiveSheet()->getStyle('A4:L'.$limite)->applyFromArray($styleArray);
	$objPHPExcel->getActiveSheet()->setCellValue('A1', 'Base de Numeros" '.$fecha1);
	$nomb .='.xlsx';
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="'.$nomb.'"');
	header('Cache-Control: max-age=0');

	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	$objWriter->save('php://output');
	exit;
}
?>
