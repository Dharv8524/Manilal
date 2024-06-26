<?php
$eno = $_GET["eno"];
$name = $_GET["name"];

include "connection.php";
$obj = new conn();
$obj->delete_estimate_product($name,$eno);
header("Location: estimate_update.php?eno=$eno");
?>