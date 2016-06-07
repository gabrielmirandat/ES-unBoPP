 <?php include("common/header.php"); ?>
 
    <div class="container">
            
            <div class="row">
                <h3>Seus Eventos</h3>
            </div>
            
            <div class="row">
                 <p>
                    <a href="create.php" class="btn btn-success">Criar</a>
                </p>
                
                <!-- create a table with sql table attributes -->
                <table class="table table-striped table-bordered">
                  
                  <thead>
                    <tr>
                      <th>idEvento</th>
                      <th>Promotor</th>
                      <th>Data</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    
                  <?php
                      
                    include 'config/database.php';
                    $pdo = Database::connect();
                    $sql = 'SELECT * FROM TB_EVENTO_PROMOTOR ORDER BY idEvento';
                    foreach ($pdo->query($sql) as $row) {
                              // echo — Output one or more strings
                              echo '<tr>';
                              echo '<td>'. $row['idEvento'] . '</td>';
                              echo '<td>'. $row['loginPromotor'] . '</td>';
                              echo '<td>'. $row['data'] . '</td>';
                              echo '<td width=250>';
                              echo '<a class="btn" href="read.php?id='.$row['id'].'">Mais</a>';
                              echo ' ';
                              echo '<a class="btn btn-success" href="update.php?id='.$row['id'].'">Atualizar</a>';
                              echo ' ';
                              echo '<a class="btn btn-danger" href="delete.php?id='.$row['id'].'">Deletar</a>';
                              echo '</td>';
                              echo '</tr>';
                    }
                    Database::disconnect();
                  ?>
                  </tbody>
                
                </table>

                <div class="form-actions">
                    <a class="btn" href="index.php">Início</a>
                </div>
            
            </div>
    </div> <!-- /container -->
</body>
</html>