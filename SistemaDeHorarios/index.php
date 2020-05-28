<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">



        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

        <link href="bootstrap/css/estilos.css" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>   
    </head>

    <nav>
        <div class="nav-wrapper">
          <a href="#" class="brand-logo">Merida Yucatán Mexico</a>
          <ul id="nav-mobile" class="right hide-on-med-and-down">
            
          </ul>
        </div>
      </nav>
        
     <body>
        <div class="container">
            <div class="row" id="contenedorlogin">
                <h2>Inicia sesión</h2>
                <img src="bootstrap/Imagenes/LoginImagen.webp" width="100px" height="100px">

                <form action="login.php" method="post">

                    <div class="row">
                        <div class="input-field col s12">
                            <input type="text" name="user" class="validate">
                            <label>Usuario</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <input type="password" name="pass" class="validate">
                            <label for="password">Password</label>
                        </div>
                    </div>

                    <div class="row" id="divboton">
                        <button type="submit" value="Aceptar" >Iniciar sesión</button>
                    </div>    

                </form>

                <div id="divRecuperar" class="">
                    <h6>¿Olvidaste tu contraseña?</h6> <a href="#modal1">Recuperala</a>

                </div>
                <div id="Rectangulo">

                </div>
            </div>

            <div id="modal1" class="modal">
                <div class="modal modal-fixed-footer">
                    <h4>Modal Header</h4>
                    <p>A bunch of text</p>
                </div>
                <div class="modal-footer">
                    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
                </div>
            </div>
        </div>	
    </body>
</html>