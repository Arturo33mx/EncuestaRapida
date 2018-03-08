<?php
$array = array(
    "Gerardo Islas Maldonado", 
    "Armando Galindo Galindo", 
    "Gustavo Leoncio Sánchez",
    "Cutberto Cantorán",
    "Melitón Lozano Pérez",
    "Manuel Madero González",
    "Eliseo Morales Rosales",
    "Conrado González Hernández",
    "Filiberto Guevara González",
    "Edgar Morales Moreno",
    "Arnulfo Dominguez",
    "Mario Herrera Arzola",
    "Enrique Nácer Hernández",
    "Víctor Hugo Islas Hernández",
    "Luz del Carmen Martínez"
);
$array2 = array(
    "Secretario de Desarrollo Soacial en el Gob. del Estado", 
    "Coordinador de Desarrollo Educativo (Corde) 07 de Izucar de Matamoros", 
    "Presidente Municipal de Tepeojuma",
    "Ex Diputado Federal del Pri",
    "Ex Diputado Local por el PRD",
    "Presidente Municipal de Izucar de Matamoros",
    "Presidente Municipal de Tilapa",
    "Lider de la CNC en Izucar",
    "Diputado Federal del Pri",
    "Ex Militante del Pri",
    "Ex Presidente municipal de Chiautla",
    "Militante del PT y Empresario",
    "Ex Diputado Local por el Partido Nueva Alianza",
    "Ex Diputado Local",
    ""
);
?>
<table class="table table-bordered table-hover">
    <thead>
        <tr class="bg-info text-white">
            <th></th>
            <th>12.1 -¿Ha oído hablar de: ?</th>
            <th>En caso de negativa, dar información adicional 12.2 - Ayudado</th>
            <th>12.3 - ¿De qué partido político es?</th>
            <th>12.4 - ¿Ud. Votaría por él para DIPUTADO LOCAL?</th>
            <th>12.5 - Y, ¿Qué opinión tiene de él / ella?</th>
        </tr>
    </thead>
    <tbody>
        <tr class="">
            <?php
            foreach ($array as $i => $value) {
            ?>
            <td>
                <strong id="divRadPreg12<?php echo $i+1?>"><?php echo $array[$i]; ?></strong>
            </td>
            <td>
                <select class="form-control" onchange="CorroboraTabla(<?php echo $i+1?>,1)" id="cmbPreg121<?php echo $i+1?>">
                    <option value="0">Selec.</option>
                    <option value="1">Si </option>
                    <option value="2">Creo que si</option>
                    <option value="3">No</option>
                    <option value="4">NS/NR</option>
                </select>
            </td>
            <td>
                <div class="alert alert-warning"><?php echo $array2[$i]; ?></div>
                <select class="form-control" onchange="CorroboraTabla(<?php echo $i+1?>,2)" id="cmbPreg122<?php echo $i+1?>" disabled>
                    <option value="0">Selec.</option>
                    <option value="1">Si </option>
                    <option value="2">Creo que si</option>
                    <option value="3">No</option>
                    <option value="4">NS/NR</option>
                </select>
            </td>
            <td>
                <select class="form-control" id="cmbPreg123<?php echo $i+1?>" disabled>
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
                <select class="form-control" id="cmbPreg124<?php echo $i+1?>" disabled>
                    <option value="0">Selec.</option>
                    <option value="1">Si</option>
                    <option value="2">Posiblemente</option>
                    <option value="3">No</option>
                    <option value="4">NS/NR</option>
                </select>
            </td>
            <td>
                <select class="form-control" id="cmbPreg125<?php echo $i+1?>" disabled>
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
        <tr class="bg-info text-white">
            <th></th>
            <th>¿Ha oído hablar de: ?</th>
            <th>En caso de negativa, dar información adicional 14.1.- Ayudado</th>
            <th>14.2.- ¿De qué partido político es?</th>
            <th>14.3.- ¿Ud. Votaría por él para DIPUTADO LOCAL?</th>
            <th>14.4.- Y, ¿Qué opinión tiene de él / ella?</th>
        </tr>
    </tfoot>
</table>
<script>
    function CorroboraTabla(id,opc){
        if (opc==1){
            if($('#cmbPreg121'+id).val()==1 || $('#cmbPreg121'+id).val()==2){
                $('#cmbPreg122'+id).attr("disabled", "disabled");
                $('#cmbPreg123'+id).removeAttr("disabled");
                $('#cmbPreg124'+id).removeAttr("disabled");
                $('#cmbPreg125'+id).removeAttr("disabled");
                $('#cmbPreg122'+id).val(0);
            }
            else{
                $('#cmbPreg122'+id).removeAttr("disabled");
                $('#cmbPreg123'+id).attr("disabled", "disabled");
                $('#cmbPreg124'+id).attr("disabled", "disabled");
                $('#cmbPreg125'+id).attr("disabled", "disabled");
            }
        }
        else{
            if($('#cmbPreg122'+id).val()==1 || $('#cmbPreg122'+id).val()==2){
                $('#cmbPreg123'+id).removeAttr("disabled");
                $('#cmbPreg124'+id).removeAttr("disabled");
                $('#cmbPreg125'+id).removeAttr("disabled");
            }
            else{
                $('#cmbPreg123'+id).attr("disabled", "disabled");
                $('#cmbPreg124'+id).attr("disabled", "disabled");
                $('#cmbPreg125'+id).attr("disabled", "disabled");
            }
        }
    }
</script>