<?php
session_start();
if(!isset($_SESSION['UsuarioIdGeneral'])){
	header('Location:../');
}
elseif($_SESSION['UsuarioCveSistema']!=10 || $_SESSION['EncuestaCveEncuesta']!=1){
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
							Captura Lafragua
						</div>
						<div class="card-header">
							<div class="form-group" >
							</div>
						</div>
						<div class="card-body">
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <h4>Datos de Encuesta</h4>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Seccion</label>
                                        <input type="text" class="form-control" placeholder="Seccion" id="txtSeccion">
                                        <hr>
                                        <label>Municipio</label>
                                        <select class="form-control" id="cmbMunicipio">
                                            <?php
                                            $sql="SELECT * FROM municipios where Clave=93";
                                            $categorias=$bd->get_arreglo($sql);
                                            if(!empty($categorias)){
                                                foreach ($categorias as $mivalor){
                                                    echo "<option value='".($mivalor['Clave'])."'>".utf8_encode($mivalor['Descripcion'])."</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Nip</label>
                                        <input type="text" class="form-control" placeholder="Nip" id="txtNip">
                                        <hr>
                                        <label>Numero</label>
                                        <input type="text" class="form-control" placeholder="Numero" id="txtNumero">
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label>Folio</label>
                                                <input type="text" class="form-control bg-primary text-white" placeholder="Folio" id="txtFolio">
                                            </div>
                                            <div class="col-md-5">
                                                <label></label>
                                                <input type="hidden" class="form-control bg-danger text-white" placeholder="Folio" id="txtFolioR">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-row">
                                    <div class="col-md-12" id="divRadPreg1">
                                        <h4>1.- ¿Comparada con el año pasado, ¿cómo diría que está actualmente su situación económica personal?</h4>
                                    </div>
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
                                        <h4>3.- ¿Qué opinión tiene del trabajo realizado por el actual Presidente Municipal? </h4>
                                    </div>
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
                                        <h4>4.- ¿Qué opinión tiene del trabajo realizado por el actual Gobernador Tony Gali?</h4>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="btn btn-primary" for="RadPreg41">
                                            <input type="radio" name="RadPreg4" id="RadPreg41" value="1"> 1) Muy buena
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg42">
                                            <input type="radio" name="RadPreg4" id="RadPreg42" value="2"> 2) Buena  
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg43">
                                            <input type="radio" name="RadPreg4" id="RadPreg43" value="3"> 3) Regular  
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg44">
                                            <input type="radio" name="RadPreg4" id="RadPreg44" value="4"> 4) Mala 
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg45">
                                            <input type="radio" name="RadPreg4" id="RadPreg45" value="5"> 5) Muy mala 
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg46">
                                            <input type="radio" name="RadPreg4" id="RadPreg46" value="6"> 6) NS/NR  
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12" id="divRadPreg5">
                                        <h4>5.- ¿Qué opinión tiene del trabajo realizado por el Presidente Enrique Peña?</h4>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="btn btn-primary" for="RadPreg51">
                                            <input type="radio" name="RadPreg5" id="RadPreg51" value="1"> 1) Muy buena
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg52">
                                            <input type="radio" name="RadPreg5" id="RadPreg52" value="2"> 2) Buena  
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg53">
                                            <input type="radio" name="RadPreg5" id="RadPreg53" value="3"> 3) Regular  
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg54">
                                            <input type="radio" name="RadPreg5" id="RadPreg54" value="4"> 4) Mala 
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg55">
                                            <input type="radio" name="RadPreg5" id="RadPreg55" value="5"> 5) Muy mala 
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg56">
                                            <input type="radio" name="RadPreg5" id="RadPreg56" value="6"> 6) NS/NR  
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12" id="divRadPreg6">
                                        <h4>6.- En su Opinion ¿que deberia hacer el actual presidente municipial</h4>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="txtPreg6" id="txtPreg6">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12" id="divRadPreg7">
                                        <h4>7.1- Servicio Publico </h4>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="txtPreg71" id="txtPreg71">
                                        <h4>7.2- Servicio Publico 2</h4>
                                        <input type="text" class="form-control" name="txtPreg72" id="txtPreg72">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12" id="divRadPreg8">
                                        <h4>8.- ¿Sabe Usted cuándo serán las próximas elecciones en el Estado de Puebla?</h4>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="btn btn-primary" for="RadPreg81">
                                            <input type="radio" name="RadPreg8" id="RadPreg81" value="1"> 1) Sí, el 1 de julio de 2018 
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg82">
                                            <input type="radio" name="RadPreg8" id="RadPreg82" value="2"> 2) Sí, en julio de 2018   
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg83">
                                            <input type="radio" name="RadPreg8" id="RadPreg83" value="3"> 3) Sí, este año  
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg84">
                                            <input type="radio" name="RadPreg8" id="RadPreg84" value="4"> 4) Sí (otra fecha) 
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg85">
                                            <input type="radio" name="RadPreg8" id="RadPreg85" value="5"> 5) NS/NR
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12" id="divRadPreg9">
                                        <h4>9.- El 1° de julio habrá elecciones para Gobernador, Presidentes Municipales y Diputados Locales, ¿Qué tanto le interesa votar en estas elecciones?</h4>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="btn btn-primary" for="RadPreg91">
                                            <input type="radio" name="RadPreg9" id="RadPreg91" value="1"> 1) Mucho 
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg92">
                                            <input type="radio" name="RadPreg9" id="RadPreg92" value="2"> 2) Regular    
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg93">
                                            <input type="radio" name="RadPreg9" id="RadPreg93" value="3"> 3) Poco
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg94">
                                            <input type="radio" name="RadPreg9" id="RadPreg94" value="4"> 4) Nada  
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg95">
                                            <input type="radio" name="RadPreg9" id="RadPreg95" value="5"> 5) NS/NR 
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12" id="divRadPreg10">
                                        <h4>10.- En este momento, ¿Con qué partido político se identifica más? </h4>
                                    </div>
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
                                            <input type="radio" name="RadPreg10" id="RadPreg1016" value="16"> 16) No Sabe
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg1017">
                                            <input type="radio" name="RadPreg10" id="RadPreg1017" value="17"> 17) No Responde
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12" id="divRadPreg11">
                                        <h4>11.- ¿Por qué partido político nunca votaría?</h4>
                                    </div>
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
                                            <input type="radio" name="RadPreg11" id="RadPreg1116" value="16"> 16) No Sabe
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg1117">
                                            <input type="radio" name="RadPreg11" id="RadPreg1117" value="17"> 17) No Responde
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12" id="divRadPreg12">
                                        <h4>12.- Si el día de hoy fueran las elecciones para Presidente Municipal ¿Por cuál partido  votaría?</h4>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="btn btn-primary" for="RadPreg121">
                                            <input type="radio" name="RadPreg12" id="RadPreg121" value="1"> 1) PAN
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg122">
                                            <input type="radio" name="RadPreg12" id="RadPreg122" value="2"> 2) PRI
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg123">
                                            <input type="radio" name="RadPreg12" id="RadPreg123" value="3"> 3) PRD
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg124">
                                            <input type="radio" name="RadPreg12" id="RadPreg124" value="4"> 4) PT
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg125">
                                            <input type="radio" name="RadPreg12" id="RadPreg125" value="5"> 5) PVEM
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg126">
                                            <input type="radio" name="RadPreg12" id="RadPreg126" value="6"> 6) Mov. Ciudadano
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg127">
                                            <input type="radio" name="RadPreg12" id="RadPreg127" value="7"> 7) P Nueva Alianza
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg128">
                                            <input type="radio" name="RadPreg12" id="RadPreg128" value="8"> 8) Compromiso por Puebla
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg129">
                                            <input type="radio" name="RadPreg12" id="RadPreg129" value="9"> 9) PSI
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg1210">
                                            <input type="radio" name="RadPreg12" id="RadPreg1210" value="10"> 10) Morena
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg1211">
                                            <input type="radio" name="RadPreg12" id="RadPreg1211" value="11"> 11) Encuentro Social
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg1212">
                                            <input type="radio" name="RadPreg12" id="RadPreg1212" value="12"> 12) Candidatura Independiente
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg1213">
                                            <input type="radio" name="RadPreg12" id="RadPreg1213" value="13"> 13) Anulado
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg1214">
                                            <input type="radio" name="RadPreg12" id="RadPreg1214" value="14"> 14) Otro
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg1215">
                                            <input type="radio" name="RadPreg12" id="RadPreg1215" value="15"> 15) Ninguno
                                        </label> 
                                        <label class="btn btn-primary" for="RadPreg1216">
                                            <input type="radio" name="RadPreg12" id="RadPreg1216" value="16"> 16) No Sabe
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg1217">
                                            <input type="radio" name="RadPreg12" id="RadPreg1217" value="17"> 17) No Responde
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12" id="divRadPreg13">
                                        <h4>13.- Me puede decir el nombre  de una persona que le gustaria que fuera el proximo Presidente Municipal?</h4>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="txtPreg13" id="txtPreg13">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12" id="divRadPreg14">
                                        <h4>14.- Le voy a leer una lista de personalidades del Distrito:  </h4>
                                    </div>
                                    <div class="col-md-12">
                                        <?php include('Tabla.php'); ?>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12" id="divRadPreg15">
                                        <h4>15.- ¿Quién de los nombres que le acabo de leer le gustaría que fuera  Diputado Local por este Distrito?</h4>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control" id="cmbPreg15">
                                            <option class="form-control" value="0">Seleciona</option>
                                            <option value="1">1) Raul Pineda</option>
                                            <option value="2">2) Emilio Hernandez</option>
                                            <option value="3">3) Felipe Argûello</option>
                                            <option value="4">4) Armando Ortiz</option>
                                            <option value="5">5) Javier Solis</option>
                                            <option value="6">6) Gilberto Jimarez</option>
                                            <option value="7">7) Reyes Caballero</option>
                                            <option value="8">8) Teresa Juarez</option>
                                            <option value="9">9) Ninguno</option>
                                            <option value="10">10) Otro</option>
                                            <option value="11">11) NS/NR</option>
                                            <option value="12">12) Karina Hernandez</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12" id="divRadPreg16">
                                        <h4>16.- Usted prefiere que el próximo PRESIDENTE MUNICIPAL DE CHIETLA sea un hombre o una mujer? </h4>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="btn btn-primary" for="RadPreg161">
                                            <input type="radio" name="RadPreg16" id="RadPreg161" value="1"> 1) Hombre
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg162">
                                            <input type="radio" name="RadPreg16" id="RadPreg162" value="2"> 2) Mujer
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg163">
                                            <input type="radio" name="RadPreg16" id="RadPreg163" value="3"> 3) No importa el género
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg164">
                                            <input type="radio" name="RadPreg16" id="RadPreg164" value="4"> 4) NS / NR
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12" id="divRadPreg17">
                                        <h4>17.- En cuanto a su trayectoria, ¿Usted prefiere a una persona con preparación académica o con experiencia política?  </h4>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="btn btn-primary" for="RadPreg171">
                                            <input type="radio" name="RadPreg17" id="RadPreg171" value="1"> 1) Preparación académica
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg172">
                                            <input type="radio" name="RadPreg17" id="RadPreg172" value="2"> 2) Experiencia política 
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg173">
                                            <input type="radio" name="RadPreg17" id="RadPreg173" value="3"> 3) No es importante  
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg174">
                                            <input type="radio" name="RadPreg17" id="RadPreg174" value="4"> 4) Ninguna
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg175">
                                            <input type="radio" name="RadPreg17" id="RadPreg175" value="5"> 5) NS/NR
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12" id="divRadPreg18">
                                        <h4>18.- En cuanto a su edad, ¿Usted prefiere a alguien joven o a una persona mayor?  </h4>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="btn btn-primary" for="RadPreg181">
                                            <input type="radio" name="RadPreg18" id="RadPreg181" value="1"> 1) Joven
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg182">
                                            <input type="radio" name="RadPreg18" id="RadPreg182" value="2"> 2) Mayor
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg183">
                                            <input type="radio" name="RadPreg18" id="RadPreg183" value="3"> 3) No es importante 
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg184">
                                            <input type="radio" name="RadPreg18" id="RadPreg184" value="4"> 4) Ninguna
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg185">
                                            <input type="radio" name="RadPreg18" id="RadPreg185" value="5"> 5) NS/NR
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12" id="divRadPreg19">
                                        <h4>19.- Por último, ¿Usted prefiere a alguien con militancia partidista o a un ciudadano?</h4>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="btn btn-primary" for="RadPreg191">
                                            <input type="radio" name="RadPreg19" id="RadPreg191" value="1"> 1) Militancia partidista
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg192">
                                            <input type="radio" name="RadPreg19" id="RadPreg192" value="2"> 2) Ciudadano 
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg193">
                                            <input type="radio" name="RadPreg19" id="RadPreg193" value="3"> 3) No es importante
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg194">
                                            <input type="radio" name="RadPreg19" id="RadPreg194" value="4"> 4) Ninguna
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg195">
                                            <input type="radio" name="RadPreg19" id="RadPreg195" value="5"> 5) NS/NR
                                        </label>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-row">
                                    <div class="col-md-12">
                                       <h4>PERFIL DEL ENTREVISTADO</h4>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12" id="divRadPregA">
                                        <h4>Sexo:</h4>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="btn btn-primary" for="RadPregA1">
                                            <input type="radio" name="RadPregA" id="RadPregA1" value="1"> H
                                        </label>
                                        <label class="btn btn-primary" for="RadPregA2">
                                            <input type="radio" name="RadPregA" id="RadPregA2" value="2"> M
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12" id="divRadPregB">
                                        <h4>Edad:</h4>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="btn btn-primary" for="RadPregB1">
                                            <input type="radio" name="RadPregB" id="RadPregB1" value="1"> 18 – 24 Años
                                        </label>
                                        <label class="btn btn-primary" for="RadPregB2">
                                            <input type="radio" name="RadPregB" id="RadPregB2" value="2"> 25 - 34 Años
                                        </label>
                                        <label class="btn btn-primary" for="RadPregB3">
                                            <input type="radio" name="RadPregB" id="RadPregB3" value="3"> 35 – 44 Años
                                        </label>
                                        <label class="btn btn-primary" for="RadPregB4">
                                            <input type="radio" name="RadPregB" id="RadPregB4" value="4"> 45 y más
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12" id="divRadPregC">
                                        <h4>Estado Civil:</h4>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="btn btn-primary" for="RadPregC1">
                                            <input type="radio" name="RadPregC" id="RadPregC1" value="1"> Soltero(a)
                                        </label>
                                        <label class="btn btn-primary" for="RadPregC2">
                                            <input type="radio" name="RadPregC" id="RadPregC2" value="2"> Casado(a)
                                        </label>
                                        <label class="btn btn-primary" for="RadPregC3">
                                            <input type="radio" name="RadPregC" id="RadPregC3" value="3"> Divorciado(a)
                                        </label>
                                        <label class="btn btn-primary" for="RadPregC4">
                                            <input type="radio" name="RadPregC" id="RadPregC4" value="4"> Viudo(a)
                                        </label>
                                        <label class="btn btn-primary" for="RadPregC5">
                                            <input type="radio" name="RadPregC" id="RadPregC5" value="5"> Unión Libre
                                        </label>
                                        <label class="btn btn-primary" for="RadPregC6">
                                            <input type="radio" name="RadPregC" id="RadPregC6" value="6"> Otro
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12" id="divRadPregD">
                                        <h4>¿A qué se dedica? (Ocupación):</h4>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="btn btn-primary" for="RadPregD1">
                                            <input type="radio" name="RadPregD" id="RadPregD1" value="1"> Empleado en empresa 
                                        </label>
                                        <label class="btn btn-primary" for="RadPregD2">
                                            <input type="radio" name="RadPregD" id="RadPregD2" value="2"> Empleado en el Gob 
                                        </label>
                                        <label class="btn btn-primary" for="RadPregD3">
                                            <input type="radio" name="RadPregD" id="RadPregD3" value="3"> Trabaja por su cuenta
                                        </label>
                                        <label class="btn btn-primary" for="RadPregD4">
                                            <input type="radio" name="RadPregD" id="RadPregD4" value="4"> Trabajador del campo
                                        </label>
                                        <label class="btn btn-primary" for="RadPregD5">
                                            <input type="radio" name="RadPregD" id="RadPregD5" value="5"> Estudiante
                                        </label>
                                        <label class="btn btn-primary" for="RadPregD6">
                                            <input type="radio" name="RadPregD" id="RadPregD6" value="6"> Ama de casa
                                        </label>
                                        <label class="btn btn-primary" for="RadPregD7">
                                            <input type="radio" name="RadPregD" id="RadPregD7" value="7"> Desempleado 
                                        </label>
                                        <label class="btn btn-primary" for="RadPregD8">
                                            <input type="radio" name="RadPregD" id="RadPregD8" value="8"> Jubilado
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12" id="divRadPregE">
                                        <h4>Escolaridad: (Hasta qué año de estudios llegó)</h4>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="btn btn-primary" for="RadPregE1">
                                            <input type="radio" name="RadPregE" id="RadPregE1" value="1"> Primaria incompleta
                                        </label>
                                        <label class="btn btn-primary" for="RadPregE2">
                                            <input type="radio" name="RadPregE" id="RadPregE2" value="2"> Primaria completa
                                        </label>
                                        <label class="btn btn-primary" for="RadPregE3">
                                            <input type="radio" name="RadPregE" id="RadPregE3" value="3"> Secundaria completa
                                        </label>
                                        <label class="btn btn-primary" for="RadPregE4">
                                            <input type="radio" name="RadPregE" id="RadPregE4" value="4"> Preparatoria completa
                                        </label>
                                        <label class="btn btn-primary" for="RadPregE5">
                                            <input type="radio" name="RadPregE" id="RadPregE5" value="5"> Profesional y más
                                        </label>
                                        <label class="btn btn-primary" for="RadPregE6">
                                            <input type="radio" name="RadPregE" id="RadPregE6" value="6"> Ninguna
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12" id="divRadPregF">
                                        <h4>¿Podría decirme a cuánto ascienden sus ingresos mensuales, aproximadamente?</h4>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="btn btn-primary" for="RadPregF1">
                                            <input type="radio" name="RadPregF" id="RadPregF1" value="1"> Sin ingresos
                                        </label>
                                        <label class="btn btn-primary" for="RadPregF2">
                                            <input type="radio" name="RadPregF" id="RadPregF2" value="2"> Hasta $3,000.00
                                        </label>
                                        <label class="btn btn-primary" for="RadPregF3">
                                            <input type="radio" name="RadPregF" id="RadPregF3" value="3"> Hasta $7,500.00
                                        </label>
                                        <label class="btn btn-primary" for="RadPregF4">
                                            <input type="radio" name="RadPregF" id="RadPregF4" value="4"> Hasta $15,000.00
                                        </label>
                                        <label class="btn btn-primary" for="RadPregF5">
                                            <input type="radio" name="RadPregF" id="RadPregF5" value="5"> Hasta $30,000.00
                                        </label>
                                        <label class="btn btn-primary" for="RadPregF6">
                                            <input type="radio" name="RadPregF" id="RadPregF6" value="6"> Más de $30,000.00
                                        </label>
                                        <label class="btn btn-primary" for="RadPregF7">
                                            <input type="radio" name="RadPregF" id="RadPregF7" value="7"> No contestó
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <hr>
                                        <button id="btnGuardar" class="btn btn-block btn-warning">Guardar</button>
                                    </div>
                                </div>
                            </div>
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
            $( "#cmbMunicipio" ).change(function() {
                $.post("TablaDinamica.php",{
                    Municipio:  $( "#cmbMunicipio" ).val()
                },function(data){
                    $("#divDinamico").html(data);
                });
                 $.post("13Dinamica.php",{
                    Municipio:  $( "#cmbMunicipio" ).val()
                },function(data){
                    $("#DivPreg13").html(data);
                });
            });
			$("#btnGuardar").click(function(){
                $("#btnGuardar").attr("disabled", "disabled");("disabled", "disabled");
                
				//$("#txtColonia").css('border', 'none');
				$("#txtSeccion").css('border', 'none');
				$("#txtNip").css('border', 'none');
				$("#txtNumero").css('border', 'none');
				$("#txtFolio").css('border', 'none');
				$("#cmbMunicipio").css('border', 'none');
                
                
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
				$("#divRadPreg12").css('border', 'none');
				$("#divRadPreg13").css('border', 'none');
                
				$("#divRadPreg14-11").css('border', 'none');
				$("#divRadPreg14-12").css('border', 'none');
				$("#divRadPreg14-13").css('border', 'none');
				$("#divRadPreg14-14").css('border', 'none');
				$("#divRadPreg14-15").css('border', 'none');
				$("#divRadPreg14-16").css('border', 'none');
				$("#divRadPreg14-17").css('border', 'none');
				$("#divRadPreg14-18").css('border', 'none');
				$("#divRadPreg14-19").css('border', 'none');
				
				$("#divRadPreg15").css('border', 'none');
				$("#divRadPreg16").css('border', 'none');
				$("#divRadPreg17").css('border', 'none');
				$("#divRadPreg18").css('border', 'none');
				$("#divRadPreg19").css('border', 'none');
                
				$("#divRadPregA").css('border', 'none');
				$("#divRadPregB").css('border', 'none');
				$("#divRadPregC").css('border', 'none');
				$("#divRadPregD").css('border', 'none');
				$("#divRadPregE").css('border', 'none');
				$("#divRadPregF").css('border', 'none');
				mensaje="";
				campo="";
				err=false;
                /*
                if($("#txtColonia").val().length==0){
                    $("#txtColonia").css({"border-bottom" : "3px solid #f00d0d"});
                    campo="#txtColonia";
                    err=true;
                }*/
                if($("#txtFolio").val().length==0){
                    $("#txtFolio").css({"border-bottom" : "3px solid #f00d0d"});
                    campo="#txtFolio";
                    err=true;
                }
                if($("#txtNip").val().length==0){
                    $("#txtNip").css({"border-bottom" : "3px solid #f00d0d"});
                    campo="#txtNip";
                    err=true;
                }
                if($("#txtNumero").val().length==0){
                    $("#txtNumero").css({"border-bottom" : "3px solid #f00d0d"});
                    campo="#txtNumero";
                    err=true;
                }
                if($("#txtSeccion").val().length==0){
                    $("#txtSeccion").css({"border-bottom" : "3px solid #f00d0d"});
                    campo="#txtSeccion";
                    err=true;
                }
                if($("#cmbMunicipio").val()==0){
                    $("#cmbMunicipio").css({"border-bottom" : "3px solid #f00d0d"});
                    campo="#cmbMunicipio";
                    err=true;
                }
                if(!$("input[name='RadPreg1']:radio").is(':checked')){
                    $("#divRadPreg1").css({"border-bottom" : "3px solid #f00d0d"});
                    campo="#divRadPreg1";
                    err=true;
                }
                if(!$("input[name='RadPreg2']:radio").is(':checked')){
                    $("#divRadPreg2").css({"border-bottom" : "3px solid #f00d0d"});
                    campo="#divRadPreg2";
                    err=true;
                }
                if(!$("input[name='RadPreg3']:radio").is(':checked')){
                    $("#divRadPreg3").css({"border-bottom" : "3px solid #f00d0d"});
                    campo="#divRadPreg3";
                    err=true;
                }
                if(!$("input[name='RadPreg4']:radio").is(':checked')){
                    $("#divRadPreg4").css({"border-bottom" : "3px solid #f00d0d"});
                    campo="#divRadPreg4";
                    err=true;
                }
                if(!$("input[name='RadPreg5']:radio").is(':checked')){
                    $("#divRadPreg5").css({"border-bottom" : "3px solid #f00d0d"});
                    campo="#divRadPreg5";
                    err=true;
                }
                if($("#txtPreg6").val().length==0){
                    $("#divRadPreg6").css({"border-bottom" : "3px solid #f00d0d"});
                    campo="#divRadPreg6";
                    err=true;
                }
                /****/
                if($("#txtPreg71").val().length==0){
                    $("#divRadPreg7").css({"border-bottom" : "3px solid #f00d0d"});
                    campo="#divRadPreg7";
                    err=true;
                }
                if(!$("input[name='RadPreg8']:radio").is(':checked')){
                    $("#divRadPreg8").css({"border-bottom" : "3px solid #f00d0d"});
                    campo="#divRadPreg8";
                    err=true;
                }
                if(!$("input[name='RadPreg9']:radio").is(':checked')){
                    $("#divRadPreg9").css({"border-bottom" : "3px solid #f00d0d"});
                    campo="#divRadPreg9";
                    err=true;
                }
                if(!$("input[name='RadPreg10']:radio").is(':checked')){
                    $("#divRadPreg10").css({"border-bottom" : "3px solid #f00d0d"});
                    campo="#divRadPreg10";
                    err=true;
                }
                if(!$("input[name='RadPreg11']:radio").is(':checked')){
                    $("#divRadPreg11").css({"border-bottom" : "3px solid #f00d0d"});
                    campo="#divRadPreg11";
                    err=true;
                }
                if(!$("input[name='RadPreg12']:radio").is(':checked')){
                    $("#divRadPreg12").css({"border-bottom" : "3px solid #f00d0d"});
                    campo="#divRadPreg12";
                    err=true;
                }
                if($("#txtPreg13").val().length==0){
                    $("#divRadPreg13").css({"border-bottom" : "3px solid #f00d0d"});
                    campo="#divRadPreg13";
                    err=true;
                }
                id = 1;
                while (id<=9){
                    if($('#cmbPreg14-1'+id).val()==0){
                        $('#divRadPreg14-1'+id).css({"border-bottom" : "3px solid #f00d0d"});
                        campo='#divRadPreg14-1'+id;
                        err=true;
                    }
                    else{
                        if($('#cmbPreg14-1'+id).val()==1 || $('#cmbPreg14-1'+id).val()==2){
                            if($('#cmbPreg14-2'+id).val()==0){
                                $('#divRadPreg14-1'+id).css({"border-bottom" : "3px solid #f00d0d"});
                                campo='#divRadPreg14-1'+id;
                                err=true;
                            }
                            if($('#cmbPreg14-3'+id).val()==0){
                                $('#divRadPreg14-1'+id).css({"border-bottom" : "3px solid #f00d0d"});
                                campo='#divRadPreg14-1'+id;
                                err=true;
                            }
                            if($('#cmbPreg14-4'+id).val()==0){
                                $('#divRadPreg14-1'+id).css({"border-bottom" : "3px solid #f00d0d"});
                                campo='#divRadPreg14-1'+id;
                                err=true;
                            }
                        }
                    }
                    id ++;
                }
                if($("#cmbPreg15").val()==0){
                    $("#divRadPreg15").css({"border-bottom" : "3px solid #f00d0d"});
                    campo="#divRadPreg15";
                    err=true;
                }
                if(!$("input[name='RadPreg16']:radio").is(':checked')){
                    $("#divRadPreg16").css({"border-bottom" : "3px solid #f00d0d"});
                    campo="#divRadPreg16";
                    err=true;
                }
                if(!$("input[name='RadPreg17']:radio").is(':checked')){
                    $("#divRadPreg17").css({"border-bottom" : "3px solid #f00d0d"});
                    campo="#divRadPreg17";
                    err=true;
                }
                if(!$("input[name='RadPreg18']:radio").is(':checked')){
                    $("#divRadPreg18").css({"border-bottom" : "3px solid #f00d0d"});
                    campo="#divRadPreg18";
                    err=true;
                }
                if(!$("input[name='RadPreg19']:radio").is(':checked')){
                    $("#divRadPreg19").css({"border-bottom" : "3px solid #f00d0d"});
                    campo="#divRadPreg19";
                    err=true;
                }
                
                if(!$("input[name='RadPregA']:radio").is(':checked')){
                    $("#divRadPregA").css({"border-bottom" : "3px solid #f00d0d"});
                    campo="#divRadPregA";
                    err=true;
                }
                if(!$("input[name='RadPregB']:radio").is(':checked')){
                    $("#divRadPregB").css({"border-bottom" : "3px solid #f00d0d"});
                    campo="#divRadPregB";
                    err=true;
                }
                if(!$("input[name='RadPregC']:radio").is(':checked')){
                    $("#divRadPregC").css({"border-bottom" : "3px solid #f00d0d"});
                    campo="#divRadPregC";
                    err=true;
                }
                if(!$("input[name='RadPregD']:radio").is(':checked')){
                    $("#divRadPregD").css({"border-bottom" : "3px solid #f00d0d"});
                    campo="#divRadPregD";
                    err=true;
                }
                if(!$("input[name='RadPregE']:radio").is(':checked')){
                    $("#divRadPregE").css({"border-bottom" : "3px solid #f00d0d"});
                    campo="#divRadPregE";
                    err=true;
                }
                if(!$("input[name='RadPregF']:radio").is(':checked')){
                    $("#divRadPregF").css({"border-bottom" : "3px solid #f00d0d"});
                    campo="#divRadPregF";
                    err=true;
                }
				if(err){
					bootbox.alert({
						size: "small",
						message: '<h3>Datos Incompletos</h3>'+mensaje+campo, 
						callback: function(){
							//location.reload();
                            $('body,html').animate({scrollTop : $(campo).offset().top-100}, 1000);
                            $("#btnGuardar").removeAttr("disabled");
                        }
					});
					return false;
				}else{
					$.post("GuardaLlamada.php",{
						sec: $("#txtSeccion").val(),
						fol: $("#txtFolio").val(),
						folR: $("#txtFolioR").val(),
						nip: $("#txtNip").val(),
						num: $("#txtNumero").val(),
						mun: $("#cmbMunicipio").val(),
						res1: $("input[name=RadPreg1]:checked").val(),
						res2: $("input[name=RadPreg2]:checked").val(),
						res3: $("input[name=RadPreg3]:checked").val(),
						res4: $("input[name=RadPreg4]:checked").val(),
						res5: $("input[name=RadPreg5]:checked").val(),
						res6: $("#txtPreg6").val(),
						res71: $("#txtPreg71").val(),
						res72: $("#txtPreg72").val(),
						res8: $("input[name=RadPreg8]:checked").val(),
						res9: $("input[name=RadPreg9]:checked").val(),
						res10: $("input[name=RadPreg10]:checked").val(),
						res11: $("input[name=RadPreg11]:checked").val(),
						res12: $("input[name=RadPreg12]:checked").val(),
						res13: $("#txtPreg13").val(),
                        res1411: $("#cmbPreg14-11").val(),
                        res1421: $("#cmbPreg14-21").val(),
                        res1431: $("#cmbPreg14-31").val(),
                        res1441: $("#cmbPreg14-41").val(),
                        res1412: $("#cmbPreg14-12").val(),
                        res1422: $("#cmbPreg14-22").val(),
                        res1432: $("#cmbPreg14-32").val(),
                        res1442: $("#cmbPreg14-42").val(),
                        res1413: $("#cmbPreg14-13").val(),
                        res1423: $("#cmbPreg14-23").val(),
                        res1433: $("#cmbPreg14-33").val(),
                        res1443: $("#cmbPreg14-43").val(),
                        res1414: $("#cmbPreg14-14").val(),
                        res1424: $("#cmbPreg14-24").val(),
                        res1434: $("#cmbPreg14-34").val(),
                        res1444: $("#cmbPreg14-44").val(),
                        res1415: $("#cmbPreg14-15").val(),
                        res1425: $("#cmbPreg14-25").val(),
                        res1435: $("#cmbPreg14-35").val(),
                        res1445: $("#cmbPreg14-45").val(),
                        res1416: $("#cmbPreg14-16").val(),
                        res1426: $("#cmbPreg14-26").val(),
                        res1436: $("#cmbPreg14-36").val(),
                        res1446: $("#cmbPreg14-46").val(),
                        res1417: $("#cmbPreg14-17").val(),
                        res1427: $("#cmbPreg14-27").val(),
                        res1437: $("#cmbPreg14-37").val(),
                        res1447: $("#cmbPreg14-47").val(),
                        res1418: $("#cmbPreg14-18").val(),
                        res1428: $("#cmbPreg14-28").val(),
                        res1438: $("#cmbPreg14-38").val(),
                        res1448: $("#cmbPreg14-48").val(),
                        res1419: $("#cmbPreg14-19").val(),
                        res1429: $("#cmbPreg14-29").val(),
                        res1439: $("#cmbPreg14-39").val(),
                        res1449: $("#cmbPreg14-49").val(),
                        
                        res15: $("#cmbPreg15").val(),
                        res16: $("input[name=RadPreg16]:checked").val(),
                        res17: $("input[name=RadPreg17]:checked").val(),
                        res18: $("input[name=RadPreg18]:checked").val(),
                        res19: $("input[name=RadPreg19]:checked").val(),
                        
						resA: $("input[name=RadPregA]:checked").val(),
                        resB: $("input[name=RadPregB]:checked").val(),
                        resC: $("input[name=RadPregC]:checked").val(),
                        resD: $("input[name=RadPregD]:checked").val(),
                        resE: $("input[name=RadPregE]:checked").val(),
                        resF: $("input[name=RadPregF]:checked").val(),
					},function(data){
						bootbox.alert({
							size: "small",
							message: data, 
							callback: function(){
								location.reload();
                                return false;
							}
						});
					});
                    return false;
				}
                return false;
			});
            $('body,html').animate({scrollTop : 0}, 1000);
		</script>
	</div>
</body>
</html>