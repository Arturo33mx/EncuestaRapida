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
$Cons=0;
function Col($opc){
    if($opc==1)
        $Cons++;
    else
        $Cons==0;
    return $Cons;
}
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
 FROM datosservicios.captura_dis22;"; 
$Resultado=$bd->consulta($consulta);
//echo $consulta;
$cuantos_registros= $bd->num_rows($Resultado);
if($cuantos_registros==0){
	exit;
}
else{
	$indx = 1;
    $objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, 'Fecha');
    $objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, 'Seccion');
    $objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, 'Nip');
    $objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, 'Numero');
    $objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, 'CveMunicipio');
    $objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, 'Res1');
    $objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, 'Res2');
    $objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, 'Res3');
    $objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, 'Res4');
    $objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, 'Res5');
    $objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, 'Res6');
    $objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, 'Res7');
    $objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, 'Res8');
    $objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, 'Res9-1-1');
    $objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, 'Res9-1-2');
    $objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, 'Res9-1-3');
    $objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, 'Res9-1-4');
    $objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, 'Res9-2-1');
    $objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, 'Res9-2-2');
    $objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, 'Res9-2-3');
    $objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, 'Res9-2-4');
    $objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, 'Res9-3-1');
    $objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, 'Res9-3-2');
    $objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, 'Res9-3-3');
    $objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, 'Res9-3-4');
    $objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, 'Res9-4-1');
    $objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, 'Res9-4-2');
    $objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, 'Res9-4-3');
    $objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, 'Res9-4-4');
    $objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, 'Res9-5-1');
    $objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, 'Res9-5-2');
    $objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, 'Res9-5-3');
    $objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, 'Res9-5-4');
    $objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, 'Res9-6-1');
    $objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, 'Res9-6-2');
    $objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, 'Res9-6-3');
    $objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, 'Res9-6-4');
    $objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, 'Res9-7-1');
    $objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, 'Res9-7-2');
    $objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, 'Res9-7-3');
    $objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, 'Res9-7-4');
    $objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, 'Res9-8-1');
    $objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, 'Res9-8-2');
    $objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, 'Res9-8-3');
    $objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, 'Res9-8-4');
    $objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, 'Res10');
    $objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, 'Res11');
    $objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, 'Res12');
    $objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, 'Res13');
    $objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, 'Res14');
    $objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, 'Res15');
    $objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, 'Res16');
    $objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, 'Res17');
    $objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, 'Res18');
    $indx = 2;
	while($MostrarFila=$bd->fetch_array($Resultado)){
		$objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, $MostrarFila['Fecha']);
		$objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, $MostrarFila['Seccion']);
		$objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, $MostrarFila['Nip']);
		$objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, $MostrarFila['Numero']);
		$objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, $MostrarFila['CveMunicipio']);
		$objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, $MostrarFila['Res1']);
		$objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, $MostrarFila['Res2']);
		$objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, $MostrarFila['Res3']);
		$objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, $MostrarFila['Res4']);
		$objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, $MostrarFila['Res5']);
		$objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, $MostrarFila['Res6']);
		$objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, $MostrarFila['Res7']);
		$objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, $MostrarFila['Res8']);
		$objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, $MostrarFila['Res9-1-1']);
		$objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, $MostrarFila['Res9-1-2']);
		$objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, $MostrarFila['Res9-1-3']);
		$objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, $MostrarFila['Res9-1-4']);
        $objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, $MostrarFila['Res9-2-1']);
		$objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, $MostrarFila['Res9-2-2']);
		$objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, $MostrarFila['Res9-2-3']);
		$objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, $MostrarFila['Res9-2-4']);
        $objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, $MostrarFila['Res9-3-1']);
		$objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, $MostrarFila['Res9-3-2']);
		$objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, $MostrarFila['Res9-3-3']);
		$objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, $MostrarFila['Res9-3-4']);
        $objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, $MostrarFila['Res9-4-1']);
		$objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, $MostrarFila['Res9-4-2']);
		$objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, $MostrarFila['Res9-4-3']);
		$objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, $MostrarFila['Res9-4-4']);
        $objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, $MostrarFila['Res9-5-1']);
		$objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, $MostrarFila['Res9-5-2']);
		$objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, $MostrarFila['Res9-5-3']);
		$objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, $MostrarFila['Res9-5-4']);
        $objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, $MostrarFila['Res9-6-1']);
		$objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, $MostrarFila['Res9-6-2']);
		$objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, $MostrarFila['Res9-6-3']);
		$objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, $MostrarFila['Res9-6-4']);
        $objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, $MostrarFila['Res9-7-1']);
		$objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, $MostrarFila['Res9-7-2']);
		$objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, $MostrarFila['Res9-7-3']);
		$objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, $MostrarFila['Res9-7-4']);
        $objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, $MostrarFila['Res9-8-1']);
		$objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, $MostrarFila['Res9-8-2']);
		$objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, $MostrarFila['Res9-8-3']);
		$objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, $MostrarFila['Res9-8-4']);
		$objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, $MostrarFila['Res10']);
		$objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, $MostrarFila['Res11']);
		$objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, $MostrarFila['Res12']);
		$objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, $MostrarFila['Res13']);
		$objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, $MostrarFila['Res14']);
		$objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, $MostrarFila['Res15']);
		$objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, $MostrarFila['Res16']);
		$objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, $MostrarFila['Res17']);
		$objPHPExcel->getActiveSheet()->setCellValue(Col().$indx, $MostrarFila['Res18']);
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
