<?php
//include to get database connection
include 'config/database.php';
 
// get product id
$login=isset($_GET['login']) ? $_GET['login'] : die('ERROR: Product ID not found.');
 
// PDO query to select single record based on ID
$query = "SELECT 
            *
        FROM 
            TB_USUARIO  
        WHERE 
            login = ?";
         
// prepare query
$stmt = $con->prepare($query);
 
// this is the first question mark on the query
$stmt->bindParam(1, $login);
 
// execute our query
if($stmt->execute()){
 
    // store retrieved row to a variable
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    // values to fill up our form
    $login = $row['login'];
    $senha = $row['senha'];
    $nome = $row['nome'];
    $endereco = $row['endereco'];
    $telefone = $row['telefone'];
    $area = $row['area'];
    
     
}else{
    echo "Unable to read record.";
}
?>
 
<!--we have our html form here where new product information will be entered-->
<form id='update-product-form' action='#' method='post' border='0'>
    <table class='table table-bordered table-hover'>
        
        <tr>
            <td>Login</td>
            <td><input type='text' name='login' class='form-control' required /></td>
        </tr>        

        <tr>
            <td>Senha</td>
            <td><input type='text' name='senha' class='form-control' required /></td>
        </tr>  

        <tr>
            <td>Nome</td>
            <td><input type='text' name='nome' class='form-control' required /></td>
        </tr> 

        <tr>
            <td>Endereco</td>
            <td><input type='text' name='endereco' class='form-control' required /></td>
        </tr> 

        <tr>
            <td>Telefone</td>
            <td><input type='number' name='telefone' class='form-control' required /></td>
        </tr> 

        <tr>
            <td>Area</td>
            <td><input type='text' name='area' class='form-control' required /></td>
        </tr>





        <tr><td>Login</td>
            <td><input type='text' name='login' class='form-control' value='<?php echo htmlspecialchars($login, ENT_QUOTES); ?>' required /></td>
        </tr>
        
        <tr><td>Senha</td>
            <td><input type='text' name='senha' class='form-control' value='<?php echo htmlspecialchars($senha, ENT_QUOTES); ?>' required /></td>
        </tr>
        
        <tr><td>Nome</td>
            <td><input type='text' name='nome' class='form-control' value='<?php echo htmlspecialchars($nome, ENT_QUOTES);  ?>' required /></td>
        </tr>

        <tr><td>Endereco</td>
            <td><input type='text' name='endereco' class='form-control' value='<?php echo htmlspecialchars($endereco, ENT_QUOTES);  ?>' required /></td>
        </tr>

        <tr><td>Telefone</td>
            <td><input type='number' name='telefone' class='form-control' value='<?php echo htmlspecialchars($telefone, ENT_QUOTES);  ?>' required /></td>
        </tr>

        <tr><td>Area</td>
            <td><input type='text' name='area' class='form-control' value='<?php echo htmlspecialchars($area, ENT_QUOTES);  ?>' required /></td>
        </tr>



        <!-- <tr><td> -->
                <!-- hidden ID field so that we could identify what record is to be updated -->
                        <!-- <input type='hidden' name='id' value='<?php echo $id ?>' />
            </td> -->
            <td><button type='submit' class='btn btn-primary'> <span class='glyphicon glyphicon-edit'></span> Save Changes </button> </td>
        </tr>


    </table>
</form>