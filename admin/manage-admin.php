<?php include('partials/admin-navbar.php');?>

        <!--main content section starts here-->
        <div class="main">
            <div class="manage-admin">
               <h1>Manage Admin</h1>
               <?php
                    if(isset($_SESSION['added-admin'])){
                        echo $_SESSION['added-admin'];
                        unset($_SESSION['added-admin']);
                    }
                    if(isset($_SESSION['deleted'])){
                        echo $_SESSION['deleted'];
                        unset($_SESSION['deleted']);
                    }
                    if(isset($_SESSION['failed'])){
                        echo $_SESSION['failed'];
                        unset($_SESSION['failed']);
                    }
                    if(isset($_SESSION['delete-failed'])){
                        echo $_SESSION['delete-failed'];
                        unset($_SESSION['delete-failed']);
                    }
                    ?>
                    <br>
               <br>
               <div class="clearfix"></div>
               <!--button to add admin-->
               <a href="add-new-admin.php"class="btn-primary">Add Admin</a>
               <div class="clearfix"></div>
               <br>
               <br>

               <table>
                <tr>
                    <th>S.N.</th>
                    <th>Username</th>
                    <th>Action</th>
                </tr>   
                <?php
                    $sql="SELECT * FROM admin_tbl ";
                    $res=mysqli_query($conn,$sql);
                    if($res==TRUE)
                    {
                        //count rows
                        $count=mysqli_num_rows($res);//function to count the no of rows in database
                        if($count>0)
                        {
                            //we have data in database
                            $ss=1;
                            while($row=mysqli_fetch_assoc($res))
                            {
                                //get individual data
                                $username=$row['username'];

                                //display the data in table
                                ?>
                                <tr>
                                    <td><?php echo $ss++?>.</td>
                                    
                                    <td><?php echo $username?></td>
                                    <td>
                                        <a href="<?php echo SITEURL."admin/change-password.php?username= $useranme";?>"class= "btn-primary">Change Password</a>
                                        <a href="<?php echo SITEURL."admin/delete-admin.php?username=$username";?>"class= "btn-danger" > Delete Admin</a>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        else
                        {
                            //database is empty
                        }
                    }
                ?>
               </table>
            </div>
        </div>
        <!--main content section ends here-->

<?php include('partials/footer.php')?>  