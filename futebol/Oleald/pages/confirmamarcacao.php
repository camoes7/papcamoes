<?php
session_start();
if (!isset($_SESSION['id_cliente'])) {
    echo '<script>alert("Tem de iniciar sessão para poder fazer marcações");</script>';
    header("Location:../index.php");
}
$cliente=$_SESSION['id_cliente'];
if (!isset($_GET['id_campo']) && !isset($_GET['data']) && !isset($_GET['hora_de_marcacao']) ){
    echo '<script>alert("Tem de selecionar profissional pretendo, data e hora de marcação");</script>';
    header("Location:../index.php?page=marcacoes"); 
}
$profissional=$_GET['id_campo'];
$dia=$_GET['data'];
$hora=$_GET['hora_de_marcacao'];
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