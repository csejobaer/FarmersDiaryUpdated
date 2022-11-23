<?php 
require_once('database.php');
session_start();
$ajaxData = new DatabaseConnection();
$product_id = $_POST['id'];
$ajaxData->query_execute("DELETE FROM prodcut_details WHERE product_id = '$product_id'");
$ajaxData->query_execute("DELETE  FROM products WHERE product_id='$product_id'");