<div class="login-wrap">
    <img src="images/backgrounds/01.png" alt="">
    <div class="login-html">
        <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Entrar</label>
        <input id="tab-2" type="radio" name="tab" class="for-pwd"><label for="tab-2" class="tab">Esqueceu a Password?</label>
        <div class="login-form">
            <div class="sign-in-htm">
            <?php
            if (!isset($_SESSION['login'])) {
            ?>
            <form method="POST" action="includes/pages/confirma_login.php" class="main_form">
                <div class="group">
                    <label for="user" class="label">Utilizador or Email</label>
                    <input id="user" type="text" class="input" name="user" autocomplete="off">
                </div>
                <div class="group">
                    <label for="pass" class="label">Password</label>
                     <input id="pass" type="password" class="input" data-type="password"  name="pass">
                </div>
                <div class="group">
                    <input type="submit" class="button" value="Sign In">
                </div>
                <div class="hr"></div>
			</form>
            </div>
            <div class="for-pwd-htm">
			<form method="POST" action="index.php?page=recupera" class="main_form">
                <div class="group">
                    <label for="user" class="label">Utilizador or Email</label>
                    <input id="user" name="user" type="text" class="input"  >
                </div>
                <div class="group">
                    <input type="submit" class="button" value="Reset Password">
                </div>
                <div class="hr"></div>
			</form>
            </div>
            
        </div>
        <a href="index.php?page=registo"><input type="button" class="button" value="Registo"></a>
    </form>
    
    <?php
    } 
	else {
		echo "<h1>A sessão já está iniciada</h1>";
    }
    ?>
    </div>
</div>