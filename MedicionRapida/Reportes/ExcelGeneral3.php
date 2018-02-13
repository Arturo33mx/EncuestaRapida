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
	include("../../class/mysql.php");
	$bd = new  MySQL;
endif;
header('Content-Type: text/html; charset=ISO-8859-1');

$fecha1 = date('Y-m-d');
$nomb = 'Concentrado Encuesta3 '.$fecha1;

$styleArray = array(
	'borders' => array(
		'allborders' => array(
			'style' => PHPExcel_Style_Border::BORDER_THIN,
			'color' => array('argb' => '255,255,0,0'),
		),
	),
);

$consulta="SELECT A.Fecha, B.Nombre, B.Folio, B.Telefono, B.Domicilio, B.Localidad, B.Municipio, B.Estatus, B.TipoAccion,
A.OtroTelefono, A.ResRedSocial, A.Comentario, A.Observaciones,
case A.EstatusNumero
when 1 then 'Contesto'
when 2 then 'Ocupado'
when 3 then 'Fuera de Linea'
end EstatusNumero,
case A.CveRedSocial
when 0 then 'No tiene'
when 1 then 'Otro'
when 2 then 'Facebook'
when 3 then 'Twitter'
when 4 then 'instagram'
end RedSocial
FROM encuesta3sismo A, numeros_sismo B 
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
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$indx, $MostrarFila['Fecha']);
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$indx, utf8_encode($MostrarFila['Nombre']));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$indx, ($MostrarFila['Folio']));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$indx, ($MostrarFila['Telefono']));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$indx, utf8_encode($MostrarFila['Domicilio']));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$indx, utf8_encode($MostrarFila['Localidad']));
		$objPHPExcel->getActiveSheet()->setCellValue('G'.$indx, utf8_encode($MostrarFila['Municipio']));
		$objPHPExcel->getActiveSheet()->setCellValue('H'.$indx, $MostrarFila['Estatus']);
		$objPHPExcel->getActiveSheet()->setCellValue('I'.$indx, $MostrarFila['TipoAccion']);
		$objPHPExcel->getActiveSheet()->setCellValue('J'.$indx, $MostrarFila['EstatusNumero']);
		$objPHPExcel->getActiveSheet()->setCellValue('K'.$indx, $MostrarFila['OtroTelefono']);
		$objPHPExcel->getActiveSheet()->setCellValue('L'.$indx, ($MostrarFila['RedSocial']));
		$objPHPExcel->getActiveSheet()->setCellValue('M'.$indx, ($MostrarFila['ResRedSocial']));
		$objPHPExcel->getActiveSheet()->setCellValue('N'.$indx, ($MostrarFila['Comentario']));
		$objPHPExcel->getActiveSheet()->setCellValue('O'.$indx, ($MostrarFila['Observaciones']));
		$indx++; 
	}
	$limite = $indx - 1;
	$objPHPExcel->getActiveSheet()->getStyle('A4:O'.$limite)->applyFromArray($styleArray);
	$objPHPExcel->getActiveSheet()->setCellValue('A1', 'Reporte General "Personas que no aparecen en el Censo y tienen Folio" '.$fecha1);
	$nomb .='.xlsx';
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="'.$nomb.'"');
	header('Cache-Control: max-age=0');

	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	$objWriter->save('php://output');
	exit;
}
?>
