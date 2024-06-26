<?php
$eno = $_GET["eno"];
$name = $_GET["name"];
$pcs = $_GET["pcs"];
$price = $_GET["price"];
$disc = $_GET["disc"];
$gst = $_GET["gst"];

include "connection.php";
$obj = new conn();
$obj->update_estimate_product($name,$eno,$pcs,$price,$disc,$gst);

header("Location: estimate_update.php?eno=$eno");
?>