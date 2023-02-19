<?php 
    //Authorization- Access Control
    //chedk whether the user is logged in or not
    if(!isset($_SESSION['user2']))//if user session is not set
    {
        //user is not logged in
        $_SESSION['no-login-message2']="<div class='error text-center'>You are logged out.</div>";
        header('location:'.SITEURL.'index.php'); 
    }
?>