<?php
session_start();
if(!isset($_SESSION['UsuarioIdGeneral'])){
	header('Location:../');
}
elseif($_SESSION['UsuarioCveSistema']!=4 || $_SESSION['EncuestaCveEncuesta']!=1){
	echo "Error 1001.......<br>llamar al administrador de Sistemas";
	echo "<br>Datos:";
	echo "<br>".$_SESSION['NombreCompleto'];
	echo "<br>".$_SESSION['UsuarioCveSistema'];
	echo "<a href='class/Cerrar.php'>".$_SESSION['NombreCompleto']."(Salir)</a> ";
	exit();
}

if(!isset($bd)){
	include("../../class/mysql.php");
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
				<div class="col-md-7">
					<div class="card">
						<div class="card-header text-white bg-info">
							ENCUESTA RAPIDA DE MEDICIÓN
						</div>
						<div class="card-header">
							<div id="divBuscar" style="<?php if($Pte) echo 'display:none;';?>">
								<button class="btn btn-primary btn-block" id="btnNumero">Buscar Numero</button>
							</div>
							<div class="form-group alert alert-info divDato" style="<?php if(!$Pte) echo 'display:none;';?>">
								<h4>
									Buenos días, hablo de “Encuestadora 1321”  para realizarle unas sencillas preguntas.
									<hr>
								</h4>
								<input type="hidden" id="txtClave" value="<?php echo $Clave;?>">
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
							<div class="form-group" id="divDatosEncuesta" style="display:none">
								<label>
									Dígame cuales son las principales necesidades en su localidad, le mencionare algunas: 
								</label>
								<label class="form-control col-sm-6 text-white cursor bg-primary">
									<input type="checkbox" id="" name="BtnNecesidad[]" value="1"> Agua Potable
								</label>
								<label class="form-control col-sm-6 text-white cursor bg-primary">
									<input type="checkbox" id="" name="BtnNecesidad[]" value="2"> Alumbrado Público
								</label>
								<label class="form-control col-sm-6 text-white cursor bg-primary">
									<input type="checkbox" id="" name="BtnNecesidad[]" value="3"> Drenaje
								</label>
								<label class="form-control col-sm-6 text-white cursor bg-primary">
									<input type="checkbox" id="" name="BtnNecesidad[]" value="4"> Pavimentación
								</label>
								<label class="form-control col-sm-6 text-white cursor bg-primary">
									<input type="checkbox" id="" name="BtnNecesidad[]" value="5"> Servicios de Salud
								</label>
								<label class="form-control col-sm-6 text-white cursor bg-primary">
									<input type="checkbox" id="" name="BtnNecesidad[]" value="6"> Inseguridad
								</label>
								<label class="form-control col-sm-6 text-white cursor bg-primary">
									<input type="checkbox" id="" name="BtnNecesidad[]" value="7"> Corrupción
								</label>
								<label class="form-control col-sm-6 text-white cursor bg-primary">
									<input type="checkbox" id="" name="BtnNecesidad[]" value="8">
									Otro, separar por comas?
								</label>
								<input class="form-control" id="txtNecesidad" type="text" placeholder="uno, dos, etc">
								<hr>
								<label>
									¿Cree usted que su Presidente Municipal o su Diputado Local podría realizar las gestiones pertinentes para remediar estas necesidades?  
								</label>
								<input type="text" id="txtGestiones" class="form-control">
								<hr>
								<label>
									En las próximas elecciones, ¿Usted votará por el candidato o por el partido que representa? 
								</label>
								<input type="text" id="txtPartido" class="form-control">
								<hr>
							</div>
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
				<div class="col-md-5">
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
				$("#RadLlamada").css('border', 'none');
				$("#lbRedSocial").css('border', 'none');
				mensaje="";
				err=false;
				if($("input[name=RadEstado]:radio").val()==1){
					
				}
				else{
					if(!$("input[name=RadEstado]:radio").is(':checked')){
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
				}
				return false;
			});
			InfoNumero();
		</script>
	</div>
</body>
</html>

