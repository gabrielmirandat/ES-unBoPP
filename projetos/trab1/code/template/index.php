<!DOCTYPE html>
<html lang="en">
<head>
  
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      
    <title>Read Products</title>
     
    <!-- bootstrap CSS -->
    <link href="libs/js/bootstrap/dist/css/bootstrap.css" rel="stylesheet" media="screen" />
    <link r href="libs/css/custom.css" rel="stylesheet">
     
</head>
<body>
 
    <!-- container -->
    <div class="container">
     
        <div class='page-header'>
            <h1 id='page-title'>Read Products</h1>
        </div>

        <!-- content will be here -->
         
        <div class='margin-bottom-1em overflow-hidden'>
            <!-- when clicked, it will show the product's list -->
            <div id='read-products' class='btn btn-primary pull-right display-none'>
                <span class='glyphicon glyphicon-list'></span> Read Products
            </div>
             
            <!-- when clicked, it will load the create product form -->
            <div id='create-product' class='btn btn-primary pull-right'>
                <span class='glyphicon glyphicon-plus'></span> Create Product
            </div>
                 
            <!-- this is the loader image, hidden at first -->
            <div id='loader-image'><img src='images/ajax-loader.gif' /></div>
        </div>

        <!-- this is where the contents will be shown. -->
        <div id='page-content'></div>
         
    </div>
    <!-- /container -->
      
<!-- jQuery library -->
<script src="libs/js/jquery.js"></script>
 
<!-- bootstrap JavaScript -->
<script src="libs/js/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="libs/js/bootstrap/docs/assets/js/holder.js"></script>
  
<!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
 
<script type='text/javascript'>
// jquery / javascript codes will be here
    // change page title
    function changePageTitle(page_title){   
        // change page title
        $('#page-title').text(page_title);
          
        // change title tag
        document.title=page_title;
    }

    <script type='text/javascript'>
    $(document).ready(function(){
        // will show the create product form
        $('#create-product').click(function(){
            // change page title
            changePageTitle('Create Product');
             
            // show create product form
            // show a loader image
            $('#loader-image').show();
             
            // hide create product button
            $('#create-product').hide();
             
            // show read products button
            $('#read-products').show();
             
            // fade out effect first
            $('#page-content').fadeOut('slow', function(){
                $('#page-content').load('create_form.php', function(){ 
                    // hide loader image
                    $('#loader-image').hide(); 
                     
                    // fade in effect
                    $('#page-content').fadeIn('slow');
                });
            });
        });
    });

    // will run if create product form was submitted
    $(wccfd3w).on('submit', '#create-product-form', function() {
        // show a loader img
        $('#loader-image').show();
         
        // post the data from the form
        $.post("create.php", $(this).serialize()).done(function(data) {
                // show create product button
                $('#create-product').show();
                 
                // hide read products button
                $('#read-products').hide();
                 
                // 'data' is the text returned, you can do any conditions based on that
                showProducts();
        });
                 
        return false;
    });

    // view products on load of the page
    $('#loader-image').show();
    showProducts();
     
    // clicking the 'read products' button
    $('#read-products').click(function(){
         
        // show a loader img
        $('#loader-image').show();
         
        // show create product button
        $('#create-product').show();
         
        // hide read products button
        $('#read-products').hide();
         
        // show products
        showProducts();
    });
     
    // read products
    function showProducts(){
             
        // change page title
        changePageTitle('Read Products');
         
        // fade out effect first
        $('#page-content').fadeOut('slow', function(){
            $('#page-content').load('read.php', function(){
                // hide loader image
                $('#loader-image').hide(); 
                 
                // fade in effect
                $('#page-content').fadeIn('slow');
            });
        });
    }

    // clicking the edit button
    $(document).on('click', '.edit-btn', function(){ 
        // change page title
        changePageTitle('Update Product');
     
        var login = $(this).closest('td').find('.login').text();
         
        // show a loader image
        $('#loader-image').show();
         
        // hide create product button
        $('#create-product').hide();
         
        // show read products button
        $('#read-products').show();
     
        // fade out effect first
        $('#page-content').fadeOut('slow', function(){
            $('#page-content').load('update_form.php?login=' + login, function(){
                // hide loader image
                $('#loader-image').hide(); 
                 
                // fade in effect
                $('#page-content').fadeIn('slow');
            });
        });
    }); 

    // will run if update product form was submitted
    $(document).on('submit', '#update-product-form', function() {
        // show a loader img
        $('#loader-image').show();
         
        // post the data from the form
        $.post("update.php", $(this).serialize()).done(function(data) {
                 
                // show create product button
                $('#create-product').show();
                 
                // hide read products button
                $('#read-products').hide();
             
                // 'data' is the text returned, you can do any conditions based on that
                showProducts();
        });
                 
        return false;
    });

    // will run if the delete button was clicked
    $(document).on('click', '.delete-btn', function(){ 
        if(confirm('Are you sure?')){
         
            // get the id
            var product_id = $(this).closest('td').find('.product-id').text();
             
            // trigger the delete file
            $.post("delete.php", { id: product_id }).done(function(data){
                    console.log(data);
                     
                    // show loader image
                    $('#loader-image').show();
                     
                    // reload the product list
                    showProducts();
                     
            });
        }
    });


</script>


</script>
 
</body>
</html>