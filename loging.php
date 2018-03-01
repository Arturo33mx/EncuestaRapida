<?php
header('Content-Type: text/html; charset=utf-8');
setlocale(LC_TIME,'spanish');
session_start();
include 'class/Conexion.php';
if(empty($_POST))
{
	echo 'error_post';
	exit();
}
else{
	$nombre=$_POST['nombre'];
	$password=$_POST['password'];
}
$pass_sn=$password;
$password=($password);
$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "SELECT Clave, Usuario, Pass, Nombre, CveSistema, Nivel, CveEncuesta FROM usuario WHERE Usuario= ? and Estatus=1";
$q = $pdo->prepare($sql);
try{
	$q->execute(array($nombre));
	$data = $q->fetch(PDO::FETCH_ASSOC);
	if($data == null){
		Database::disconnect(); 
		echo "404";//data empty
		exit();
	}
	if($nombre != $data['Usuario']){
		Database::disconnect();
		echo "405";//correo no registrado
		exit();
	}
	if($data['Pass'] != $password){
		Database::disconnect();
		echo "406";//password incorrecto
		exit();
	}
	$_SESSION['UsuarioIdGeneral'] = $data['Clave'];
	$_SESSION['UsuarioCveSistema'] = $data['CveSistema'];
	$_SESSION['NombreCompleto'] = $data['Nombre'];
	$_SESSION['NivelUsuario'] = $data['Nivel'];
	$_SESSION['EncuestaCveEncuesta'] = $data['CveEncuesta'];
	$_SESSION['Pass']=$pass_sn;
	Database::disconnect();
	echo "1";
}
catch(PDOException $e){
	echo $e;
}