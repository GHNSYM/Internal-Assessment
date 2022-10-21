<?php include('partials/navbar.php')?>

<div class="main-login">
    <div class="form" >
        <h2>Admin Login </h2>
        <form action="" method="POST">
            <input type="text" name="username" placeholder="Enter Username Here">
            <input type="password" name="password" placeholder="Enter Password Here">
            <div class="btn">
                <input type="submit" name="submit" value="Login">
            </div>
        </form>
        <?php
        if(isset($_SESSION['login']))
        {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }
        if(isset($_SESSION['no-login-message']))
        {
            echo $_SESSION['no-login-message'];
            unset($_SESSION['no-login-message']);
        }
        ?>
        </div>
</div>

<?php include('partials/footer.php');?>

<?php
//check whether the submit button is clicked or not
    if(isset($_POST['submit']))
    {
        //process for login
        //1. Get the data from login page
        $username=$_POST['username'];
        $password=$_POST['password'];

        //sql to check whether the user with username and password exists or not
        $sql="SELECT * FROM admin_tbl WHERE username='$username' AND password='$password'";

        //execute the query
        $res=mysqli_query($conn,$sql);

        $count=mysqli_num_rows($res);

        if($count==1)
        {
            //login success
            $_SESSION['login']="<div class='success'>Login Successful.</div>";
            
            $_SESSION['user']=$username;//to check whether the user is logged in or not and logout will unset it

            header('location:'.SITEURL.'admin/admin-home.php');
        }
        else
        {
            //login failed
            $_SESSION['login']="<div class='error text-center'>Login Failed.</div>";
            header('location:'.SITEURL.'admin/login.php');
        }
    }
?>