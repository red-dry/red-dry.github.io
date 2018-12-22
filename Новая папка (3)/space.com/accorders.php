<?php 
    include "connect.php";
    session_start();
?>

<?php
        $id = $_SESSION['auth_id'];

        $order = mysql_query("SELECT order_date, tour_name, order_cost FROM space_trip.order WHERE client_id = $id ", $link);    
        $data = array();
        

        if ( mysql_num_rows($order) > 0 ){

            while($row = mysql_fetch_assoc($order)){
                $data[] = $row;
            }
            echo json_encode($data);
        }else{
            echo 'null';
        }
        
?>