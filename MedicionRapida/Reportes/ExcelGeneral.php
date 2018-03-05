<?php
session_start();
set_time_limit(550);

include ('Classes/PHPExcel.php');
require_once 'Classes/PHPExcel/IOFactory.php';
require_once 'Classes/PHPExcel/Cell/AdvancedValueBinder.php';
PHPExcel_Cell::setValueBinder(new PHPExcel_Cell_AdvancedValueBinder());

$objReader = PHPExcel_IOFactory::createReader('Excel2007');
$objPHPExcel = $objReader->load("ReporteGeneral.xlsx");

/** conexion bd **/
if(!isset($bd)):
	include("../../../class/mysql.php");
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

$consulta="SELECT A.Fecha, B.Nombres, B.Telefono, B.Ciudad, A.Observaciones, Res1, Res2, Res3, Res4,
case A.EstatusNumero
when 1 then 'Contesto'
when 2 then 'Ocupado'
when 3 then 'Fuera de Linea'
end EstatusNumero
FROM encuesta_medicion A, numeros_izucar B 
where A.CveNumero=B.Clave"; 
$Resultado=$bd->consulta($consulta);
//echo $consulta;
$cuantos_registros= $bd->num_rows($Resultado);
if($cuantos_registros==0){
	exit;
}
else{
	
	$indx = 4;
	while($MostrarFila=$bd->fetch_array($Resultado)){
		$Res1="";
		if($MostrarFila['Res1'] != NULL){
			$array1 = explode(",", $MostrarFila['Res1']);
			foreach ($array1 as &$valor) {
				switch ($valor) {
					case 1:
						$Res1 .= "Agua Potable, ";
						break;
					case 2:
						$Res1 .= "Alumbrado Público, ";
						break;
					case 3:
						$Res1 .= "Drenaje, ";
						break;
					case 4:
						$Res1 .= "Pavimentación, ";
						break;
					case 5:
						$Res1 .= "Servicios de Salud, ";
						break;
					case 6:
						$Res1 .= "Corrupción, ";
						break;
					case 7:
						$Res1 .= "Otros, ";
						break;
				}
			}
		}
		else{
			$Res1="";
		}
		$rest = substr($Res1, 0, -2);
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$indx, $MostrarFila['Fecha']);
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$indx, utf8_encode($MostrarFila['Nombres']));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$indx, ($MostrarFila['Telefono']));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$indx, utf8_encode($MostrarFila['Ciudad']));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$indx, $MostrarFila['EstatusNumero']);
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$indx, ($Res1));
		$objPHPExcel->getActiveSheet()->setCellValue('G'.$indx, ($MostrarFila['Res2']));
		$objPHPExcel->getActiveSheet()->setCellValue('H'.$indx, ($MostrarFila['Res3']));
		$objPHPExcel->getActiveSheet()->setCellValue('I'.$indx, ($MostrarFila['Res3']));
		$objPHPExcel->getActiveSheet()->setCellValue('J'.$indx, ($MostrarFila['Observaciones']));
		$indx++; 
	}
	
	$limite = $indx - 1;
	$objPHPExcel->getActiveSheet()->getStyle('A4:J'.$limite)->applyFromArray($styleArray);
	$objPHPExcel->getActiveSheet()->setCellValue('A1', 'Reporte General "Encuesta de Medicion" '.$fecha1);
	$nomb .='.xlsx';
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="'.$nomb.'"');
	header('Cache-Control: max-age=0');

	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	$objWriter->save('php://output');
	exit;
}
?>
