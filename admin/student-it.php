<?php include('partials/admin-navbar.php');?>

<!-- table section starts here  -->
<div class="main">
<div class="student">

    <h1>BSc.IT STUDENTS</h1>
    <?php
        if(isset($_SESSION['success']))
        {
            echo $_SESSION['success'];
            unset($_SESSION['success']);
        }
        if(isset($_SESSION['deleted']))
        {
            echo $_SESSION['deleted'];
            unset($_SESSION['deleted']);
        }
        if(isset($_SESSION['delete_fail']))
        {
            echo $_SESSION['delete_fail'];
            unset($_SESSION['delete_fail']);
        }
        if(isset($_SESSION['updated']))
        {
            echo $_SESSION['updated'];
            unset($_SESSION['updated']);
        }
        if(isset($_SESSION['update_fail']))
        {
            echo $_SESSION['update_fail'];
            unset($_SESSION['update_fail']);
        }

    ?>
    <br>
    <div class="row">
        <div class="col">
            <div class="dropdown">
                <button class="dropbtn1">Semester ⇩  </button>
                    <div class="dropdown-content">
                        <a href="#">1st Semester</a>
                        <a href="#">2nd Semester</a>
                        <a href="#">3rd Semester</a>
                        <a href="#">4th Semester</a>
                        <a href="#">5th Semester</a>
                        <a href="#">6th Semester</a>
                        <a href="#">Pass Out</a>
                    </div>                   
            </div>
            <a href="add-student.php" class="btn-primary align-right">Add Student</a>
        </div>
        <div class="col">
            <div class="roll-search text-center">
                <div class="container2">
                    <form action="roll-search.php" method="POST">
                    <input type="search"name="search" placeholder="Enter Roll No.."required>
                    <input type="submit" name="submit" value="Search" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>    
    </div>
    
    <br>
    <br>
    <br>
    <table class="student-table">
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
                $sql="SELECT * FROM student WHERE course='BSc.IT'";
                $res=mysqli_query($conn,$sql);
                if($res==TRUE)
                {

                    $count=mysqli_num_rows($res);

                    if($count>0)
                    {
                        $sn=1;
                        while($row=mysqli_fetch_assoc($res))
                        {
                            $name=$row['name'];
                            $roll=$row['roll_no'];
                            $regno=$row['regno'];
                            $dob=$row['dob'];
                            $sem=$row['current_sem'];
                            $course=$row['course'];
                            $batch=$row['batch'];
                            $contact=$row['contact'];

                            ?>
                                <tr>
                                <td><?php echo $sn++;?></td>
                                <td><?php echo $roll;?></td>
                                <td><?php echo $regno;?></td>
                                <td><?php echo $name;?></td>
                                <td><?php echo $dob;?></td>
                                <td><?php echo $sem;?></td>
                                <td><?php echo $course;?></td>
                                <td><?php echo $batch;?></td>
                                <td><?php echo $contact;?></td>
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
                    }
                }
            ?>
    </table>
</div>
</div>
<!-- table section ends here -->

</body>
<?php include('partials/footer.php');?>