<?php include('partials/admin-navbar.php');
  if(isset($_GET['roll']))
  {
      $roll=$_GET['roll'];

      $sql2="SELECT * FROM student WHERE roll_no='$roll'";

      $res2=mysqli_query($conn,$sql2);

      if($res2==TRUE)
      {
        $row= mysqli_fetch_assoc($res2);

        $name=$row['name'];
        $regno=$row['regno'];  
        $dob=$row['dob'];  
        $sem=$row['current_sem'];  
        $course=$row['course'];
        $batch=$row['batch'];  
        $contact=$row['contact'];
      }
  }
?>
<div class="main">
    <div class="container">
            <h2 class=" student-text text-center">Update Student</h2>
            <?php
                if(isset($_SESSION['failed']))
                {
                    echo $_SESSION['failed'];
                    unset($_SESSION['failed']);
                }
            ?>
            <form action="#" method="POST"class="add-student">            
                <fieldset>
                    <legend>Student Details</legend>
                    <div class="student-label">Full Name:</div>
                    <input type="text" name="name" value="<?php echo $name;?>" class="input-responsive " required>

                    <div class="student-label">Roll Number:</div>
                    <input type="text" name="roll" value="<?php echo $roll;?>" class="input-responsive" required>

                    <div class="student-label">Reg. No.:</div>
                    <input type="text" name="regno" value="<?php echo $regno;?>" class="input-responsive" required>

                    <div class="student-label">DOB:</div>
                    <input type="date" name="dob" value="<?php echo $dob;?>" class="input-responsive" required>

                    <div class="student-label">Semester:</div>
                    <select class="form-dropdown" name="semester">
                        <option value="1st" <?php if($sem=="1st") echo "selected";?>>1st Semester</option>
                        <option value="2nd" <?php if($sem=="2nd") echo "selected";?>>2nd Semester</option>
                        <option value="3rd" <?php if($sem=="3rd") echo "selected";?>>3rd Semester</option>
                        <option value="4th" <?php if($sem=="4th") echo "selected";?>>4th Semester</option>
                        <option value="5th" <?php if($sem=="5th") echo "selected";?>>5th Semester</option>
                        <option value="6th" <?php if($sem=="6th") echo "selected";?>>6th Semester</option>
                        <option value="passed out" <?php if($sem=="passed out") echo "selected";?>>Passed Out</option>
                    </select>
        
                    <div class="student-label">Course:</div>
                    <select class="form-dropdown" name="course" >
                        <option value="BCA" <?php if($course=="BCA") echo "selected";?>>BCA</option>
                        <option value="BSc.IT" <?php if($course=="BSc.IT") echo "selected";?>>BSc.IT</option>
                    </select>

                    <div class="student-label">Batch</div>
                    <input type="text" name="batch" value="<?php echo $batch;?>" class="input-responsive" required>

                    <div class="student-label">Contact:</div>
                    <input type="tel" name="contact" value="<?php echo $contact;?>" class="input-responsive" required>
                    <br>
                    <br>
                    
                    <input type="submit" name="submit" value="SAVE" class="btn btn-primary">
                </fieldset>
            </form>
        </div>
    </section>
    <!--order section ends here-->
    
</div>

<?php include('partials/footer.php');?>

<?php
    if(isset($_POST['submit']))
    {
        $name=$_POST['name'];
        $roll_no=$_POST['roll'];
        $regno=$_POST['regno'];
        $dob=$_POST['dob'];
        $sem=$_POST['semester'];
        $course=$_POST['course'];
        $batch=$_POST['batch'];
        $contact=$_POST['contact'];

        $sql="UPDATE student SET
        name='$name',
        roll_no='$roll_no',
        regno='$regno',
        dob='$dob',
        current_sem='$sem',
        course='$course',
        batch='$batch',
        contact='$contact'
        WHERE roll_no='$roll'";

        $res=mysqli_query($conn,$sql);

        if($res==TRUE)
      {
          //student updated successfully
          $_SESSION['updated']="Student Updated Successfully.";

          header('location:'.SITEURL.'admin/student.php');

      }
      else
      {
          //couldn't update student
          $_SESSION['update_fail']="Couldn't Update Student.";

          header('location:'.SITEURL.'admin/student.php');
      }
    }
?>