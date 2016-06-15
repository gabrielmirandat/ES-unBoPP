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
        $areaError = null;
        $emailError = null;
        $filiacaoError = null;
        $cpf_cnpjError = null;
         
        // keep track post values
        $login = $_POST['login'];
        $senha = $_POST['senha'];
        $nome = $_POST['nome'];
        $endereco = $_POST['endereco'];
        $telefone = $_POST['telefone'];
        $area = $_POST['area'];
        $email = $_POST['email'];
        $filiacao = $_POST['filiacao'];
        $cpf_cnpj = $_POST['cpf_cnpj'];

        // validate input
        $valid = true;
        $loginValid = true;

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

        if (empty($area)) {
            $areaError = 'área necessária';
            $valid = false;
        }

        if (empty($email)) {
            $emailError = 'email necessário';
            $valid = false;
        } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
            $emailError = 'email não válido!';
            $valid = false;
        }

        if (empty($filiacao)) {
            $filiacaoError = 'filiação necessária';
            $valid = false;
        }

        if (empty($cpf_cnpj)) {
            $cpf_cnpjError = 'CPF/CNPJ necessário';
            $valid = false;
        }

        // insert data
        if ($valid) 
        {
               $pdo = Database::connect();        
               $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               $sql = "SELECT 1 FROM TB_PROMOTOR WHERE login='$login' LIMIT 1";
               
               foreach ($pdo->query($sql) as $row)
               {
                    $loginValid = false;
                    $loginAlreadyError = 'login já existe!';
               }
               Database::disconnect();
        }
        if ($valid && $loginValid) 
        {
               $pdo = Database::connect();        
               $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               $sql = "INSERT INTO TB_PROMOTOR (login,senha,nome,endereco,telefone,area,email,filiacao,cpf_cnpj) values(?, ?, ?, ?, ?, ?, ?, ?, ?)";
               $q = $pdo->prepare($sql);
               $q->execute(array($login,$senha,$nome,$endereco,$telefone,$area,$email,$filiacao,$cpf_cnpj));
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
                        <h3>Cadastro de promotor de eventos</h3>
                    </div>
             
                    <form class="form-horizontal" action="createPromotor.php" method="post">
                      
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

                          <div class="control-group <?php echo !empty($areaError)?'error':'';?>">
                            <label class="control-label">Area</label>
                            <div class="controls">
                                <input name="area" type="text"  placeholder="Area" value="<?php echo !empty($area)?$area:'';?>">
                                <?php if (!empty($areaError)): ?>
                                    <span class="help-inline"><?php echo $areaError;?></span>
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

                          <div class="control-group <?php echo !empty($filiacaoError)?'error':'';?>">
                            <label class="control-label">Filiação</label>
                            <div class="controls">
                                <input name="filiacao" type="text"  placeholder="Filiacao" value="<?php echo !empty($filiacao)?$filiacao:'';?>">
                                <?php if (!empty($filiacaoError)): ?>
                                    <span class="help-inline"><?php echo $filiacaoError;?></span>
                                <?php endif;?>
                            </div>
                          </div>

                          <div class="control-group <?php echo !empty($cpf_cnpjError)?'error':'';?>">
                            <label class="control-label">Cpf/Cnpj</label>
                            <div class="controls">
                                <input name="cpf_cnpj" type="text"  placeholder="Cpf_Cnpj" value="<?php echo !empty($cpf_cnpj)?$cpf_cnpj:'';?>">
                                <?php if (!empty($cpf_cnpjError)): ?>
                                    <span class="help-inline"><?php echo $cpf_cnpjError;?></span>
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