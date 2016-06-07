 <?php include("common/header.php"); ?>
 
    <div class="container">
            
            <div class="row">
                <h3>Eventos</h3>
            </div>
            
            <div class="row">
                
                <!-- create a table with sql table attributes -->
                <table class="table table-striped table-bordered">
                  
                  <thead>
                    <tr>
                      <th>Nome</th>
                      <th>Area</th>
                      <th>Categoria</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    
                  <?php
                      
                    include 'config/database.php';
                    $pdo = Database::connect();
                    $sql = 'SELECT * FROM TB_EVENTO ORDER BY idCategoria DESC';
                    foreach ($pdo->query($sql) as $row) {
                              // echo — Output one or more strings
                              echo '<tr>';
                              echo '<td>'. $row['nome'] . '</td>';
                              echo '<td>'. $row['idArea'] . '</td>';
                              echo '<td>'. $row['idCategoria'] . '</td>';
                              echo '<td width=175>';
                              echo '<a class="btn" href="readEvento.php?id='.$row['id'].'">Mais</a>';
                              echo ' ';
                              echo '<a class="btn btn-success" href="update.php?id='.$row['id'].'">Inscrever-se</a>';
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