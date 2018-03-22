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
<table class="table table-bordered table-hover">
    <thead>
        <tr class="bg-info text-white">
            <th></th>
            <th>10.2-1 -¿Ha oído hablar de: ?</th>
            <th>10.2-2 - ¿De qué partido político es?</th>
            <th>10.2-3 - ¿Ud. Votaría por él para DIPUTADO LOCAL?</th>
            <th>10.2-4 - Y, ¿Qué opinión tiene de él / ella?</th>
        </tr>
    </thead>
    <tbody>
        
        <?php
        $sql="SELECT Identificador, Descripcion FROM datosservicios.preguntas_dis22_nueva
 where PregBase=10 and CveDepende=$Muni 
 group by Descripcion
 order by Clave";
        $categorias=$bd->get_arreglo($sql);
        if(!empty($categorias)){
            foreach ($categorias as $mivalor){
        ?>
        <tr>
            <td>
                <strong id="divRadPreg10-2<?php echo $mivalor['Identificador'];?>"><?php echo $mivalor['Identificador'].") ". utf8_encode($mivalor['Descripcion']); ?></strong>
            </td>
            <td>
                <select class="form-control" name="cmbPreg10-2-1[]" onchange="CorroboraTabla2(<?php echo $mivalor['Identificador'];?>,1)" id="cmbPreg10-2-1<?php echo $mivalor['Identificador']?>">
                    <option value="0">Selec.</option>
                    <option value="1">Si </option>
                    <option value="2">Creo que si</option>
                    <option value="3">No</option>
                    <option value="4">NS/NR</option>
                </select>
            </td>
            <td>
                <select class="form-control" name="cmbPreg10-2-2[]" id="cmbPreg10-2-2<?php echo $mivalor['Identificador']?>" disabled>
                    <option value="0">Selec.</option>
                    <option value="1">PAN</option>
                    <option value="2">PRI</option>
                    <option value="3">PRD</option>
                    <option value="4">PT</option>
                    <option value="5">PVEM</option>
                    <option value="6">MC</option>
                    <option value="7">Nueva Alianza</option>
                    <option value="8">Compromiso por Puebla</option>
                    <option value="9">PSI</option>
                    <option value="10">Morena</option>
                    <option value="11">Encuentro Social</option>
                    <option value="12">Candidatura Independiente</option>
                    <option value="13">Otro</option>
                    <option value="14">Ninguno</option>
                    <option value="15">NS/NR</option>
                </select>
            </td>
            <td>
                <select class="form-control" name="cmbPreg10-2-3[]" id="cmbPreg10-2-3<?php echo $mivalor['Identificador']?>" disabled>
                    <option value="0">Selec.</option>
                    <option value="1">Si</option>
                    <option value="2">Posiblemente</option>
                    <option value="3">No</option>
                    <option value="4">NS/NR</option>
                </select>
            </td>
            <td>
                <select class="form-control" name="cmbPreg10-2-4[]" id="cmbPreg10-2-4<?php echo $mivalor['Identificador']?>" disabled>
                    <option value="0">Selec.</option>
                    <option value="1">Muy buena</option>
                    <option value="2">Buena</option>
                    <option value="3">Regular</option>
                    <option value="4">Mala</option>
                    <option value="5">Muy mala</option>
                    <option value="6">NS/NR</option>
                </select>
            </td>
        </tr>
        <?php
            }
        }
        ?>
    </tbody>
    <tfoot>
    </tfoot>
</table>
<script>
     function CorroboraTabla2(id,opc){
        if (opc==1){
            if($('#cmbPreg10-2-1'+id).val()==1 || $('#cmbPreg10-2-1'+id).val()==2){
                $('#cmbPreg10-2-2'+id).removeAttr("disabled");
                $('#cmbPreg10-2-3'+id).removeAttr("disabled");
                $('#cmbPreg10-2-4'+id).removeAttr("disabled");
            }
            else{
                $('#cmbPreg10-2-2'+id).attr("disabled", "disabled");
                $('#cmbPreg10-2-3'+id).attr("disabled", "disabled");
                $('#cmbPreg10-2-4'+id).attr("disabled", "disabled");
            }
        }
    }
</script>