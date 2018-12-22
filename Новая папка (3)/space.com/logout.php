<?php 

if( $_SERVER["REQUEST_METHOD"] == "POST" ){
    session_start();
    unset($_SESSION['auth']);
    unset($_SESSION['auth_id']);
    setcookie('sess', '', 0, '/');
    echo'logout';
}

?>