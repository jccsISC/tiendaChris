<?php 
    session_start();
    if(!isset($_SESSION["idUser"])){
        header("Location: Login.php");
    }
    include_once 'connect/ProductsClient.php';
    $product = new ProductsClient(); 
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
    <link rel="stylesheet" href="../js/fontawesome.js">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <header>
        <div class="container minavbar">
            <a href="cliente.php"><img class="logo" src="../img/computado.png" alt="logo"></a>
            <nav id="menu">
                <ul>
                    <li><a href="cliente.php" type="button">Home</a></li>
                    <li><a href="cliente.php?idcat=1" type="button">Frutas</a></li>
                    <li><a href="cliente.php?idcat=2" type="button">Verduras</a></li>
                    <li><a href="cliente.php?idcat=3" type="button">Cereales</a></li> 
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
                if(isset($_GET["idcat"])){
                    $product->getProductosByCategory();
                }else{
                    $product->getProductosClient();
                }
            ?>
        </div>

        <?php 
            if(isset($_POST["txtquantity"])){
                $product->addProduct();
            }
        ?>
        
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
                                <th scope="col">Producto</th>
                                <th scope="col">Kg</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $product->getHistorial();
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
        </div>

        <!-- Modal para ver la lista de compras -->
        <div class="modal fade" id="modalLista" tabindex="-1" role="dialog" aria-hidden="true">
            <div id="myModal3" class="modal-dialog modal-md modal-dialog-scrollable" role="document">
                <div class="modal-content" style="height: 490px;">
                    <div class="text-center">
                        <label class="p-0 mt-2" id="modalListaModalCenterTitle">Lista de compras</label>
                        <button type="button" class="close float-right m-2" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span> 
                        </button>
                        <hr class="m-0 p-0">
                    </div>
                    <div class="modal-body" style="overflow-y: auto;">
                            <table class="table table-hover table-sm table-bordered tableList" style="max-height: 350px;">
                                <thead>
                                    <tr>
                                        <th scope="col">PRODUCTO</th>
                                        <th scope="col">KG</th>
                                        <th scope="col">PRECIO</th>
                                        <th scope="col">TOTAL</th>
                                        <th scope="col">QUITAR</th>
                                    </tr>
                                </thead>
                                <tbody> 
                                    <?php $product->getCar(); ?>
                                </tbody>
                            </table>
                        </div>
                    <div class="container">
                        <div class="row mb-3">
                            <div class="col">
                                <label>Total: </label>
                                <?php $product->getTotalCar(); ?>
                            </div>
                            <div class="col">
                                <label>Pago: </label>
                                <input id="efectivo" class="form-control" type="number" placeholder="0.0" required>
                            </div>
                            <div class="col">
                                <label>Cambio: </label>
                                <input id="cambio" disabled class="form-control" type="number" placeholder="0.0" required>
                            </div>
                            <div class="col">
                                <button id="pagar" type="button" class="btn btn-primary" style="margin-top: 33px; width:120px;">Pagar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script type="text/javascript" src="../js/popper.min.js"></script>
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>
  <?php 
        if(isset($_SESSION['redirect'])){
            if($_SESSION["redirect"] == 1){
                $_SESSION["redirect"] = 0;
                echo '<script>window.location.replace("cliente.php")</script>';
            }
        }
        if(isset($_SESSION['delete']))
        {
            if($_SESSION["delete"] == 1){
                $_SESSION["delete"] = 0;
                echo '<script>$("#modalLista").modal("show")</script>';
            }
        }
  ?>
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

        function deleteCar(idprod){
            $.ajax({
                method: "POST",
                url: "connect/deleteFromCar.php",
                data: { idproduct: idprod }
            }).done(function( msg ) {
                window.location.replace("cliente.php");
            }); 
        }

        //Ver lista de compras del "carrito"
       $("#verlLista").on("click", function(){
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

        $("#pagar").on("click", function(){
            const pago = parseInt($("#efectivo").val());
            const total = parseInt($("#totalpagar").val());
            if(pago != 0 && !isNaN(pago)){
                if(pago < total){
                    alert("El pago no es suficiente");
                }else{
                    $.ajax({
                        method: "POST",
                        url: "connect/pay.php",
                        data: { name: "John", location: "Boston" }
                    }).done(function( msg ) {
                        window.location.replace("cliente.php");
                    }); 
                }
            }else{
                alert("Ingresa el monto del pago");
            }
        });

        $("#efectivo").change(function(){
            const pago = parseInt($("#efectivo").val());
            const total = parseInt($("#totalpagar").val());
            if(pago != 0 && !isNaN(pago) && total != 0 && !isNaN(total)){
                const result = pago-total;
                if(result > 0)
                    $("#cambio").val(result);
                else
                $("#cambio").val("0");
            }
        });
  </script>
</body>
</html>