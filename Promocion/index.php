<?php
session_start();
if(!isset($_SESSION['UsuarioIdGeneral'])){
	header('Location:../');
}
elseif($_SESSION['UsuarioCveSistema']!=8 || $_SESSION['EncuestaCveEncuesta']!=1){
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
$consulta="SELECT * FROM numeros_distrito22_promocion where CveApartado=".$_SESSION['UsuarioIdGeneral'];
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
                                        Buenos días/tardes, hablamos de la consultoría independiente Unidos por la Mixteca, le estamos llamando para hacer un estudio sobre temas de interés social,  la encuesta es anónima y sus respuestas serán estrictamente confidenciales. No le toma más de 2 minutos, ¿me permite hacerle unas preguntas?. ¡Gracias!
                                        <hr>
                                    </h4>
                                    <input type="hidden" id="txtClave" value="<?php echo $Clave;?>">
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12" id="divRadPreg1">
                                        <h4>1.- ¿Usted conoce o ha oído hablar de Gerardo Islas  Maldonado? </h4>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="btn btn-primary" for="RadPreg11">
                                            <input type="radio" name="RadPreg1" id="RadPreg11" value="1"> Si
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg12">
                                            <input type="radio" name="RadPreg1" id="RadPreg12" value="2"> Creo que si
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg13">
                                            <input type="radio" name="RadPreg1" id="RadPreg13" value="3"> No sabe / No Responde

                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12" id="divRadPreg2">
                                        <h4>2.- ¿Sabía Usted que Gerardo Islas fue el Secretario de Desarrollo Social del Gobierno del Estado de Puebla desde julio de 2016 hasta marzo de 2018?</h4>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="btn btn-primary" for="RadPreg21">
                                            <input type="radio" name="RadPreg2" id="RadPreg21" value="1"> Si
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg22">
                                            <input type="radio" name="RadPreg2" id="RadPreg22" value="2"> Creo que si
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg23">
                                            <input type="radio" name="RadPreg2" id="RadPreg23" value="3"> no
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg24">
                                            <input type="radio" name="RadPreg2" id="RadPreg24" value="4"> No sabe / No Responde

                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12" id="divRadPreg3">
                                        <h4>3.- Sabía Usted que durante la gestión de Gerardo Islas como Secretario de Desarrollo Social se entregaron apoyos para la reconstruyeron de más de 28 mil viviendas afectadas por el sismo en todo el Estado y se benefició a más de 15 mil familias en la mixteca?</h4>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="btn btn-primary" for="RadPreg31">
                                            <input type="radio" name="RadPreg3" id="RadPreg31" value="1"> Si sabía
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg32">
                                            <input type="radio" name="RadPreg3" id="RadPreg32" value="2"> Sabía en parte
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg33">
                                            <input type="radio" name="RadPreg3" id="RadPreg33" value="3"> No sabía
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg34">
                                            <input type="radio" name="RadPreg3" id="RadPreg34" value="4"> No responde

                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12" id="divRadPreg4">
                                        <h4>4.- ¿Sabía Usted que durante el periodo de Gerardo Islas como Secretario de Desarrollo Social, Puebla obtuvo el primer lugar nacional en la reducción de la pobreza extrema, mejorando la calidad de vida de más de 429 mil poblanos?</h4>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="btn btn-primary" for="RadPreg41">
                                            <input type="radio" name="RadPreg4" id="RadPreg41" value="1"> Si sabía
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg42">
                                            <input type="radio" name="RadPreg4" id="RadPreg42" value="2"> Sabía en parte
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg43">
                                            <input type="radio" name="RadPreg4" id="RadPreg43" value="3"> No sabía
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg44">
                                            <input type="radio" name="RadPreg4" id="RadPreg44" value="4"> No responde

                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12" id="divRadPreg5">
                                        <h4>5.- ¿Sabía Usted que Gerardo Islas es el único ciudadano en todo el país que tiene el apoyo de 6 partidos políticos para su candidatura para Diputado Local por el Distrito 22?</h4>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="btn btn-primary" for="RadPreg51">
                                            <input type="radio" name="RadPreg5" id="RadPreg51" value="1"> Si sabía
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg52">
                                            <input type="radio" name="RadPreg5" id="RadPreg52" value="2"> Sabía en parte
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg53">
                                            <input type="radio" name="RadPreg5" id="RadPreg53" value="3"> No sabía
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg54">
                                            <input type="radio" name="RadPreg5" id="RadPreg54" value="4"> No responde

                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12" id="divRadPreg6">
                                        <h4>6.- Si hoy fueran las elecciones para Diputado Local en su Distrito y los únicos candidatos fueran:<br>Gerardo Islas por la alianza PAN-PRD-MC-PANAL-CPP y PSI;<br>Ignacio Espinosa por el PRI;<br>Alicia Salazar por el PVEM <br>y Raúl Barranco por MORENA-PT-PES<br>¿Por cuál votaría?</h4>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="btn btn-primary" for="RadPreg61">
                                            <input type="radio" name="RadPreg6" id="RadPreg61" value="1"> Gerardo Islas (PAN-PRD-MC-PANAL-CPP-PSI)
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg62">
                                            <input type="radio" name="RadPreg6" id="RadPreg62" value="2"> Ignacio Espinosa (PRI)
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg63">
                                            <input type="radio" name="RadPreg6" id="RadPreg63" value="3"> Alicia Salazar (PVEM)
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg64">
                                            <input type="radio" name="RadPreg6" id="RadPreg64" value="4"> Raúl Barranco (MORENA-PT-PES)
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg65">
                                            <input type="radio" name="RadPreg6" id="RadPreg65" value="5"> No sabe
                                        </label>
                                        <label class="btn btn-primary" for="RadPreg66">
                                            <input type="radio" name="RadPreg6" id="RadPreg66" value="6"> Ninguno / No voy a ir a votar
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    
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
                                    <option value="7">Encuesta incompleta</option>
                                </select>
								<label for="txtObservaciones">
									¿Observaciones?
								</label>
								<textarea id="txtObservaciones" class="form-control" placeholder="Comentarios"></textarea>
							</div>
							<div class="divDato form-group" style="<?php if(!$Pte) echo 'display:none;';?>">
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6">
								        <button class="btn btn-primary btn-block" id="btnGuardar">Guardar</button>
                                    </div>
                                    <div class="col-md-3"></div>
                                </div>
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
            
			$("[name='RadEstado']").on( "change", RadEstadoFun );
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
				mensaje="";
				err=false;
				if($("input[name='RadEstado']:checked").val()==1){
                    if(!$("input[name='RadPreg1']:radio").is(':checked')){
                        $("#divRadPreg1").css({"border-left" : "3px solid #f00d0d"});
                        err=true;
                    }
                    if(!$("input[name='RadPreg2']:radio").is(':checked')){
                        $("#divRadPreg2").css({"border-left" : "3px solid #f00d0d"});
                        err=true;
                    }
                    if(!$("input[name='RadPreg3']:radio").is(':checked')){
                        $("#divRadPreg3").css({"border-left" : "3px solid #f00d0d"});
                        err=true;
                    }
                    if(!$("input[name='RadPreg4']:radio").is(':checked')){
                        $("#divRadPreg4").css({"border-left" : "3px solid #f00d0d"});
                        err=true;
                    }
                    if(!$("input[name='RadPreg5']:radio").is(':checked')){
                        $("#divRadPreg5").css({"border-left" : "3px solid #f00d0d"});
                        err=true;
                    }
                    if(!$("input[name='RadPreg6']:radio").is(':checked')){
                        $("#divRadPreg6").css({"border-left" : "3px solid #f00d0d"});
                        err=true;
                    }
				}
				else{
					if(!$("input[name='RadEstado']:radio").is(':checked')){
						$("#RadLlamada").css({"border-left" : "3px solid #f00d0d"});
						err=true;
					}
                    else{
                        if($('#cmbObsEstatus').val()==0){
                            $("#cmbObsEstatus").css({"border-left" : "3px solid #f00d0d"});
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
						res1: $("input[name=RadPreg1]:checked").val(),
						res2: $("input[name=RadPreg2]:checked").val(),
						res3: $("input[name=RadPreg3]:checked").val(),
						res4: $("input[name=RadPreg4]:checked").val(),
						res5: $("input[name=RadPreg5]:checked").val(),
						res6: $("input[name=RadPreg6]:checked").val(),
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

