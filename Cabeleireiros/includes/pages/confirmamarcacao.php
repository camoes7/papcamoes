<?php
session_start();
if (!isset($_SESSION['id_user'])) {
    echo '<script>alert("Tem de iniciar sessão para poder fazer marcações");</script>';
    header("Location:../index.php");
}
$cliente=$_SESSION['id_user'];
if (!isset($_GET['prof']) && !isset($_GET['dia']) && !isset($_GET['hora']) ){
    echo '<script>alert("Tem de selecionar profissional pretendo, data e hora de marcação");</script>';
    header("Location:../index.php?page=marcacoes"); 
}
$profissional=$_GET['prof'];
$dia=$_GET['dia'];
$hora=$_GET['hora'];
include('connectDB.php');
if ($ligacao->connect_error)
{
	echo '<script>alert("mensagem de erro");</script>';
	die();
}
$sql="insert into marcacoes values ('$dia','$hora',$profissional,$cliente,0)";
$resultado=$ligacao->query($sql);
$ligacao->close();
header('Location:../../index.php?page=marcacoes');

?>