<?php 
    include "connect.php";
    session_start();
?>

<?php
     
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $id = $_SESSION['auth_id'];
        $name = $_POST['acc-name'];
        $lastname = $_POST['acc-lastname'];
        $email = $_POST['acc-email'];
        $number = $_POST['acc-number'];
        $born = $_POST['acc-born'];

        $client = mysql_query("SELECT * FROM client WHERE client_id = $id ", $link);    
        $data = array();

        if ( mysql_num_rows($client) > 0 ){
            $data = mysql_fetch_assoc($client);
        }

        if($data[client_name] != $_POST['acc-name']){
            mysql_query("UPDATE client SET client_name = '$name' WHERE client_id = $id", $link);
        }

        if($data[client_lastname] != $_POST['acc-lastname']){
            mysql_query("UPDATE client SET client_lastname = '$lastname' WHERE client_id = $id", $link);
        } 

        if($data[client_email] != $_POST['acc-email']){
            mysql_query("UPDATE client SET client_email = '$email' WHERE client_id = $id", $link);
        } 

        if($data[client_number] != $_POST['acc-number']){
            mysql_query("UPDATE client SET client_number = $number WHERE client_id = $id", $link);
        } 

        if($data[client_born] != $_POST['acc-born']){
            mysql_query("UPDATE client SET client_born = '$born' WHERE client_id = $id", $link);
        } 
        
    }
    
?>