<?php
if(!isset($bd)){
	include("../class/mysql.php");
	$bd = new  MySQL;
}
if(isset($_POST["Municipio"])){
    $Muni= $_POST["Municipio"];
}
else{
    echo "Error Fatal: Municipio invalido";
    exit();
}
?>
<select class="form-control" id="cmbPreg13">
    <option class="form-control" value="0">Seleciona</option>
    <option value="1">1) NS/NR</option>
    <option value="2">2) Ninguno </option>
    <option value="3">3) Otro </option>
    <?php
$sql="SELECT Identificador, Descripcion FROM datosservicios.preguntas_dis22_nueva
where PregBase=11 and CveDepende=$Muni 
group by Descripcion
order by Clave";
$categorias=$bd->get_arreglo($sql);
if(!empty($categorias)){
    foreach ($categorias as $mivalor){
?>
    <option value="<?php echo ($mivalor['Identificador']+4);?>">
        <?php echo ($mivalor['Identificador']+4).") ". utf8_encode($mivalor['Descripcion']);?>
    </option>
<?php
    }
}
?>
</select>