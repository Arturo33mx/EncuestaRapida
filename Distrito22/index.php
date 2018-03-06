<?php
session_start();
if(!isset($_SESSION['UsuarioIdGeneral'])){
	header('Location:../');
}
elseif($_SESSION['UsuarioCveSistema']!=5 || $_SESSION['EncuestaCveEncuesta']!=1){
	echo "Error 1001.......<br>llamar al administrador de Sistemas";
	echo "<br>Datos:";
	echo "<br>".$_SESSION['NombreCompleto'];
	echo "<br>".$_SESSION['UsuarioCveSistema'];
	echo "<a href='class/Cerrar.php'>".$_SESSION['NombreCompleto']."(Salir)</a> ";
	exit();
}

if(!isset($bd)){
	include("../class/mysql.php");
	$bd = new  MySQL;
}


$Clave = '';
$Telefono= '';
$Municipio= '';

$Pte=false;
$consulta="SELECT * FROM numeros_izucar where CveApartado=".$_SESSION['UsuarioIdGeneral'];
$Resultado=$bd->consulta($consulta); 
if($Fila=$bd->fetch_array($Resultado)){
	$Clave = $Fila['Clave'];
	$Telefono= $Fila['Telefono'];
	$Municipio= $Fila['Ciudad'];
	$Pte=true; 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Encuestas</title>
	<!-- Bootstrap core CSS-->
	<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../vendor/bootstrap/css/bootstrap2.css" rel="stylesheet">
	<!-- Custom fonts for this template-->
	<link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<!-- Custom styles for this template-->
	<link href="../css/sb-admin.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<style>
		.btn:not(:disabled):not(.disabled) {
			cursor: pointer;
		}
		input[type=radio], .cursor{
			cursor: pointer;
		}
	</style>
	<script>
		function InfoNumero(){
			var clave = $("#txtClave").val();
			$.ajax({
				type: 'POST',
				url: 'infoNumero.php',
				data:{
					Clave:clave
				},
				success: function(date){
					$("#divDetalles").html(date);
				}
			});
			
		}
	</script>
</head>
<body class="fixed-nav sticky-footer bg-dark sidenav-toggled" id="page-top">
	<!-- Navigation-->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
		<?php $opc=1; include('../menu.php'); ?>
	</nav>
	<div class="content-wrapper">
		<div class="container-fluid col-md-12">
			<!-- Breadcrumbs-->
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header text-white bg-info">
							ENCUESTA DISTRITO 22
						</div>
						<div class="card-header">
							<div id="divBuscar" style="<?php if($Pte) echo 'display:none;';?>">
								<button class="btn btn-primary btn-block" id="btnNumero">Buscar Numero</button>
							</div>
							<div class="form-group divDato" style="<?php if(!$Pte) echo 'display:none;';?>">
								<h3>
								<label>Telefono: </label><strong id="txtTelefonoInfo"><?php echo $Telefono;?></strong>
								</h3>
								<label>Municipio: </label><strong id="txtMunicipio"><?php echo $Municipio;?></strong>
								<hr>
							</div>
							<div class="row divDato" id="RadLlamada" style="<?php if(!$Pte) echo 'display:none;';?>">
								<label class="form-control cursor col-sm-4  btn-primary" for="RadContes">
									<input type="radio" name="RadEstado" id="RadContes" value="1"> Contesto
								</label>
								<label class="form-control cursor col-sm-4 btn-primary" for="RadNoContes">
									<input type="radio" name="RadEstado" id="RadNoContes" value="2"> Ocupado / llamar despues
								</label>
								<label class="form-control cursor col-sm-4 btn-primary" for="RadFuera">
									<input type="radio" name="RadEstado" id="RadFuera" value="3"> Fuera de linea / No llamar
								</label>
							</div>
						</div>
						<div class="card-body">
							<div class="form-group" id="divDatosEncuesta" style="display:none;">
                                <div class="form-row alert alert-primary">
                                    <h4>
                                        Buenos días (tardes). Somos encuestadores de la consultoría independiente 1321. Estamos realizando un estudio de opinión, el cual es a través de una entrevista sobre temas de interés social. La encuesta es anónima. Sus respuestas tendrán un uso confidencial. ¿Me permite hacerle algunas preguntas?, Gracias!
                                        <hr>
                                    </h4>
                                    <input type="hidden" id="txtClave" value="<?php echo $Clave;?>">
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <h4>¿Tiene Ud. credencial para votar?</h4>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="btn btn-outline btn-primary" for="RadCredencialSi">
                                            <input type="radio" name="RadCredencial" id="RadCredencialSi" value="1"> Si
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> No
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <h4>¿Es Ud. de este Municipio?</h4>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="btn btn-outline btn-primary" for="RadMuniSi">
                                            <input type="radio" name="RadMuni" id="RadMuniSi" value="1"> Si
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadMuniNo">
                                            <input type="radio" name="RadMuni" id="RadMuniNo" value="2"> No
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    
                                </div>
							</div>
                            <div class="form-group" id="divElector" style="display:none;">
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <h4>¿Comparada con el año pasado, ¿cómo diría que está actualmente su situación económica personal?</h4>
                                    </div>
                                    <div class="alert alert-warning">Leer opciones   1  a  4</div>
                                    <div class="col-md-12">
                                        <label class="btn btn-outline btn-primary" for="RadCredencialSi">
                                            <input type="radio" name="RadCredencial" id="RadCredencialSi" value="1"> 1) Mejor
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 2) Igual de bien
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 3) Igual de mal 
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 4) Peor
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 5) NS/NR
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <h4>2.- En su opinión, ¿su Municipio está, en general, mejor, igual o peor de lo que estaba hace un año? </h4>
                                    </div>
                                    <div class="alert alert-warning">Leer opciones   1  a  4</div>
                                    <div class="col-md-12">
                                        <label class="btn btn-outline btn-primary" for="RadCredencialSi">
                                            <input type="radio" name="RadCredencial" id="RadCredencialSi" value="1"> 1) Mejor
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 2) Igual de bien
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 3) Igual de mal 
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 4) Peor
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 5) NS/NR
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <h4>3.- ¿Qué opinión tiene del trabajo realizado por el actual Diputado Local?</h4>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="btn btn-outline btn-primary" for="RadCredencialSi">
                                            <input type="radio" name="RadCredencial" id="RadCredencialSi" value="1"> 1) Muy buena
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 2) Buena  
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 3) Regular  
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 4) Mala 
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 5) Muy mala 
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 6) NS/NR  
                                        </label>
                                    </div>
                                </div> 
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <h4>4.- ¿Qué debería hacer el actual Diputado Local antes de terminar su gestión?</h4>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">1)</label>
                                        <input type="text" name="" id="" class="form-control">
                                        <label for="">2)</label>
                                        <input type="text" name="" id="" class="form-control">
                                        <label for="">3)</label>
                                        <input type="text" name="" id="" class="form-control">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <h4>5.- En su opinión, ¿Cuál es el servicio público que Usted considera que tiene más problemas?  ¿Y después de ese cuál? ¿Y por último cuál otro?</h4>
                                    </div>
                                    <div class="alert alert-warning">Mención Espontánea</div>
                                    <div class="col-md-12">
                                        <label class="btn btn-outline btn-primary" for="RadCredencialSi">
                                            <input type="radio" name="RadCredencial" id="RadCredencialSi" value="1"> 1) Alumbrado Público
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 2) Recolección de Basura  
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 3) Seguridad Pública  
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 4) Drenaje 
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 5) Abastecimiento de Agua Potable 
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 6) Pavimentación   
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 7) Transporte Público    
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 8) Alcantarillado   
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 9) Barrido de vías públicas   
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 10) Protección civil / desastres   
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 11) Control del tránsito vehicular   
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 12) Señalización   
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 13) Otros   
                                        </label>
                                        <input type="text" class="form-control" placeholder="¿Cuál?">
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 14) NS/NC    
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <h4>6.- ¿Y Cuál es el servicio público más urgente de solucionar? ¿después de ese cuál? Y por último, ¿cuál otro?</h4>
                                    </div>
                                    <div class="alert alert-warning">Mención Espontánea</div>
                                    <div class="col-md-12">
                                        <label class="btn btn-outline btn-primary" for="RadCredencialSi">
                                            <input type="radio" name="RadCredencial" id="RadCredencialSi" value="1"> 1) Alumbrado Público
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 2) Recolección de Basura  
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 3) Seguridad Pública  
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 4) Drenaje 
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 5) Abastecimiento de Agua Potable 
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 6) Pavimentación   
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 7) Transporte Público    
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 8) Alcantarillado   
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 9) Barrido de vías públicas   
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 10) Protección civil / desastres   
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 11) Control del tránsito vehicular   
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 12) Señalización   
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 13) Otros   
                                        </label>
                                        <input type="text" class="form-control" placeholder="¿Cuál?">
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 14) NS/NC    
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <h4>7.- ¿Sabe Usted cuándo serán las próximas elecciones en el Estado de Puebla?</h4>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="btn btn-outline btn-primary" for="RadCredencialSi">
                                            <input type="radio" name="RadCredencial" id="RadCredencialSi" value="1"> 1) Sí, el 1 de julio de 2018 
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 2) Sí, en julio de 2018   
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 3) Sí, este año  
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 4) Sí (otra fecha) 
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 5) No sabe
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 6) NR  
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <h4>8.- El 1° de julio habrá elecciones para Gobernador, Presidentes Municipales y Diputados Locales, ¿Qué tanto le interesa votar en estas elecciones?</h4>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="btn btn-outline btn-primary" for="RadCredencialSi">
                                            <input type="radio" name="RadCredencial" id="RadCredencialSi" value="1"> 1) Mucho 
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 2) Regular    
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 3) Poco
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 4) Nada  
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 5) NS/NR 
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <h4>9.- Si el día de hoy fueran las elecciones para Diputado Local, ¿Por cuál partido  votaría? </h4>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="btn btn-outline btn-primary" for="RadCredencialSi">
                                            <input type="radio" name="RadCredencial" id="RadCredencialSi" value="1"> 1) PAN
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 2) PRI
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="3"> 3) PRD
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 4) PT
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 5) PVEM
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialSi">
                                            <input type="radio" name="RadCredencial" id="RadCredencialSi" value="1"> 6) Mov. Ciudadano
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 7) P Nueva Alianza
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 8) Compromiso por Puebla
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 9) PSI
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 10) Morena
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialSi">
                                            <input type="radio" name="RadCredencial" id="RadCredencialSi" value="1"> 11) Encuentro Social
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 12) Candidatura Independiente
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 13) Anulado
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 14) Otro
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 15) Ninguno
                                        </label> 
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 16) No sabe
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 17) No contestó 
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <h4>10.- En este momento, ¿Con qué partido político se identifica más? </h4>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="btn btn-outline btn-primary" for="RadCredencialSi">
                                            <input type="radio" name="RadCredencial" id="RadCredencialSi" value="1"> 1) PAN
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 2) PRI
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="3"> 3) PRD
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 4) PT
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 5) PVEM
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialSi">
                                            <input type="radio" name="RadCredencial" id="RadCredencialSi" value="1"> 6) Mov. Ciudadano
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 7) P Nueva Alianza
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 8) Compromiso por Puebla
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 9) PSI
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 10) Morena
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialSi">
                                            <input type="radio" name="RadCredencial" id="RadCredencialSi" value="1"> 11) Encuentro Social
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 12) Candidatura Independiente
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 13) Anulado
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 14) Otro
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 15) Ninguno
                                        </label> 
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 16) No sabe
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 17) No contestó 
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <h4>11.- ¿Por qué partido político nunca votaría? </h4>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="btn btn-outline btn-primary" for="RadCredencialSi">
                                            <input type="radio" name="RadCredencial" id="RadCredencialSi" value="1"> 1) PAN
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 2) PRI
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="3"> 3) PRD
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 4) PT
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 5) PVEM
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialSi">
                                            <input type="radio" name="RadCredencial" id="RadCredencialSi" value="1"> 6) Mov. Ciudadano
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 7) P Nueva Alianza
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 8) Compromiso por Puebla
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 9) PSI
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 10) Morena
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialSi">
                                            <input type="radio" name="RadCredencial" id="RadCredencialSi" value="1"> 11) Encuentro Social
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 12) Candidatura Independiente
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 13) Anulado
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 14) Otro
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 15) Ninguno
                                        </label> 
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 16) No sabe
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 17) No contestó 
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <h4>12.- Le voy a leer una lista de personalidades del Distrito:  </h4>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-2"></div>
                                    </div>
                                    <div class="col-md-12">
                                        <?php include('Tabla.php'); ?>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <h4>13.- ¿Quién de los nombres que le acabo de leer le gustaría que fuera  Diputado Local por este Distrito?</h4>
                                    <div class="alert alert-warning">Mención Espontánea</div>
                                    <div class="col-md-12">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-2"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control">
                                            <option value="0">Seleciona</option>
                                        <?php
                                            foreach ($array as $i => $value) {
                                                echo "<option value=''>".$array[$i]."</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <h4>Ahora bien… </h4>
                                    </div>
                                    <div class="col-md-12">
                                        <h4>14.- Independientemente del candidato que postulen, de la siguiente lista de alianzas, ¿Por  cuál votaría Usted? </h4>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="btn btn-outline btn-primary" for="RadCredencialSi">
                                            <input type="radio" name="RadCredencial" id="RadCredencialSi" value="1"> 1) Alianza del PRI con PVEM 
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 2) Sí, en julio de 2018   
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 3) Morena con PT y PES  
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 4) Ninguna  
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 5) Otro
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 6) NS/NR  
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <h4>15.- Independientemente de por quién va a votar, ¿quién cree que ganará las elecciones para Diputado Local en este Distrito?   </h4>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="btn btn-outline btn-primary" for="RadCredencialSi">
                                            <input type="radio" name="RadCredencial" id="RadCredencialSi" value="1"> 1) Alianza del PRI con PVEM 
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 2) Alianza del PAN con PRD, MC y PANAL  
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 3) Morena con PT y PES  
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 4) Ninguna  
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 5) Otro
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 6) NS/NR  
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <div class="alert-primary alert text-center"><h3>¡Muchas gracias por participar!</h3></div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-row">
                                    <div class="col-md-12">
                                       <h4>PERFIL DEL ENTREVISTADO</h4>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <h4>Sexo:</h4>
                                    </div>
                                    <div class="alert alert-warning">Anote sin preguntar</div>
                                    <div class="col-md-12">
                                        <label class="btn btn-outline btn-primary" for="RadCredencialSi">
                                            <input type="radio" name="RadCredencial" id="RadCredencialSi" value="1"> H
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> M
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <h4>Edad:</h4>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="btn btn-outline btn-primary" for="RadCredencialSi">
                                            <input type="radio" name="RadCredencial" id="RadCredencialSi" value="1"> 18 – 24 Años
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 25 - 34 Años
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 35 – 44 Años
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> 45 y más
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <h4>Estado Civil:</h4>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="btn btn-outline btn-primary" for="RadCredencialSi">
                                            <input type="radio" name="RadCredencial" id="RadCredencialSi" value="1"> Soltero(a)
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> Casado(a)
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> Divorciado(a)
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> Viudo(a)
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> Unión Libre
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> Otro
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <h4>¿A qué se dedica? (Ocupación):</h4>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="btn btn-outline btn-primary" for="RadCredencialSi">
                                            <input type="radio" name="RadCredencial" id="RadCredencialSi" value="1"> Empleado en empresa 
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> Empleado en el Gob 
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> Trabaja por su cuenta
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> Trabajador del campo
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> Estudiante
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> Ama de casa
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> Desempleado 
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> Jubilado
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <h4>Escolaridad: (Hasta qué año de estudios llegó)</h4>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="btn btn-outline btn-primary" for="RadCredencialSi">
                                            <input type="radio" name="RadCredencial" id="RadCredencialSi" value="1"> Primaria incompleta
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> Primaria completa
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> Secundaria completa
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> Preparatoria completa
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> Profesional y más
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <h4>¿Podría decirme a cuánto ascienden sus ingresos mensuales, aproximadamente?</h4>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="btn btn-outline btn-primary" for="RadCredencialSi">
                                            <input type="radio" name="RadCredencial" id="RadCredencialSi" value="1"> Sin ingresos
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> Hasta $3,000.00
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> Hasta $7,500.00
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> Hasta $15,000.00
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> Hasta $30,000.00
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> Más de $30,000.00
                                        </label>
                                        <label class="btn btn-outline btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> No contestó
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <hr>
							<div class="form-group" id="divObservacion" style="display:none">
								<label for="txtObservaciones">
									¿Observaciones?
								</label>
								<textarea id="txtObservaciones" class="form-control" placeholder="Comentarios"></textarea>
							</div>
							<div class="divDato" style="<?php if(!$Pte) echo 'display:none;';?>">
								<button class="btn btn-primary btn-block" id="btnGuardar">Guardar</button>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12" style="display:none">
					<div class="card">
						<div class="card-header text-white bg-info">
							Ultimas llamadas
						</div>
						<div class="card-body" id="divDetalles">
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /.container-fluid-->
		<!-- /.content-wrapper-->
		<footer class="sticky-footer">
			<div class="container">
				<div class="text-center">
					<small>Copyright © Arturo 2017</small>
				</div>
			</div>
		</footer>
		<!-- Scroll to Top Button-->
		<a class="scroll-to-top rounded" href="#page-top">
			<i class="fa fa-angle-up"></i>
		</a>
		<!-- Logout Modal-->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Confirmar?</h5>
						<button class="close" type="button" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">¿Seguro que deseas cerrar sesión?</div>
					<div class="modal-footer">
						<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
						<a class="btn btn-primary" href="../../class/Cerrar.php">Salir</a>
					</div>
				</div>
			</div>
		</div>
		<!-- Bootstrap core JavaScript-->
		<script src="../vendor/jquery/jquery.min.js"></script>
		<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<!-- Core plugin JavaScript-->
		<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
		<!-- Custom scripts for all pages-->
		<script src="../js/sb-admin.min.js"></script>
		<script src="../js/bootbox.min.js"></script>
		<script>
			function RadEstadoFun(e){
				if($( e.target ).val()==1){
					$( "#divDatosEncuesta" ).show('fade');
					$( "#divObservacion" ).hide();
				}
				else{
					$( "#divObservacion" ).show('fade');
					$( "#divDatosEncuesta" ).hide();
				}
                $("#btnGuardar").removeAttr("disabled");
			}
            function RadElecctor(){
				if($("input[name='RadCredencial']:checked").val()==1 && $("input[name='RadMuni']:checked").val()==1){
					$( "#divElector" ).show('fade');
				}
				else{
					$( "#divElector" ).hide();
				}
                $("#btnGuardar").removeAttr("disabled");
			}
			$("[name='RadEstado']").on( "change", RadEstadoFun );
			$("[name='RadCredencial']").on( "change", RadElecctor );
			$("[name='RadMuni']").on( "change", RadElecctor );
			$("#btnNumero").click(function(){
				$("#divBuscar").hide();
				$.post("BuscaNumero.php",function(data){
					$('#txtClave').val(data[0].Clave);
					$('#txtTelefonoInfo').text(data[0].Telefono);
					$('#txtMunicipio').text(data[0].Ciudad);
					$( ".divDato" ).show('fade');
					InfoNumero();
				}, "json");
				return false;
			});
			$("#btnGuardar").click(function(){/*
                $("#btnGuardar").attr("disabled", "disabled");
				$("#RadLlamada").css('border', 'none');
				$("#lbRedSocial").css('border', 'none');
				mensaje="";
				err=false;
				if($("input[name='RadEstado']:checked").val()==1){
				}
				else{
					if(!$("input[name='RadEstado']:radio").is(':checked')){
						$("#RadLlamada").css({"border-bottom" : "3px solid #f00d0d"});
						err=true;
					}
				}
				if(err){
					bootbox.alert({
						size: "small",
						message: '<h3>Datos Incompletos</h3>'+mensaje, 
						callback: function(){
							//location.reload();
                            $("#btnGuardar").removeAttr("disabled");
						}
					});
					return false;
				}else{
					var selectedItems = new Array();
					$("input[name='BtnNecesidad[]']:checked").each(function(){
						selectedItems.push($(this).val());
					});
					$.post("GuardaLlamada.php",{
						cve: $('#txtClave').val(),
						Esta: $("input[name=RadEstado]:checked").val(),
						obs: $('#txtObservaciones').val(),
						res1: selectedItems,
						res2: $('#txtNecesidad').val(),
						res3: $('#txtGestiones').val(),
						res4: $('#txtPartido').val()
					},function(data){
						bootbox.alert({ 
							size: "small",
							message: data, 
							callback: function(){
								location.reload();
							}
						});
					});
                    
				}*/
                bootbox.alert({ 
							size: "small",
							message: ':(', 
							callback: function(){
								//location.reload();
							}
						});
				return false;
			});
			InfoNumero();
		</script>
	</div>
</body>
</html>

