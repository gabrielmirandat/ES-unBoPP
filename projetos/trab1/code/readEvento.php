<?php
    require 'config/database.php';
    
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: index.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM TB_EVENTO where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
    }
?>
 
 <?php include("common/header.php"); ?>


    <div class="container">
     
                <div class="span10 offset1">
                    
                    <div class="row">
                        <h3>Detalhes do Evento</h3>
                    </div>
                     
                    <div class="form-horizontal" >
                      
                      <div class="control-group">
                        <label class="control-label">Id</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['id'];?>
                            </label>
                        </div>
                      </div>
                      
                      <div class="control-group">
                        <label class="control-label">Nome</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['nome'];?>
                            </label>
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label">Endereço</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['endereco'];?>
                            </label>
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label">Preço</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo 'R$ ' . $data['preco'];?>
                            </label>
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label">idArea</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['idArea'];?>
                            </label>
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label">idCategoria</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['idCategoria'];?>
                            </label>
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label">Promotor</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['loginPromotor'];?>
                            </label>
                        </div>
                      </div>
                      
                      <div class="form-actions">
                        <a class="btn" href="index.php">Início</a>
                      </div>
                     
                      
                    </div>
                </div>
                 
    </div> <!-- /container -->
</body>
</html>