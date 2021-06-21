<?php 
    session_start();
    if(!isset($_SESSION["idUser"])){
        header("Location: Login.php");
    }
    include_once 'connect/Products.php';
    include_once 'connect/Users.php';
    $product = new Products(); 
    $user = new Users();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Abarrotera</title>
    
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/indexStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <header>
        <div class="container minavbar">
            <a href="index.php"><img class="logo" src="../img/computado.png" alt="logo"></a>

            <nav id="menu">
                <ul>
                    <li><a href="index.php" type="button">Home</a></li>
                    <li><a href="#" type="button" data-toggle="modal" data-target="#modalClientes">Clientes</a></li>  
                    <li><a href="#" type="button" data-toggle="modal" data-target="#verUsuarios">Cerrar sesión</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="container pt-5">

         <!-- Cards de productos-->
        <div class="row mt-5" style="display: flex; justify-content: center;">
            <?php 
                $product->getProducts();
            ?>
        </div>

        <!-- Modal para ver a los clientes-->
        <div class="modal fade" id="modalClientes" tabindex="-1" role="dialog" aria-labelledby="modalClientesModalCenterTitle" aria-hidden="true" >
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="text-center">
                    <label class="p-0 mt-2" id="modalListaModalCenterTitle">Lista de clientes</label>
                    <button type="button" class="close float-right m-2" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span> 
                    </button>
                    <hr class="m-0 p-0">
                </div>
                <div class="modal-body">
                    <table class="table table-hover table-bordered tableList">
                        <thead>
                            <tr>
                                <th scope="col">N</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Telefóno</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Dirección</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $user->showUser();
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
        </div>

        <!-- Modal para modificar la contra del cliente -->
        <div class="modal fade" id="modalEditarClient" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="text-center">
                        <label class="p-0 mt-2">Editar Usuario</label>
                        <button type="button" class="close float-right m-2" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span> 
                        </button>
                        <hr class="m-0 p-0">
                    </div>
                    <div class="modal-body">
                        <form method="POST" style="margin: auto;">
                            <input class="form-control mb-2" type="hidden" name="txtuser"  id="idUser"/> 
                            <input class="form-control mb-2" disabled type="text" name="txtname"  id="txtname"placeholder="Ingrese su nombre" /> 
                            <input class="form-control  mb-2" disabled type="number" name="txtphone"  id="txtphone"placeholder="Ingrese su telefóno" /> 
                            <input class="form-control  mb-2" disabled type="text" name="txtemail" id="txtemail" placeholder="Ingrese su correo" /> 
                            <input class="form-control  mb-2" disabled type="text" name="txtaddress" id="txtaddress" placeholder="Ingrese su dirección" /> 
                            <input class="form-control  mb-2" type="password" name="txtpassword" id="txtpassword" placeholder="Cambiar contraseña" /> 
                            <input class="btn btn-success float-right" type="submit" value="Guardar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php 
            if(isset($_POST["txtpassword"])){
                $user->updatePassword();
            }
        ?>

        <!-- Modal para agregar o modificar productos -->
         <div class="modal fade" id="modalProduct" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="text-center">
                        <label class="p-0 mt-2">Agregar Producto</label>
                        <button type="button" class="close float-right m-2" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span> 
                        </button>
                        <hr class="m-0 p-0">
                    </div>
                    <div class="modal-body">
                        <form method="POST" style="margin: auto;">
                            <input class="form-control mb-2" type="hidden" name="txtproduct"  id="txtproduct"/> 
                            <input class="form-control mb-2" type="text" name="txtname" id="txtname" placeholder="Ingrese el nombre del producto" required/> 
                            <input class="form-control mb-2" type="text" name="txtdescripcion" id="txtdescripcion" placeholder="Ingrese una descripción" required/> 
                            <input class="form-control  mb-2" type="number" name="txtprecio" id="txtprecio" placeholder="Ingrese el precio por kg" required/> 
                            <input class="form-control  mb-2" type="number" name="txtexistencia" id="txtexistencia" placeholder="Existencia en kg" required/> 
                            <select class="form-control form-select mb-2" aria-label="Default select example" name="txtcategory" id="txtcategory" required>
                                <option selected>Seleccione la categoria</option>
                                <?php 
                                    $product->getCategory();
                                ?>
                            </select>
                            <input class="form-control mb-2" type="text" name="txtimage" id="txtimage" placeholder="Ingrese la url del producto" required/> 
                            <input class="btn btn-success float-right" type="submit" value="Guardar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php 
            if(isset($_POST["txtname"])){
                $product->updateProduct();
            }
        ?>

        <!-- Botón para agregar un nuevo producto -->
        <button class="btn btn-success mt-5 float-right" data-toggle="modal" data-target="#modalProduct">Agregar producto</button>

        <?php 
            if(isset($_POST["txtimage"])){
                $product->insertProduct();
            }
        ?>

    </div>
  <script type="text/javascript" src="../js/jquery-3.2.1.slim.min.js"></script>
  <script type="text/javascript" src="../js/popper.min.js"></script>
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>

  <script>
        function showuser(id_user,name ,phone, email, adderess){
            $("#idUser").val(id_user);
            $("#txtname").val(name);
            $("#txtphone").val(phone);
            $("#txtemail").val(email);
            $("#txtaddress").val(adderess);

            $("#modalEditarClient").modal("show")
        }

        function showProduct(id_product, name, descripcion, price, quantity, fk_category, imagen){
            $("#txtproduct").val(id_product);
            $("#txtname").val(name);
            $("#txtdescripcion").val(descripcion);
            $("#txtprecio").val(price);
            $("#txtexistencia").val(quantity);
            $("#txtcategory").val(fk_category);
            $("#txtimage").val(imagen);

            $("#modalProduct").modal("show")
        }
  </script>
</body>
</html>