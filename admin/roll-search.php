<?php include('partials/admin-navbar.php');?>


<?php
    if(isset($_SESSION['search']))
    {
        $roll=$_SESSION['search'];
        echo $_SESSION['search'];
        $sql="SELECT * FROM student WHERE
        roll_no like '%$roll%'";

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
                    $batch=$row['batch'];
                    $contact=$row['contact'];
                }
            }
        }
        else
        {
            $_SESSION['search_fail']="Couldn't Search Roll No.";

            header('location:'.SITEURL.'admin/admin-home.php');
        }    
    }
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
            <th>Batch</th>
            <th>Contact</th>
            <th>Action</th>
        </tr>
        <tr>
            <td><?php echo $sn++;?></td>
            <td><?php echo $roll;?></td>
            <td><?php echo $regno;?></td>
            <td><?php echo $name;?></td>
            <td><?php echo $dob;?></td>
            <td><?php echo $sem;?></td>
            <td><?php echo $batch;?></td>
            <td><?php echo $contact;?></td>
            <td>
            <div class="dropdown">
                <button class="dropbtn">Options ⇩</button>
                <div class="dropdown-content">
                    <a href="<?php echo SITEURL."admin/marks.php?roll=$roll"?>">Marks</a>
                    <a href="<?php echo SITEURL."admin/update-student.php?roll=$roll"?>">Update</a>
                    <a href="<?php echo SITEURL."admin/delete-student.php?roll=$roll"?>">Delete</a>
                </div>
            </div>
            </td>
        </tr>
    </table>  
</div>  
</div>

<?php include('partials/footer.php');?>
