<?php include('partials/admin-navbar.php');?>

<div class="main">
    <div class="add-admin">
        <?php
        if(isset($_SESSION['error'])){
            echo $_SESSION['error'];
            unset($_SESSION['error']);
        }
        if(isset($_GET['username'])){
            $username=$_GET['username'];
        }
        ?>
        <h2 class=" student-text text-center">Delete Admin</h2>
        
        <fieldset>
                <form action=""method="POST">
                <h3>Username:</h3>
                <input readonly name="username" type="text" value="<?php echo $username;?>">
                <br>
                <br>
                <h3>Confirm Password:</h3>
                <input type="password" name="confirm-password"placeholder="Confirm Password">

                <br>
                <br>
                <input type="submit"name="submit"value="Delete"class="btn-danger">
            </form>
        </fieldset>
    </div>
</div>

<?php include('partials/footer.php');

if(isset($_POST['submit'])){
    $word=$_POST['confirm-password'];

    $sql="SELECT * FROM admin_tbl WHERE username='$username' and password='$word'";
    $res=mysqli_query($conn,$sql);
    if($res==TRUE){
        $count=mysqli_num_rows($res);

        if($count==1){
            $sql2="DELETE FROM admin_tbl WHERE username='$username'";

            $res2 =mysqli_query($conn,$sql2);

            if($res2==TRUE)
            {
                //admin deleted successfully
                $_SESSION['deleted']="Admin deleted successfully.";

                header('location:'.SITEURL.'admin/manage-admin.php');

            }
            else
            {
                //couldn't delete admin
                $_SESSION['delete_fail']="Couldn't delete admin.";

                header('location:'.SITEURL.'admin/manage-admin.php');
            }
        }
        else{
            $_SESSION['error']="Wrong Password.";
            header('location:'.SITEURL.'admin/delete-admin.php');
        }
    }
    else{
        $_SESSION['failed']="Failed to fetch database.";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
}

?>