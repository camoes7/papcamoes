<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://use.fontawesome.com/fb48fadd01.js"></script>
<?php
if (!isset ($_SESSION['login'])){
	echo '<script>alert("Não pode confirmar comparências sem iniciar sessão.");</script>';
	redirect("index.php");
}
else if ($_SESSION['tipo_user']!='f'){
	echo '<script>alert("Apenas os funcionários podem confirmar comparências.");</script>';
	redirect("index.php");
}
include('connectDB.php');
if ($ligacao->connect_error)
{
	echo '<script>alert("mensagem de erro");</script>';
	die();
}

function mostra_marcacoes($idfuncionario, $nomefuncionario){
	global $ligacao;
	$hoje= date("Y/m/d");
	$sql="select * from marcacoes, users where users.id=marcacoes.idcliente and data='$hoje' and funcionario=$idfuncionario";
	$resultado=$ligacao->query($sql);
	$numregistos=$resultado->num_rows;
	for($i=0;$i<$numregistos;$i++){
		$registo=$resultado->fetch_array(MYSQLI_ASSOC);
		$idcliente=$registo['idcliente'];
		$nome=$registo['nome'];
		$compareceu=$registo['compareceu'];
		$horamarc=$registo['horamarcacao'];
		$marcacao[$horamarc]['idcliente']=$idcliente;
		$marcacao[$horamarc]['nome']=$nome;
		$marcacao[$horamarc]['compareceu']=$compareceu;
	}
	?>
	<h1 align="center"> Funcionário: <?php echo $nomefuncionario;?></h1>
	<form action="includes/pages/atualizaCompareceu.php" method="POST">
	<input type="hidden" name="funcionario" value="<?php echo $idfuncionario;?>">
	<input type="hidden" name="data" value="<?php echo $hoje;?>">
	<table border="1">
		<tr>
			<th></th><th>9:00</th><th>10:00</th><th>11:00</th><th>12:00</th><th>13:00</th><th>15:00</th><th>16:00</th><th>17:00</th><th>18:00</th><th>19:00</th>
		</tr>
		<tr>
		<td><?php echo $hoje;?></td>
	<?php
	for ($j=0;$j<11;$j++){
		if ($j<>5){
		echo "<td>";
		$hora=date('H:i:s', strtotime("9:00")+60*60*$j);
		if(isset($marcacao[$hora]['idcliente'])){
			echo $marcacao[$hora]['nome']."<br>";
			if ($marcacao[$hora]['compareceu']==0){
				echo '<input type="checkbox" name="compareceu['.$hora.']" value="0">';
			}
			elseif ($marcacao[$hora]['compareceu']==1){
				echo '<input type="checkbox" name="compareceu['.$hora.']" value="1" checked>';
			}
			echo " Compareceu";
		}
		else {
			echo "Sem marcação";
		}
		echo "</td>";
		}
	}
		
		?>
		</tr>
	</table>
	<?php
	if ($numregistos>0){
		echo '<center><input type="submit" class="btn btn-info btn-block text-white" style="width: 30%;" value="Submeter"></center>';
	}
	echo '<br><br><br>';
	echo "</form>";
}
//--------------- fim função de mostra_marcacoes ------------------


$sql="select * from funcionarios";
$cabeleireiros=$ligacao->query($sql);
if ($cabeleireiros->num_rows==0){
	echo '<script>alert("Não há cabeleireiros disponíveis para realização de marcações.");</script>';
	redirect("index.php");
	die();
}
?>
<div class="container">
	<?php
	
	$sql_funcionarios="select * from funcionarios";
	$result_funcionarios=$ligacao->query($sql_funcionarios);
	$num_funcionarios=$result_funcionarios->num_rows;
	for($k=0;$k<$num_funcionarios;$k++){
		$reg_funcionario=$result_funcionarios->fetch_array(MYSQLI_ASSOC);
		$idfunc=$reg_funcionario['id'];
		$nomefunc=$reg_funcionario['nome'];
		mostra_marcacoes($idfunc,$nomefunc);		
	}
	$ligacao->close();
	?>
</div>