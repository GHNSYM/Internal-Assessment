<?php include('partials/admin-navbar.php');?>

<div class="main">
    <div class="add-admin">
        <h2 class=" student-text text-center">Add New Admin</h2>
        <?php
            if(isset($_SESSION['invalid'])){
                echo $_SESSION['invalid'];
                unset($_SESSION['invalid']);
            }
            if(isset($_SESSION['failed'])){
                echo $_SESSION['failed'];
                unset($_SESSION['failed']);
            }
        ?>
        <fieldset>
                <form action=""method="POST">
                <h3>Username:</h3>
                <input type="text" name="username" placeholder="Enter your username here.">

                <h3>Password:</h3>
                <input type="password" name="password" placeholder="Create Passowrd">
                
                <h3>Confirm Password:</h3>
                <input type="password" name="confirm-password"placeholder="Confirm Password">

                <br>
                <br>
                <input type="submit"name="submit"value="Create"class="btn-primary">
            </form>
        </fieldset>
    </div>
</div>

<?php include('partials/footer.php');

if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $pass=$_POST['password'];
    $word=$_POST['confirm-password'];

    $sql="SELECT * FROM admin_tbl WHERE username='$username'";
    $res=mysqli_query($conn,$sql);
    if($res==TRUE){
        $count=mysqli_num_rows($res);

        if($count==0){
            if($pass==$word){
                $sql2="INSERT INTO admin_tbl VALUES( '$username','$pass')";
    
                $res2=mysqli_query($conn,$sql2);
                if($res2==TRUE){
                    $_SESSION['added-admin']="Added admin successfully.";
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
                else{
                    $_SESSION['failed']="Failed to fetch database.";
                    header('location:'.SITEURL.'admin/add-new-admin.php');
                }
            }
            else{
                $_SESSION['invalid']="Wrong confirmation of password.";
                header('location:'.SITEURL.'admin/add-new-admin.php');
            }
        }
        else{
            $_SESSION['invalid']="Username already exists";
            header('location:'.SITEURL.'admin/add-new-admin.php');
        }
    }
    else{
        $_SESSION['failed']="Failed to fetch database.";
        header('location:'.SITEURL.'admin/add-new-admin.php');
    }
}

?>