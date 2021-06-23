<?php 
    class Users{
        public $conn = "";
        function __construct(){
            include_once 'Connection.php';
            $conection = new Connection();
            $this->conn = $conection->getConnection();
        }

        function registerUser(){
            try {
                $sql = 'INSERT INTO tbl_user (name, admin, password, phone, address, email)
                VALUES ("' . $_POST['txtname'] . '", 0,"' . $_POST['txtpws'] . '","' . $_POST['txtphone'] . '","' . $_POST['txtaddress'] . '","' . $_POST['txtemail'] . '") ';
                $this->conn->exec($sql);
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Registro Exitoso</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            } catch(PDOException $e) {
                echo "<p class='alert alert-danger'>" . $sql . $e->getMessage() . "</p>";
            }
        }

        function showUser(){
            $td = "</td><td>";
            $sql = 'SELECT * FROM tbl_user WHERE admin = 0';
            foreach($this->conn->query($sql) as $row){
               extract($row);
               $parameters = "'$id_user','$name','$phone','$email','$address'";
                echo '<tr id="detailUser" data-toggle="modal" onclick="showuser('.$parameters.')">
                        <td>'. $id_user .$td. $name .$td.$phone .$td. $email .$td. $address .'</td>
                </tr>';
            }
        }

        function updatePassword(){
            try {
                $sql = 'UPDATE tbl_user SET password = '. $_POST["txtpassword"] .' WHERE id_user = '. $_POST["txtuser"] .'';

                $this->conn->exec($sql);
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Cambio de Contraseña con Exito</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            } catch(PDOException $e) {
                echo "<p class='alert alert-danger'>" . $sql . $e->getMessage() . "</p>";
            }
        }

        function loginUser(){
            $sql = 'SELECT id_user, name, admin FROM tbl_user WHERE email = "' . $_POST["usuario"] .'" && password = "' . $_POST["password"]. '"';
            foreach($this->conn->query($sql) as $row){
                $_SESSION["idUser"] = $row["id_user"];
                $_SESSION["isAdmin"] = $row["admin"];
            }
            echo '<script>window.location.replace("Login.php");</script>';
        }
    }
?>