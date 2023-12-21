<?php

function redirect($url)
{
    echo '<script type="text/javascript">';
    echo 'window.location.href="'.$url.'";';
    echo '</script>';
    echo '<noscript>';
    echo '<meta http-equiv="refresh" content="0;url='.$url.'"/>';
    echo '</noscript>'; exit;
}

$name=$_POST['name'];
$email=$_POST['email'];
$username=$_POST['username'];
$password=$_POST['password'];
$password=md5($password);
$pergunta=$_POST['pergunta'];
$pergunta=preg_replace("/'/", "\'",$pergunta);
$resposta=$_POST['resposta'];
$resposta=md5($resposta);


$ligacao=new mysqli("127.0.0.1", "root", "", "futmax");
if ($ligacao->connect_error){
    echo '<script>alert("Erro no acesso à Base de Dados");</script>';
    redirect('index.php');
    echo '<script>history.back();</script>';
}
else {
    $sql="insert into users values (0, '$name', '$email', '$username','$password', '$','$pergunta', '$resposta');";
    
    /*
	try {
        $resultado=$ligacao->query($sql);
        echo '<script>alert("Utilizador registado com sucesso");</script>';
        redirect('../../index.php');
    }
    catch (Exception $erro) {
        echo '<script>alert("Erro ao gravar utilizador.\nProvavelmente já existe uma conta com este utilizador ou com este email.");</script>';
        echo '<script>history.back();</script>';
    }
	*/
	if ($resultado=$ligacao->query($sql)){
		echo '<script>alert("Utilizador registado com sucesso");</script>';
        $ligacao->close();
		redirect('../index.php');
	}
	else {
		echo '<script>alert("Erro ao gravar utilizador.\nProvavelmente já existe uma conta com este utilizador ou com este email.");</script>';
        $ligacao->close();
		echo '<script>history.back();</script>';
	}


}

?>

