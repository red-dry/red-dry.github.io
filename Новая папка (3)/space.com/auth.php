<?php 

if($_SERVER["REQUEST_METHOD"] == "POST"){
    include "connect.php";

    $login = $_POST['login'];
    $password = $_POST['password'];

    setcookie('sess', $login.'+'.$password, time()+3600*24*31, '/');
     
    $result = mysql_query("SELECT * FROM client WHERE client_login = '$login' AND client_password = '$password'", $link);
    if(mysql_num_rows($result) > 0){
        $item = mysql_fetch_assoc($result);

        session_start();

        $_SESSION['auth'] = 'auth';
        $_SESSION['type'] = 'client';
        $_SESSION['auth_id'] = $item['client_id'];
        $_SESSION['auth_password'] = $item['client_password']; 
        $_SESSION['auth_login'] = $item['client_login'];
        $_SESSION['auth_name'] = $item['client_name'];
        $_SESSION['auth_lastname'] = $item['client_lastname'];
        $_SESSION['auth_number'] = $item['client_number'];
        $_SESSION['auth_email'] = $item['client_email'];
        $_SESSION['auth_born'] = $item['client_born'];
        $_SESSION['auth_orders'] = $item['client_orders'];

        echo 'auth';
    } else{ 
        $result = mysql_query("SELECT * FROM worker WHERE worker_login = '$login' AND worker_password = '$password'", $link);
        if(mysql_num_rows($result) > 0){
            $item = mysql_fetch_assoc($result);

            session_start();

            $_SESSION['auth'] = 'auth';
            $_SESSION['type'] = 'worker';
            $_SESSION['auth_id'] = $item['worker_id'];
            $_SESSION['auth_password'] = $item['worker_password']; 
            $_SESSION['auth_login'] = $item['worker_login'];
            $_SESSION['auth_name'] = $item['worker_name'];
            $_SESSION['auth_lastname'] = $item['worker_lastname'];

            echo 'w-auth'; 
        }
    }
}

?>