<!--
    -we have our html form here where product information will be entered
    -we used the 'required' html5 property to prevent empty fields
-->
<form id='create-product-form' action='#' method='post' border='0'>
    <table class='table table-hover table-responsive table-bordered'>
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
        <tr>
            <td></td>
            <td>                
                <button type='submit' class='btn btn-primary'>
            <span class='glyphicon glyphicon-plus'></span> Create Product
        </button>
            </td>
        </tr>
    </table>
</form>