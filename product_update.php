<?php 
require_once('database.php');
session_start();
$ajaxData = new DatabaseConnection();
$product_id = $_POST['id'];
$productName = $_POST['update_name'];
$update_weight = $_POST['update_weight'];
$update_unit = $_POST['update_unit'];
$vat = $_POST['vat'];
$update_extras = $_POST['update_extras'];
$total = $_POST['total'];



$success = $ajaxData->query_execute("UPDATE prodcut_details SET product_name = '$productName', weight = '$update_weight', unit_price = '$update_unit', vat = '$vat', extra_charge = '$update_extras' WHERE product_details_id = '$product_id'");

