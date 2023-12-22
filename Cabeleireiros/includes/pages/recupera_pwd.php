<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.0.0/core.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.0.0/md5.js"></script>
<script>
	function getCookie(cookieName) {
		let cookie = {};
		document.cookie.split(';').forEach(function(el) {
			let [key,value] = el.split('=');
			cookie[key.trim()] = value;
		})
		return cookie[cookieName];
	}

	function validPW(){
		//alert(CryptoJS.MD5("hi!"));
		var pw1=getCookie('ivosoares');
		var pw2=document.getElementById("novaresposta").value;
		pw2= CryptoJS.MD5(pw2);
		if (pw1==pw2) {
			return true;
		}
		else {
			alert("Erro, a resposta introduzida não condiz com aquela definida pelo utilizador");
			return false;
		}
	}
</script>
<html>
<?php
include('connectDB.php');
if ($ligacao->connect_error) {
die("Um erro aconteceu. Tente adivinhar qual foi...".$ligacao->errno);
}

if (isset($_POST['user'])){
	$user=$_POST['user']; 
	$sql="select * from users where login='$user' or email='$user'"; 
	$resultado = $ligacao->query($sql);
	if ($resultado->num_rows>0) {
		$registo = $resultado->fetch_array(MYSQLI_ASSOC);
		$userID=$registo['id'];
		$pergunta=$registo['pergunta'];
		$resposta=$registo['resposta'];
		setcookie("ivosoares",$resposta, time()+600);
		?>
	
		<div class="for-pwd-htm">
			<form method="POST" action="index.php?page=atualizaPW" class="main_form" onsubmit="return validPW()">
				<input type="hidden" name="userID" value="<?php echo $userID;?>">
				<input type="hidden" name="respostaBD" id="repostaBD" value="<?php echo $resposta;?>">
                <table align="center" border="0" style="width:70%;">
				<tr>
				<div class="group">
                    <label  class="label"><td><b>Pergunta de segurança:</b></td><td><b><i> <?php echo $pergunta;?></i></b></td></label>
                </div>
				</tr>
				<tr>
				<div class="group">
                    <td><label for="novaresposta" class="label"><b>Introduza resposta (para letras use minúsculas)</b></label></td>
                    <td><input name="novaresposta" id="novaresposta" type="text" class="input" size="50"></td>
                </div>
				</tr>
				<tr>
				<td colspan="2" align="center">
                <div class="group">
                    <input type="submit" class="button" value="Reset Password">
                </div>
				</td>
				</tr>
				</table>
                <div class="hr"></div>
			</form>
        </div>
	
		<?php
		
	}
	else {
		echo '<script>alert("utilizador não existente, ou seja não existe!");</script>';
		$ligacao->close();
		echo '<script>history.back();</script>';
	}
}
else {
	echo '<script>alert("O mecanismo de recuperação de password requere\n a introdução do username ou email do utilizador.");</script>';
	$ligacao->close();	
	echo '<script>history.back();</script>';
}
//----------------------------------		
		
	

	
		/*
		if ($registo['password']==md5($pass)) {
        $_SESSION['login']=$user;
        $_SESSION['id_user']=$registo['id'];
        $_SESSION['tipo_user']=$registo['tipo_user'];
        ?>
        <script>
        </script>
        <?php
        redirect('../../index.php');
    } else {
        ?>
        <script>
        alert("Password errada.");
        </script>
        <?php
        redirect('../../index.php?page=login');  
    }
} else {
    ?>
    <script>
    alert("Utilizador inexistente! (ou seja, não existe)");
    </script>
    <?php
    redirect('../../index.php?page=login');
} 
*/

?>
</html>

