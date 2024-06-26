<?php 
$ms = $_GET["ms"];
$add = $_GET["add"];
$no = $_GET["no"];
$date = $_GET["date"];
$fre = $_GET["fre"];

include "connection.php";
$obj = new conn();
$obj->estimate_details_update($no,$ms,$add,$date,$fre);
header("Location: all_estimate.php");
?>