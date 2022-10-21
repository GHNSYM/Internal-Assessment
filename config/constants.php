<?php

    session_start();
    
    define('SITEURL','http://localhost/lcbweb/');

    //create constant for non-reapeating values
    define('LOCALHOST','localhost:3307');
    define('DB_USERNAME','root');
    define('DB_PASSWORD','');
    define('DB_NAME','internal_assessment');

    $conn=mysqli_connect(LOCALHOST,'root','') or die(mysqli_error());//database connection

    $db_select=mysqli_select_db($conn,'internal_assessment')or die(mysqli_error());//selecting database
    
?>
