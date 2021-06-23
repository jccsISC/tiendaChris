<?php 
    session_start();
    if(!isset($_SESSION["idUser"])){
        header("Location: Login.php");
    }
    include_once 'connect/Products.php';
    $product = new Products(); 
?>
<!DOCTYPE html>
<html lang="es">
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
            <a href="cliente.php"><img class="logo" src="../img/computado.png" alt="logo"></a>

            <nav id="menu">
                <ul>
                    <li><a href="cliente.php" type="button">Home</a></li>
                    <li><a href="#" type="button">Frutas</a></li>
                    <li><a href="#" type="button">Verduras</a></li>
                    <li><a href="#" type="button">Cereales</a></li> 
                    <li><a href="#" type="button" data-toggle="modal" data-target="#modalHistorial">Historial</a></li>  
                    <li><a href="#" id="closeSession" type="button">Cerrar sesión</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="container pt-5">

        <!-- Botón para ver la lista de compras -->
        <button id="verlLista" class="btn btn-success" style="position: fixed; right:5%; bottom: 5%;">Ver lista de compras</button>

         <!-- Cards de productos-->
        <div class="row mt-5" style="display: flex; justify-content: center;">
            <?php 
                $product->getProductosClient();
            ?>
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
                         <!---->
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
                            </tbody>
                        </table>
                        <div class="text-center">
                            <label><strong>Total: $45.50</strong></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
                                            <BUtton class="btn btn-danger btn-sm">Del</BUtton>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>$45.50</td>
                                        <td>Manzana</td>
                                        <td>$45</td>
                                        <td>
                                            <BUtton class="btn btn-danger btn-sm">Del</BUtton>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>$45.50</td>
                                        <td>Manzana</td>
                                        <td>$45</td>
                                        <td>
                                            <BUtton class="btn btn-danger btn-sm">Del</BUtton>
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
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script type="text/javascript" src="../js/popper.min.js"></script>
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>
  
  <script>
       
       //Ver detalles de cada compra
       function showSales(id_sale, date, total, fk_user, paid){
            $("#detailCompras").val(id_sale);
            $("#txtname").val(date);
            $("#txttotal").val(total);
            $("#txtfk_user").val(fk_user);
            $("#txtpaid").val(paid);

            $("#modalHistorial").modal("show")
        }

        //Ver lista de compras del "carrito"
       $("#verlLista").on("click", function(){
            // $("#idproduct").val("");
            // $("#txtnameproduct").val("");
            // $("#txtdescripcion").val("");
            // $("#txtprecio").val("");
            // $("#txtexistencia").val("");
            // $("#txtcategory").val("Seleccione la categoria");
            // $("#txtimage").val("");

            // $("#edit").val("0");
            // $("#modal-title").html("Agregar Producto");
            $("#modalLista").modal("show")
        });
       
        //Close session
       $("#closeSession").on("click", function(){
            $.ajax({
                method: "POST",
                url: "connect/close.php",
                data: { name: "John", location: "Boston" }
            }).done(function( msg ) {
                window.location.replace("Login.php");
            }); 
        });
  </script>
</body>
</html>