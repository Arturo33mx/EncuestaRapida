<?php
session_start();
if(!isset($_SESSION['UsuarioIdGeneral'])){
	header('Location:../');
}
elseif($_SESSION['UsuarioCveSistema']!=7 || $_SESSION['EncuestaCveEncuesta']!=1){
	echo "Error 1001.......<br>llamar al administrador de Sistemas";
	echo "<br>Datos:";
	echo "<br>".$_SESSION['NombreCompleto'];
	echo "<br>".$_SESSION['UsuarioCveSistema'];
	echo "<a href='../class/Cerrar.php'>".$_SESSION['NombreCompleto']."(Salir)</a> ";
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
                                            <?php
                                            $sql="SELECT * FROM municipios
                                                where ClaveMunicipio in (85)";
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
                                        <label>Folio</label>
                                        <input type="text" class="form-control" placeholder="Folio" id="txtFolio">
                                    </div>
                                </div>
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
                                        <h4>3.- ¿Qué opinión tiene del trabajo realizado por el actual Presidente Municipal?</h4>
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
                                        <h4>6.- Si el día de hoy fueran las elecciones para Presidente Municipal ¿Por cuál partido  votaría? </h4>
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
                                        <h4>7.- En este momento, ¿Con qué partido político se identifica más? </h4>
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
                                        <h4>8.- ¿Por qué partido político nunca votaría? </h4>
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
                                        <h4>9.- Le voy a leer una lista de personalidades del Distrito:  </h4>
                                    </div>
                                    <div class="col-md-12">
                                        <?php include('Tabla.php'); ?>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12" id="divRadPreg10">
                                        <h4>10.- ¿Quién de los nombres que le acabo de leer le gustaría que fuera  Diputado Local por este Distrito?</h4>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control" id="cmbPreg10">
                                            <option class="form-control" value="0">Seleciona</option>
                                            <option value="1">1) NS/NR</option>
                                            <option value="2">2) Ninguno</option>
                                            <option value="3">3) Otro </option>
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
                                    <div class="col-md-12">
                                        <h4>Ahora bien… </h4>
                                    </div>
                                    <div class="col-md-12" id="divRadPreg11">
                                        <h4>11.- Independientemente del candidato que postulen, de la siguiente lista de alianzas, ¿Por  cuál votaría Usted? </h4>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="btn btn-primary" for="RadPreg111">
                                            <input type="radio" name="RadPreg11" id="RadPreg111" value="1"> 1) Alianza del PRI con PVEM 
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg112">
                                            <input type="radio" name="RadPreg11" id="RadPreg112" value="2"> 2) Alianza del PAN con PRD, MC y PANAL    
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg113">
                                            <input type="radio" name="RadPreg11" id="RadPreg113" value="3"> 3) Morena con PT y PES  
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg114">
                                            <input type="radio" name="RadPreg11" id="RadPreg114" value="4"> 4) Ninguna  
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg115">
                                            <input type="radio" name="RadPreg11" id="RadPreg115" value="5"> 5) Otro
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg116">
                                            <input type="radio" name="RadPreg11" id="RadPreg116" value="6"> 6) NS/NR  
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12" id="divRadPreg12">
                                        <h4>12.- Independientemente de por quién va a votar, ¿quién cree que ganará las elecciones para Diputado Local en este Distrito?</h4>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="btn btn-primary" for="RadPreg121">
                                            <input type="radio" name="RadPreg12" id="RadPreg121" value="1"> 1) Alianza del PRI con PVEM 
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg122">
                                            <input type="radio" name="RadPreg12" id="RadPreg122" value="2"> 2) Alianza del PAN con PRD, MC y PANAL  
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg123">
                                            <input type="radio" name="RadPreg12" id="RadPreg123" value="3"> 3) Morena con PT y PES  
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg124">
                                            <input type="radio" name="RadPreg12" id="RadPreg124" value="4"> 4) Ninguna  
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg125">
                                            <input type="radio" name="RadPreg12" id="RadPreg125" value="5"> 5) Otro
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg126">
                                            <input type="radio" name="RadPreg12" id="RadPreg126" value="6"> 6) NS/NR  
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
                                    <div class="col-md-12" id="divRadPreg13">
                                        <h4>Sexo:</h4>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="btn btn-primary" for="RadPreg131">
                                            <input type="radio" name="RadPreg13" id="RadPreg131" value="1"> H
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg132">
                                            <input type="radio" name="RadPreg13" id="RadPreg132" value="2"> M
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12" id="divRadPreg14">
                                        <h4>Edad:</h4>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="btn btn-primary" for="RadPreg141">
                                            <input type="radio" name="RadPreg14" id="RadPreg141" value="1"> 18 – 24 Años
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg142">
                                            <input type="radio" name="RadPreg14" id="RadPreg142" value="2"> 25 - 34 Años
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg143">
                                            <input type="radio" name="RadPreg14" id="RadPreg143" value="3"> 35 – 44 Años
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg144">
                                            <input type="radio" name="RadPreg14" id="RadPreg144" value="4"> 45 y más
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12" id="divRadPreg15">
                                        <h4>Estado Civil:</h4>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="btn btn-primary" for="RadPreg151">
                                            <input type="radio" name="RadPreg15" id="RadPreg151" value="1"> Soltero(a)
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg152">
                                            <input type="radio" name="RadPreg15" id="RadPreg152" value="2"> Casado(a)
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg153">
                                            <input type="radio" name="RadPreg15" id="RadPreg153" value="3"> Divorciado(a)
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg154">
                                            <input type="radio" name="RadPreg15" id="RadPreg154" value="4"> Viudo(a)
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg155">
                                            <input type="radio" name="RadPreg15" id="RadPreg155" value="5"> Unión Libre
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg156">
                                            <input type="radio" name="RadPreg15" id="RadPreg156" value="6"> Otro
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12" id="divRadPreg16">
                                        <h4>¿A qué se dedica? (Ocupación):</h4>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="btn btn-primary" for="RadPreg161">
                                            <input type="radio" name="RadPreg16" id="RadPreg161" value="1"> Empleado en empresa 
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg162">
                                            <input type="radio" name="RadPreg16" id="RadPreg162" value="2"> Empleado en el Gob 
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg163">
                                            <input type="radio" name="RadPreg16" id="RadPreg163" value="3"> Trabaja por su cuenta
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg164">
                                            <input type="radio" name="RadPreg16" id="RadPreg164" value="4"> Trabajador del campo
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg165">
                                            <input type="radio" name="RadPreg16" id="RadPreg165" value="5"> Estudiante
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg166">
                                            <input type="radio" name="RadPreg16" id="RadPreg166" value="6"> Ama de casa
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg167">
                                            <input type="radio" name="RadPreg16" id="RadPreg167" value="7"> Desempleado 
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg168">
                                            <input type="radio" name="RadPreg16" id="RadPreg168" value="8"> Jubilado
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12" id="divRadPreg17">
                                        <h4>Escolaridad: (Hasta qué año de estudios llegó)</h4>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="btn btn-primary" for="RadPreg171">
                                            <input type="radio" name="RadPreg17" id="RadPreg171" value="1"> Primaria incompleta
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg172">
                                            <input type="radio" name="RadPreg17" id="RadPreg172" value="2"> Primaria completa
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg173">
                                            <input type="radio" name="RadPreg17" id="RadPreg173" value="3"> Secundaria completa
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg174">
                                            <input type="radio" name="RadPreg17" id="RadPreg174" value="4"> Preparatoria completa
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg175">
                                            <input type="radio" name="RadPreg17" id="RadPreg175" value="5"> Profesional y más
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg176">
                                            <input type="radio" name="RadPreg17" id="RadPreg176" value="6"> Ninguna
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12" id="divRadPreg18">
                                        <h4>¿Podría decirme a cuánto ascienden sus ingresos mensuales, aproximadamente?</h4>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="btn btn-primary" for="RadPreg181">
                                            <input type="radio" name="RadPreg18" id="RadPreg181" value="1"> Sin ingresos
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg182">
                                            <input type="radio" name="RadPreg18" id="RadPreg182" value="2"> Hasta $3,000.00
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg183">
                                            <input type="radio" name="RadPreg18" id="RadPreg183" value="3"> Hasta $7,500.00
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg184">
                                            <input type="radio" name="RadPreg18" id="RadPreg184" value="4"> Hasta $15,000.00
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg185">
                                            <input type="radio" name="RadPreg18" id="RadPreg185" value="5"> Hasta $30,000.00
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg186">
                                            <input type="radio" name="RadPreg18" id="RadPreg186" value="6"> Más de $30,000.00
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg187">
                                            <input type="radio" name="RadPreg18" id="RadPreg187" value="7"> No contestó
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6" id="divRadPreg18">
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
                
				$("#divRadPreg91").css('border', 'none');
				$("#divRadPreg92").css('border', 'none');
				$("#divRadPreg93").css('border', 'none');
				$("#divRadPreg94").css('border', 'none');
				$("#divRadPreg95").css('border', 'none');
				$("#divRadPreg96").css('border', 'none');
				$("#divRadPreg97").css('border', 'none');
				$("#divRadPreg98").css('border', 'none');
				$("#divRadPreg99").css('border', 'none');
				$("#divRadPreg910").css('border', 'none');
				$("#divRadPreg911").css('border', 'none');
				$("#divRadPreg912").css('border', 'none');
				$("#divRadPreg913").css('border', 'none');
				$("#divRadPreg914").css('border', 'none');
				$("#divRadPreg915").css('border', 'none');
				
				$("#divRadPreg10").css('border', 'none');
				$("#divRadPreg11").css('border', 'none');
				$("#divRadPreg12").css('border', 'none');
				$("#divRadPreg13").css('border', 'none');
				$("#divRadPreg14").css('border', 'none');
				$("#divRadPreg15").css('border', 'none');
				$("#divRadPreg16").css('border', 'none');
				$("#divRadPreg17").css('border', 'none');
				$("#divRadPreg18").css('border', 'none');
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
                id = 1;
                while (id<=11){
                    if($('#cmbPreg91'+id).val()==0){
                        $('#divRadPreg9'+id).css({"border-bottom" : "3px solid #f00d0d"});
                        campo='#divRadPreg9'+id;
                        err=true;
                    }
                    else{
                        if($('#cmbPreg91'+id).val()==1 || $('#cmbPreg91'+id).val()==2){
                            if($('#cmbPreg93'+id).val()==0){
                                $('#divRadPreg9'+id).css({"border-bottom" : "3px solid #f00d0d"});
                                campo='#divRadPreg9'+id;
                                err=true;
                            }
                            if($('#cmbPreg94'+id).val()==0){
                                $('#divRadPreg9'+id).css({"border-bottom" : "3px solid #f00d0d"});
                                campo='#divRadPreg9'+id;
                                err=true;
                            }
                            if($('#cmbPreg95'+id).val()==0){
                                $('#divRadPreg9'+id).css({"border-bottom" : "3px solid #f00d0d"});
                                campo='#divRadPreg9'+id;
                                err=true;
                            }
                        }
                        else{
                            if($('#cmbPreg92'+id).val()==0){
                                $('#divRadPreg9'+id).css({"border-bottom" : "3px solid #f00d0d"});
                                campo='#divRadPreg9'+id;
                                err=true;
                            }
                            else{
                                if($('#cmbPreg92'+id).val()==1 || $('#cmbPreg122'+id).val()==2){
                                    if($('#cmbPreg93'+id).val()==0){
                                        $('#divRadPreg9'+id).css({"border-bottom" : "3px solid #f00d0d"});
                                        campo='#divRadPreg9'+id;
                                        err=true;
                                    }
                                    if($('#cmbPreg94'+id).val()==0){
                                        $('#divRadPreg9'+id).css({"border-bottom" : "3px solid #f00d0d"});
                                        campo='#divRadPreg9'+id;
                                        err=true;
                                    }
                                    if($('#cmbPreg95'+id).val()==0){
                                        $('#divRadPreg9'+id).css({"border-bottom" : "3px solid #f00d0d"});
                                        campo='#divRadPreg9'+id;
                                        err=true;
                                    }
                                }
                            }
                        }
                    }
                    id ++;
                }
                if($("#cmbPreg10").val()==0){
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
                if(!$("input[name='RadPreg13']:radio").is(':checked')){
                    $("#divRadPreg13").css({"border-bottom" : "3px solid #f00d0d"});
                    campo="#divRadPreg13";
                    err=true;
                }
                if(!$("input[name='RadPreg14']:radio").is(':checked')){
                    $("#divRadPreg14").css({"border-bottom" : "3px solid #f00d0d"});
                    campo="#divRadPreg14";
                    err=true;
                }
                if(!$("input[name='RadPreg15']:radio").is(':checked')){
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
				if(err){
					bootbox.alert({
						size: "small",
						message: '<h3>Datos Incompletos</h3>'+mensaje, 
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
                        res911: $("#cmbPreg911").val(),
                        res921: $("#cmbPreg921").val(),
                        res931: $("#cmbPreg931").val(),
                        res941: $("#cmbPreg941").val(),
                        res951: $("#cmbPreg951").val(),
                        res912: $("#cmbPreg912").val(),
                        res922: $("#cmbPreg922").val(),
                        res932: $("#cmbPreg932").val(),
                        res942: $("#cmbPreg942").val(),
                        res952: $("#cmbPreg952").val(),
                        res913: $("#cmbPreg913").val(),
                        res923: $("#cmbPreg923").val(),
                        res933: $("#cmbPreg933").val(),
                        res943: $("#cmbPreg943").val(),
                        res953: $("#cmbPreg953").val(),
                        res914: $("#cmbPreg914").val(),
                        res924: $("#cmbPreg924").val(),
                        res934: $("#cmbPreg934").val(),
                        res944: $("#cmbPreg944").val(),
                        res954: $("#cmbPreg954").val(),
                        res915: $("#cmbPreg915").val(),
                        res925: $("#cmbPreg925").val(),
                        res935: $("#cmbPreg935").val(),
                        res945: $("#cmbPreg945").val(),
                        res955: $("#cmbPreg955").val(),
                        res916: $("#cmbPreg916").val(),
                        res926: $("#cmbPreg926").val(),
                        res936: $("#cmbPreg936").val(),
                        res946: $("#cmbPreg946").val(),
                        res956: $("#cmbPreg956").val(),
                        res917: $("#cmbPreg917").val(),
                        res927: $("#cmbPreg927").val(),
                        res937: $("#cmbPreg937").val(),
                        res947: $("#cmbPreg947").val(),
                        res957: $("#cmbPreg957").val(),
                        res918: $("#cmbPreg918").val(),
                        res928: $("#cmbPreg928").val(),
                        res938: $("#cmbPreg938").val(),
                        res948: $("#cmbPreg948").val(),
                        res958: $("#cmbPreg958").val(),
                        res919: $("#cmbPreg919").val(),
                        res929: $("#cmbPreg929").val(),
                        res939: $("#cmbPreg939").val(),
                        res949: $("#cmbPreg949").val(),
                        res959: $("#cmbPreg959").val(),
                        res9110: $("#cmbPreg9110").val(),
                        res9210: $("#cmbPreg9210").val(),
                        res9310: $("#cmbPreg9310").val(),
                        res9410: $("#cmbPreg9410").val(),
                        res9510: $("#cmbPreg9510").val(),
                        res9111: $("#cmbPreg9111").val(),
                        res9211: $("#cmbPreg9211").val(),
                        res9311: $("#cmbPreg9311").val(),
                        res9411: $("#cmbPreg9411").val(),
                        res9511: $("#cmbPreg9511").val(),
                        res10: $("#cmbPreg10").val(),
						res11: $("input[name=RadPreg11]:checked").val(),
                        res12: $("input[name=RadPreg12]:checked").val(),
                        res13: $("input[name=RadPreg13]:checked").val(),
                        res14: $("input[name=RadPreg14]:checked").val(),
                        res15: $("input[name=RadPreg15]:checked").val(),
                        res16: $("input[name=RadPreg16]:checked").val(),
                        res17: $("input[name=RadPreg17]:checked").val(),
                        res18: $("input[name=RadPreg18]:checked").val()
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