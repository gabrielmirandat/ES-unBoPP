<?php
// include to get database connection
include_once 'config/database.php';
 
try{
    // PDO update query
    $query = "UPDATE  
                TB_USUARIO 
            set 
                senha = :senha, 
                nome = :nome,
                endereco = :endereco,
                telefone = :telefone,
                area = :area

            where
                login = :login";
 
    // prepare query for execution
    $stmt = $con->prepare($query);
 
    // posted values
    $login=htmlspecialchars(strip_tags($_POST['login']));
    $senha=htmlspecialchars(strip_tags($_POST['senha']));
    $nome=htmlspecialchars(strip_tags($_POST['nome']));
    $endereco=htmlspecialchars(strip_tags($_POST['endereco']));
    $telefone=htmlspecialchars(strip_tags($_POST['telefone']));
    $area=htmlspecialchars(strip_tags($_POST['area']));
    
 
    // bind the parameters
    $stmt->bindParam(':login', $login);
    $stmt->bindParam(':senha', $senha);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':endereco', $endereco);
    $stmt->bindParam(':telefone', $telefone);
    $stmt->bindParam(':area', $area);
    
 
    // execute the query
    if($stmt->execute()){
        echo "Product was updated.";
    }else{
        echo "Unable to update product.";
    }
}
 
// handle error
catch(PDOException $exception){
    echo "Error: " . $exception->getMessage();
}
?>