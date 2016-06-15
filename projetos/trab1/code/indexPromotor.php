<?php
    session_start();
    $login = $_SESSION['loginPromotor'];
    
    require 'config/database.php';
     
    if ( null==$login ) 
    {
        header("Location: index.php");
    } else 
    {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM TB_PROMOTOR where login = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($login));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
    }
?>


<?php include("common/header.php"); ?>
 
    <div class="container">
            
            <div class="row">
                <?php echo '<h3>Olá '.$data['nome']. '!</h3>';?>
                <h3>Eventos promovidos</h3>
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
                      
                    // include 'config/database.php';
                    $pdo = Database::connect();
                    $sql = 
                    "SELECT DISTINCT ev.id 'ev_id', ev.nome 'ev_nome', ev.endereco 'ev_end',  area.nome 'area_nome',  cat.nome 'cat_nome',prom.data 'prom_data' FROM TB_EVENTO ev INNER JOIN TB_AREA area ON ev.idArea = area.id INNER JOIN TB_CATEGORIA cat ON ev.idCategoria = cat.id INNER JOIN TB_EVENTO_PROMOTOR prom ON ev.id = prom.idEvento WHERE ev.loginPromotor = '" .$data['login']."' ORDER BY prom.data";
                    
                    foreach ($pdo->query($sql) as $row) {
                              // echo — Output one or more strings
                              echo '<tr>';
                              echo '<td>'. $row['ev_nome'] . '</td>';
                              echo '<td>'. $row['ev_end'] . '</td>';
                              echo '<td>'. $row['area_nome'] . '</td>';
                              echo '<td>'. $row['cat_nome'] . '</td>';
                              echo '<td>'. date("d/m/Y", strtotime($row['prom_data'])) . '</td>';
                              echo '<td width=245>';
                              echo '<a class="btn" href="readEvento.php?id='.$row['ev_id'].'">Mais</a>';
                              echo ' ';
                              echo '<a class="btn btn-danger" href="#?id='.$row['id'].'">Remover</a>';
                              echo ' ';
                              echo '<a class="btn btn-success" href="#?id='.$row['id'].'">Atualizar</a>';
                              echo '</td>';
                              echo '</tr>';
                    }
                    Database::disconnect();
                  ?>
                  </tbody>
                
                </table>

            <div class="form-actions">
                  <button type="submit" class="btn btn-success">Novo Evento</button>
                  <a class="btn" href="index.php">Sair</a>
            </div>
    </div> <!-- /container -->
</body>
</html>