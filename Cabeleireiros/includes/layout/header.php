<div >
    <div class="wrapper row0">
        <div id="topbar" class="hoc clear"> 
        
        <div class="fl_left"> 
            
            <ul class="nospace">
            <li><i class="fa fa-phone"></i>  +351 111 222 333</li>
            <li><i class="fa fa-envelope-o"></i>cabeleireiro@hotmail.com</li>
            </ul>
            
        </div>
        <div class="fl_right"> 
        
            <ul class="nospace">
            <li><a href="index.php"><i class="fa fa-lg fa-home"></i></a></li>
            <?php
            if (! isset($_SESSION['login'])) {
                echo '<li><a href="index.php?page=registo" title="Registe-se"><i class="fa fa-lg fa-edit"></i></a></li>';
                echo '<li><a href="index.php?page=login" title="Entrar"><i class="fa fa-lg fa-sign-in"></i></a></li>';
            }
            else echo '<li><a href="includes/pages/sair.php" title="Sair"><i class="fa fa-lg fa-sign-out"></i></a></li>';
            ?>
            </ul>
            
        </div>
        </div>
    </div>
   
   
   
    <div class="wrapper row1">
        <header id="header" class="hoc clear"> 
        
        <div id="logo" class="fl_left">
            <h1><a href="index.php">Cabeleireiro</a></h1>
        </div>
        <nav id="mainav" class="fl_right">
            <ul class="clear">
            <li class=""><a href="index.php">Página Inicial</a></li>
            <li><a class="drop" href="#">Informação</a>
                <ul>
                <li><a href="index.php?page=cabeleireiro">Cabeleireiro</a></li>
                <li><a href="index.php?page=precos">Tabela de preços</a></li>
                </ul>
            </li>
            <li><a class="drop" href="#">Marcações</a>
                <ul>
                <li><a href="index.php?page=marcacoes">Marcar hora (Clientes)</a></li>
                <li><a href="index.php?page=compareceu">Confirmar presença (Funcionários)</a></li>
                </ul>
            </li>
			
			
			<!--li><a href="index.php?page=marcacoes">Marcações</a></li-->
           <?php 
            if (isset ($_SESSION['login'])) {
                ?>
                <li><a href="index.php?page=perfil">Perfil</a></li>
                <?php
            } 
                
            
            ?>
            </ul>
        </nav>
        
        </header>
    </div>
</div>