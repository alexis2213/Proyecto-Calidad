<!DOCTYPE html>
<?php
session_start();
if (@!$_SESSION['user']) {
	header("Location:index.php");
}elseif ($_SESSION['rol']==2) {
	header("Location:alumno.php");
}
?>
<html lang="en">
  <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">


        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
        <script src="bootstrap/js/jquery-1.8.3.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>


    </head>
  
  
  <body data-offset="40"  style="background-attachment: fixed">
        <div class="container">
            <header class="header">
                <div class="row">
                    <h1 class="span"> PARA MAESTROS</h1>
                </div>
            </header>
            <?php
            include_once  ("include/menu.php");
            
            ?>

            
            
            
            
        </div>
    </body>
</html>