<?php
$array = array(
    "1) Raul Pineda", 
    "2) Emilio Hernandez", 
    "3) Felipe Argûello",
    "4) Armando Ortiz",
    "5) Javier Solis",
    "6) Gilberto Jimarez",
    "7) Reyes Caballero",
    "8) Teresa Juarez",
    "9) Karina Hernandez",
);
?>
<table class="table table-bordered table-hover">
    <thead>
        <tr class="bg-info text-white">
            <th></th>
            <th>14.1-1 -¿Ha oído hablar de: ?</th>
            <th>14.1-2 - ¿De qué partido político es?</th>
            <th>14.1-3 - ¿Ud. Votaría por él para DIPUTADO LOCAL?</th>
            <th>14.1-4 - Y, ¿Qué opinión tiene de él / ella?</th>
        </tr>
    </thead>
    <tbody>
        <tr class="">
            <?php
            foreach ($array as $i => $value) {
            ?>
            <td>
                <strong id="divRadPreg14-1<?php echo $i+1?>"><?php echo $array[$i]; ?></strong>
            </td>
            <td>
                <select class="form-control" onchange="CorroboraTabla(<?php echo $i+1?>,1)" id="cmbPreg14-1<?php echo $i+1?>">
                    <option value="0">Selec.</option>
                    <option value="1">Si </option>
                    <option value="2">Creo que si</option>
                    <option value="3">No</option>
                    <option value="4">NS/NR</option>
                </select>
            </td>
            <td>
                <select class="form-control" id="cmbPreg14-2<?php echo $i+1?>" disabled>
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
                <select class="form-control" id="cmbPreg14-3<?php echo $i+1?>" disabled>
                    <option value="0">Selec.</option>
                    <option value="1">Si</option>
                    <option value="2">Posiblemente</option>
                    <option value="3">No</option>
                    <option value="4">NS/NR</option>
                </select>
            </td>
            <td>
                <select class="form-control" id="cmbPreg14-4<?php echo $i+1?>" disabled>
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
        ?>
    </tbody>
    <tfoot>
    </tfoot>
</table>
<script>
    function CorroboraTabla(id,opc){
        if (opc==1){
            if($('#cmbPreg14-1'+id).val()==1 || $('#cmbPreg14-1'+id).val()==2){
                $('#cmbPreg14-2'+id).removeAttr("disabled");
                $('#cmbPreg14-3'+id).removeAttr("disabled");
                $('#cmbPreg14-4'+id).removeAttr("disabled");
            }
            else{
                $('#cmbPreg14-2'+id).attr("disabled", "disabled");
                $('#cmbPreg14-3'+id).attr("disabled", "disabled");
                $('#cmbPreg14-4'+id).attr("disabled", "disabled");
                $('#cmbPreg14-2'+id).val(0);
                $('#cmbPreg14-3'+id).val(0);
                $('#cmbPreg14-4'+id).val(0);
            }
        }
    }
</script>