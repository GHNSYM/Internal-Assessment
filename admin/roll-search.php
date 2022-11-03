<?php include('partials/admin-navbar.php');?>


<?php
    if(isset($_POST['submit']))
    {
        $search=mysqli_real_escape_string($conn,$_POST['search']);

        $sql="SELECT * FROM student WHERE
        roll_no like '%$search%' OR name LIKE '%$search%' OR regno LIKE '%$search%'";

        $res=mysqli_query($conn,$sql);

        if($res==TRUE)
        {
            $count=mysqli_num_rows($res);

            if($count>0)
            {
                ?>
                <div class="main">
                        <div class="student">
                            <table class="student-table">
                                <br>
                                <br>
                                <h1>Search Results</h1>
                                <br>
                                <br>
                                <tr>
                                    <th>S.N.</th>
                                    <th>Roll No.</th>
                                    <th>Reg. No.</th>
                                    <th>Name</th>
                                    <th>DOB</th>
                                    <th>Semester</th>
                                    <th>Course</th>
                                    <th>Batch</th>
                                    <th>Contact</th>
                                    <th>Action</th>
                                </tr>

                <?php
                $sn=1;
                while($row=mysqli_fetch_assoc($res))
                {
                    $roll=$row['roll_no'];
                    ?>
                    
                                <tr>
                                    <td><?php echo $sn++;?></td>
                                    <td><?php echo $row['roll_no'];?></td>
                                    <td><?php echo $row['regno'];?></td>
                                    <td><?php echo $row['name'];?></td>
                                    <td><?php echo $row['dob'];?></td>
                                    <td><?php echo $row['current_sem'];?></td>
                                    <td><?php echo $row['course'];?></td>
                                    <td><?php echo $row['batch'];?></td>
                                    <td><?php echo $row['contact'];?></td>
                                    <td>
                                    <div class="dropdown">
                                        <button class="dropbtn">Options ⇩</button>
                                        <div class="dropdown-content">
                                            <a href="<?php echo SITEURL."admin/marks.php?roll=$roll"?>">Marks</a>
                                            <a href="<?php echo SITEURL."admin/update-student.php?roll=$roll"?>">Update</a>
                                            <a class="dropdel" href="<?php echo SITEURL."admin/delete-student.php?roll=$roll"?>">Delete</a>
                                        </div>
                                    </div>
                                    </td>
                                </tr>
                    <?php
                }
                ?>
                            </table>  
                        </div>  
                    </div>
                <?php
            }
            else
            {
                $_SESSION['search_fail']="There are no results matching your search.";

                header('location:'.SITEURL.'admin/admin-home.php');
            } 
        }
           
    }
?>
                    

<?php include('partials/footer.php');?>

    
