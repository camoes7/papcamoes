<?php
include('connectDB.php');
if ($ligacao->connect_error){
	echo '<script>alert("Erro de ligação à base de dados");</script>';
	header("Location: ../../index.php");
}
if (isset($_POST['funcionario']) && isset($_POST['data'])){
	$idfuncionario=$_POST['funcionario'];
	$data=$_POST['data'];
	$sql="update marcacoes set compareceu=0 where data='$data' and funcionario=$idfuncionario";
	$resultado=$ligacao->query($sql);
	if (isset($_POST['compareceu'])){
		$vetor=$_POST['compareceu'];
		foreach($vetor as $hora=>$valor){
			$sql="update marcacoes set compareceu=1 where data='$data' and funcionario=$idfuncionario and horamarcacao='$hora'";
			$resultado=$ligacao->query($sql);
		}
	}
}
echo "<script>history.back();</script>";
$ligacao->close();
?>