<?php 
date_default_timezone_set('UTC');
include("connect.php");
session_start();

$date = date('o-m-d');
$time = date("H:i:s");   
$tour =  $_GET['tourId'];
$client = $_GET['clientId'];
$tourName =  $_GET['tourN'];
$tourCost = $_GET['client'];

if($client > 0){
    echo 'auth';
    mysql_query("INSERT INTO space_trip.order(order_date, order_time, order_cost, tour_name, client_id) VALUES('$date', '$time', (SELECT tour_usd FROM tour WHERE tour_id = $tour), (SELECT tour_name FROM tour WHERE tour_id = $tour), '$client')", $link); 
} else{
    echo 'not';
}

?>