<?php 
    include "connect.php";
?>
<?php
    $tour = mysql_query("SELECT tour_id, tour_name, tour_fly_days, tour_image, planet_distance_mkm FROM tour join planet on tour.planet_name  = planet.planet_name ", $link);    
    $tours = array();

    if ( mysql_num_rows($tour) > 0 ){

        while($row = mysql_fetch_assoc($tour)){
            $tours[] = $row;
        }
    }   

    echo json_encode($tours)
?>