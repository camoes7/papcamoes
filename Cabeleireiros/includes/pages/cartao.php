<?php
include('connectDB.php');
$sql="select count(*) from marcacoes where idcliente=$idcliente and compareceu=1 group by idcliente";
$ultimas =( ($nmarcacoes -1 ) % 10) + 1;
$sql="select * from marcacoes where idcliente=$idcliente order by data desc limit $ultimas";





?>
