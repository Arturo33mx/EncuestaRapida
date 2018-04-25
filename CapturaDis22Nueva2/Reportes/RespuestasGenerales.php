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

if(isset($_GET['Muni']))
    $Muni=$_GET['Muni'];
else
    exit;

$styleArray = array(
	'borders' => array(
		'allborders' => array(
			'style' => PHPExcel_Style_Border::BORDER_THIN,
			'color' => array('argb' => '255,255,0,0'),
		),
	),
);
$IdxAbc=0;
$Abc = array("A","B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z",
              "AA", "AB", "AC", "AD", "AE", "AF", "AG", "AH", "AI", "AJ", "AK", "AL", "AM", "AN", "AO", "AP", "AQ", "AR", "AS", "AT", "AU", "AV", "AW", "AX", "AY", "AZ",
              "BA", "BB", "BC", "BD", "BE", "BF", "BG", "BH", "BI", "BJ", "BK", "BL", "BM", "BN", "BO", "BP", "BQ", "BR", "BS", "BT", "BU", "BV", "BW", "BX", "BY", "BZ",
              "CA", "CB", "CC", "CD", "CE", "CF", "CG", "CH", "CI", "CJ", "CK", "CL", "CM", "CN", "CO", "CP", "CQ", "CR", "CS", "CT", "CU", "CV", "CW", "CX", "CY", "CZ",);
function abcd($opc){
    $IdxAbc=$opc+1;
    return $Abc[$IdxAbc];
}
$sql="SELECT 
    `captura_dis22_nueva2`.`Fecha`,
    `captura_dis22_nueva2`.`Seccion`,
    `captura_dis22_nueva2`.`Nip`,
    `captura_dis22_nueva2`.`Numero`,
    `captura_dis22_nueva2`.`Folio`,
    `captura_dis22_nueva2`.`FolioR`,
    (select Descripcion from municipios where Clave=CveMunicipio)Municipio,
    `captura_dis22_nueva2`.`Res1`,
    `captura_dis22_nueva2`.`Res2`,
    `captura_dis22_nueva2`.`Res3`,
    `captura_dis22_nueva2`.`Res4`,
    `captura_dis22_nueva2`.`Res5`,
    `captura_dis22_nueva2`.`Res6`,
    `captura_dis22_nueva2`.`Res7`,
    `captura_dis22_nueva2`.`Res8`,
    `captura_dis22_nueva2`.`Res9`,
    `captura_dis22_nueva2`.`Res10`,
    `captura_dis22_nueva2`.`Res11-1-1`,
    `captura_dis22_nueva2`.`Res11-1-2`,
    `captura_dis22_nueva2`.`Res11-1-3`,
    `captura_dis22_nueva2`.`Res11-1-4`,
    `captura_dis22_nueva2`.`Res11-2-1`,
    `captura_dis22_nueva2`.`Res11-2-2`,
    `captura_dis22_nueva2`.`Res11-2-3`,
    `captura_dis22_nueva2`.`Res11-2-4`,
    `captura_dis22_nueva2`.`Res11-3-1`,
    `captura_dis22_nueva2`.`Res11-3-2`,
    `captura_dis22_nueva2`.`Res11-3-3`,
    `captura_dis22_nueva2`.`Res11-3-4`,
    `captura_dis22_nueva2`.`Res11-4-1`,
    `captura_dis22_nueva2`.`Res11-4-2`,
    `captura_dis22_nueva2`.`Res11-4-3`,
    `captura_dis22_nueva2`.`Res11-4-4`,
    `captura_dis22_nueva2`.`Res12`,
    `captura_dis22_nueva2`.`Res14`,
    `captura_dis22_nueva2`.`Res15`,
    `captura_dis22_nueva2`.`Res16`,
    `captura_dis22_nueva2`.`Res17`,
    `captura_dis22_nueva2`.`Res18`,
    `captura_dis22_nueva2`.`Res19`,
    `captura_dis22_nueva2`.`Res20`,
    `captura_dis22_nueva2`.`Res21`,
    `captura_dis22_nueva2`.`ResA`,
    `captura_dis22_nueva2`.`ResB`,
    `captura_dis22_nueva2`.`ResC`,
    `captura_dis22_nueva2`.`ResD`,
    `captura_dis22_nueva2`.`ResE`,
    `captura_dis22_nueva2`.`ResF`
FROM `datosservicios`.`captura_dis22_nueva2` where CveMunicipio=".$Muni; 
if($Res=$bd->consulta($sql)){
    $total= $bd->num_rows($Res);
    if($total!=0){
        $Result=$bd->get_arreglo($sql);
        if(!empty($Result)){
            foreach ($Result as $mivalor){
                abcd(-1);
                $objPHPExcel->getActiveSheet()->setCellValue(abcd($IdxAbc),($mivalor['Fecha']));
                $objPHPExcel->getActiveSheet()->setCellValue(abcd($IdxAbc),($mivalor['Seccion']));
                $objPHPExcel->getActiveSheet()->setCellValue(abcd($IdxAbc),($mivalor['Nip']));
                $objPHPExcel->getActiveSheet()->setCellValue(abcd($IdxAbc),($mivalor['Numero']));
                $objPHPExcel->getActiveSheet()->setCellValue(abcd($IdxAbc),($mivalor['FolioR']));
                $objPHPExcel->getActiveSheet()->setCellValue(abcd($IdxAbc),($mivalor['Municipio']));
                $objPHPExcel->getActiveSheet()->setCellValue(abcd($IdxAbc),($mivalor['Res1']));
                $objPHPExcel->getActiveSheet()->setCellValue(abcd($IdxAbc),($mivalor['Res2']));
                $objPHPExcel->getActiveSheet()->setCellValue(abcd($IdxAbc),($mivalor['Res3']));
                $objPHPExcel->getActiveSheet()->setCellValue(abcd($IdxAbc),($mivalor['Res4']));
                $objPHPExcel->getActiveSheet()->setCellValue(abcd($IdxAbc),($mivalor['Res5']));
                $objPHPExcel->getActiveSheet()->setCellValue(abcd($IdxAbc),($mivalor['Res6']));
                $objPHPExcel->getActiveSheet()->setCellValue(abcd($IdxAbc),($mivalor['Res7']));
                $objPHPExcel->getActiveSheet()->setCellValue(abcd($IdxAbc),($mivalor['Res8']));
                $objPHPExcel->getActiveSheet()->setCellValue(abcd($IdxAbc),($mivalor['Res9']));
                $objPHPExcel->getActiveSheet()->setCellValue(abcd($IdxAbc),($mivalor['Res10']));
                $objPHPExcel->getActiveSheet()->setCellValue(abcd($IdxAbc),($mivalor['Res11--1']));
                $objPHPExcel->getActiveSheet()->setCellValue(abcd($IdxAbc),($mivalor['Res11--2']));
                $objPHPExcel->getActiveSheet()->setCellValue(abcd($IdxAbc),($mivalor['Res11--3']));
                $objPHPExcel->getActiveSheet()->setCellValue(abcd($IdxAbc),($mivalor['Res11--4']));
                $indx++;
            }
        }
        else{
           // echo "<br>1".$sql;
        }
    }
    else{
        //echo "<br>2".$sql;
    }
}
else{
    echo "<br>3".$sql;
}
$IdxAbc++;
	$nomb .='.xlsx';
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="'.$nomb.'"');
	header('Cache-Control: max-age=0');

	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	$objWriter->save('php://output');
	exit;
}
?>
