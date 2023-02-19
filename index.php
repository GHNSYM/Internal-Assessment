<?php include('partials/navbar.php')?>


        </div>
        <div class="content">
            <h1>Internal <br><span>Assessment</span> <br>System</h1>
                <p class="par"><br><br>This is a website for storing and <br>displaying internal marks developed<br> by Samiran and Ghanshyam for the 
                <br>
                <div class="clearfix"></div>
                <h1>IT Department</h1>
            </p>
            
            <button class="cn"><a  target="_blank" href="https://lcbcollege.co.in/">LCB website</a></button>
            <div class="clearfix"></div>
            
            <div class="form" >
                <form action=""method="POST">
                    <h2>Login Here</h2>
                    <input type="text" name="roll" placeholder="Enter GU Roll Here">
                    <input type="password" name="password" placeholder="Enter Password Here">
                    <input type="submit"name="submit"value="Login">
                </form>
                <?php
        
                if(isset($_SESSION['no-login-message2']))
                {
                    echo $_SESSION['no-login-message2'];
                    unset($_SESSION['no-login-message2']);
                }
                ?>
                

                <div class="clearfix"></div>
            </div>

        </div>
    </div>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    </body>

</html>
<?php
//check whether the submit button is clicked or not
    if(isset($_POST['submit']))
    {
        //process for login
        //1. Get the data from login page
        $roll=$_POST['roll'];
        $password=$_POST['password'];

        //sql to check whether the user with username and password exists or not
        $sql="SELECT * FROM student WHERE roll_no='$roll' AND dob='$password'";

        //execute the query
        $res=mysqli_query($conn,$sql);

        $count=mysqli_num_rows($res);

        if($count==1)
        {
            //login success
            $_SESSION['login2']="<div class='success'>Login Successful.</div>";

            $_SESSION['user2']=$roll;//to check whether the user is logged in or not and logout will unset it

            header('location:'.SITEURL.'dashboard.php');
        }
        else
        {
            //login failed
            $_SESSION['login']="<div class='error text-center'>Login Failed.</div>";
            header('location:'.SITEURL.'index.php');
        }
    }
?>
   