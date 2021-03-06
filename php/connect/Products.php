<?php 
    class Products{
        public $conn = "";
        function __construct(){
            include_once 'Connection.php';
            $conection = new Connection();
            $this->conn = $conection->getConnection();
        }

        function insertProduct(){            
            try {
                $sql = 'INSERT INTO tbl_products(name, descripcion, price, quantity, fk_category, imagen)
                VALUES ("' . $_POST['txtname'] . '","' . $_POST['txtdescripcion'] . '","' . $_POST['txtprecio'] . '","' . $_POST['txtexistencia'] . '","' . $_POST['txtcategory'] . '","' . $_POST['txtimage'] . '")';
                $this->conn->exec($sql);
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Registro Exitoso</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            } catch(PDOException $e) {
                echo "<p class='alert alert-danger'>" . $sql . $e->getMessage() . "</p>";
            }
        }

        function getProducts(){
            $sql = 'SELECT * FROM tbl_products';
            foreach($this->conn->query($sql) as $row){
                $this->bindProducts($row);
            }
        }

        function getProductosClient() {
            $sql = 'SELECT * FROM tbl_products';
            foreach($this->conn->query($sql) as $row) {
                $this->bindProductsClient($row);
            }
        }

        function bindProducts($row){
            extract($row);
            $parameters = "'$id_product','$name','$descripcion','$price','$quantity','$fk_category','$imagen'";
            echo '<div class="card mr-5 mt-3" onclick="editProduct('. $parameters .')">
                <h1>' . $name . '</h1>
                <div>
                    <img src="'. $imagen .'" alt="150px" width="250px">
                </div>
                <label class="card-text mt-5" >' . $descripcion . ' <strong>$'. $price .' / KG</strong></label>
                <label class="card-text" >Disponible <strong>'. $quantity .' / KG</strong></label>
            </div>';
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

        function showSales(){
            $td = "</td><td>";
            $sql = 'SELECT * FROM tbl_sale WHERE id_sale = '. $_POST["txtidsale"] .'';
            foreach($this->conn->query($sql) as $row){
               extract($row);
               $parameters = "'$id_sale','$date','$total','$fk_user','$paid'";
                echo '<tr id="detailCompras" data-toggle="modal" onclick="showCompras('.$parameters.')">
                        <td>'. $id_sale .$td. $date .$td.$total .$td. $fk_user .$td. $paid .'</td>
                </tr>';
            }
        }
        
        function updateProduct(){
            try {
                $statement = $this->conn->prepare('UPDATE tbl_products SET name = :name, descripcion = :descripcion, price = :price, quantity = :quantity, fk_category = :idcat, imagen = :imagen WHERE id_product = :idproduct');
                $statement->bindParam(":name", $_POST["txtname"]);
                $statement->bindParam(":descripcion", $_POST["txtdescripcion"]);
                $statement->bindParam(":price", $_POST["txtprecio"]);
                $statement->bindParam(":quantity", $_POST["txtexistencia"]);
                $statement->bindParam(":idcat", $_POST["txtcategory"]);
                $statement->bindParam(":imagen", $_POST["txtimage"]);
                $statement->bindParam(":idproduct", $_POST["idproduct"]);
                $statement->execute();
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Producto Actualizado con Exito</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            } catch(PDOException $e) {
                echo "<p class='alert alert-danger'>" . $e->getMessage() . "</p>";
            }
        }

        function getCategory(){
            $sql = 'SELECT id_category, name FROM tbl_category';
            foreach($this->conn->query($sql) as $row){
                extract($row);
                echo '<option value="' . $id_category . '">' . $name . '</option>';
            }
        }

        function getHistorial(){
            try {
                $sql = 'SELECT p.name as name, d.quantity, d.price FROM tbl_detail_sale AS d INNER JOIN tbl_products AS p ON (p.id_product = d.fk_product)';
                foreach($this->conn->query($sql) as $row){
                    extract($row);
                    echo '<tr><td>'. $name .'</td>'
                        .'<td>'. $quantity .'</td>'
                        .'<td>$'. $price .'</td>'
                        .'<td>$'. ($price * $quantity) .'</td></tr>';
                }
            } catch(PDOException $e) {
                echo "<p class='alert alert-danger'>" . $e->getMessage() . "</p>";
            }
        }
    }
?>