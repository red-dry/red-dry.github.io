<?php 
    include "connect.php";
    session_start();
?>

<?php
        $id = $_SESSION['auth_id'];

        $client = mysql_query("SELECT * FROM client WHERE client_id = $id ", $link);    
        $data = array();

        if ( mysql_num_rows($client) > 0 ){

            while($row = mysql_fetch_assoc($client)){
                $data[] = $row;
            }
        }   
        echo json_encode($data);
?>