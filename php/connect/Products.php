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

        function bindProducts($row){
            extract($row);
            echo '<div class="card mr-5 mt-3">
                <h1>' . $name . '</h1>
                <div>
                    <img src="'. $imagen .'" alt="150px" width="250px">
                </div>
                <label class="card-text mt-5" >' . $descripcion . ' <strong>$'. $price .' / KG</strong></label>
                <label class="card-text" >Disponible <strong>'. $quantity .' / KG</strong></label>
            </div>';
        }

        
        function updateProduct(){
            try {
                $id_product = $_POST['id_product'];
                $sql = "SELECT * FROM tbl_products WHERE id_product ='".$id_product."'";
                
                $this->conn->exec($sql);
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Cambio de Contraseña con Exito</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            } catch(PDOException $e) {
                echo "<p class='alert alert-danger'>" . $sql . $e->getMessage() . "</p>";
            }
        }

        function getCategory(){
            $sql = 'SELECT id_category, name FROM tbl_category';
            foreach($this->conn->query($sql) as $row){
                extract($row);
                echo '<option value="' . $id_category . '">' . $name . '</option>';
            }
        }
    }
?>