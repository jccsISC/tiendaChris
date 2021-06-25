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
                $statement = $this->conn->prepare('INSERT INTO tbl_detail_sale(price, quantity, paid, fk_product, fk_user)'
                        . 'VALUES(:price, :quantity, 0, :idproduct, :iduser)');
                $statement->bindParam(":price", $_POST["txtprice"]);
                $statement->bindParam(":quantity", $_POST["txtquantity"]);
                $statement->bindParam(":idproduct", $_POST["idproduct"]);
                $statement->bindParam(":iduser", $_SESSION["idUser"]);
                $statement->execute();
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Producto agregado al carrito</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            } catch(PDOException $e) {
                echo "<p class='alert alert-danger'>" . $e->getMessage() . "</p>";
            }
            unset($_POST["txtprice"]);
            unset($_POST["txtquantity"]);
            unset($_POST["idproduct"]);
            $_SESSION["redirect"] = 1;
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
            echo '<div class="card mr-5 mt-3" style="height:370px">
                <h1>' . $name . '</h1>
                <div>
                    <img src="'. $imagen .'" alt="150px" width="250px" height="130px">
                </div>
                <label class="card-text mt-5" >' . $descripcion . ' <strong>$'. $price .' / KG</strong></label>
                <span>Disponible: '. number_format($quantity, 2, ".", "") .' Kg</span>
                <div class="row ml-4">
                    <div class="mt-3">
                        <form method="POST">
                            <input name="idproduct" type="hidden" value="'. $id_product .'"></input>
                            <input name="txtprice" type="hidden" value="'. $price .'"></input>
                            <div class="row">
                                <div class="col">
                                  <input name="txtquantity" class="form-control" style="width: 150px; " type="number" placeholder="0.0kg" step="0.001" min="0.1" max="'. number_format($quantity, 2, ".", "") .'" required>
                                </div>
                                <div class="col mt-1">
                                  <input class="btn btn-primary btn-sm" type="submit" value="Agregar">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>';
        }

        function getHistorial(){
            try {
                $sql = 'SELECT * FROM tbl_detail_sale WHERE fk_user = ' . $_SESSION["idUser"] . ' && paid = 1';
                foreach($this->conn->query($sql) as $row){
                    extract($row);
                    echo '<td>'. $fk_user .'</td>'
                        .'<td>'. $price .'</td>'
                        .'<td>'. $quantity .'</td>'
                        .'<td>'. ($price * $quantity) .'</td>';
                }
            } catch(PDOException $e) {
                echo "<p class='alert alert-danger'>" . $e->getMessage() . "</p>";
            }
        }

        function getCar(){
            try {
                $sql = 'SELECT p.name, d.quantity, d.price, d.fk_product FROM tbl_detail_sale AS d
                        INNER JOIN tbl_products AS p ON (d.fk_product = p.id_product)
                        WHERE fk_user = ' . $_SESSION['idUser'] . ' AND paid = 0';
                foreach($this->conn->query($sql) as $row){
                    extract($row);
                    echo '<tr><td>'. $name .'</td>'
                        .'<td>'. $price .'</td>'
                        .'<td>'. $quantity .'</td>'
                        .'<td>'. number_format(($price * $quantity), 2, '.', '') .'</td>'
                        .'<td><a class="btn btn-danger" onclick="deleteCar(' . $fk_product . ')" style="color: white;">Borrar</a></td></tr>';
                }
            } catch(PDOException $e) {
                echo "<p class='alert alert-danger'>" . $e->getMessage() . "</p>";
            }
        }

        function getTotalCar(){
            try {
                $sql = 'SELECT ROUND(SUM(quantity * price), 2) AS total FROM tbl_detail_sale
                        WHERE fk_user = ' . $_SESSION['idUser'] . ' AND paid = 0';
                foreach($this->conn->query($sql) as $row){
                    extract($row);
                    echo '<label for="Name">Total: $'. $total .'</label>';
                }
            } catch(PDOException $e) {
                echo "<p class='alert alert-danger'>" . $e->getMessage() . "</p>";
            }
        }

        function deleteFromCar($id){
            try {
                $sql = 'DELETE FROM tbl_detail_sale WHERE paid = 0 AND fk_user = '. $_SESSION['idUser'] .' AND fk_product = ' . $id;
                echo $sql;
                $this->conn->exec($sql);
            } catch(PDOException $e) {
                echo "<p class='alert alert-danger'>" . $e->getMessage() . "</p>";
            }
        }
    }
?>