<?php
// include to get database connection
include 'config/database.php';
 
// PDO select all query
$query = "SELECT *FROM TB_USUARIO ORDER BY login desc";
$stmt = $con->prepare($query);
$stmt->execute();
 
//this is how to get number of rows returned
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // start table
    echo "<table class='table table-bordered table-hover'>";
     
        // creating our table heading
        echo "<tr>";
            // echo "<th class='width-30-pct'>Name</th>";
            // echo "<th class='width-30-pct'>Description</th>";
            echo "<th>Login</th>";
            echo "<th>Senha</th>";
            echo "<th>Nome</th>";
            echo "<th>Endereço</th>";
            echo "<th>Telefone</th>";
            echo "<th>Area</th>";
            echo "<th style='text-align:center;'>Action</th>";
        echo "</tr>";
         
        // retrieve our table contents
        // fetch() is faster than fetchAll()
        // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            // extract row
            // this will make $row['name'] to
            // just $name only
            extract($row);
             
            // creating new table row per record
            echo "<tr>";
                echo "<td>{$login}</td>";
                echo "<td>{$senha}</td>";
                echo "<td>{$nome}</td>";
                echo "<td>{$endereco}</td>";
                echo "<td>{$telefone}</td>";
                echo "<td>{$area}</td>";
                echo "<td style='text-align:center;'>";
                    // add the record id here, it is used for editing and deleting products
                    // echo "<div class='product-id display-none'>{$id}</div>";
                     
                    // edit button
                    echo "<div class='btn btn-info edit-btn margin-right-1em'>";
                        echo "<span class='glyphicon glyphicon-edit'></span> Edit";
                    echo "</div>";
                     
                    // delete button
                    echo "<div class='btn btn-danger delete-btn'>";
                        echo "<span class='glyphicon glyphicon-remove'></span> Delete";
                    echo "</div>";
                echo "</td>";
            echo "</tr>";
        }
         
    //end table
    echo "</table>";
     
}
 
// tell the user if no records found
else{
    echo "<div class='noneFound'>No records found.</div>";
}
 
?>