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
                      <th>Endereço</th>
                      <th>Area</th>
                      <th>Categoria</th>
                      <th>Data</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    
                  <?php
                      
                    include 'config/database.php';
                    $pdo = Database::connect();
                    $sql = 'SELECT ev.id "ev_id", ev.nome "ev_nome", ev.endereco "ev_end",  area.nome "area_nome",  cat.nome "cat_nome",prom.data "prom_data" FROM TB_EVENTO ev INNER JOIN TB_AREA area ON ev.idArea = area.id INNER JOIN TB_EVENTO_PROMOTOR prom ON ev.id = prom.idEvento INNER JOIN TB_CATEGORIA cat ON ev.idCategoria = cat.id ORDER BY prom.data';
                    foreach ($pdo->query($sql) as $row) {
                              // echo — Output one or more strings
                              echo '<tr>';
                              echo '<td>'. $row['ev_nome'] . '</td>';
                              echo '<td>'. $row['ev_end'] . '</td>';
                              echo '<td>'. $row['area_nome'] . '</td>';
                              echo '<td>'. $row['cat_nome'] . '</td>';
                              echo '<td>'. date("d/m/Y", strtotime($row['prom_data'])) . '</td>';
                              echo '<td width=30>';
                              echo '<a class="btn" href="readEvento.php?id='.$row['ev_id'].'">Mais</a>';
                              echo '</td>';
                              echo '</tr>';
                    }
                    Database::disconnect();
                  ?>
                  </tbody>
                
                </table>
            
            </div>
    </div> <!-- /container -->
</body>
</html>

<!-- $sql = 'SELECT ev.id "ev_id", ev.nome "ev_nome", ev.endereco "ev_end",  cat.nome "cat_nome", area.nome "area_nome" FROM TB_EVENTO ev INNER JOIN TB_CATEGORIA cat ON ev.idCategoria = cat.id INNER JOIN TB_AREA area ON ev.idArea = area.id'; -->