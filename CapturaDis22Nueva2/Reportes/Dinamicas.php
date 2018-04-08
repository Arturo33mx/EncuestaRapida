<?php
session_start();
set_time_limit(550);

include ('Classes/PHPExcel.php');
require_once 'Classes/PHPExcel/IOFactory.php';
require_once 'Classes/PHPExcel/Cell/AdvancedValueBinder.php';
PHPExcel_Cell::setValueBinder(new PHPExcel_Cell_AdvancedValueBinder());

$objReader = PHPExcel_IOFactory::createReader('Excel2007');
$objPHPExcel = $objReader->load("PreguntasDinamicas.xlsx");

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
$Abc = array("B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z",
              "AA", "AB", "AC", "AD", "AE", "AF", "AG", "AH", "AI", "AJ", "AK", "AL", "AM", "AN", "AO", "AP", "AQ", "AR", "AS", "AT", "AU", "AV", "AW", "AX", "AY", "AZ",
              "BA", "BB", "BC", "BD", "BE", "BF", "BG", "BH", "BI", "BJ", "BK", "BL", "BM", "BN", "BO", "BP", "BQ", "BR", "BS", "BT", "BU", "BV", "BW", "BX", "BY", "BZ",
              "CA", "CB", "CC", "CD", "CE", "CF", "CG", "CH", "CI", "CJ", "CK", "CL", "CM", "CN", "CO", "CP", "CQ", "CR", "CS", "CT", "CU", "CV", "CW", "CX", "CY", "CZ",);
$consulta="SELECT * FROM datosservicios.preguntas_dis22_nueva where CveDepende=$Muni"; 
$Resultado=$bd->consulta($consulta);
$cuantos_registros= $bd->num_rows($Resultado);
if($cuantos_registros==0){
	exit;
}
else{
	while($MostrarFila=$bd->fetch_array($Resultado)){
        if($MostrarFila['PregBase']==11){
            $objPHPExcel->getActiveSheet()->setCellValue($Abc[$IdxAbc]."2",($MostrarFila['PregBase'].". -".$MostrarFila['Identificador'].".".$MostrarFila['SubIden']));
            $objPHPExcel->getActiveSheet()->setCellValue($Abc[$IdxAbc]."1",$MostrarFila['Descripcion']);
        }
        if($MostrarFila['PregBase']==13){
            $objPHPExcel->getActiveSheet()->setCellValue($Abc[$IdxAbc]."2",$MostrarFila['Descripcion']);
        }
        $indx = 3;
        $sql="SELECT Res,count(*)Total, (select count(*)from respuestas_dis22_nueva where CvePRegunta=".$MostrarFila['Clave']." and Res <> 0 and Res is not null) Suma 
        FROM respuestas_dis22_nueva where CvePregunta=".$MostrarFila['Clave']." and Res <> 0 and Res is not null group by Res"; 
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
                            $objPHPExcel->getActiveSheet()->setCellValue($Abc[$IdxAbc].($indx+19),'0');
                            $indice++;
                            $indx++;
                        }
                        $objPHPExcel->getActiveSheet()->setCellValue($Abc[$IdxAbc].$indx,($mivalor['Total']));
                        $indx++;
                        $indice++;
                        $Prom=100/$mivalor['Suma']*$mivalor['Total'];
                        if($mivalor['Suma']<>0){
                            $objPHPExcel->getActiveSheet()->setCellValue($Abc[$IdxAbc]."21",$mivalor['Suma']);
                            $objPHPExcel->getActiveSheet()->setCellValue($Abc[$IdxAbc].($indx+18),$Prom);
                        }
                        else{
                            $objPHPExcel->getActiveSheet()->setCellValue($Abc[$IdxAbc]."21",$sql);
                            
                        }
                    }
                }
                else{

                }
            }
            else{
                //$IdxAbc++;
                //echo "<br>2".$sql;
            }
        }
        else{
            echo "<br>3".$sql;
        }
        $IdxAbc++;
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
