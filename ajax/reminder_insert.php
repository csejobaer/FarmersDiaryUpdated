<?php
  session_start();  
  include_once '../class.php'; 
  include_once '../database.php';

  if (!isset($_SESSION["id"])) {
    header("location:login.php");  
} 

$database = new DatabaseConnection();

$title = $_POST['title'];
$date = $_POST['date'];
$time = $_POST['time'];
$note = $_POST['note'];
$userID = $_POST['userID'];

$database->query_execute("INSERT INTO reminder(title, dates, reminder_time, notes, user_id) values('$title', '$date', '$time', '$note', '$userID')");


