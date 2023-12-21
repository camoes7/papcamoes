<?php
session_start();
if (!isset($_SESSION['login'])){
    echo "Não estás com sessão iniciada";
    return;
}

if (isset($_SESSION['tipo_user'])){
    if ($_SESSION['tipo_user'] == 0){
         echo "Sem permissão";
        return;
    }
}


?>
<!DOCTYPE html>

<html>

 

<head>

    <title>Futmax</title>

 

</head>

 

<body>

    <header>

        

</body>

<nav class="navigation">

    <button onclick="window.location.href= 'gerenciar_utilizadores.php'" class="btnlogin-popup">Gerir utilizadores</button>
    <button onclick="window.location.href= '../index.php';" class="btnlogin-popup">Voltar a pagina inicio</button>


</nav>

</header>

<div class="container">

    <h1>Pagina ADMIN</h1><br><br>

 

    <p>

        Aqui é onde se administra os utilizadores<br><br>





    </p>

</div>

 

</html> 