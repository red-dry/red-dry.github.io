<?php

    include("../connect.php");

    $id = $_GET['id'];
    if($_GET['form'] == 'tour'){
        mysql_query("DELETE FROM tour WHERE tour_id = $id", $link); 
    } else if($_GET['form'] == 'planet'){
        mysql_query("DELETE FROM planet WHERE planet_id = $id", $link); 
    } else if($_GET['form'] == 'shuttle'){
        mysql_query("DELETE FROM shattle WHERE shattle_id = $id", $link); 
    } else if($_GET['form'] == 'order'){
        mysql_query("DELETE FROM space_trip.order WHERE order_id = $id", $link); 
    }
      

    echo mysql_errno($link) . ": " . mysql_error($link). "\n";
?>