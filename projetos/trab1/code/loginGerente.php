<?php
      session_start();

      //It handles record creation process.
      require 'config/database.php';
    
      if ( !empty($_POST)) 
      {
        // keep track validation errors
        $loginError = null;

        // keep track post values
        $login = $_POST['login'];
        $senha = $_POST['senha'];
       
       // validate input
        $valid = true;
        $loggedIn = false;

        if (empty($login)) {
            $loginError = 'insira login ou senha!';
            $valid = false;
        }
         
        if (empty($senha)) {
            $loginError = 'insira login ou senha!';
            $valid = false;
        }
        
        if ($valid) 
        {
               $pdo = Database::connect();        
               $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               $sql = "SELECT 1 FROM TB_GERENTE WHERE login='$login' AND senha='$senha' LIMIT 1";
               
               foreach ($pdo->query($sql) as $row)
               {
                    $loggedIn = true;
                    $_SESSION['loginGerente'] = $login;
                    header("Location: indexGerente.php");
               }
               $loginError = 'login ou senha incorretos!';
               Database::disconnect();
        }
      }
?>

<?php include("common/header.php"); ?>

    <!-- First part of the codes is an html form. -->
    <div class="container">
                
                <div class="span10 offset1">
                    
                    <div class="row">
                        <h3>Login de gerente</h3>
                    </div>
             
                    <form class="form-horizontal" action="" method="post">
                      
                          <div class="control-group <?php echo !empty($loginError)?'error':'';?>">
                            <label class="control-label">Login</label>
                            <div class="controls">
                                <input name="login" type="text"  placeholder="Login" value="<?php echo !empty($login)?$login:'';?>">
                                <?php if (!empty($loginError)): ?>
                                    <span class="help-inline"><?php echo $loginError;?></span>
                                <?php endif; ?>
                            </div>
                          </div>
                          
                          <div class="control-group">
                            <label class="control-label">Senha</label>
                            <div class="controls">
                                <input name="senha" type="text" placeholder="Senha" value="<?php echo !empty($senha)?$senha:'';?>">
                            </div>
                          </div>

                          <div class="form-actions">
                              <button type="submit" class="btn btn-success">Entrar</button>
                              <a class="btn" href="index.php">Início</a>
                          </div>

                    </form>
                </div>
                 
    </div> <!-- /container -->
</body>
</html>