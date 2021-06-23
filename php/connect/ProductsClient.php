<?php 
    class ProductsClient{
        public $conn = "";
        function __construct(){
            include_once 'Connection.php';
            $conection = new Connection();
            $this->conn = $conection->getConnection();
        }

        function addProduct(){            
            try {
                $sql = 'INSERT INTO tbl_products(name, descripcion, price, quantity, fk_category, imagen)
                VALUES ("' . $_POST['txtname'] . '","' . $_POST['txtdescripcion'] . '","' . $_POST['txtprecio'] . '","' . $_POST['txtexistencia'] . '","' . $_POST['txtcategory'] . '","' . $_POST['txtimage'] . '")';
                $this->conn->exec($sql);
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Producto agregado</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            } catch(PDOException $e) {
                echo "<p class='alert alert-danger'>" . $e->getMessage() . "</p>";
            }
        }

        function getProductosClient() {
            $sql = 'SELECT * FROM tbl_products';
            foreach($this->conn->query($sql) as $row) {
                $this->bindProductsClient($row);
            }
        }

        function getProductosByCategory() {
            $sql = 'SELECT * FROM tbl_products WHERE fk_category = ' . $_GET["idcat"];
            foreach($this->conn->query($sql) as $row) {
                $this->bindProductsClient($row);
            }
        }

        function bindProductsClient($row){
            extract($row);
            $parameters = "'$id_product','$name','$descripcion','$price','$quantity','$fk_category','$imagen'";
            echo '<div class="card mr-5 mt-3">
                <h1>' . $name . '</h1>
                <div>
                    <img src="'. $imagen .'" alt="150px" width="250px" height="130px">
                </div>
                <label class="card-text mt-5" >' . $descripcion . ' <strong>$'. $price .' / KG</strong></label>
                <div class="row">
                    <div>
                        <input id="cantidad" class="form-control mt-4 ml-4" style="width: 150px; " type="number" placeholder="0.0kg">
                        <button class="btn btn-primary btn-sm float-right myButton ">Agregar</button>
                    </div>
                </div>
            </div>';
        }

        function getHistorial(){
            try {
                $sql = 'SELECT * FROM tbl_sale WHERE fk_user = ' . $_SESSION["idUser"];
                foreach($this->conn->query($sql) as $row){
                    extract($row);
                    echo '';
                }
            } catch(PDOException $e) {
                echo "<p class='alert alert-danger'>" . $e->getMessage() . "</p>";
            }
        }
    }
?>