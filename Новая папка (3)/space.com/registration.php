<?php 

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include "connect.php";

        $login = $_POST['login-up'];
        $name = $_POST['name'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password-up'];

        mysql_query("INSERT INTO client(client_login, client_name, client_lastname, client_email, client_password) VALUES (
            '".$login."',
            '".$name."',
            '".$lastname."',
            '".$email."',
            '".$password."'
        )", $link);  
    }
    
?>