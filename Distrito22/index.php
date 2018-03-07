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
$consulta="SELECT * FROM numeros_distrito22 where CveApartado=".$_SESSION['UsuarioIdGeneral'];
$Resultado=$bd->consulta($consulta); 
if($Fila=$bd->fetch_array($Resultado)){
	$Clave = $Fila['Clave'];
	$Telefono= $Fila['Telefono'];
	$Municipio= $Fila['Municipio'];
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
                                        Buenos días (tardes). Somos encuestadores de la consultoría Juntos por la Mixteca. Estamos realizando un estudio de opinión, el cual es a través de una entrevista sobre temas de interés social. La encuesta es anónima. Sus respuestas tendrán un uso confidencial. ¿Me permite hacerle algunas preguntas?, Gracias!
                                        <hr>
                                    </h4>
                                    <input type="hidden" id="txtClave" value="<?php echo $Clave;?>">
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <h4>¿Tiene Ud. credencial para votar?</h4>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="btn btn-primary" for="RadCredencialSi">
                                            <input type="radio" name="RadCredencial" id="RadCredencialSi" value="1"> Si
                                        </label>
                                        <label class="btn btn-primary" for="RadCredencialNo">
                                            <input type="radio" name="RadCredencial" id="RadCredencialNo" value="2"> No
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <h4>¿Vive Ud. en este Municipio?</h4>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="btn btn-primary" for="RadMuniSi">
                                            <input type="radio" name="RadMuni" id="RadMuniSi" value="1"> Si
                                        </label>
                                        <label class="btn btn-primary" for="RadMuniNo">
                                            <input type="radio" name="RadMuni" id="RadMuniNo" value="2"> No
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    
                                </div>
							</div>
                            <div class="form-group" id="divElector" style="display:none;">
                                <div class="form-row">
                                    <div class="col-md-12" id="divRadPreg1">
                                        <h4>1.- ¿Comparada con el año pasado, ¿cómo diría que está actualmente su situación económica personal?</h4>
                                    </div>
                                    <div class="alert alert-warning">Leer opciones 1 a 4</div>
                                    <div class="col-md-12">
                                        <label class="btn btn-primary" for="RadPreg11">
                                            <input type="radio" name="RadPreg1" id="RadPreg11" value="1"> 1) Mejor
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg12">
                                            <input type="radio" name="RadPreg1" id="RadPreg12" value="2"> 2) Igual de bien
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg13">
                                            <input type="radio" name="RadPreg1" id="RadPreg13" value="3"> 3) Igual de mal 
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg14">
                                            <input type="radio" name="RadPreg1" id="RadPreg14" value="4"> 4) Peor
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg15">
                                            <input type="radio" name="RadPreg1" id="RadPreg15" value="5"> 5) NS/NR
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12" id="divRadPreg2">
                                        <h4>2.- En su opinión, ¿su Municipio está, en general, mejor, igual o peor de lo que estaba hace un año? </h4>
                                    </div>
                                    <div class="alert alert-warning">No leer</div>
                                    <div class="col-md-12">
                                        <label class="btn btn-primary" for="RadPreg21">
                                            <input type="radio" name="RadPreg2" id="RadPreg21" value="1"> 1) Mejor
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg22">
                                            <input type="radio" name="RadPreg2" id="RadPreg22" value="2"> 2) Igual de bien
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg23">
                                            <input type="radio" name="RadPreg2" id="RadPreg23" value="3"> 3) Igual de mal 
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg24">
                                            <input type="radio" name="RadPreg2" id="RadPreg24" value="4"> 4) Peor
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg25">
                                            <input type="radio" name="RadPreg2" id="RadPreg25" value="5"> 5) NS/NR
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12" id="divRadPreg3">
                                        <h4>3.- ¿Qué opinión tiene del trabajo realizado por el actual Diputado Local?</h4>
                                    </div>
                                    <div class="alert alert-warning">Leer opciones 1 a 5</div>
                                    <div class="col-md-12">
                                        <label class="btn btn-primary" for="RadPreg31">
                                            <input type="radio" name="RadPreg3" id="RadPreg31" value="1"> 1) Muy buena
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg32">
                                            <input type="radio" name="RadPreg3" id="RadPreg32" value="2"> 2) Buena  
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg33">
                                            <input type="radio" name="RadPreg3" id="RadPreg33" value="3"> 3) Regular  
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg34">
                                            <input type="radio" name="RadPreg3" id="RadPreg34" value="4"> 4) Mala 
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg35">
                                            <input type="radio" name="RadPreg3" id="RadPreg35" value="5"> 5) Muy mala 
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg36">
                                            <input type="radio" name="RadPreg3" id="RadPreg36" value="6"> 6) NS/NR  
                                        </label>
                                    </div>
                                </div> 
                                <div class="form-row">
                                    <div class="col-md-12" id="divRadPreg4">
                                        <h4>4.- ¿Qué debería hacer el actual Diputado Local antes de terminar su gestión?</h4>
                                    </div>
                                    <div class="alert alert-warning">Mención Espontánea</div>
                                    <div class="col-md-6">
                                        <input type="text" name="textPreg41" id="textPreg41" class="form-control" placeholder="1)">
                                        <input type="text" name="textPreg42" id="textPreg42" class="form-control" placeholder="2)">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12" id="divRadPreg5">
                                        <h4>5.- En su opinión, ¿Cuál es el servicio público que Usted considera que tiene más problemas? ¿Y por último cuál otro?</h4>
                                    </div>
                                    <div class="alert alert-warning">Mención Espontánea (Seleciona solo 2 opciones)</div>
                                    <div class="col-md-12">
                                        <input type="hidden" class="form-control" id="txtPreg5Array" placeholder="">
                                        <label class="btn btn-primary" for="RadPreg51">
                                            <input type="checkbox" name="RadPreg5[]" onchange="RadPreg5(1)" id="RadPreg51" value="1"> 1) Alumbrado Público
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg52">
                                            <input type="checkbox" name="RadPreg5[]" onchange="RadPreg5(2)" id="RadPreg52" value="2"> 2) Recolección de Basura  
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg53">
                                            <input type="checkbox" name="RadPreg5[]" onchange="RadPreg5(3)" id="RadPreg53" value="3"> 3) Seguridad Pública  
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg54">
                                            <input type="checkbox" name="RadPreg5[]" onchange="RadPreg5(4)" id="RadPreg54" value="4"> 4) Drenaje 
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg55">
                                            <input type="checkbox" name="RadPreg5[]" onchange="RadPreg5(5)" id="RadPreg55" value="5"> 5) Abastecimiento de Agua Potable 
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg56">
                                            <input type="checkbox" name="RadPreg5[]" onchange="RadPreg5(6)" id="RadPreg56" value="6"> 6) Pavimentación   
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg57">
                                            <input type="checkbox" name="RadPreg5[]" onchange="RadPreg5(7)" id="RadPreg57" value="7"> 7) Transporte Público    
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg58">
                                            <input type="checkbox" name="RadPreg5[]" onchange="RadPreg5(8)" id="RadPreg58" value="8"> 8) Alcantarillado   
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg59">
                                            <input type="checkbox" name="RadPreg5[]" onchange="RadPreg5(9)" id="RadPreg59" value="9"> 9) Barrido de vías públicas   
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg510">
                                            <input type="checkbox" name="RadPreg5[]" onchange="RadPreg5(10)" id="RadPreg510" value="10"> 10) Protección civil / desastres   
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg511">
                                            <input type="checkbox" name="RadPreg5[]" onchange="RadPreg5(11)" id="RadPreg511" value="11"> 11) Control del tránsito vehicular   
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg512">
                                            <input type="checkbox" name="RadPreg5[]" onchange="RadPreg5(12)" id="RadPreg512" value="12"> 12) Señalización   
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg513">
                                            <input type="checkbox" name="RadPreg5[]" onchange="RadPreg5(13)" id="RadPreg513" value="13"> 13) Otros   
                                        </label>
                                        <input type="text" class="form-control" id="txtPreg5" placeholder="¿Cuál?">
                                        <label class="btn btn-primary" for="RadPreg514">
                                            <input type="checkbox" name="RadPreg5[]" onchange="RadPreg5(14)" id="RadPreg514" value="14"> 14) NS/NR  
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg515">
                                            <input type="checkbox" name="RadPreg5[]" onchange="RadPreg5(15)" id="RadPreg515" value="15"> 15) NS/NR
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12" id="divRadPreg6">
                                        <h4>6.- ¿Y Cuál es el servicio público más urgente de solucionar? Y por último, ¿cuál otro?</h4>
                                    </div>
                                    <div class="alert alert-warning">Mención Espontánea (Seleciona solo 2 opciones)</div>
                                    <div class="col-md-12">
                                        <input type="hidden" class="form-control" id="txtPreg6Array" placeholder="">
                                        <label class="btn btn-primary" for="RadPreg61">
                                            <input type="checkbox" name="RadPreg6[]" onchange="RadPreg6(1)" id="RadPreg61" value="1"> 1) Alumbrado Público
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg62">
                                            <input type="checkbox" name="RadPreg6[]" onchange="RadPreg6(2)" id="RadPreg62" value="2"> 2) Recolección de Basura  
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg63">
                                            <input type="checkbox" name="RadPreg6[]" onchange="RadPreg6(3)" id="RadPreg63" value="3"> 3) Seguridad Pública  
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg64">
                                            <input type="checkbox" name="RadPreg6[]" onchange="RadPreg6(4)" id="RadPreg64" value="4"> 4) Drenaje 
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg65">
                                            <input type="checkbox" name="RadPreg6[]" onchange="RadPreg6(5)" id="RadPreg65" value="5"> 5) Abastecimiento de Agua Potable 
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg66">
                                            <input type="checkbox" name="RadPreg6[]" onchange="RadPreg6(6)" id="RadPreg66" value="6"> 6) Pavimentación   
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg67">
                                            <input type="checkbox" name="RadPreg6[]" onchange="RadPreg6(7)" id="RadPreg67" value="7"> 7) Transporte Público    
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg68">
                                            <input type="checkbox" name="RadPreg6[]" onchange="RadPreg6(8)" id="RadPreg68" value="8"> 8) Alcantarillado   
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg69">
                                            <input type="checkbox" name="RadPreg6[]" onchange="RadPreg6(9)" id="RadPreg69" value="9"> 9) Barrido de vías públicas   
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg610">
                                            <input type="checkbox" name="RadPreg6[]" onchange="RadPreg6(10)" id="RadPreg610" value="10"> 10) Protección civil / desastres   
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg611">
                                            <input type="checkbox" name="RadPreg6[]" onchange="RadPreg6(11)" id="RadPreg611" value="11"> 11) Control del tránsito vehicular   
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg612">
                                            <input type="checkbox" name="RadPreg6[]" onchange="RadPreg6(12)" id="RadPreg612" value="12"> 12) Señalización   
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg613">
                                            <input type="checkbox" name="RadPreg6[]" onchange="RadPreg6(13)" id="RadPreg613" value="13"> 13) Otros   
                                        </label>
                                        <input type="text" class="form-control" id="txtPreg6" placeholder="¿Cuál?">
                                        <label class="btn btn-primary" for="RadPreg614">
                                            <input type="checkbox" name="RadPreg6[]" onchange="RadPreg6(14)" id="RadPreg614" value="14"> 14) NS/NR
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg615">
                                            <input type="checkbox" name="RadPreg6[]" onchange="RadPreg6(15)" id="RadPreg615" value="15"> 15) NS/NR
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12" id="divRadPreg7">
                                        <h4>7.- ¿Sabe Usted cuándo serán las próximas elecciones en el Estado de Puebla?</h4>
                                    </div>
                                    <div class="alert alert-warning">Mención Espontánea</div>
                                    <div class="col-md-12">
                                        <label class="btn btn-primary" for="RadPreg71">
                                            <input type="radio" name="RadPreg7" id="RadPreg71" value="1"> 1) Sí, el 1 de julio de 2018 
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg72">
                                            <input type="radio" name="RadPreg7" id="RadPreg72" value="2"> 2) Sí, en julio de 2018   
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg73">
                                            <input type="radio" name="RadPreg7" id="RadPreg73" value="3"> 3) Sí, este año  
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg74">
                                            <input type="radio" name="RadPreg7" id="RadPreg74" value="4"> 4) Sí (otra fecha) 
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg75">
                                            <input type="radio" name="RadPreg7" id="RadPreg75" value="5"> 5) NS/NR
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12" id="divRadPreg8">
                                        <h4>8.- El 1° de julio habrá elecciones para Gobernador, Presidentes Municipales y Diputados Locales, ¿Qué tanto le interesa votar en estas elecciones?</h4>
                                    </div>
                                    <div class="alert alert-warning">Leer opciones 1 a 4</div>
                                    <div class="col-md-12">
                                        <label class="btn btn-primary" for="RadPreg81">
                                            <input type="radio" name="RadPreg8" id="RadPreg81" value="1"> 1) Mucho 
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg82">
                                            <input type="radio" name="RadPreg8" id="RadPreg82" value="2"> 2) Regular    
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg83">
                                            <input type="radio" name="RadPreg8" id="RadPreg83" value="3"> 3) Poco
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg84">
                                            <input type="radio" name="RadPreg8" id="RadPreg84" value="4"> 4) Nada  
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg85">
                                            <input type="radio" name="RadPreg8" id="RadPreg85" value="5"> 5) NS/NR 
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row divPregDep8" style="display:none">
                                    <div class="col-md-12" id="divRadPreg9">
                                        <h4>9.- Si el día de hoy fueran las elecciones para Diputado Local, ¿Por cuál partido  votaría? </h4>
                                    </div>
                                    <div class="alert alert-warning">Mención Espontánea</div>
                                    <div class="col-md-12">
                                        <label class="btn btn-primary" for="RadPreg91">
                                            <input type="radio" name="RadPreg9" id="RadPreg91" value="1"> 1) PAN
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg92">
                                            <input type="radio" name="RadPreg9" id="RadPreg92" value="2"> 2) PRI
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg93">
                                            <input type="radio" name="RadPreg9" id="RadPreg93" value="3"> 3) PRD
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg94">
                                            <input type="radio" name="RadPreg9" id="RadPreg94" value="4"> 4) PT
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg95">
                                            <input type="radio" name="RadPreg9" id="RadPreg95" value="5"> 5) PVEM
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg96">
                                            <input type="radio" name="RadPreg9" id="RadPreg96" value="6"> 6) Mov. Ciudadano
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg97">
                                            <input type="radio" name="RadPreg9" id="RadPreg97" value="7"> 7) P Nueva Alianza
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg98">
                                            <input type="radio" name="RadPreg9" id="RadPreg98" value="8"> 8) Compromiso por Puebla
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg99">
                                            <input type="radio" name="RadPreg9" id="RadPreg99" value="9"> 9) PSI
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg910">
                                            <input type="radio" name="RadPreg9" id="RadPreg910" value="10"> 10) Morena
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg911">
                                            <input type="radio" name="RadPreg9" id="RadPreg911" value="11"> 11) Encuentro Social
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg912">
                                            <input type="radio" name="RadPreg9" id="RadPreg912" value="12"> 12) Candidatura Independiente
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg913">
                                            <input type="radio" name="RadPreg9" id="RadPreg913" value="13"> 13) Anulado
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg914">
                                            <input type="radio" name="RadPreg9" id="RadPreg914" value="14"> 14) Otro
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg915">
                                            <input type="radio" name="RadPreg9" id="RadPreg915" value="15"> 15) Ninguno
                                        </label> 
                                        <label class="btn btn-primary" for="RadPreg916">
                                            <input type="radio" name="RadPreg9" id="RadPreg916" value="16"> 16) NS/NR
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12" id="divRadPreg10">
                                        <h4>10.- En este momento, ¿Con qué partido político se identifica más? </h4>
                                    </div>
                                    <div class="alert alert-warning">Mención Espontánea</div>
                                    <div class="col-md-12">
                                        <label class="btn btn-primary" for="RadPreg101">
                                            <input type="radio" name="RadPreg10" id="RadPreg101" value="1"> 1) PAN
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg102">
                                            <input type="radio" name="RadPreg10" id="RadPreg102" value="2"> 2) PRI
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg103">
                                            <input type="radio" name="RadPreg10" id="RadPreg103" value="3"> 3) PRD
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg104">
                                            <input type="radio" name="RadPreg10" id="RadPreg104" value="4"> 4) PT
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg105">
                                            <input type="radio" name="RadPreg10" id="RadPreg105" value="5"> 5) PVEM
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg106">
                                            <input type="radio" name="RadPreg10" id="RadPreg106" value="6"> 6) Mov. Ciudadano
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg107">
                                            <input type="radio" name="RadPreg10" id="RadPreg107" value="7"> 7) P Nueva Alianza
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg108">
                                            <input type="radio" name="RadPreg10" id="RadPreg108" value="8"> 8) Compromiso por Puebla
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg109">
                                            <input type="radio" name="RadPreg10" id="RadPreg109" value="9"> 9) PSI
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg1010">
                                            <input type="radio" name="RadPreg10" id="RadPreg1010" value="10"> 10) Morena
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg1011">
                                            <input type="radio" name="RadPreg10" id="RadPreg1011" value="11"> 11) Encuentro Social
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg1012">
                                            <input type="radio" name="RadPreg10" id="RadPreg1012" value="12"> 12) Candidatura Independiente
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg1013">
                                            <input type="radio" name="RadPreg10" id="RadPreg1013" value="13"> 13) Anulado
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg1014">
                                            <input type="radio" name="RadPreg10" id="RadPreg1014" value="14"> 14) Otro
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg1015">
                                            <input type="radio" name="RadPreg10" id="RadPreg1015" value="15"> 15) Ninguno
                                        </label> 
                                        <label class="btn btn-primary" for="RadPreg1016">
                                            <input type="radio" name="RadPreg10" id="RadPreg1016" value="16"> 16) NS/NR
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12" id="divRadPreg11">
                                        <h4>11.- ¿Por qué partido político nunca votaría? </h4>
                                    </div>
                                    <div class="alert alert-warning">Mención Espontánea</div>
                                    <div class="col-md-12">
                                        <label class="btn btn-primary" for="RadPreg111">
                                            <input type="radio" name="RadPreg11" id="RadPreg111" value="1"> 1) PAN
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg112">
                                            <input type="radio" name="RadPreg11" id="RadPreg112" value="2"> 2) PRI
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg113">
                                            <input type="radio" name="RadPreg11" id="RadPreg113" value="3"> 3) PRD
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg114">
                                            <input type="radio" name="RadPreg11" id="RadPreg114" value="4"> 4) PT
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg115">
                                            <input type="radio" name="RadPreg11" id="RadPreg115" value="5"> 5) PVEM
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg116">
                                            <input type="radio" name="RadPreg11" id="RadPreg116" value="6"> 6) Mov. Ciudadano
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg117">
                                            <input type="radio" name="RadPreg11" id="RadPreg117" value="7"> 7) P Nueva Alianza
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg118">
                                            <input type="radio" name="RadPreg11" id="RadPreg118" value="8"> 8) Compromiso por Puebla
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg119">
                                            <input type="radio" name="RadPreg11" id="RadPreg119" value="9"> 9) PSI
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg1110">
                                            <input type="radio" name="RadPreg11" id="RadPreg1110" value="10"> 10) Morena
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg1111">
                                            <input type="radio" name="RadPreg11" id="RadPreg1111" value="11"> 11) Encuentro Social
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg1112">
                                            <input type="radio" name="RadPreg11" id="RadPreg1112" value="12"> 12) Candidatura Independiente
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg1113">
                                            <input type="radio" name="RadPreg11" id="RadPreg1113" value="13"> 13) Anulado
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg1114">
                                            <input type="radio" name="RadPreg11" id="RadPreg1114" value="14"> 14) Otro
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg1115">
                                            <input type="radio" name="RadPreg11" id="RadPreg1115" value="15"> 15) Ninguno
                                        </label> 
                                        <label class="btn btn-primary" for="RadPreg1116">
                                            <input type="radio" name="RadPreg11" id="RadPreg1116" value="16"> 16) NS/NR
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row divPregDep8" style="display:none">
                                    <div class="col-md-12">
                                        <h4>Ahora bien… </h4>
                                    </div>
                                    <div class="col-md-12" id="divRadPreg14">
                                        <h4>12.- Independientemente del candidato que postulen, de la siguiente lista de alianzas, ¿Por  cuál votaría Usted? </h4>
                                    </div>
                                    <div class="alert alert-warning">Leer opciones 1 a 3</div>
                                    <div class="col-md-12">
                                        <label class="btn btn-primary" for="RadPreg141">
                                            <input type="radio" name="RadPreg14" id="RadPreg141" value="1"> 1) Alianza del PRI con PVEM 
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg142">
                                            <input type="radio" name="RadPreg14" id="RadPreg142" value="2"> 2) Alianza del PAN con PRD, MC y PANAL    
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg143">
                                            <input type="radio" name="RadPreg14" id="RadPreg143" value="3"> 3) Morena con PT y PES  
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg144">
                                            <input type="radio" name="RadPreg14" id="RadPreg144" value="4"> 4) Ninguna  
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg145">
                                            <input type="radio" name="RadPreg14" id="RadPreg145" value="5"> 5) Otro
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg146">
                                            <input type="radio" name="RadPreg14" id="RadPreg146" value="6"> 6) NS/NR  
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row divPregDep8" style="display:none">
                                    <div class="col-md-12" id="divRadPreg15">
                                        <h4>13.- Independientemente de por quién va a votar, ¿quién cree que ganará las elecciones para Diputado Local en este Distrito?</h4>
                                    </div>
                                    <div class="alert alert-warning">Leer opciones 1 a 3</div>
                                    <div class="col-md-12">
                                        <label class="btn btn-primary" for="RadPreg151">
                                            <input type="radio" name="RadPreg15" id="RadPreg151" value="1"> 1) Alianza del PRI con PVEM 
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg152">
                                            <input type="radio" name="RadPreg15" id="RadPreg152" value="2"> 2) Alianza del PAN con PRD, MC y PANAL  
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg153">
                                            <input type="radio" name="RadPreg15" id="RadPreg153" value="3"> 3) Morena con PT y PES  
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg154">
                                            <input type="radio" name="RadPreg15" id="RadPreg154" value="4"> 4) Ninguna  
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg155">
                                            <input type="radio" name="RadPreg15" id="RadPreg155" value="5"> 5) Otro
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg156">
                                            <input type="radio" name="RadPreg15" id="RadPreg156" value="6"> 6) NS/NR  
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12" id="divRadPreg12">
                                        <h4>14.- Le voy a leer una lista de personalidades del Distrito:  </h4>
                                    </div>
                                    <div class="col-md-12">
                                        <?php include('Tabla.php'); ?>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12" id="divRadPreg13">
                                        <h4>15.- ¿Quién de los nombres que le acabo de leer le gustaría que fuera  Diputado Local por este Distrito?</h4>
                                    </div>
                                    <div class="alert alert-warning">Mención Espontánea</div>
                                    <div class="col-md-6">
                                        <select class="form-control" id="cmbPreg13">
                                            <option class="form-control" value="0">Seleciona</option>
                                        <?php
                                            foreach ($array as $i => $value) {
                                                echo "<option value='".($i+1)."'>".$array[$i]."</option>";
                                            }
                                            ?>
                                            <option value="16">NS/NR</option>
                                            <option value="17">Otro</option>
                                            <option value="18">Ninguno</option>
                                        </select>
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
                                    <div class="col-md-12" id="divRadPreg16">
                                        <h4>Sexo:</h4>
                                    </div>
                                    <div class="alert alert-warning">Anote sin preguntar</div>
                                    <div class="col-md-12">
                                        <label class="btn btn-primary" for="RadPreg161">
                                            <input type="radio" name="RadPreg16" id="RadPreg161" value="1"> H
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg162">
                                            <input type="radio" name="RadPreg16" id="RadPreg162" value="2"> M
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12" id="divRadPreg17">
                                        <h4>Edad:</h4>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="btn btn-primary" for="RadPreg171">
                                            <input type="radio" name="RadPreg17" id="RadPreg171" value="1"> 18 – 24 Años
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg172">
                                            <input type="radio" name="RadPreg17" id="RadPreg172" value="2"> 25 - 34 Años
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg173">
                                            <input type="radio" name="RadPreg17" id="RadPreg173" value="3"> 35 – 44 Años
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg174">
                                            <input type="radio" name="RadPreg17" id="RadPreg174" value="4"> 45 y más
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12" id="divRadPreg18">
                                        <h4>Estado Civil:</h4>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="btn btn-primary" for="RadPreg181">
                                            <input type="radio" name="RadPreg18" id="RadPreg181" value="1"> Soltero(a)
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg182">
                                            <input type="radio" name="RadPreg18" id="RadPreg182" value="2"> Casado(a)
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg183">
                                            <input type="radio" name="RadPreg18" id="RadPreg183" value="3"> Divorciado(a)
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg184">
                                            <input type="radio" name="RadPreg18" id="RadPreg184" value="4"> Viudo(a)
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg185">
                                            <input type="radio" name="RadPreg18" id="RadPreg185" value="5"> Unión Libre
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg186">
                                            <input type="radio" name="RadPreg18" id="RadPreg186" value="6"> Otro
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12" id="divRadPreg19">
                                        <h4>¿A qué se dedica? (Ocupación):</h4>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="btn btn-primary" for="RadPreg191">
                                            <input type="radio" name="RadPreg19" id="RadPreg191" value="1"> Empleado en empresa 
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg192">
                                            <input type="radio" name="RadPreg19" id="RadPreg192" value="2"> Empleado en el Gob 
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg193">
                                            <input type="radio" name="RadPreg19" id="RadPreg193" value="3"> Trabaja por su cuenta
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg194">
                                            <input type="radio" name="RadPreg19" id="RadPreg194" value="4"> Trabajador del campo
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg195">
                                            <input type="radio" name="RadPreg19" id="RadPreg195" value="5"> Estudiante
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg196">
                                            <input type="radio" name="RadPreg19" id="RadPreg196" value="6"> Ama de casa
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg197">
                                            <input type="radio" name="RadPreg19" id="RadPreg197" value="7"> Desempleado 
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg198">
                                            <input type="radio" name="RadPreg19" id="RadPreg198" value="8"> Jubilado
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12" id="divRadPreg20">
                                        <h4>Escolaridad: (Hasta qué año de estudios llegó)</h4>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="btn btn-primary" for="RadPreg201">
                                            <input type="radio" name="RadPreg20" id="RadPreg201" value="1"> Primaria incompleta
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg202">
                                            <input type="radio" name="RadPreg20" id="RadPreg202" value="2"> Primaria completa
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg203">
                                            <input type="radio" name="RadPreg20" id="RadPreg203" value="3"> Secundaria completa
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg204">
                                            <input type="radio" name="RadPreg20" id="RadPreg204" value="4"> Preparatoria completa
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg205">
                                            <input type="radio" name="RadPreg20" id="RadPreg205" value="5"> Profesional y más
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12" id="divRadPreg21">
                                        <h4>¿Podría decirme a cuánto ascienden sus ingresos mensuales, aproximadamente?</h4>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="btn btn-primary" for="RadPreg211">
                                            <input type="radio" name="RadPreg21" id="RadPreg211" value="1"> Sin ingresos
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg212">
                                            <input type="radio" name="RadPreg21" id="RadPreg212" value="2"> Hasta $3,000.00
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg213">
                                            <input type="radio" name="RadPreg21" id="RadPreg213" value="3"> Hasta $7,500.00
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg214">
                                            <input type="radio" name="RadPreg21" id="RadPreg214" value="4"> Hasta $15,000.00
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg215">
                                            <input type="radio" name="RadPreg21" id="RadPreg215" value="5"> Hasta $30,000.00
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg216">
                                            <input type="radio" name="RadPreg21" id="RadPreg216" value="6"> Más de $30,000.00
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg217">
                                            <input type="radio" name="RadPreg21" id="RadPreg217" value="7"> No contestó
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <hr>
							<div class="form-group" id="divObservacion" style="display:none">
								<label for="cmbObsEstatus">
                                    Motivo
                                </label>
                                <select id="cmbObsEstatus" class="form-control">
                                    <option value="0">Seleccione</option>
                                    <option value="1">No le interesa / Colgo</option>
                                    <option value="2">Responde con insultos</option>
                                    <option value="3">Numero fuera de servicio</option>
                                    <option value="4">Buzon</option>
                                    <option value="5">Se corto la llamada</option>
                                    <option value="6">Llamar mas tarde</option>
                                </select>
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
				<div class="col-md-12">
                <hr>
					<div class="card">
						<div class="card-header text-white bg-primary">
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
					<small>Copyright © Arturo C. 2018</small>
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
            /*
			function General(e){
                alert($( e.target ).val()+" Id:"+$( e.target ).attr("name"));
            }*/
            var RadPreg5Array = new Array();
			function RadPreg5(e){
                cont=0;
                if($("#RadPreg5"+e).is(':checked')){
                    RadPreg5Array.push(e);
                    //var opc = $().val();
                }
                else{
                    RadPreg5Array.forEach(function (elemento, indice, array) {
                        if(elemento==e){
                            RadPreg5Array.splice(indice, 1);
                        }
                    });
                }
                $("input[name='RadPreg5[]']:checked").each(function(){
                    cont++
                });
                if(cont==2){
                    $("[name='RadPreg5[]']").attr("disabled", "disabled");
                }
                else{
                    $("[name='RadPreg5[]']").removeAttr("disabled");
                }
                $("input[name='RadPreg5[]']:checked").each(function(){
                    $(this).removeAttr("disabled");
                });
                $('#txtPreg5Array').val(RadPreg5Array);
            }
            var RadPreg6Array = new Array();
            function RadPreg6(e){
                cont=0;
                if($("#RadPreg6"+e).is(':checked')){
                    RadPreg6Array.push(e);
                    //var opc = $().val();
                }
                else{
                    RadPreg6Array.forEach(function (elemento, indice, array) {
                        if(elemento==e){
                            RadPreg6Array.splice(indice, 1);
                        }
                    });
                }
                $("input[name='RadPreg6[]']:checked").each(function(){
                    cont++
                });
                if(cont==2){
                    $("[name='RadPreg6[]']").attr("disabled", "disabled");
                }
                else{
                    $("[name='RadPreg6[]']").removeAttr("disabled");
                }
                $("input[name='RadPreg6[]']:checked").each(function(){
                    $(this).removeAttr("disabled");
                });
                $('#txtPreg6Array').val(RadPreg6Array);
            }
			function RadPreg8(e){
                if($( e.target ).val()==4 || $( e.target ).val()==5){
					$( ".divPregDep8" ).hide('fade');
                }
                else{
					$( ".divPregDep8" ).show('fade');
                }
            }
			function RadEstadoFun(e){
				if($( e.target ).val()==1){
					$( "#divDatosEncuesta" ).show('fade');
					$( "#divObservacion" ).hide();
                    if($("input[name='RadCredencial']:checked").val()==1 && $("input[name='RadMuni']:checked").val()==1){
                        $( "#divElector" ).show('fade');
                    }
                    else{
                        $( "#divElector" ).hide();
                    }
				}
				else{
					$( "#divObservacion" ).show('fade');
					$( "#divDatosEncuesta" ).hide();
                    $( "#divElector" ).hide();
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
            //$("[type='radio']").on( "change", General );
			$("[name='RadPreg8']").on( "change", RadPreg8 );
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
			$("#btnGuardar").click(function(){
                $("#btnGuardar").attr("disabled", "disabled");("disabled", "disabled");
				$("#RadLlamada").css('border', 'none');
				$("#cmbObsEstatus").css('border', 'none');
				$("#divRadPreg1").css('border', 'none');
				$("#divRadPreg2").css('border', 'none');
				$("#divRadPreg3").css('border', 'none');
				$("#divRadPreg4").css('border', 'none');
				$("#divRadPreg5").css('border', 'none');
				$("#divRadPreg6").css('border', 'none');
				$("#divRadPreg7").css('border', 'none');
				$("#divRadPreg8").css('border', 'none');
				$("#divRadPreg9").css('border', 'none');
				$("#divRadPreg10").css('border', 'none');
				$("#divRadPreg11").css('border', 'none');
                
				$("#divRadPreg121").css('border', 'none');
				$("#divRadPreg122").css('border', 'none');
				$("#divRadPreg123").css('border', 'none');
				$("#divRadPreg124").css('border', 'none');
				$("#divRadPreg125").css('border', 'none');
				$("#divRadPreg126").css('border', 'none');
				$("#divRadPreg127").css('border', 'none');
				$("#divRadPreg128").css('border', 'none');
				$("#divRadPreg129").css('border', 'none');
				$("#divRadPreg1210").css('border', 'none');
				$("#divRadPreg1211").css('border', 'none');
				$("#divRadPreg1212").css('border', 'none');
				$("#divRadPreg1213").css('border', 'none');
				$("#divRadPreg1214").css('border', 'none');
				$("#divRadPreg1215").css('border', 'none');
				
				$("#divRadPreg13").css('border', 'none');
				$("#divRadPreg14").css('border', 'none');
				$("#divRadPreg15").css('border', 'none');
				$("#divRadPreg16").css('border', 'none');
				$("#divRadPreg17").css('border', 'none');
				$("#divRadPreg18").css('border', 'none');
				$("#divRadPreg19").css('border', 'none');
				$("#divRadPreg20").css('border', 'none');
				$("#divRadPreg21").css('border', 'none');
				mensaje="";
				err=false;
				if($("input[name='RadEstado']:checked").val()==1){
				    if($("input[name='RadCredencial']:checked").val()==1 && $("input[name='RadMuni']:checked").val()==1){
                        if(!$("input[name='RadPreg1']:radio").is(':checked')){
                            $("#divRadPreg1").css({"border-bottom" : "3px solid #f00d0d"});
                            err=true;
                        }
                        if(!$("input[name='RadPreg2']:radio").is(':checked')){
                            $("#divRadPreg2").css({"border-bottom" : "3px solid #f00d0d"});
                            err=true;
                        }
                        if(!$("input[name='RadPreg3']:radio").is(':checked')){
                            $("#divRadPreg3").css({"border-bottom" : "3px solid #f00d0d"});
                            err=true;
                        }
                        /***/
                        cont=0;
                        $("input[name='RadPreg5[]']:checked").each(function(){
                            if($(this).val()==13){
                                if($('#txtPreg5').val().length<=2){
                                    $("#divRadPreg5").css({"border-bottom" : "3px solid #f00d0d"});
                                    err=true;
                                }
                            }
                            cont++
                        });
                        if(cont!=2){
                            $("#divRadPreg5").css({"border-bottom" : "3px solid #f00d0d"});
                            err=true;
                        }
                        cont=0;
                        $("input[name='RadPreg6[]']:checked").each(function(){
                            if($(this).val()==13){
                                if($('#txtPreg6').val().length<=2){
                                    $("#divRadPreg6").css({"border-bottom" : "3px solid #f00d0d"});
                                    err=true;
                                }
                            }
                            cont++
                        });
                        if(cont!=2){
                            $("#divRadPreg6").css({"border-bottom" : "3px solid #f00d0d"});
                            err=true;
                        }
                        /****/
                        if(!$("input[name='RadPreg7']:radio").is(':checked')){
                            $("#divRadPreg7").css({"border-bottom" : "3px solid #f00d0d"});
                            err=true;
                        }
                        if(!$("input[name='RadPreg8']:radio").is(':checked')){
                            $("#divRadPreg8").css({"border-bottom" : "3px solid #f00d0d"});
                            err=true;
                        }
                        if($("input[name=RadPreg8]:checked").val()==1 && $("input[name=RadPreg8]:checked").val()==2 && $("input[name=RadPreg8]:checked").val()==3){
                            if(!$("input[name='RadPreg9']:radio").is(':checked')){
                                $("#divRadPreg9").css({"border-bottom" : "3px solid #f00d0d"});
                                err=true;
                            }
                            if(!$("input[name='RadPreg14']:radio").is(':checked')){
                                $("#divRadPreg14").css({"border-bottom" : "3px solid #f00d0d"});
                                err=true;
                            }
                            if(!$("input[name='RadPreg15']:radio").is(':checked')){
                                $("#divRadPreg15").css({"border-bottom" : "3px solid #f00d0d"});
                                err=true;
                            }
                        }
                        if(!$("input[name='RadPreg10']:radio").is(':checked')){
                            $("#divRadPreg10").css({"border-bottom" : "3px solid #f00d0d"});
                            err=true;
                        }
                        if(!$("input[name='RadPreg11']:radio").is(':checked')){
                            $("#divRadPreg11").css({"border-bottom" : "3px solid #f00d0d"});
                            err=true;
                        }

                        id = 1;
                        while (id<=9){
                            if($('#cmbPreg121'+id).val()==0){
                                $('#divRadPreg12'+id).css({"border-bottom" : "3px solid #f00d0d"});
                                err=true;
                            }
                            else{
                                if($('#cmbPreg121'+id).val()==1 || $('#cmbPreg121'+id).val()==2){
                                    if($('#cmbPreg123'+id).val()==0){
                                        $('#divRadPreg12'+id).css({"border-bottom" : "3px solid #f00d0d"});
                                        err=true;
                                    }
                                    if($('#cmbPreg124'+id).val()==0){
                                        $('#divRadPreg12'+id).css({"border-bottom" : "3px solid #f00d0d"});
                                        err=true;
                                    }
                                    if($('#cmbPreg125'+id).val()==0){
                                        $('#divRadPreg12'+id).css({"border-bottom" : "3px solid #f00d0d"});
                                        err=true;
                                    }
                                }
                                else{
                                    if($('#cmbPreg122'+id).val()==0){
                                        $('#divRadPreg12'+id).css({"border-bottom" : "3px solid #f00d0d"});
                                        err=true;
                                    }
                                    else{
                                        if($('#cmbPreg122'+id).val()==1 || $('#cmbPreg122'+id).val()==2){
                                            if($('#cmbPreg123'+id).val()==0){
                                                $('#divRadPreg12'+id).css({"border-bottom" : "3px solid #f00d0d"});
                                                err=true;
                                            }
                                            if($('#cmbPreg124'+id).val()==0){
                                                $('#divRadPreg12'+id).css({"border-bottom" : "3px solid #f00d0d"});
                                                err=true;
                                            }
                                            if($('#cmbPreg125'+id).val()==0){
                                                $('#divRadPreg12'+id).css({"border-bottom" : "3px solid #f00d0d"});
                                                err=true;
                                            }
                                        }
                                    }
                                }
                            }
                            id ++;
                        }

                        if($("#cmbPreg13").val()==0){
                            $("#divRadPreg13").css({"border-bottom" : "3px solid #f00d0d"});
                            err=true;
                        }
                        if(!$("input[name='RadPreg16']:radio").is(':checked')){
                            $("#divRadPreg16").css({"border-bottom" : "3px solid #f00d0d"});
                            err=true;
                        }
                        if(!$("input[name='RadPreg17']:radio").is(':checked')){
                            $("#divRadPreg17").css({"border-bottom" : "3px solid #f00d0d"});
                            err=true;
                        }
                        if(!$("input[name='RadPreg18']:radio").is(':checked')){
                            $("#divRadPreg18").css({"border-bottom" : "3px solid #f00d0d"});
                            err=true;
                        }
                        if(!$("input[name='RadPreg19']:radio").is(':checked')){
                            $("#divRadPreg19").css({"border-bottom" : "3px solid #f00d0d"});
                            err=true;
                        }
                        if(!$("input[name='RadPreg20']:radio").is(':checked')){
                            $("#divRadPreg20").css({"border-bottom" : "3px solid #f00d0d"});
                            err=true;
                        }
                        if(!$("input[name='RadPreg21']:radio").is(':checked')){
                            $("#divRadPreg21").css({"border-bottom" : "3px solid #f00d0d"});
                            err=true;
                        }
                    }
				}
				else{
					if(!$("input[name='RadEstado']:radio").is(':checked')){
						$("#RadLlamada").css({"border-bottom" : "3px solid #f00d0d"});
						err=true;
					}
                    else{
                        if($('#cmbObsEstatus').val()==0){
                            $("#cmbObsEstatus").css({"border-bottom" : "3px solid #f00d0d"});
                            err=true;
                        }
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
					$.post("GuardaLlamada.php",{
						cve: $('#txtClave').val(),
						esta: $("input[name=RadEstado]:checked").val(),
						obs: $('#txtObservaciones').val(),
						cmbobs: $('#cmbObsEstatus').val(),
						filtCre: $("input[name=RadCredencial]:checked").val(),
						filtMuni: $("input[name=RadMuni]:checked").val(),
						res1: $("input[name=RadPreg1]:checked").val(),
						res2: $("input[name=RadPreg2]:checked").val(),
						res3: $("input[name=RadPreg3]:checked").val(),
						res41: $("#textPreg41").val(),
						res42: $("#textPreg42").val(),
						res5: $("#txtPreg5Array").val(),
						res51: $("#txtPreg5").val(),
						res6: $("#txtPreg6Array").val(),
						res61: $("#txtPreg6").val(),
						res7: $("input[name=RadPreg7]:checked").val(),
						res8: $("input[name=RadPreg8]:checked").val(),
						res9: $("input[name=RadPreg9]:checked").val(),
						res10: $("input[name=RadPreg10]:checked").val(),
						res11: $("input[name=RadPreg11]:checked").val(),
                        res1211: $("#cmbPreg1211").val(),
                        res1221: $("#cmbPreg1221").val(),
                        res1231: $("#cmbPreg1231").val(),
                        res1241: $("#cmbPreg1241").val(),
                        res1251: $("#cmbPreg1251").val(),
                        res1212: $("#cmbPreg1212").val(),
                        res1222: $("#cmbPreg1222").val(),
                        res1232: $("#cmbPreg1232").val(),
                        res1242: $("#cmbPreg1242").val(),
                        res1252: $("#cmbPreg1252").val(),
                        res1213: $("#cmbPreg1213").val(),
                        res1223: $("#cmbPreg1223").val(),
                        res1233: $("#cmbPreg1233").val(),
                        res1243: $("#cmbPreg1243").val(),
                        res1253: $("#cmbPreg1253").val(),
                        res1214: $("#cmbPreg1214").val(),
                        res1224: $("#cmbPreg1224").val(),
                        res1234: $("#cmbPreg1234").val(),
                        res1244: $("#cmbPreg1244").val(),
                        res1254: $("#cmbPreg1254").val(),
                        res1215: $("#cmbPreg1215").val(),
                        res1225: $("#cmbPreg1225").val(),
                        res1235: $("#cmbPreg1235").val(),
                        res1245: $("#cmbPreg1245").val(),
                        res1255: $("#cmbPreg1255").val(),
                        res1216: $("#cmbPreg1216").val(),
                        res1226: $("#cmbPreg1226").val(),
                        res1236: $("#cmbPreg1236").val(),
                        res1246: $("#cmbPreg1246").val(),
                        res1256: $("#cmbPreg1256").val(),
                        res1217: $("#cmbPreg1217").val(),
                        res1227: $("#cmbPreg1227").val(),
                        res1237: $("#cmbPreg1237").val(),
                        res1247: $("#cmbPreg1247").val(),
                        res1257: $("#cmbPreg1257").val(),
                        res1218: $("#cmbPreg1218").val(),
                        res1228: $("#cmbPreg1228").val(),
                        res1238: $("#cmbPreg1238").val(),
                        res1248: $("#cmbPreg1248").val(),
                        res1258: $("#cmbPreg1258").val(),
                        res1219: $("#cmbPreg1219").val(),
                        res1229: $("#cmbPreg1229").val(),
                        res1239: $("#cmbPreg1239").val(),
                        res1249: $("#cmbPreg1249").val(),
                        res1259: $("#cmbPreg1259").val(),
                        res12110: $("#cmbPreg12110").val(),
                        res12210: $("#cmbPreg12210").val(),
                        res12310: $("#cmbPreg12310").val(),
                        res12410: $("#cmbPreg12410").val(),
                        res12510: $("#cmbPreg12510").val(),
                        res12111: $("#cmbPreg12111").val(),
                        res12211: $("#cmbPreg12211").val(),
                        res12311: $("#cmbPreg12311").val(),
                        res12411: $("#cmbPreg12411").val(),
                        res12511: $("#cmbPreg12511").val(),
                        res12112: $("#cmbPreg12112").val(),
                        res12212: $("#cmbPreg12212").val(),
                        res12312: $("#cmbPreg12312").val(),
                        res12412: $("#cmbPreg12412").val(),
                        res12512: $("#cmbPreg12512").val(),
                        res12113: $("#cmbPreg12113").val(),
                        res12213: $("#cmbPreg12213").val(),
                        res12313: $("#cmbPreg12313").val(),
                        res12413: $("#cmbPreg12413").val(),
                        res12513: $("#cmbPreg12513").val(),
                        res12114: $("#cmbPreg12114").val(),
                        res12214: $("#cmbPreg12214").val(),
                        res12314: $("#cmbPreg12314").val(),
                        res12414: $("#cmbPreg12414").val(),
                        res12514: $("#cmbPreg12514").val(),
                        res12115: $("#cmbPreg12115").val(),
                        res12215: $("#cmbPreg12215").val(),
                        res12315: $("#cmbPreg12315").val(),
                        res12415: $("#cmbPreg12415").val(),
                        res12515: $("#cmbPreg12515").val(),
                        res13: $("#cmbPreg13").val(),
                        res14: $("input[name=RadPreg14]:checked").val(),
                        res15: $("input[name=RadPreg15]:checked").val(),
                        res16: $("input[name=RadPreg16]:checked").val(),
                        res17: $("input[name=RadPreg17]:checked").val(),
                        res18: $("input[name=RadPreg18]:checked").val(),
                        res19: $("input[name=RadPreg19]:checked").val(),
                        res20: $("input[name=RadPreg20]:checked").val(),
                        res21: $("input[name=RadPreg21]:checked").val(),
					},function(data){
						bootbox.alert({ 
							size: "small",
							message: data, 
							callback: function(){
								location.reload();
							}
						});
					});
                    
				}
                return false;
			});
			InfoNumero();
		</script>
	</div>
</body>
</html>

