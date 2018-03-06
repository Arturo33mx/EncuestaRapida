<?php
session_start();
if(!isset($myvar)){
	include("../../class/mysql.php");
	$bd = new  MySQL;
}
$Clave=$_POST['Clave'];
header('Content-Type:text/html; charset=UTF-8');
setlocale(LC_TIME, 'spanish');
?>
<div class="table-responsive">
	<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
		<thead>
			<tr>
				<th>Fecha</th>
				<th>Nombre</th>
				<th>Estatus</th>
				<th>Observaciones</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$sql="SELECT A.Fecha, B.Nombre, A.Observaciones,
				case EstatusNumero
when 1 then 'contesto'
when 2 then 'Ocupado'
when 3 then 'Fuera de Linea'
end as Estatus
				FROM encuesta_medicion A, usuario B
				where CveNumero = $Clave and A.CveUsuario=B.Clave
				order by Fecha desc LIMIT 0,5";
			
			$categorias=$bd->get_arreglo($sql);
			if(!empty($categorias)){
				foreach ($categorias as $mivalor){
					$date = new DateTime($mivalor['Fecha']);
					$Fecha = strftime("%d %b", strtotime($mivalor['Fecha']));
					$Fecha = $Fecha." ". $date->format("g:i a");
			?>
			<tr>
				<td>
					<?php echo $Fecha;?>
				</td>
				<td>
					<?php echo utf8_encode($mivalor['Nombre']);?>
				</td>
				<td>
					<?php echo ($mivalor['Estatus']);?>
				</td>
				<td>
					<?php echo utf8_encode($mivalor['Observaciones']);?>
				</td>
			</tr>
			<?php
				}
			}
			else{
				echo "<td colspan='3'>No hay Registros</td>";
			}
			?>
		</tbody>
	</table>
</div>