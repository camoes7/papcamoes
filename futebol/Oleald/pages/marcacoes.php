<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://use.fontawesome.com/fb48fadd01.js"></script>
<?php


include('connectDB1.php');
if ($ligacao->connect_error)
{
	echo '<script>alert("mensagem de erro");</script>';
	die();
}
$sql="select * from funcionarios";
$cabeleireiros=$ligacao->query($sql);
if ($cabeleireiros->num_rows==0){
	echo '<script>alert("Não há cabeleireiros disponíveis para realização de marcações.");</script>';
	redirect("index.php");
	die();
}
?>
<div  class="container">
	<?php
	function aumenta($hora){
		for($i=1;$i<=60;$i++){
			$hora++;
		}
		return $hora;
	}


	if (!isset($_POST['profissional'])){
		?>
		<form action="index.php?page=marcacoes" method="post">
		<div class="form-group row">
			<!--div class="col-md-12">
				<label>Data<span style="color:red;"></span></label>
  				<input type="date" name="dataMarcacao" placeholder="Selecione data para a marcação" required />
			</div-->
			<div class="col-md-12">
				<label>Selecione o profissional pretendido<span style="color:red;"></span></label>
				<select name="profissional">
					<!--option disabled selected>Selecione o profissional pretendido</option-->
					<?php
					$numregistos=$cabeleireiros->num_rows;
					
					for($i=0;$i<$numregistos;$i++){
						
						$registo=$cabeleireiros->fetch_array(MYSQLI_ASSOC);
						
						$id=$registo['id'];
						$nome=$registo['nome'];
						echo "<script>alert($nome);</script>";
						echo '<option value="'.$id.'">'.$nome.'</option>';
						
					}
					?>
				</select>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-md-12">
			<input type="submit" class="btn btn-info btn-block text-white"></a>
			</div>
		</div>
		</form>
	<?php
	
	}
	
	else {
		$profissional=$_POST['profissional'];
		if (!isset($_POST['hoje'])){
			$hoje= date("Y/m/d");
		}
		else {
			$hoje=$_POST['hoje'];
			$botao=$_POST['botao'];
			switch($botao){
				case '+':
					for($i=0;$i<7;$i++){
						//$hoje++;
						$newdate= new DateTime($hoje);
						$newdate->add(new DateInterval('P1D'));
						$hoje=$newdate->format('Y/m/d');
					}
					break;
				case '-':
					$dataActual=date("Y/m/d");
					for($i=0;$i<7;$i++){
						if ($hoje>$dataActual) //$hoje--;
						{
							$newdate= new DateTime($hoje);
							//$newdate->subtract(new DateInterval('P1D'));
							$newdate=date_modify($newdate, '-1 day');
							$hoje=$newdate->format('Y/m/d');
						}
					}
					break;
			}
		}
		
		?>
		<form action="index.php?page=marcacoes" method="POST">
			<center>
			<input type="hidden" name="hoje" value="<?php echo $hoje;?>">
			<input type="hidden" name="botao" value="-">
			<input type="hidden" name="profissional" value="<?php echo $profissional;?>">
			<input type="image" src="imagens/up.png" alt="Submit"  height="48">
			</center>
		</form>


		<table border="1">
			<tr>
				<th></th><th>9:00</th><th>10:00</th><th>11:00</th><th>12:00</th><th>13:00</th><th>15:00</th><th>16:00</th><th>17:00</th><th>18:00</th><th>19:00</th>
			</tr>
		<?php
		$dia=$hoje;
		for ($i=0;$i<7;$i++){
			echo "<tr>";
			echo "<th>$dia</th>";
			if (date('w', strtotime($dia))>0){
				
				for ($j=0;$j<11;$j++){
					$hora=date('H:i', strtotime("9:00")+60*60*$j);
					if ($j<> 5){
						$sqlmarcacao="select * from marcacoes where data='$dia' and horamarcacao='$hora' and funcionario=$profissional";
						$marcacao=$ligacao->query($sqlmarcacao);
						if ($marcacao->num_rows>0){
							$regmarcacao=$marcacao->fetch_array(MYSQLI_ASSOC);
							if ($regmarcacao['idcliente']==$_SESSION['id_user']){
								echo '<td><a href="includes/pages/anulamarcacao.php?prof='.$profissional.'&dia='.$dia.'&hora='.$hora.'"><img src="imagens/desmarcar.png"></a></td>';
							}
							else {
								echo '<td><img src="imagens/indisp.png"></td>';
							}
						}
						else {
							echo '<td><a href="includes/pages/confirmamarcacao.php?prof='.$profissional.'&dia='.$dia.'&hora='.$hora.'"><img src="imagens/livre.png"></a></td>';
						}
					}
				}
			}
			else {
				for ($j=0;$j<11;$j++){
					echo "<td></td>";
				}
			}
			echo "</tr>";
			//$dia++;
			//$dia=date("Y/m/d", strtotime('+1 day',$dia));
			//date_add($dia, date_interval_create_from_date_string("1 day"));
			$newdate= new DateTime($dia);
			$newdate->add(new DateInterval('P1D'));
			$dia=$newdate->format('Y/m/d');
		}
		echo "</table>";
		?>
		<form action="index.php?page=marcacoes" method="POST">
			<center>
			<input type="hidden" name="hoje" value="<?php echo $hoje;?>">
			<input type="hidden" name="botao" value="+">
			<input type="hidden" name="profissional" value="<?php echo $profissional;?>">
			<input type="image" src="imagens/down.png" alt="Submit"  height="48">
			</center>
		</form>

		<?php
		if (!isset($_POST['inicio'])){
			$inicio=date("Y/m/d");
		}
		else {
			$inicio=$_POST['inicio'];
			$data=$inicio;
			for($i=0;$i<7;$i++){
				$sql="select * from marcacoes where data='$inicio' and funcionario=$profissional";	
			}
		}
	}
	?>
</div>

