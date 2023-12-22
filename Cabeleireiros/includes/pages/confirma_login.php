<?php
session_start();

function redirect($url)
{
echo '<script type="text/javascript">';
echo 'window.location.href="'.$url.'";';
echo '</script>';
echo '<noscript>';
echo '<meta http-equiv="refresh" content="0;url='.$url.'"/>';
echo '</noscript>'; exit;
}
?>

<html>
<?php
$user=$_POST['user'];
$pass=$_POST['pass']; 
include('connectDB.php');
if ($ligacao->connect_error) {
die("Um erro aconteceu. Tente adivinhar qual foi...".$ligacao->errno);
} 
$sql="select * from users where login='$user' or email='$user'"; $resultado = $ligacao->query($sql);
if ($resultado->num_rows>0) {
    $registo = $resultado->fetch_array(MYSQLI_ASSOC);
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
} ?>
</html>

