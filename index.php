<?php
session_start();
if(isset($_SESSION['UsuarioIdGeneral'])){
	header('Location:Direccionamiento.php');
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
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
    <style>
        .avatar {
            position:relative;
            margin: 0 auto;
            left: 0;
            right: 0;
            top: -50px;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            z-index: 9;
            background: #70c5c0;
            padding: 2px;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
        }
        .avatar img {
            width: 100%;
        }	
    </style>
</head>

<body class="bg-dark">
    <div class="container">
        <div class="card card-login mx-auto mt-5">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                <div class="avatar">
                    <img src="img/avatar.png" class="img-fluid" alt="">
                </div>
                        <h2 class="text-center">Bienvenido</h2> 
                        <form  method="post" id="FrmInicio">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input class="form-control" id="txtUsuario" placeholder="Ingresa tu usuario" type="text" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input class="form-control" id="txtPass" type="password" placeholder="Password" required>
                                </div>
                            </div>
                            <button class="btn btn-primary btn-block">Entrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $( "#FrmInicio" ).submit(function( event ) {
                 var nombre=$('#txtUsuario').val();
                var password=$('#txtPass').val();
                $.ajax({
                    type: "POST",
                    url: "loging.php",
                    data:{
                        nombre: nombre,
                        password: password,
                    },
                    cache: false,
                    success: function(result){
                        if(result==1){
                            document.location.href="Direccionamiento.php";
                        }
                        else if(result==404){
                            alert('No hay resultados');
                        }
                        else if(result==405){
                           alert('Usuario Incorrecto');
                        }
                        else if(result==406){
                           alert('Contraseña Incorrecta');
                        }                
						else{
							alert(result);
						}
					}
                 });
                event.preventDefault();
            });
        });
    </script>
</body>
    
</html>
