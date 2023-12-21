<?php
session_start();
?>
<!DOCTYPE html>

<html lang="">

<head>
<title>Futmax</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">


<div class="bgded overlay light" style="background-image:url('images/demo/backgrounds/campo.png.png');">




  <div class="wrapper row1">
    <header id="header" class="hoc clear">

      <div id="logo" class="fl_left">
        <h1><a href="index.php">Futmax</a></h1>
      </div>
      <nav id="mainav" class="fl_right">
        <ul class="clear">
          <li class="active"><a href="index.php">Página Principal</a></li>
          <li><a class="drop" href="#">Páginas</a>
            <ul>
              <li><a href="pages/marcacoes.php">Marcações</a></li>
              <li><a href="pages/classificacao.php">Classificação</a></li>




            </ul>
          </li>
          <li><a class="drop" href="#">Painel de Administração</a>
            <ul>
              <?php
              //ISTO *E PARA POR EM TODAS
              if (!isset($_SESSION['login'])) {
                echo '<li><a href="pages/login.php">Login</a></li>';
              }
              else {
                echo '<li><a href="pages/sair.php">Logout</a></li>';
                if ($_SESSION['tipo_user'] == 1){     
                  ?>         
                  <li><a class="drop" href="#">Administração de Utilizadores</a>
                <ul>
                  <li><a href="pages/administração_utilizadores.php">Administração de utilizadores</a></li>
                  
                </ul>
              </li>
              <?php
                  }
                }
              ?>
            </ul>
          </li>



          </li>

        </ul>
      </nav>

    </header>
  </div>



  <div id="pageintro" class="hoc clear">

    <article>
      <h3 class="heading">Futebol<br></h3>
      <p>venha alugar um campo!
      </p>
      <footer><a class="btn" href="pages/localizacao.php">Ver mais</a></footer>
    </article>

  </div>

</div>
<!-- End Top Background Image Wrapper -->




    <!-- main body -->



    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>






<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>
