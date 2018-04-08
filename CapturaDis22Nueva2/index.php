<?php
session_start();
if(!isset($_SESSION['UsuarioIdGeneral'])){
	header('Location:../');
}
elseif($_SESSION['UsuarioCveSistema']!=9 || $_SESSION['EncuestaCveEncuesta']!=1){
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
							CAPTURA DISTRITO 22
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
                                            <option value="0">Selecione</option>
                                            <?php
                                            $sql="SELECT * FROM municipios
                                                where Clave in (51)";
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
                                        <h4>4.- ¿Sabe Usted cuándo serán las próximas elecciones en el Estado de Puebla?</h4>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="btn btn-primary" for="RadPreg41">
                                            <input type="radio" name="RadPreg4" id="RadPreg41" value="1"> 1) Sí, el 1 de julio de 2018 
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg42">
                                            <input type="radio" name="RadPreg4" id="RadPreg42" value="2"> 2) Sí, en julio de 2018   
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg43">
                                            <input type="radio" name="RadPreg4" id="RadPreg43" value="3"> 3) Sí, este año  
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg44">
                                            <input type="radio" name="RadPreg4" id="RadPreg44" value="4"> 4) Sí (otra fecha) 
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg45">
                                            <input type="radio" name="RadPreg4" id="RadPreg45" value="5"> 5) NS/NR
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12" id="divRadPreg5">
                                        <h4>5.- El 1° de julio habrá elecciones para Gobernador, Presidentes Municipales y Diputados Locales, ¿Qué tanto le interesa votar en estas elecciones?</h4>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="btn btn-primary" for="RadPreg51">
                                            <input type="radio" name="RadPreg5" id="RadPreg51" value="1"> 1) Mucho 
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg52">
                                            <input type="radio" name="RadPreg5" id="RadPreg52" value="2"> 2) Regular    
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg53">
                                            <input type="radio" name="RadPreg5" id="RadPreg53" value="3"> 3) Poco
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg54">
                                            <input type="radio" name="RadPreg5" id="RadPreg54" value="4"> 4) Nada  
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg55">
                                            <input type="radio" name="RadPreg5" id="RadPreg55" value="5"> 5) NS/NR 
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12" id="divRadPreg6">
                                        <h4>6.- En este momento, ¿Con qué partido político se identifica más? </h4>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="btn btn-primary" for="RadPreg61">
                                            <input type="radio" name="RadPreg6" id="RadPreg61" value="1"> 1) PAN
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg62">
                                            <input type="radio" name="RadPreg6" id="RadPreg62" value="2"> 2) PRI
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg63">
                                            <input type="radio" name="RadPreg6" id="RadPreg63" value="3"> 3) PRD
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg64">
                                            <input type="radio" name="RadPreg6" id="RadPreg64" value="4"> 4) PT
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg65">
                                            <input type="radio" name="RadPreg6" id="RadPreg65" value="5"> 5) PVEM
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg66">
                                            <input type="radio" name="RadPreg6" id="RadPreg66" value="6"> 6) Mov. Ciudadano
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg67">
                                            <input type="radio" name="RadPreg6" id="RadPreg67" value="7"> 7) P Nueva Alianza
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg68">
                                            <input type="radio" name="RadPreg6" id="RadPreg68" value="8"> 8) Compromiso por Puebla
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg69">
                                            <input type="radio" name="RadPreg6" id="RadPreg69" value="9"> 9) PSI
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg610">
                                            <input type="radio" name="RadPreg6" id="RadPreg610" value="10"> 10) Morena
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg611">
                                            <input type="radio" name="RadPreg6" id="RadPreg611" value="11"> 11) Encuentro Social
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg612">
                                            <input type="radio" name="RadPreg6" id="RadPreg612" value="12"> 12) Candidatura Independiente
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg613">
                                            <input type="radio" name="RadPreg6" id="RadPreg613" value="13"> 13) Anulado
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg614">
                                            <input type="radio" name="RadPreg6" id="RadPreg614" value="14"> 14) Otro
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg615">
                                            <input type="radio" name="RadPreg6" id="RadPreg615" value="15"> 15) Ninguno
                                        </label> 
                                        <label class="btn btn-primary" for="RadPreg616">
                                            <input type="radio" name="RadPreg6" id="RadPreg616" value="16"> 16) No Sabe
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg617">
                                            <input type="radio" name="RadPreg6" id="RadPreg617" value="17"> 17) No Responde
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12" id="divRadPreg7">
                                        <h4>7.- ¿Por qué partido político nunca votaría?</h4>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="btn btn-primary" for="RadPreg71">
                                            <input type="radio" name="RadPreg7" id="RadPreg71" value="1"> 1) PAN
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg72">
                                            <input type="radio" name="RadPreg7" id="RadPreg72" value="2"> 2) PRI
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg73">
                                            <input type="radio" name="RadPreg7" id="RadPreg73" value="3"> 3) PRD
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg74">
                                            <input type="radio" name="RadPreg7" id="RadPreg74" value="4"> 4) PT
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg75">
                                            <input type="radio" name="RadPreg7" id="RadPreg75" value="5"> 5) PVEM
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg76">
                                            <input type="radio" name="RadPreg7" id="RadPreg76" value="6"> 6) Mov. Ciudadano
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg77">
                                            <input type="radio" name="RadPreg7" id="RadPreg77" value="7"> 7) P Nueva Alianza
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg78">
                                            <input type="radio" name="RadPreg7" id="RadPreg78" value="8"> 8) Compromiso por Puebla
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg79">
                                            <input type="radio" name="RadPreg7" id="RadPreg79" value="9"> 9) PSI
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg710">
                                            <input type="radio" name="RadPreg7" id="RadPreg710" value="10"> 10) Morena
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg711">
                                            <input type="radio" name="RadPreg7" id="RadPreg711" value="11"> 11) Encuentro Social
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg712">
                                            <input type="radio" name="RadPreg7" id="RadPreg712" value="12"> 12) Candidatura Independiente
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg713">
                                            <input type="radio" name="RadPreg7" id="RadPreg713" value="13"> 13) Anulado
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg714">
                                            <input type="radio" name="RadPreg7" id="RadPreg714" value="14"> 14) Otro
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg715">
                                            <input type="radio" name="RadPreg7" id="RadPreg715" value="15"> 15) Ninguno
                                        </label> 
                                        <label class="btn btn-primary" for="RadPreg716">
                                            <input type="radio" name="RadPreg7" id="RadPreg716" value="16"> 16) No Sabe
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg717">
                                            <input type="radio" name="RadPreg7" id="RadPreg717" value="17"> 17) No Responde
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12" id="divRadPreg8">
                                        <h4>8.- Si el día de hoy fueran las elecciones para elegir GOBERNADOR DEL ESTADO ¿Por cuál partido  votaría?</h4>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="btn btn-primary" for="RadPreg81">
                                            <input type="radio" name="RadPreg8" id="RadPreg81" value="1"> 1) PAN
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg82">
                                            <input type="radio" name="RadPreg8" id="RadPreg82" value="2"> 2) PRI
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg83">
                                            <input type="radio" name="RadPreg8" id="RadPreg83" value="3"> 3) PRD
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg84">
                                            <input type="radio" name="RadPreg8" id="RadPreg84" value="4"> 4) PT
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg85">
                                            <input type="radio" name="RadPreg8" id="RadPreg85" value="5"> 5) PVEM
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg86">
                                            <input type="radio" name="RadPreg8" id="RadPreg86" value="6"> 6) Mov. Ciudadano
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg87">
                                            <input type="radio" name="RadPreg8" id="RadPreg87" value="7"> 7) P Nueva Alianza
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg88">
                                            <input type="radio" name="RadPreg8" id="RadPreg88" value="8"> 8) Compromiso por Puebla
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg89">
                                            <input type="radio" name="RadPreg8" id="RadPreg89" value="9"> 9) PSI
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg810">
                                            <input type="radio" name="RadPreg8" id="RadPreg810" value="10"> 10) Morena
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg811">
                                            <input type="radio" name="RadPreg8" id="RadPreg811" value="11"> 11) Encuentro Social
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg812">
                                            <input type="radio" name="RadPreg8" id="RadPreg812" value="12"> 12) Candidatura Independiente
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg813">
                                            <input type="radio" name="RadPreg8" id="RadPreg813" value="13"> 13) Anulado
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg814">
                                            <input type="radio" name="RadPreg8" id="RadPreg814" value="14"> 14) Otro
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg815">
                                            <input type="radio" name="RadPreg8" id="RadPreg815" value="15"> 15) Ninguno
                                        </label> 
                                        <label class="btn btn-primary" for="RadPreg816">
                                            <input type="radio" name="RadPreg8" id="RadPreg816" value="16"> 16) No Sabe
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg817">
                                            <input type="radio" name="RadPreg8" id="RadPreg817" value="17"> 17) No Responde
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12" id="divRadPreg9">
                                        <h4>9.- Si el día de hoy fueran las elecciones para elegir DIPUTADO LOCAL ¿Por cuál partido  votaría?</h4>
                                    </div>
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
                                            <input type="radio" name="RadPreg9" id="RadPreg916" value="16"> 16) No Sabe
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg917">
                                            <input type="radio" name="RadPreg9" id="RadPreg917" value="17"> 17) No Responde
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12" id="divRadPreg10">
                                        <h4>10.- Si el día de hoy fueran las elecciones para PRESIDENTE MUNICIPAL, ¿Por cuál de éstas opciones votaría?</h4>
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
                                        <h4>11.- Le voy a leer una lista de personalidades del Distrito:  </h4>
                                    </div>
                                    <div class="col-md-12">
                                        <?php include('Tabla.php'); ?>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12" id="divRadPreg12">
                                        <h4>12.- ¿Quién de los nombres que le acabo de leer le gustaría que fuera  Diputado Local por este Distrito?</h4>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control" id="cmbPreg12">
                                            <option class="form-control" value="0">Seleciona</option>
                                            <option value="1">1) NS/NR</option>
                                            <option value="2">2) Ninguno</option>
                                            <option value="3">3) Otro</option>
                                        <?php
                                            foreach ($array as $i => $value) {
                                                $pos = strpos($array[$i], ")");
                                                echo "<option value='".($i+4)."'>".($i+4).substr($array[$i],$pos)."</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12" id="divDinamico"></div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12" id="divRadPreg13">
                                        <h4>13.- ¿Quién de los nombres que le acabo de leer le gustaría que fuera el próximo  PRESIDENTE MUNICIPAL?</h4>
                                    </div>
                                    <div class="col-md-6" id="DivPreg13">
                                        
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12" id="divRadPreg14">
                                        <h4>14.- Si hoy fueran las elecciones y los unicos candidatos fueran tarjeta 5 ¿Por cual de estas opciones votaria para DIPUTADO LOCAL?</h4>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control" id="cmbPreg14">
                                            <option class="form-control" value="0">Seleciona</option>
                                        <?php
                                            foreach ($array as $i => $value) {
                                                $pos = strpos($array[$i], ")");
                                                echo "<option value='".($i+1)."'>".($i+1).substr($array[$i],$pos)."</option>";
                                            }
                                            ?>
                                            <option value="5">5) Ninguno</option>
                                            <option value="6">6) Otro </option>
                                            <option value="7">7) NS/NR</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12" id="divRadPreg15">
                                        <h4>15.- Independientemente de por quién va a votar, ¿quién cree que ganará las elecciones para Diputado Local en este Distrito?</h4>
                                    </div>
                                    <div class="col-md-12">
                                       <select class="form-control" id="cmbPreg15">
                                            <option class="form-control" value="0">Seleciona</option>
                                        <?php
                                            foreach ($array as $i => $value) {
                                                $pos = strpos($array[$i], ")");
                                                echo "<option value='".($i+1)."'>".($i+1).substr($array[$i],$pos)."</option>";
                                            }
                                            ?>
                                            <option value="5">5) Ninguno</option>
                                            <option value="6">6) Otro </option>
                                            <option value="7">7) NS/NR</option>
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
                
				$("#divRadPreg11-11").css('border', 'none');
				$("#divRadPreg11-12").css('border', 'none');
				$("#divRadPreg11-13").css('border', 'none');
				$("#divRadPreg11-14").css('border', 'none');
				
				$("#divRadPreg12").css('border', 'none');
				$("#divRadPreg13").css('border', 'none');
				$("#divRadPreg14").css('border', 'none');
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
                else{
                    $("select[name='cmbPreg11-2-1[]']").each(function(index){
                        $("#divRadPreg11-2"+(index+1)).css('border', 'none');
                    });
                    $("select[name='cmbPreg11-2-1[]']").each(function(index){
                        if($(this).val()==0){
                            $('#divRadPreg11-2'+(index+1)).css({"border-bottom" : "3px solid #f00d0d"});
                            campo='#divRadPreg11-2'+(index+1);
                            err=true;
                             //alert(campo);
                        }
                        else{
                            if($(this).val()==1 || $(this).val()==2){
                                if($('#cmbPreg11-2-2'+(index+1)).val()==0){
                                    $('#divRadPreg11-2'+(index+1)).css({"border-bottom" : "3px solid #f00d0d"});
                                    campo='#divRadPreg11-2'+(index+1);
                                    err=true;
                                }
                                if($('#cmbPreg11-2-3'+(index+1)).val()==0){
                                    $('#divRadPreg11-2'+(index+1)).css({"border-bottom" : "3px solid #f00d0d"});
                                    campo='#divRadPreg11-2'+(index+1);
                                    err=true;
                                }
                                if($('#cmbPreg11-2-4'+(index+1)).val()==0){
                                    $('#divRadPreg11-2'+(index+1)).css({"border-bottom" : "3px solid #f00d0d"});
                                    campo='#divRadPreg11-2'+(index+1);
                                    err=true;
                                }
                            }
                        }
                       
                    });
                    if($("#cmbPreg13").val()==0){
                        $("#divRadPreg13").css({"border-bottom" : "3px solid #f00d0d"});
                        campo="#divRadPreg13";
                        err=true;
                    }
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
                if(!$("input[name='RadPreg6']:radio").is(':checked')){
                    $("#divRadPreg6").css({"border-bottom" : "3px solid #f00d0d"});
                    campo="#divRadPreg6";
                    err=true;
                }
                /****/
                if(!$("input[name='RadPreg7']:radio").is(':checked')){
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
                id = 1;
                while (id<=4){
                    if($('#cmbPreg1111'+id).val()==0){
                        $('#divRadPreg11-1'+id).css({"border-bottom" : "3px solid #f00d0d"});
                        campo='#divRadPreg11-1'+id;
                        err=true;
                    }
                    else{
                        if($('#cmbPreg1111'+id).val()==1 || $('#cmbPreg1111'+id).val()==2){
                            if($('#cmbPreg1112'+id).val()==0){
                                $('#divRadPreg11-1'+id).css({"border-bottom" : "3px solid #f00d0d"});
                                campo='#divRadPreg11-1'+id;
                                err=true;
                            }
                            if($('#cmbPreg1113'+id).val()==0){
                                $('#divRadPreg11-1'+id).css({"border-bottom" : "3px solid #f00d0d"});
                                campo='#divRadPreg11-1'+id;
                                err=true;
                            }
                            if($('#cmbPreg1114'+id).val()==0){
                                $('#divRadPreg11-1'+id).css({"border-bottom" : "3px solid #f00d0d"});
                                campo='#divRadPreg11-1'+id;
                                err=true;
                            }
                        }
                    }
                    id ++;
                }
                if($("#cmbPreg12").val()==0){
                    $("#divRadPreg12").css({"border-bottom" : "3px solid #f00d0d"});
                    campo="#divRadPreg12";
                    err=true;
                }
                if($("#cmbPreg13").val()==0){
                    $("#divRadPreg13").css({"border-bottom" : "3px solid #f00d0d"});
                    campo="#divRadPreg13";
                    err=true;
                }
                if($("#cmbPreg14").val()==0){
                    $("#divRadPreg14").css({"border-bottom" : "3px solid #f00d0d"});
                    campo="#divRadPreg14";
                    err=true;
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
                    var Array1="";
                    $("select[name='cmbPreg11-2-1[]']").each(function(index){
                        Array1=Array1+","+$(this).val();
                    });
                    var Array2="";
                    $("select[name='cmbPreg11-2-2[]']").each(function(index){
                        Array2=Array2+","+$(this).val();
                    });
                    var Array3="";
                    $("select[name='cmbPreg11-2-3[]']").each(function(index){
                        Array3=Array3+","+$(this).val();
                    });
                    var Array4="";
                    $("select[name='cmbPreg11-2-4[]']").each(function(index){
                        Array4=Array4+","+$(this).val();
                    });
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
						res6: $("input[name=RadPreg6]:checked").val(),
						res7: $("input[name=RadPreg7]:checked").val(),
						res8: $("input[name=RadPreg8]:checked").val(),
						res9: $("input[name=RadPreg9]:checked").val(),
						res10: $("input[name=RadPreg10]:checked").val(),
                        res1111: $("#cmbPreg11111").val(),
                        res1121: $("#cmbPreg11121").val(),
                        res1131: $("#cmbPreg11131").val(),
                        res1141: $("#cmbPreg11141").val(),
                        res1112: $("#cmbPreg11112").val(),
                        res1122: $("#cmbPreg11122").val(),
                        res1132: $("#cmbPreg11132").val(),
                        res1142: $("#cmbPreg11142").val(),
                        res1113: $("#cmbPreg11113").val(),
                        res1123: $("#cmbPreg11123").val(),
                        res1133: $("#cmbPreg11133").val(),
                        res1143: $("#cmbPreg11143").val(),
                        res1114: $("#cmbPreg11114").val(),
                        res1124: $("#cmbPreg11124").val(),
                        res1134: $("#cmbPreg11134").val(),
                        res1144: $("#cmbPreg11144").val(),
                        
                        res1121A: Array1,
                        res1122A: Array2,
                        res1123A: Array3,
                        res1124A: Array4,
                        
                        res12: $("#cmbPreg12").val(),
                        res13: $("#cmbPreg13").val(),
                        res14: $("#cmbPreg14").val(),
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