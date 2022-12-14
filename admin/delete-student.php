<?php
    include('../config/constants.php');

    if(isset($_GET['roll']))
    {
        $roll=$_GET['roll'];

        $sql="DELETE FROM student WHERE roll_no='$roll'";

        $res =mysqli_query($conn,$sql);

        if($res==TRUE)
        {
            //admin deleted successfully
            $_SESSION['deleted']=" deleted successfully.";

            header('location:'.SITEURL.'admin/student.php');

        }
        else
        {
            //couldn't delete admin
            $_SESSION['delete_fail']="Couldn't delete admin.";

            header('location:'.SITEURL.'admin/student.php');
        }
    }
?>