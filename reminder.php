<?php
  session_start();  
  include_once 'class.php'; 
  include_once 'database.php';

  $user = new User;  
  $id = $_SESSION['id'];  
  $type = $_SESSION['type'];

  if (!isset($_SESSION["id"])) {
    header("location:login.php");  
} 

$database = new DatabaseConnection();
$farmerObject = new Farmers();
$farmerObject->getFarmersData($id);




?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0">
        <title>Set Reminder - Farmer's Diary</title>
        <meta name="author" content="Themezinho">
        <meta name="description" content="Logistic and Transportation Template">
        <meta name="keywords" content="logistic, transportation, package, delivery, cargo, carousel, post, moving, caring">
        <!-- SOCIAL MEDIA META -->
        <!-- TWITTER BOOTSTRAP and CSS-->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/icofont/icofont.min.css">
        <link rel="stylesheet" href="css/manage-audio.css">
        <!-- Time and date picker css -->
        <!-- Default Theme (Core) -->
        <link rel="stylesheet" href="time_date/lib/themes/default.css">
        <!-- Default Theme (Date Picker) -->
        <link rel="stylesheet" href="time_date/lib/themes/default.date.css">
        <!-- Default Theme (Time Picker If Needed)-->
        <link rel="stylesheet" href="time_date/lib/themes/default.time.css">

        <!-- Classic Theme (Core) -->
        <!-- <link rel="stylesheet" href="time-date/lib/themes/pickadate.classic.css"> -->
        <!-- Classic Theme (Date Picker) -->
        <!-- <link rel="stylesheet" href="time-date/lib/themes/classic.date.css"> -->
        <!-- Classic Theme (Time Picker If Needed)-->
        <!-- <link rel="stylesheet" href="time-date/lib/themes/classic.time.css"> -->

    </head>
    <body style="background:#1b253b;">
        <div class="dashboard">
            <!-- Admin Menu  --> <?php include_once('user-sidebar.php'); ?>
            <!-- Admin Menu  -->
            <div class="content-body">
                <div class="row">
                    <div class="col-xl-12 col-md-12">
                        <!-- admin top   -->
                        <div class="header-top-admin">
                            <div class="breadcrumbs float-left">
                                <ul>
                                    <li>
                                        <a href="">Application</a>
                                    </li>
                                    <span> ></span>
                                    <li>
                                        <a href="">Set Reminder</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="profile-area float-right">
                                <div class="profile-icon">
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <i class="icofont-notification"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="icofont-business-man"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- admin topbar   -->
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="recordOpen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Record your voice</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Record Button -->
                                <div class="audio-record">
                                    <button id="recordButton">
                                        <i class="icofont-radio-mic" style="color: green; font-size: 40px;"></i>
                                    </button>
                                    <button id="stopButton" class="inactive">
                                        <i class="icofont-stop" style="color: red; font-size: 40px;"></i>
                                    </button>
                                </div>
                                <!-- Record download -->
                                <!--     <div class="download"><button class="hidden" id="downloadContainer"><a href="" download="" id="downloadButton">Download Audio</a></button></div> -->
                                <!-- Record Playback -->
                                <div class="playback">
                                    <audio src="" controls id="audio-playback" class="hidden"></audio>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Send</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Deshboard content  -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="content-title">
                            <h2>My <span class="highlight">Reminder</span>
                            </h2>
                            <p>We are here</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Reminder List -->
                    <div class="col-md-6">
                        <div class="reminder-list">

                            <!-- Single alerm -->
                            <div class="single-reminder">
                                <h3>Medicine dite hobe</h3>
                                <ul>
                                    <li><p>Aj sokal noytay uttorer jomite saar dite hobe</p></li>
                                    <li><span style="color: red">12:20PM</span> <span style="color: #fff;">    00:00:00</span></li>
                                    <li><span class="highlight">08 December, 2022</span></li>
                                </ul>
                                <div class="action-reminder text-right">
                                    <button class="btn btn-default">Edit</button>
                                    <button class="btn btn-danger">Delete</button>
                                </div>
                            </div>
                            <!-- Single alerm -->
                            <div id="newReminder"> </div>


                        </div>
                    </div>
                    <!-- Reminder List -->
                    <!-- Reminder additon area -->
                    <div class="col-md-6">


                        <div class="remider-datepicker">
                            <input type="text" placeholder="Title here" name="reminder_title" id="reminder_title" class="form-control" style="width:94%; margin-bottom: 20px;">
                            <input id="exampleDate" class="datepicker" name="date" type="text" value="14 August, 2014" data-value="2014-08-08" />
                            <input id="exampleTime" class="timepicker" type="time" name="time" valuee="2:30 AM" data-value="0:00" />
                            <input type="text" placeholder="Note" name="reminder_details" id="reminder_note" class="form-control" style="width:94%; margin-top: 20px;">
                            <div class="save-btn-reminder" style="text-align: center;">
                                <button class="btn btn-default" style="margin-top: 20px;" id="btn_reminder"> Save Now</button>
                            </div>
                        </div>


                    </div>
                    <!-- /Reminder addition area -->
                    
                </div>
            </div>
            <!-- /Footer  -->
            <script src="js/jquery.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script src="js/popper.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="ajax.js"></script>
            <script type="text/javascript" src="js/manage-audio.js"></script>
            <!-- Date and time picker -->
            <!-- Core -->
            <script src="time_date/lib/picker.js"></script>
            <!-- Date Picker -->
            <script src="time_date/lib/picker.date.js"></script>
            <!-- Time Picker -->
            <script src="time_date/lib/picker.time.js"></script>
            <!-- Required For Legacy Browsers (IE 8-) -->
            <script src="time_date/lib/legacy.js"></script>
            <script src="js/main.js"></script>
            <!-- Time and date -->
            <script type="text/javascript">
                // date picker

                // date picker
                $('.datepicker').pickadate();

                // time picker
                $('.timepicker').pickatime();



                // Alertm javaScript
                $('#btn_reminder').click(function(){
                    var title = $('#reminder_title').val();
                    var date = $('.datepicker').val();
                    var time = $('.timepicker').val();
                    var note = $('#reminder_note').val();
                    let arr = [];
                    var htmlData = '<div class="single-reminder"><h3>'+title+'</h3><ul><li><p>'+note+'</p></li><li><span style="color: red">'+time+'</span> <span style="color: #fff;">    00:00:00</span></li><li><span class="highlight">'+date+'</span></li></ul><div class="action-reminder text-right"><button class="btn btn-default">Edit</button><button class="btn btn-danger">Delete</button></div></div>';

                    var count = Math.floor(Math.random() * 100);
                    if(title == ''){
                        arr.push(1);
                    }else if(note == ''){
                        arr.push(1);
                    }
                    if (arr.length == 0) {
                        $('#newReminder').html(htmlData);
                    }

                });

            </script>






    </body>
</html>