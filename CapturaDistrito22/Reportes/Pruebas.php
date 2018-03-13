<?php 
if(!isset($bd)):
	include("../../class/mysql.php");
	$bd = new  MySQL;
endif;
$index=1;
while($index<=15){
    $sql="select Res5 from encuesta_distrito22
where FiltroCredencial=1 and FiltroMuni=1"; 
    $Result=$bd->consulta($sql);
    //echo $sql;
    $cuantos_registros= $bd->num_rows($Result);
    if($cuantos_registros!=0){
        while($MostrarFila=$bd->fetch_array($Result)){
           echo "<br>".$MostrarFila['Res5'];
        }
    }
    $index++;
}
?>