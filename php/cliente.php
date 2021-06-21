<?php 
    session_start();
    if(!isset($_SESSION["idUser"])){
        header("Location: Login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cliente</title>
    
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
                    <li><a href="#" type="button">Frutas</a></li>
                    <li><a href="#" type="button">Verduras</a></li>
                    <li><a href="#" type="button">Cereales</a></li> 
                    <li><a href="#" type="button" data-toggle="modal" data-target="#modalHistorial">Historial</a></li>  
                    <li><a id="close" href="Login.php" type="button">Cerrar sesión</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="container pt-5">

         <!-- Cards de productos-->
        <div class="row mt-5" style="display: flex; justify-content: center;">
            <div class="card mr-5 mt-3">
                <h1>Berenjena</h1>
                <div>
                    <img src="https://dam.cocinafacil.com.mx/wp-content/uploads/2018/03/propiedades-de-la-berenjena.jpg" alt="150px" width="250px">
                </div>

                <label class="card-text mt-5" >Fresquesita la berenjena a solo <strong>$25 KG</strong></label>

                <div class="row">
                    <div>
                        <input class="form-control mt-4 ml-4" style="width: 150px;" type="number" placeholder="0.0kg">
                        <button class="btn btn-primary btn-sm float-right myButton ">Agregar</button>
                    </div>
                </div>
                    
            </div>
            <div class="card mr-5 mt-3">
                <h1>Berenjena</h1>
                <div>
                    <img src="https://dam.cocinafacil.com.mx/wp-content/uploads/2018/03/propiedades-de-la-berenjena.jpg" alt="150px" width="250px">
                </div>

                <label class="card-text mt-5" >Fresquesita la berenjena a solo <strong>$25 KG</strong></label>

                <div class="row">
                    <div>
                        <input class="form-control mt-4 ml-4" style="width: 150px;" type="number" placeholder="0.0kg">
                        <button class="btn btn-primary btn-sm float-right myButton ">Agregar</button>
                    </div>
                </div>
                    
            </div>
            <div class="card mr-5 mt-3">
                <h1>Berenjena</h1>
                <div>
                    <img src="https://dam.cocinafacil.com.mx/wp-content/uploads/2018/03/propiedades-de-la-berenjena.jpg" alt="150px" width="250px">
                </div>

                <label class="card-text mt-5" >Fresquesita la berenjena a solo <strong>$25 KG</strong></label>

                <div class="row">
                    <div>
                        <input class="form-control mt-4 ml-4" style="width: 150px;" type="number" placeholder="0.0kg">
                        <button class="btn btn-primary btn-sm float-right myButton ">Agregar</button>
                    </div>
                </div>
                    
            </div>
        </div>
        
         <!-- Modal para ver la lista de productos-->
        <div class="modal fade" id="modalProductos" tabindex="-1" role="dialog" aria-hidden="true" >
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="text-center">
                    <label class="p-0 mt-2">Lista de productos</label>
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
                                <th scope="col">Precio por kg</th>
                                <th scope="col">Categoría</th>
                                <th scope="col">Existencia</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr data-toggle="modal" data-target="#modalProduct">
                                <td>1</td>
                                <td>Manzana</td>
                                <td>$45.50</td>
                                <td>Frutas</td>
                                <td>200 kg</td>    
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
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
                            <tr data-toggle="modal" data-target="#modalEditarClient">
                                <td>1</td>
                                <td>Julio Cesar Camacho Silva</td>
                                <td>4531260729</td>
                                <td>silva.jc@hotmail.com</td>
                                <td>PV San Clemente de lima #45  CP 562135</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
        </div>

        <!-- Modal para ver historial de las compras cliente-->
        <div class="modal fade" id="modalHistorial" tabindex="-1" role="dialog" aria-hidden="true" >
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="text-center">
                    <label class="p-0 mt-2">Historial de mis compras</label>
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
                                <th scope="col">Fecha</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr data-toggle="modal" data-target="#modalDetalles">
                                <td>1</td>
                                <td>02-06-2021</td>
                                <td>$350.70</td>
                           
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
        </div>

        <!-- Modal para ver detalles de la compra-->
        <div class="modal fade" id="modalDetalles" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="text-center">
                        <label class="p-0 mt-2" id="modalListaModalCenterTitle">Detalle de la compra</label>
                        <button type="button" class="close float-right m-2" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span> 
                        </button>
                        <hr class="m-0 p-0">
                    </div>
                    <div class="modal-body">
                        <table class="table table-hover table-sm table-bordered tableList">
                            <thead>
                                <tr>
                                    <th scope="col">N</th>
                                    <th scope="col">KG</th>
                                    <th scope="col">PRECIO</th>
                                    <th scope="col">PRODUCTO</th>
                                </tr>
                            </thead>
                            <tbody> 
                                <tr>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>$45.50</td>
                                    <td>Manzana</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>$45.50</td>
                                    <td>Manzana</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>$45.50</td>
                                    <td>Manzana</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>$45.50</td>
                                    <td>Manzana</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>$45.50</td>
                                    <td>Manzana</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="text-center">
                            <label><strong>Total: $45.50</strong></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal para modificar datos del cliente -->
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
                        <form style="margin: auto;">
                            <input class="form-control mb-2" disabled type="text" name="txtname" placeholder="Ingrese su nombre" /> 
                            <input class="form-control  mb-2" disabled type="number" name="txtphone" placeholder="Ingrese su telefóno" /> 
                            <input class="form-control  mb-2" disabled type="text" name="txtemail" placeholder="Ingrese su correo" /> 
                            <input class="form-control  mb-2" disabled type="text" name="txtaddress" placeholder="Ingrese su dirección" /> 
                            <input class="form-control  mb-2" type="text" name="txtaddress" placeholder="Cambiar contraseña" /> 
                            <input class="btn btn-success float-right" type="submit" value="Guardar">
                        </form>
                    </div>
                </div>
            </div>
        </div>

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
                        <form style="margin: auto;">
                            <input class="form-control mb-2" type="text" name="txtname" placeholder="Ingrese el nombre del producto" /> 
                            <input class="form-control  mb-2" type="number" name="txtprecio" placeholder="Ingrese el precio por kg" /> 
                            <select class="form-control form-select mb-2" aria-label="Default select example">
                                <option selected>Seleccione la categoria</option>
                                <option value="1">Frutas</option>
                                <option value="2">Verduras</option>
                                <option value="3">Cereales</option>
                              </select>
                            <input class="form-control  mb-2" type="number" name="txtexistencia" placeholder="Existencia en kg" /> 
                            <input class="btn btn-success float-right" type="submit" value="Guardar">
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- Botón para ver la lista de compras -->
        <button class="btn btn-success mt-5" data-toggle="modal" data-target="#modalProduct">Add product</button>
        <!-- Botón para ver la lista de compras -->
        <button class="btn btn-success mt-5 float-right" data-toggle="modal" data-target="#modalLista">Open list</button>

        <!-- Modal para ver la lista de compras -->
        <div class="modal fade" id="modalLista" tabindex="-1" role="dialog" aria-hidden="true">
            <div id="myModal3" class="modal-dialog modal-md modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="text-center">
                        <label class="p-0 mt-2" id="modalListaModalCenterTitle">Lista de compras</label>
                        <button type="button" class="close float-right m-2" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span> 
                        </button>
                        <hr class="m-0 p-0">
                    </div>
                    <div class="modal-body">
                            <table class="table table-hover table-sm table-bordered tableList">
                                <thead>
                                    <tr>
                                        <th scope="col">N</th>
                                        <th scope="col">KG</th>
                                        <th scope="col">PRECIO</th>
                                        <th scope="col">PRODUCTO</th>
                                        <th scope="col">TOTAL</th>
                                        <th scope="col">QUITAR</th>
                                    </tr>
                                </thead>
                                <tbody> 
                                    <tr>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>$45.50</td>
                                        <td>Manzana</td>
                                        <td>$45</td>
                                        <td>
                                            <BUtton class="btn btn-danger btn-sm">EL</BUtton>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>$45.50</td>
                                        <td>Manzana</td>
                                        <td>$45</td>
                                        <td>
                                            <BUtton class="btn btn-danger btn-sm">EL</BUtton>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>$45.50</td>
                                        <td>Manzana</td>
                                        <td>$45</td>
                                        <td>
                                            <BUtton class="btn btn-danger btn-sm">EL</BUtton>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>$45.50</td>
                                        <td>Manzana</td>
                                        <td>$45</td>
                                        <td>
                                            <BUtton class="btn btn-danger btn-sm">EL</BUtton>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>$45.50</td>
                                        <td>Manzana</td>
                                        <td>$45</td>
                                        <td>
                                            <BUtton class="btn btn-danger btn-sm">EL</BUtton>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>$45.50</td>
                                        <td>Manzana</td>
                                        <td>$45</td>
                                        <td>
                                            <BUtton class="btn btn-danger btn-sm">EL</BUtton>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>$45.50</td>
                                        <td>Manzana</td>
                                        <td>$45</td>
                                        <td>
                                            <BUtton class="btn btn-danger btn-sm">EL</BUtton>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    <div class="modal-footer">
                        <label for=""></label>
                        <label for="Name">Total: $45.50</label>
                    <button type="button" class="btn btn-primary">Pagar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <script type="text/javascript" src="../js/jquery-3.2.1.slim.min.js"></script>
  <script type="text/javascript" src="../js/popper.min.js"></script>
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>
  <script>
      $("#close").on("click", function(){
        $.ajax({
        url: "closeSession.php",
        context: document.body
        }).done(function() {
            
        });
      });
  </script>
</body>
</html>