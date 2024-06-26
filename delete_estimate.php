<?php 
$eno = $_GET["eno"];
include "connection.php";
$obj = new conn();
$obj->estimate_delete($eno);
header("Location: all_estimate.php");
?>