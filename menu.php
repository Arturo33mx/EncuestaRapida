<?php 
if($opc==1){
?>
<a class="navbar-brand" href="index.php">Encuestas Rapidas</a>
	<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse " id="navbarResponsive">
	<ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
			<a class="nav-link" href="index.php">
				<i class="fa fa-fw fa-question-circle"></i>
				<span class="nav-link-text">Encuesta</span>
			</a>
		</li>
	</ul>
	<ul class="navbar-nav sidenav-toggler ">
		<li class="nav-item">
			<a class="nav-link text-center" id="sidenavToggler">
				<i class="fa fa-fw fa-angle-left"></i>
			</a>
		</li>
	</ul>
	<ul class="navbar-nav ml-auto">
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i class="fa fa-fw fa-envelope"></i>
				<span class="d-lg-none">Mensajes</span>				
			</a>
			<div class="dropdown-menu" aria-labelledby="messagesDropdown">
				<h6 class="dropdown-header">Nuevos Mensajes:</h6>
				<div class="dropdown-divider"></div>
			</div>
		</li>
		<li class="nav-item">
			<a class="nav-link" data-toggle="modal" data-target="#exampleModal">
				<?php echo $_SESSION['NombreCompleto']; ?> (Salir)
				<i class="fa fa-fw fa-sign-out"></i> 
			</a>
		</li>
	</ul>
</div>
<?php 
		   }
else{
?>
<div class="container">
	<a class="navbar-brand js-scroll-trigger" href="#page-top"></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
	<div class="collapse navbar-collapse" id="navbarResponsive">
		<ul class="navbar-nav ml-auto">
			<li class="nav-item"> 
				<a class="nav-link js-scroll-trigger" href="../class/Cerrar.php"><?php echo $_SESSION['NombreCompleto']; ?>(Salir)</a> 
			</li>
		</ul>
	</div>
</div>
<?php
	}
?>