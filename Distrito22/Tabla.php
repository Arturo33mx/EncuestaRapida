<?php
$array = array(
    "Gerardo Islas Maldonado", 
    "Armando Galindo Galindo", 
    "Gustavo Leoncio Sánchez",
    "Cutberto Cantorán",
    "Eliseo Morales Rosales",
    "Conrado González Hernández",
    "Edgar Morales Moreno",
    "Arnulfo González",
    "Melitón Lozano Pérez",
    "Filiberto Guevara González",
    "Manuel Madero González ",
    "Mario Herrera Arzola",
    "Enrique Nácer Hernández",
    "Víctor Hugo Islas Hernández",
    "Luz del Carmen Martínez"
);
?>
<table width="100%" class="table table-striped table-bordered table-hover">
    <thead>
        <tr class="bg-info text-white">
            <th></th>
            <th>¿Ha oído hablar de: ?</th>
            <th>En caso de negativa, dar información adicional 14.1.- Ayudado</th>
            <th>14.2.- ¿De qué partido político es?</th>
            <th>14.3.- ¿Ud. Votaría por él para DIPUTADO LOCAL?</th>
            <th>14.4.- Y, ¿Qué opinión tiene de él / ella?</th>
        </tr>
    </thead>
    <tbody>
        <tr class="odd gradeX">
            <?php
            foreach ($array as $i => $value) {
            ?>
            <td>
                <strong><?php echo $array[$i]; ?></strong>
            </td>
            <td>
                <select class="form-control">
                    <option value="0">Selec.</option>
                    <option value="1">Si </option>
                    <option value="2">Creo que si</option>
                    <option value="3">No</option>
                    <option value="4">NS</option>
                    <option value="5">NR</option>
                </select>
            </td>
            <td>
                <select class="form-control">
                    <option value="0">Selec.</option>
                    <option value="1">Si </option>
                    <option value="2">Creo que si</option>
                    <option value="3">No</option>
                    <option value="4">NS</option>
                    <option value="5">NR</option>
                </select>
            </td>
            <td>
                <select class="form-control">
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
                <select class="form-control">
                    <option value="0">Selec.</option>
                    <option value="1">Si</option>
                    <option value="2">Posiblemente</option>
                    <option value="3">No</option>
                    <option value="4">NS</option>
                    <option value="5">NR</option>
                </select>
            </td>
            <td>
                <select class="form-control">
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