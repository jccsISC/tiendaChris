<?php 
    include_once 'connect/Users.php';
    session_start();
    if(isset($_SESSION["idUser"])){
        if($_SESSION["isAdmin"] == 1){
            header("Location: index.php");
        }else{
            header("Location: cliente.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/Login.css">
</head>
<body>
    <div class="container">

        <!-- Contenedor login -->
        <div id="contenedorcentrado">
            <div id="login">
                <form method="POST" id="loginform">
                    <label for="usuario">Usuario</label>
                    <input id="usuario" type="text" name="usuario" placeholder="Usuario" required>
                    
                    <label for="password">Contraseña</label>
                    <input id="password" type="password" placeholder="Contraseña" name="password" required>
                    
                    <button type="submit" title="Ingresar" name="Ingresar">Ingresar</button>
                </form>
                
            </div>
            <div id="derecho" style="color: aliceblue;">
                <div class="titulo">
                    Bienvenido
                </div>
                <hr>
                <div class="pie-form">
                    <a href="#" type="button"  data-toggle="modal" data-target="#modalReuperar">¿Perdiste tu contraseña?</a>
                    <a href="#" type="button"  data-toggle="modal" data-target="#modalRegistrar">¿No tienes Cuenta? Registrate</a>
                </div>
            </div>
        </div>
        
        <!-- Modal para recuperar contrasena -->
        <div class="modal fade" id="modalReuperar" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="text-center">
                        <label class="p-0 mt-2">Recuperar contraseña</label>
                        <button type="button" class="close float-right m-2" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span> 
                        </button>
                        <hr class="m-0 p-0">
                    </div>
                    <div class="modal-body" style="background-color: #8cc2ff; color: azure;">
                        <div style="margin: auto;">
                            <h5>Comunicate a:</h5>
                            <div class="row container">
                                <img src="../img/whatsapp.svg" alt="" width="20px" height="20px" class="mr-2">
                                <label>322 2032288</label>
                            </div>

                            <div class="row container">
                                <img src="../img/panorama.svg" alt="" width="20px" height="20px" class="mr-2">
                                <label>example@hotmail.com</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

         <!-- Modal para registrar cliente -->
         <div class="modal fade" id="modalRegistrar" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="text-center">
                        <label class="p-0 mt-2">Registrate</label>
                        <button type="button" class="close float-right m-2" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span> 
                        </button>
                        <hr class="m-0 p-0">
                    </div>
                    <div class="modal-body">
                        <form method="POST" class="form-control p-5" style="margin: auto; background-color: #8cc2ff;">
                            <input class="form-control mb-2" type="text" name="txtname" placeholder="Ingrese su nombre" required/> 
                            <input class="form-control  mb-2" type="number" name="txtphone" placeholder="Ingrese su telefóno" required/> 
                            <input class="form-control  mb-2" type="text" name="txtemail" placeholder="Ingrese su correo" required/> 
                            <input class="form-control  mb-2" type="text" name="txtaddress" placeholder="Ingrese su dirección" required/> 
                            <input class="form-control  mb-2" type="password" name="txtpws" placeholder="Ingrese su contraseña" required/> 
                            <input class="btn btn-success float-right" type="submit" value="Guardar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
            if(isset($_POST['txtname'])){
                $user = new Users();
                $user->registerUser();
            }
            if(isset($_POST['usuario'])){
                $user = new Users();
                $user->loginUser();
            }
        ?>
    </div>

    <script type="text/javascript" src="../js/jquery-3.2.1.slim.min.js"></script>
    <script type="text/javascript" src="../js/popper.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
</body>
</html>