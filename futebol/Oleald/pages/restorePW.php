<?php
include('connectDB.php');
if (isset($_POST['userID']) && isset($_POST['password'])){
	$iduser=$_POST['userID'];
	$password=$_POST['password'];
	$password=md5($password);
	$sql="update users set password='$password' where id=$iduser";
	$resultado=$ligacao->query($sql);
	if ($resultado) {
		echo '<script>alert("Password atualizado com sucesso");</script>';
	}
	else {
		echo '<script>alert("Erro na atualização da password");</script>';
	}
}
$ligacao->close();
header('Location: ../../index.php');
?>