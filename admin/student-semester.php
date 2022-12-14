<?php include('partials/admin-navbar.php');?>

<?php if(isset($_GET['sem']))
    {
        $sem=$_GET['sem'];
    }
    ?>

<div class="main">
    <div class="student">
    <h1>
        <?php
            if($sem=='pass out')
            {
                echo "Passed Out";
            } 
            else
            {
                $ester=" Semester";
                echo $sem,$ester;
            }
        ?>
    </h1>

<br>
    <div class="row">
        <div class="col">
            <div class="dropdown">
                <button class="dropbtn1">Semester ⇩  </button>
                    <div class="dropdown-content">
                        <a href="<?php echo SITEURL."admin/student-semester.php?sem=1st"?>">1st Semester</a>
                        <a href="<?php echo SITEURL."admin/student-semester.php?sem=2nd"?>">2nd Semester</a>
                        <a href="<?php echo SITEURL."admin/student-semester.php?sem=3rd"?>">3rd Semester</a>
                        <a href="<?php echo SITEURL."admin/student-semester.php?sem=4th"?>">4th Semester</a>
                        <a href="<?php echo SITEURL."admin/student-semester.php?sem=5th"?>">5th Semester</a>
                        <a href="<?php echo SITEURL."admin/student-semester.php?sem=6th"?>">6th Semester</a>
                        <a href="<?php echo SITEURL."admin/student-semester.php?sem=pass out"?>">Pass Out</a>
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
                $sql="SELECT * FROM student where current_sem='$sem'";
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
                                        <a class="dropdel"href="<?php echo SITEURL."admin/delete-student.php?roll=$roll"?>">Delete</a>
                                    </div>
                                </div>
                                </td>
                                </tr>
                            <?php
                        }
                    }
                    else
                    {
                        $str= "No Students found.";
                        ?>
                        <tr>
                            <td>
                                <?php echo $str; ?>
                            </td>
                        </tr>    
                        <?php
                    }
                }
            ?>
    </table>
</div>
</div>

</div>
<!-- table section ends here -->
</div>

<?php include('partials/footer.php');?>