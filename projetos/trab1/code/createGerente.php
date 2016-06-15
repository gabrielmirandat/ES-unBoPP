<?php
    // It handles record creation process.
    require 'config/database.php';
 
    if ( !empty($_POST)) 
    {
        // keep track validation errors
        $loginError = null;
        $senhaError = null;
        $nomeError = null;
        $enderecoError = null;
        $telefoneError = null;
        $chaveError = null;
        $emailError = null;
        $cpfError = null;
         
        // keep track post values
        $login = $_POST['login'];
        $senha = $_POST['senha'];
        $nome = $_POST['nome'];
        $endereco = $_POST['endereco'];
        $telefone = $_POST['telefone'];
        $chave = $_POST['chave'];
        $email = $_POST['email'];
        $cpf = $_POST['cpf'];

        // validate input
        $valid = true;
        $loginValid = true;
        $chaveValid = false;

        if (empty($login)) {
            $loginError = 'login necessário';
            $valid = false;
        }
         
        if (empty($senha)) {
            $senhaError = 'senha necessária';
            $valid = false;
        }
         
        if (empty($nome)) {
            $nomeError = 'nome necessário';
            $valid = false;
        }

        if (empty($endereco)) {
            $enderecoError = 'endereço necessário';
            $valid = false;
        }
        
        if (empty($telefone)) {
            $telefoneError = 'telefone necessário';
            $valid = false;
        }

        if (empty($chave)) {
            $chaveError = 'chave necessária';
            $valid = false;
        }

        if (empty($email)) {
            $emailError = 'email necessário';
            $valid = false;
        } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
            $emailError = 'email não válido!';
            $valid = false;
        }

        if (empty($cpf)) {
            $cpfError = 'CPF necessário';
            $valid = false;
        }

        // insert data
        if ($valid) 
        {
               $pdo = Database::connect();        
               $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               $sql = "SELECT 1 FROM TB_GERENTE WHERE login='$login' LIMIT 1";
               
               foreach ($pdo->query($sql) as $row)
               {
                    $loginValid = false;
                    $loginAlreadyError = 'login já existente!';
               }

                if($loginValid)
                {   
                   $sql = "SELECT 1 FROM TB_CHAVE WHERE loginGerente='$login' AND num = '$chave' LIMIT 1";
                   $q = $pdo->prepare($sql);
                   $q->execute();
                   $result = $q->fetchAll();  // Even fetch() will do
                    
                   if(count($result)>0)
                   {
                        $chaveValid = true;
                   }
                   else               
                   {
                        $chaveError = 'chave incorreta!';
                   }
                }

               Database::disconnect();
        }
        if ($valid && $loginValid && $chaveValid) 
        {
               $pdo = Database::connect();        
               $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               $sql = "INSERT INTO TB_GERENTE (login,senha,nome,endereco,telefone,email,cpf) values(?, ?, ?, ?, ?, ?, ?)";
               $q = $pdo->prepare($sql);
               $q->execute(array($login,$senha,$nome,$endereco,$telefone,$email,$cpf));
               Database::disconnect();
               header("Location: index.php");
        }
    }
?>

<?php include("common/header.php"); ?>

    <!-- First part of the codes is an html form. -->
    <div class="container">
                
                <div class="span10 offset1">
                    
                    <div class="row">
                        <h3>Cadastro de gerente</h3>
                    </div>
             
                    <form class="form-horizontal" action="createGerente.php" method="post">
                      
                          <div class="control-group <?php echo !empty($loginError)?'error':'';?>">
                            <label class="control-label">Login</label>
                            <div class="controls">
                                <input name="login" type="text"  placeholder="Login" value="<?php echo !empty($login)?$login:'';?>">
                                <?php if (!empty($loginError)): ?>
                                    <span class="help-inline"><?php echo $loginError;?></span>
                                <?php elseif (!empty($loginAlreadyError)): ?>
                                    <span class="help-inline"><?php echo $loginAlreadyError;?></span>
                                <?php endif; ?>
                            </div>
                          </div>
                          
                          <div class="control-group <?php echo !empty($senhaError)?'error':'';?>">
                            <label class="control-label">Senha</label>
                            <div class="controls">
                                <input name="senha" type="text" placeholder="Senha" value="<?php echo !empty($senha)?$senha:'';?>">
                                <?php if (!empty($senhaError)): ?>
                                    <span class="help-inline"><?php echo $senhaError;?></span>
                                <?php endif;?>
                            </div>
                          </div>
                          
                          <div class="control-group <?php echo !empty($nomeError)?'error':'';?>">
                            <label class="control-label">Nome</label>
                            <div class="controls">
                                <input name="nome" type="text"  placeholder="Nome" value="<?php echo !empty($nome)?$nome:'';?>">
                                <?php if (!empty($nomeError)): ?>
                                    <span class="help-inline"><?php echo $nomeError;?></span>
                                <?php endif;?>
                            </div>
                          </div>

                          <div class="control-group <?php echo !empty($enderecoError)?'error':'';?>">
                            <label class="control-label">Endereço</label>
                            <div class="controls">
                                <input name="endereco" type="text"  placeholder="Endereço" value="<?php echo !empty($endereco)?$endereco:'';?>">
                                <?php if (!empty($enderecoError)): ?>
                                    <span class="help-inline"><?php echo $enderecoError;?></span>
                                <?php endif;?>
                            </div>
                          </div>

                          <div class="control-group <?php echo !empty($telefoneError)?'error':'';?>">
                            <label class="control-label">Telefone</label>
                            <div class="controls">
                                <input name="telefone" type="text"  placeholder="Telefone" value="<?php echo !empty($telefone)?$telefone:'';?>">
                                <?php if (!empty($telefoneError)): ?>
                                    <span class="help-inline"><?php echo $telefoneError;?></span>
                                <?php endif;?>
                            </div>
                          </div>

                          <div class="control-group <?php echo !empty($emailError)?'error':'';?>">
                            <label class="control-label">Email</label>
                            <div class="controls">
                                <input name="email" type="text"  placeholder="Email" value="<?php echo !empty($email)?$email:'';?>">
                                <?php if (!empty($emailError)): ?>
                                    <span class="help-inline"><?php echo $emailError;?></span>
                                <?php endif;?>
                            </div>
                          </div>

                          <div class="control-group <?php echo !empty($cpfError)?'error':'';?>">
                            <label class="control-label">Cpf</label>
                            <div class="controls">
                                <input name="cpf" type="text"  placeholder="Cpf" value="<?php echo !empty($cpf)?$cpf:'';?>">
                                <?php if (!empty($cpfError)): ?>
                                    <span class="help-inline"><?php echo $cpfError;?></span>
                                <?php endif;?>
                            </div>
                          </div>

                          <div class="control-group <?php echo !empty($chaveError)?'error':'';?>">
                            <label class="control-label">Chave</label>
                            <div class="controls">
                                <input name="chave" type="text"  placeholder="Chave" value="<?php echo !empty($chave)?$chave:'';?>">
                                <?php if (!empty($chaveError)): ?>
                                    <span class="help-inline"><?php echo $chaveError;?></span>
                                <?php endif;?>
                            </div>
                          </div>
                          
                          <div class="form-actions">
                              <button type="submit" class="btn btn-success">Criar</button>
                              <a class="btn" href="index.php">Início</a>
                          </div>
                    
                    </form>
                
                </div>
                 
    </div> <!-- /container -->
</body>
</html>