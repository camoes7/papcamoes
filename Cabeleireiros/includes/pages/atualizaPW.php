<!--div class="login-wrap">
    <img src="images/backgrounds/01.png" alt="">
    <div class="login-html"-->
        <!--input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Entrar</label>
        <input id="tab-2" type="radio" name="tab" class="for-pwd"><label for="tab-2" class="tab">Esqueceu a Password?</label-->
        <div class="login-form">
            <div class="sign-in-htm">
            <?php
			//die("Morreu!");
            if (isset($_POST['userID'])) {
				$userID=$_POST['userID'];
                unset($_COOKIE['ivosoares']);
            ?>
            <form method="POST" action="includes/pages/restorePW.php" class="main_form">
                <table align="center" style="width:30%;">
				<tr>
				<input type="hidden" name="userID" value="<?php echo $userID; ?>">
                <div class="group">
                    <td>Nova Password</td>
                     <td><input type="password" id="password"   name="password" required></td>
                </div>
				</tr>
				</table>
			
				<center>
                <div class="grhttp://localhost/Cabeleireiros/index.php?page=registooup">
                    <input type="submit" class="button" value="Atualizar" style="width:10%;">
                </div>
				</center>
				
				
                <div class="hr"></div>
			</form>
            </div>
          
            
        </div>
    </form>
    
    <?php
    } else {
    echo "<h1>Não pode atualizar password de um utilizador não identificado.</h1>";
    }
    ?>
    <!--/div>
</div-->