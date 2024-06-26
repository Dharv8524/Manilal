<?php 
$pcs = $_GET["pcs"];
$disc = $_GET["disc"];
$pid = $_GET["pid"];
$price = $_GET["price"];
$eno = $_GET["eno"];
include "connection.php";
$obj = new conn();
$obj->add_estimate_product($eno,$pid,$pcs,$disc,$price);
header("Location: estimate_update.php?eno=$eno");
?>