<?php 
	session_start();
    include("../connect.php");

    $tours = mysql_query("SELECT * FROM tour", $link);  
    $planets = mysql_query("SELECT * FROM planet", $link);   
    $shuttle = mysql_query("SELECT * FROM shattle", $link); 
    $order = mysql_query("SELECT * FROM space_trip.order", $link);   
?>

<!DOCTYPE html>
<html lang="ru">
<head>

	<meta charset="utf-8">

	<title>admin</title>
	<meta name="description" content="">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<meta property="og:image" content="path/to/image.jpg">
	<link rel="icon" type="image/png" href="img/fav.png" sizes="160x160">

	<meta name="theme-color" content="#000"><!-- Chrome, Firefox OS and Opera -->
	<meta name="msapplication-navbutton-color" content="#000"><!-- Windows Phone -->
	<meta name="apple-mobile-web-app-status-bar-style" content="#000">	<!-- iOS Safari -->

</head>
<body class="admin-bcg " >

    <section class="tours">
            
        <table class='tour-list clearfix' style=''>
            <caption class='title'>tours</caption>
            <tr class='col-title'>
                <th class='id' >id</th>
                <th class='name' >name</th>
                <th class='planet' >planet</th>
                <th class='shuttle' >shuttle</th>
                <th class='fly days' >fly days</th>
                <th class='on planet' >on planet</th>
                <th class='description' >description</th>
                <th class='usd' >usd</th>
                <th class='image' >image</th>
            </tr>

            <?php
                $tour_id = 0;
                while($row = mysql_fetch_assoc($tours)){
                    $tour_id++;
                    echo  "
                        <tr class='tour-item' id=".$row['tour_id']." >
                            <th class='id' >".$row['tour_id']."</th>
                            <th class='name' >".$row['tour_name']."</th>
                            <th class='planet' >".$row['planet_name']."</th>
                            <th class='shuttle' >".$row['shuttle_name']."</th>
                            <th class='fly days' >".$row['tour_fly_days']."</th>
                            <th class='on planet' >".$row['tour_days_on_planet']."</th>
                            <th class='description' >".substr($row['tour_description'], 0, 13)."..</th>
                            <th class='usd' >".$row['tour_usd']."</th>
                            <th class='image' >".$row['tour_image']."</th>
                        </tr>
                        ";
                    }

            ?>
		</table>
        <form class="tour-form clearfix" action="add.php" method="POST">
            <input type="text" name="t_name" autocomplete="off">
            <input type="text" name="t_planet" autocomplete="off">
            <input type="text" name="t_shuttle" autocomplete="off">
            <input type="text" name="t_fly_days" autocomplete="off">
            <input type="text" name="t_on_planet" autocomplete="off">
            <input type="text" name="t_description" autocomplete="off">
            <input type="text" name="t_usd" autocomplete="off">
            <input type="text" name="t_image" autocomplete="off">
            <input type="text" name="form" style="display: none;" value="tour">
            <button>add</button>
        </form>
        <button class="tour-delete"><a href="">delete</a></button>
    </section>

    <section class="planets">
        <table class='planet-list clearfix' style=''>
            <caption class='title'>planets</caption>
            <tr class='col-title'>
                <th class='' >id</th>
                <th class='' >name</th>
                <th class='' >distance mkm</th>
                <th class='' >radius</th>
                <th class='' >description</th>
                <th class='' >surname</th>
                <th class='' >fact</th>
            </tr>

            <?php
                
                while($row = mysql_fetch_assoc($planets)){
                    
                    echo  "
                        <tr class='planet-item' id=".$row['planet_id']." >
                            <th class='' >".$row['planet_id']."</th>
                            <th class='' >".$row['planet_name']."</th>
                            <th class='' >".$row['planet_distance_mkm']."</th>
                            <th class='' >".$row['planet_radius']."</th>
                            <th class='' >".substr($row['planet_description'], 0, 13)."..</th>
                            <th class='' >".$row['planet_surname']."</th>
                            <th class='' >".$row['planet_fact']."</th>
                        </tr>
                        ";
                    }

            ?>
		</table>
        <form class="planet-form clearfix" action="add.php" method="POST">
            <input type="text" name="p_name" autocomplete="off">
            <input type="text" name="p_distance" autocomplete="off">
            <input type="text" name="p_radius" autocomplete="off">
            <input type="text" name="p_desc" autocomplete="off">
            <input type="text" name="p_surname" autocomplete="off">
            <input type="text" name="p_fact" autocomplete="off">
            <input type="text" name="form" style="display: none;" value="planet">
            <button>add</button>
        </form>
        <button class="planet-delete"><a href="">delete</a></button>     
    </section>

    <section class="shuttle">
        <table class='shuttle-list clearfix' style=''>
            <caption class='title'>shuttles</caption>
            <tr class='col-title'>
                <th class='' >id</th>
                <th class='' >name</th>
                <th class='' >capacity</th>
                <th class='' >max dist</th>
                <th class='' >speed</th>
                <th class='' >class</th>
                <th class='' >usd</th>
            </tr>

            <?php
                
                while($row = mysql_fetch_assoc($shuttle)){
                    
                    echo  "
                        <tr class='shuttle-item' id=".$row['shattle_id']." >
                            <th class='' >".$row['shattle_id']."</th>
                            <th class='' >".$row['shattle_name']."</th>
                            <th class='' >".$row['shattle_capacity']."</th>
                            <th class='' >".$row['shattle_maxdist']."</th>
                            <th class='' >".$row['shuttle_speed']."</th>
                            <th class='' >".$row['shattle_class']."</th>
                            <th class='' >".$row['shattle_usd']."</th>
                        </tr>
                        ";
                    }

            ?>
		</table>
        <form class="shuttle-form clearfix" action="add.php" method="POST">
            <input type="text" name="s_name" autocomplete="off">
            <input type="text" name="s_capacity" autocomplete="off">
            <input type="text" name="s_maxdist" autocomplete="off">
            <input type="text" name="s_speed" autocomplete="off">
            <input type="text" name="s_class" autocomplete="off">
            <input type="text" name="s_usd" autocomplete="off">
            <input type="text" name="form" style="display: none;" value="shuttle">
            <button>add</button>
        </form>
        <button class="shuttle-delete"><a href="">delete</a></button>     
    </section>

    <section class="orders-a">
        <table class='order-list-a clearfix' style=''>
            <caption class='title'>orders</caption>
            <tr class='col-title'>
                <th class='' >id</th>
                <th class='' >date</th>
                <th class='' >time</th>
                <th class='' >cost</th>
                <th class='' >tour name</th>
                <th class='' >client id</th>
            </tr>

            <?php
                
                while($row = mysql_fetch_assoc($order)){
                    
                    echo  "
                        <tr class='order-item-a' id=".$row['order_id']." >
                            <th class='' >".$row['order_id']."</th>
                            <th class='' >".$row['order_date']."</th>
                            <th class='' >".$row['order_time']."</th>
                            <th class='' >".$row['order_cost']."</th>
                            <th class='' >".$row['tour_name']."</th>
                            <th class='' >".$row['client_id']."</th>
                        </tr>
                        ";
                    }
            ?>
        </table>
        <button class="order-delete-a"><a href="">delete</a></button>  
    </section>

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/style.min.css">
	<script src="../js/scripts.min.js"></script>
</body>
</html>