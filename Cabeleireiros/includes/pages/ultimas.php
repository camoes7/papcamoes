<?php
include('connectDB.php');
$idcliente=$_SESSION['id_user'];
$sql="select count(*) as numero from marcacoes where idcliente=$idcliente and compareceu=1 group by idcliente";
$result=$ligacao->query($sql);
$registo=$result->fetch_array(MYSQLI_ASSOC);
$nmarcacoes=$registo['numero'];
if($nmarcacoes>0)
	$ultimas= (($nmarcacoes-1) % 10) + 1;
else 
	$ultimas=0;

$sql="select * from marcacoes where idcliente=$idcliente and compareceu=1 order by data desc limit $ultimas";
$result=$ligacao->query($sql);
$n=$result->num_rows;

echo "Nº total de marcações comparecidas: $n -----> ultimas: $ultimas <br>";
for($i=0; $i<$n;$i++){
	$registo=$result->fetch_array(MYSQLI_ASSOC);
	echo ". data:".$registo['data']."   hora:".$registo['horamarcacao']."    compareceu:".$registo['compareceu']."<br>";
}
$ligacao->close();



?>