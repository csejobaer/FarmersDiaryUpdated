<?php
  session_start();  
  include_once '../class.php'; 
  include_once '../database.php';

  if (!isset($_SESSION["id"])) {
    header("location:login.php");  
} 

$database = new DatabaseConnection();

$id = $_POST['reminder_id'];


$database->query_execute("DELETE FROM reminder WHERE id = '$id'");


