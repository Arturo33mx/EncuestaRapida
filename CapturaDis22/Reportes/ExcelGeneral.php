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
$nomb = 'Concentrado de Respuestas '.$fecha1;

$styleArray = array(
	'borders' => array(
		'allborders' => array(
			'style' => PHPExcel_Style_Border::BORDER_THIN,
			'color' => array('argb' => '255,255,0,0'),
		),
	),
);

$consulta="SELECT 
`Fecha`,
`Seccion`,
`Nip`,
`Numero`,
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
`Res9-2-1`,
`Res9-2-2`,
`Res9-2-3`,
`Res9-2-4`,
`Res9-3-1`,
`Res9-3-2`,
`Res9-3-3`,
`Res9-3-4`,
`Res9-4-1`,
`Res9-4-2`,
`Res9-4-3`,
`Res9-4-4`,
`Res9-5-1`,
`Res9-5-2`,
`Res9-5-3`,
`Res9-5-4`,
`Res9-6-1`,
`Res9-6-2`,
`Res9-6-3`,
`Res9-6-4`,
`Res9-7-1`,
`Res9-7-2`,
`Res9-7-3`,
`Res9-7-4`,
`Res9-8-1`,
`Res9-8-2`,
`Res9-8-3`,
`Res9-8-4`,
`Res10`,
`Res11`,
`Res12`,
`Res13`,
`Res14`,
`Res15`,
`Res16`,
`Res17`,
`Res18`
 FROM datosservicios.captura_distrito22;"; 
$Resultado=$bd->consulta($consulta);
//echo $consulta;
$cuantos_registros= $bd->num_rows($Resultado);
if($cuantos_registros==0){
	exit;
}
else{
	$indx = 1;
    $objPHPExcel->getActiveSheet()->setCellValue('A'.$indx, 'Fecha');
    $objPHPExcel->getActiveSheet()->setCellValue('B'.$indx, 'Seccion');
    $objPHPExcel->getActiveSheet()->setCellValue('C'.$indx, 'Nip');
    $objPHPExcel->getActiveSheet()->setCellValue('D'.$indx, 'Numero');
    $objPHPExcel->getActiveSheet()->setCellValue('E'.$indx, 'CveMunicipio');
    $objPHPExcel->getActiveSheet()->setCellValue('F'.$indx, 'Res1');
    $objPHPExcel->getActiveSheet()->setCellValue('G'.$indx, 'Res2');
    $objPHPExcel->getActiveSheet()->setCellValue('H'.$indx, 'Res3');
    $objPHPExcel->getActiveSheet()->setCellValue('I'.$indx, 'Res4');
    $objPHPExcel->getActiveSheet()->setCellValue('J'.$indx, 'Res5');
    $objPHPExcel->getActiveSheet()->setCellValue('K'.$indx, 'Res6');
    $objPHPExcel->getActiveSheet()->setCellValue('L'.$indx, 'Res7');
    $objPHPExcel->getActiveSheet()->setCellValue('M'.$indx, 'Res8');
    $objPHPExcel->getActiveSheet()->setCellValue('N'.$indx, 'Res9-1-1');
    $objPHPExcel->getActiveSheet()->setCellValue('O'.$indx, 'Res9-1-2');
    $objPHPExcel->getActiveSheet()->setCellValue('P'.$indx, 'Res9-1-3');
    $objPHPExcel->getActiveSheet()->setCellValue('Q'.$indx, 'Res9-1-4');
    
    $objPHPExcel->getActiveSheet()->setCellValue('S'.$indx, 'Res9-2-1');
    $objPHPExcel->getActiveSheet()->setCellValue('T'.$indx, 'Res9-2-2');
    $objPHPExcel->getActiveSheet()->setCellValue('U'.$indx, 'Res9-2-3');
    $objPHPExcel->getActiveSheet()->setCellValue('V'.$indx, 'Res9-2-4');
    
    $objPHPExcel->getActiveSheet()->setCellValue('X'.$indx, 'Res9-3-1');
    $objPHPExcel->getActiveSheet()->setCellValue('Y'.$indx, 'Res9-3-2');
    $objPHPExcel->getActiveSheet()->setCellValue('Z'.$indx, 'Res9-3-3');
    $objPHPExcel->getActiveSheet()->setCellValue('AA'.$indx, 'Res9-3-4');
    
    $objPHPExcel->getActiveSheet()->setCellValue('AC'.$indx, 'Res9-4-1');
    $objPHPExcel->getActiveSheet()->setCellValue('AD'.$indx, 'Res9-4-2');
    $objPHPExcel->getActiveSheet()->setCellValue('AE'.$indx, 'Res9-4-3');
    $objPHPExcel->getActiveSheet()->setCellValue('AF'.$indx, 'Res9-4-4');
    
    $objPHPExcel->getActiveSheet()->setCellValue('AH'.$indx, 'Res9-5-1');
    $objPHPExcel->getActiveSheet()->setCellValue('AI'.$indx, 'Res9-5-2');
    $objPHPExcel->getActiveSheet()->setCellValue('AJ'.$indx, 'Res9-5-3');
    $objPHPExcel->getActiveSheet()->setCellValue('AK'.$indx, 'Res9-5-4');
    
    $objPHPExcel->getActiveSheet()->setCellValue('AM'.$indx, 'Res9-6-1');
    $objPHPExcel->getActiveSheet()->setCellValue('AN'.$indx, 'Res9-6-2');
    $objPHPExcel->getActiveSheet()->setCellValue('AO'.$indx, 'Res9-6-3');
    $objPHPExcel->getActiveSheet()->setCellValue('AP'.$indx, 'Res9-6-4');
    
    $objPHPExcel->getActiveSheet()->setCellValue('AR'.$indx, 'Res9-7-1');
    $objPHPExcel->getActiveSheet()->setCellValue('AS'.$indx, 'Res9-7-2');
    $objPHPExcel->getActiveSheet()->setCellValue('AT'.$indx, 'Res9-7-3');
    $objPHPExcel->getActiveSheet()->setCellValue('AU'.$indx, 'Res9-7-4');
    
    $objPHPExcel->getActiveSheet()->setCellValue('AW'.$indx, 'Res9-8-1');
    $objPHPExcel->getActiveSheet()->setCellValue('AX'.$indx, 'Res9-8-2');
    $objPHPExcel->getActiveSheet()->setCellValue('AY'.$indx, 'Res9-8-3');
    $objPHPExcel->getActiveSheet()->setCellValue('AZ'.$indx, 'Res9-8-4');
    
    $objPHPExcel->getActiveSheet()->setCellValue('BQ'.$indx, 'Res10');
    $objPHPExcel->getActiveSheet()->setCellValue('BR'.$indx, 'Res11');
    $objPHPExcel->getActiveSheet()->setCellValue('BS'.$indx, 'Res12');
    $objPHPExcel->getActiveSheet()->setCellValue('BT'.$indx, 'Res13');
    $objPHPExcel->getActiveSheet()->setCellValue('BU'.$indx, 'Res14');
    $objPHPExcel->getActiveSheet()->setCellValue('BV'.$indx, 'Res15');
    $objPHPExcel->getActiveSheet()->setCellValue('BW'.$indx, 'Res16');
    $objPHPExcel->getActiveSheet()->setCellValue('BX'.$indx, 'Res17');
    $objPHPExcel->getActiveSheet()->setCellValue('BY'.$indx, 'Res18');
    $indx = 2;
	while($MostrarFila=$bd->fetch_array($Resultado)){
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$indx, $MostrarFila['Fecha']);
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$indx, $MostrarFila['Seccion']);
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$indx, $MostrarFila['Nip']);
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$indx, $MostrarFila['Numero']);
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$indx, $MostrarFila['CveMunicipio']);
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$indx, $MostrarFila['Res1']);
		$objPHPExcel->getActiveSheet()->setCellValue('G'.$indx, $MostrarFila['Res2']);
		$objPHPExcel->getActiveSheet()->setCellValue('H'.$indx, $MostrarFila['Res3']);
		$objPHPExcel->getActiveSheet()->setCellValue('I'.$indx, $MostrarFila['Res4']);
		$objPHPExcel->getActiveSheet()->setCellValue('J'.$indx, $MostrarFila['Res5']);
		$objPHPExcel->getActiveSheet()->setCellValue('K'.$indx, $MostrarFila['Res6']);
		$objPHPExcel->getActiveSheet()->setCellValue('L'.$indx, $MostrarFila['Res7']);
		$objPHPExcel->getActiveSheet()->setCellValue('M'.$indx, $MostrarFila['Res8']);
		$objPHPExcel->getActiveSheet()->setCellValue('N'.$indx, $MostrarFila['Res9-1-1']);
		$objPHPExcel->getActiveSheet()->setCellValue('O'.$indx, $MostrarFila['Res9-1-2']);
		$objPHPExcel->getActiveSheet()->setCellValue('P'.$indx, $MostrarFila['Res9-1-3']);
		$objPHPExcel->getActiveSheet()->setCellValue('Q'.$indx, $MostrarFila['Res9-1-4']);
        
        $objPHPExcel->getActiveSheet()->setCellValue('S'.$indx, $MostrarFila['Res9-2-1']);
		$objPHPExcel->getActiveSheet()->setCellValue('T'.$indx, $MostrarFila['Res9-2-2']);
		$objPHPExcel->getActiveSheet()->setCellValue('U'.$indx, $MostrarFila['Res9-2-3']);
		$objPHPExcel->getActiveSheet()->setCellValue('V'.$indx, $MostrarFila['Res9-2-4']);
        
        $objPHPExcel->getActiveSheet()->setCellValue('X'.$indx, $MostrarFila['Res9-3-1']);
		$objPHPExcel->getActiveSheet()->setCellValue('Y'.$indx, $MostrarFila['Res9-3-2']);
		$objPHPExcel->getActiveSheet()->setCellValue('Z'.$indx, $MostrarFila['Res9-3-3']);
		$objPHPExcel->getActiveSheet()->setCellValue('AA'.$indx, $MostrarFila['Res9-3-4']);
        
        $objPHPExcel->getActiveSheet()->setCellValue('AC'.$indx, $MostrarFila['Res9-4-1']);
		$objPHPExcel->getActiveSheet()->setCellValue('AD'.$indx, $MostrarFila['Res9-4-2']);
		$objPHPExcel->getActiveSheet()->setCellValue('AE'.$indx, $MostrarFila['Res9-4-3']);
		$objPHPExcel->getActiveSheet()->setCellValue('AF'.$indx, $MostrarFila['Res9-4-4']);
        
        $objPHPExcel->getActiveSheet()->setCellValue('AH'.$indx, $MostrarFila['Res9-5-1']);
		$objPHPExcel->getActiveSheet()->setCellValue('AI'.$indx, $MostrarFila['Res9-5-2']);
		$objPHPExcel->getActiveSheet()->setCellValue('AJ'.$indx, $MostrarFila['Res9-5-3']);
		$objPHPExcel->getActiveSheet()->setCellValue('AK'.$indx, $MostrarFila['Res9-5-4']);
        
        $objPHPExcel->getActiveSheet()->setCellValue('AM'.$indx, $MostrarFila['Res9-6-1']);
		$objPHPExcel->getActiveSheet()->setCellValue('AN'.$indx, $MostrarFila['Res9-6-2']);
		$objPHPExcel->getActiveSheet()->setCellValue('AO'.$indx, $MostrarFila['Res9-6-3']);
		$objPHPExcel->getActiveSheet()->setCellValue('AP'.$indx, $MostrarFila['Res9-6-4']);
        
        $objPHPExcel->getActiveSheet()->setCellValue('AR'.$indx, $MostrarFila['Res9-7-1']);
		$objPHPExcel->getActiveSheet()->setCellValue('AS'.$indx, $MostrarFila['Res9-7-2']);
		$objPHPExcel->getActiveSheet()->setCellValue('AT'.$indx, $MostrarFila['Res9-7-3']);
		$objPHPExcel->getActiveSheet()->setCellValue('AU'.$indx, $MostrarFila['Res9-7-4']);
        
        $objPHPExcel->getActiveSheet()->setCellValue('AW'.$indx, $MostrarFila['Res9-8-1']);
		$objPHPExcel->getActiveSheet()->setCellValue('AX'.$indx, $MostrarFila['Res9-8-2']);
		$objPHPExcel->getActiveSheet()->setCellValue('AY'.$indx, $MostrarFila['Res9-8-3']);
		$objPHPExcel->getActiveSheet()->setCellValue('AZ'.$indx, $MostrarFila['Res9-8-4']);
        
		$objPHPExcel->getActiveSheet()->setCellValue('BQ'.$indx, $MostrarFila['Res10']);
		$objPHPExcel->getActiveSheet()->setCellValue('BR'.$indx, $MostrarFila['Res11']);
		$objPHPExcel->getActiveSheet()->setCellValue('BS'.$indx, $MostrarFila['Res12']);
		$objPHPExcel->getActiveSheet()->setCellValue('BT'.$indx, $MostrarFila['Res13']);
		$objPHPExcel->getActiveSheet()->setCellValue('BU'.$indx, $MostrarFila['Res14']);
		$objPHPExcel->getActiveSheet()->setCellValue('BV'.$indx, $MostrarFila['Res15']);
		$objPHPExcel->getActiveSheet()->setCellValue('BW'.$indx, $MostrarFila['Res16']);
		$objPHPExcel->getActiveSheet()->setCellValue('BX'.$indx, $MostrarFila['Res17']);
		$objPHPExcel->getActiveSheet()->setCellValue('BY'.$indx, $MostrarFila['Res18']);
		$indx++; 
	}
	$nomb .='.xlsx';
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="'.$nomb.'"');
	header('Cache-Control: max-age=0');

	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	$objWriter->save('php://output');
	exit();
}
?>
