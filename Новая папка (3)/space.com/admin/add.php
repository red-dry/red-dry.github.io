<?php 

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include "../connect.php";

        if($_POST['form'] == 'tour'){

            $name = $_POST['t_name'];
            $planet = $_POST['t_planet'];
            $shuttle = $_POST['t_shuttle'];
            $fly_day = $_POST['t_fly_days'];
            $on_planet = $_POST['t_on_planet'];
            $desc = $_POST['t_description'];
            $usd = $_POST['t_usd'];
            $image = $_POST['t_image'];


            mysql_query("INSERT INTO tour(tour_name, planet_name, shuttle_name, tour_fly_days, tour_days_on_planet, tour_description, tour_usd, tour_image) VALUES (
                '".$name."',
                '".$planet."',
                '".$shuttle."',
                '".$fly_day."',
                '".$on_planet."',
                '".$desc."',
                '".$usd."',
                '".$image."'
            )", $link);  

            echo mysql_errno($link) . ": " . mysql_error($link). "\n";
        } else if($_POST['form'] == 'planet'){
            $name = $_POST['p_name'];
            $dist = $_POST['p_distance'];
            $radius = $_POST['p_radius'];
            $desc = $_POST['p_desc'];
            $surname = $_POST['p_surname'];
            $fact = $_POST['p_fact'];

            mysql_query("INSERT INTO planet(planet_name, planet_distance_mkm, planet_radius, planet_description, planet_surname, planet_fact) VALUES (
                '".$name."',
                '".$dist."',
                '".$radius."',
                '".$desc."',
                '".$surname."',
                '".$fact."'
            )", $link);  
        } else if($_POST['form'] == 'shuttle'){
            $name = $_POST['s_name'];
            $cap = $_POST['s_capacity'];
            $max = $_POST['s_maxdist'];
            $speed = $_POST['s_speed'];
            $class = $_POST['s_class'];
            $usd = $_POST['s_usd'];

            mysql_query("INSERT INTO shattle(shattle_name, shattle_capacity, shattle_maxdist, shuttle_speed, shattle_class, shattle_usd) VALUES (
                '".$name."',
                '".$cap."',
                '".$max."',
                '".$speed."',
                '".$class."',
                '".$usd."'
            )", $link);  
        }

    }
    
?>