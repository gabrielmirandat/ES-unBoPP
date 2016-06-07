<?php
// include to get database connection
include_once 'config/database.php';
 
try {
     
    // PDO delete query
    $query = "DELETE FROM TB_USUARIO WHERE login = ?";
    $stmt = $con->prepare($query);
     
    // substitute for the question mark on the query
    $stmt->bindParam(1, $_POST['login']);
     
    // execute the query
    if($stmt->execute()){
        echo "Product was deleted.";
    }else{
        echo "Unable to delete product.";
    }
}
 
// handle error
catch(PDOException $exception){
    echo "Error: " . $exception->getMessage();
}
?>