<?php 
    include('config/constants.php');

    //destroy the session 
    session_destroy();

    //redirect to login page
    header('location:'.SITEURL.'index.php');
?>