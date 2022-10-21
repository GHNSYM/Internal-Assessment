<?php include('partials/admin-navbar.php');?>
<div class="main">
    <div class="container">
            <h2 class=" student-text text-center">Add New Student</h2>
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
                    <input type="text" name="name" placeholder="E.g. Alex Gonzalviz" class="input-responsive " required>

                    <div class="student-label">Roll Number:</div>
                    <input type="text" name="roll" placeholder="E.g.UT-201-XXX-XXXX" class="input-responsive" required>

                    <div class="student-label">Reg. No.:</div>
                    <input type="text" name="regno" placeholder="A200xxxxxxx" class="input-responsive" required>

                    <div class="student-label">DOB:</div>
                    <input type="date" name="dob"  class="input-responsive" required>

                    <div class="student-label">Semester:</div>
                    <select class="form-dropdown" name="semester" id="">
                        <option value="1st">1st Semester</option>
                        <option value="2nd">2nd Semester</option>
                        <option value="3rd">3rd Semester</option>
                        <option value="4th">4th Semester</option>
                        <option value="5th">5th Semester</option>
                        <option value="6th">6th Semester</option>
                        <option value="passed out">Passed Out</option>
                    </select>
        
                    <div class="student-label">Batch:</div>
                    <input type="text" name="batch" placeholder="20XX-XX" class="input-responsive" required>

                    <div class="student-label">Contact:</div>
                    <input type="tel" name="contact" placeholder="9101XXXXXX" class="input-responsive" required>
                    <br>
                    <br>
                    
                    <input type="submit" name="submit" value="SAVE" class="btn btn-primary">
                </fieldset>
            </form>
        </div>
    </section>
    <!--order section ends here-->
    
</div>

<!-- <?php include('partials/footer.php');?> -->

<?php
    if(isset($_POST['submit']))
    {
        $name=$_POST['name'];
        $roll=$_POST['roll'];
        $regno=$_POST['regno'];
        $dob=$_POST['dob'];
        $sem=$_POST['semester'];
        $batch=$_POST['batch'];
        $contact=$_POST['contact'];

        $sql="INSERT INTO student SET
        name='$name',
        roll_no='$roll',
        regno='$regno',
        dob='$dob',
        current_sem='$sem',
        batch='$batch',
        contact='$contact'";

        $res=mysqli_query($conn,$sql);

        if($res==TRUE)
        {
            $_SESSION['success']="<div class='success'>Student Added Successfully</div>";

            header('location:'.SITEURL.'admin/student.php');
        }
        else
        {
            $_SESSION['failed']="<div class='error'>Failed to add Student</div>";

            header('location:'.SITEURL.'admin/add-student.php');
        }
    }
?>