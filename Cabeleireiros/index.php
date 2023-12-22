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
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/layout.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/login1.css'>
    <script src='main.js'></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
<?php
    $page='main';
    if(isset($_REQUEST['page'])) {
        $page=$_REQUEST['page'];
    }
    
?>
    <div class="bgded overlay light">
        <?php
            include_once('includes/layout/header.php');
        ?>
    </div>
    <div class="content">
        <?php
        switch ($page) {
            case 'main':
                include_once('includes/pages/main.php');
            break;
            case 'login':
                include_once('includes/pages/login.php');
            break;
            case 'cabeleireiro':
                include_once('includes/pages/cabeleireiro.php');
            break;
            case 'marcacoes':
                include_once('includes/pages/marcacoes.php');
            break;
            case 'sair':
                include_once('includes/pages/perfil.php');
            break;
            case 'registo':
                include_once('includes/pages/registo.php');
            break;
            case 'precos':
                include_once('includes/pages/precos.php');
            break;
            case $page == 'sair':
                include_once('includes/pages/sair.php');
            break;
            case $page == 'perfil':
                include_once('includes/pages/perfil.php');
            break;
            case $page == 'cortes':
                include_once('includes/pages/cartao.php');
            break;
			case $page=='recupera':
				include_once('includes/pages/recupera_pwd.php');
			break;
			case'atualizaPW':
				include_once('includes/pages/atualizaPW.php');
			break;
			case 'compareceu':
				include_once('includes/pages/compareceu.php');
			break;
			case 'ultimas':
				include_once('includes/pages/ultimas.php');
			break;
        }
        ?>
    </div>
    <div class="footer">
        <?php
            include_once('includes/layout/footer.php');
        ?>
    </div>
</body>
</html>