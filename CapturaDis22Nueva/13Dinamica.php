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
    <?php
$sql="SELECT Identificador, Descripcion FROM datosservicios.preguntas_dis22_nueva
where PregBase=10 and CveDepende=$Muni 
group by Descripcion
order by Clave";
$categorias=$bd->get_arreglo($sql);
if(!empty($categorias)){
    foreach ($categorias as $mivalor){
?>
    <option value="<?php echo $mivalor['Identificador'];?>">
        <?php echo $mivalor['Identificador'].") ". utf8_encode($mivalor['Descripcion']);?>
    </option>
<?php
    }
}
?>
    <option value="6">6) Ninguno </option>
    <option value="7">7) Otro </option>
    <option value="8">8) NS/NR</option>
</select>