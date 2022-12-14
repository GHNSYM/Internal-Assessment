<?php include('partials/admin-navbar.php');?>

<div class="main">
    <div class="student">
        <h1>Add a new batch.</h1>

        <form method="POST" action="" class="add-batch" >
            <fieldset>
                <legend>Batch Details</legend>
                <table>
                    <tr>
                        <th>Roll Id.</th>
                        <th>Semester</th>
                        <th>Batch</th>
                        <th>Course</th>
                        <th>Students</th>
                    </tr>
                    <tr>
                        <td><input type="text" name="roll_id" placeholder="Common part "class="input-responsive "></td>
                        <td>
                            <select name="semester"class="input-responsive ">
                                <option value="1st">1st Semester</option>
                                <option value="2nd">2nd Semester</option>
                                <option value="3rd">3rd Semester</option>
                                <option value="4th">4th Semester</option>
                                <option value="5th">5th Semester</option>
                                <option value="6th">6th Semester</option>
                                <option value="pass out">Pass Out</option>
                            </select>
                        </td>
                        <td> 
                            <input type="year"name="batch"placeholder="e.g.-2020-2023"class="input-responsive ">
                        </td>
                        <td><select name="course"class="input-responsive ">
                            <option value="BCA">BCA</option>
                            <option value="BSc.IT">BSc.IT</option>
                        </select></td>
                        <td><input name="count" placeholder="Total Students"type="number"class="input-responsive "></td>
                        <td><input type="submit" name="submit"value="GO"class="btn-primary input-responsive"></td>
                    </tr>
                </table>                
            </fieldset>
        </form>      
        <br>
        <?php
            if(isset($_POST["submit"]))
            {
                $roll_id=$_POST['roll_id'];
                $sem=$_POST['semester'];
                $batch=$_POST['batch'];
                $course=$_POST['course'];
                $count=$_POST['count'];
                $sn=1;
                ?>
                <form method="POST" action=""class="add-batch2">
                    <fieldset>
                        <legend>Enter Details</legend>
                        <?php
                            if(isset($count))
                            {
                                if($count<=0)
                                {
                                    echo "<h3>Number of students should be atleast 1.</h3>";
                                }
                                else
                                {
                                    ?>
                                    <table>
                                        <tr>
                                            <th></th>
                                            <th>Roll No.</th>
                                            <th>Registration No.</th>
                                            <th>Name</th>
                                            <th>Date of birth</th>
                                            <th>Course</th>
                                            <th>Batch</th>
                                            <th>Contact</th>
                                        </tr>
                                        <?php 
                                            while($sn<=$count)
                                            {
                                                ?>
                                                <tr>
                                                    <td><?php echo $sn;?>.</td>
                                                    <td><input type="text"name="roll_no<?php echo $sn;?>"value="<?php echo $roll_id;?>"></td>
                                                    <td><input type="text"name="regno<?php echo $sn;?>"placeholder="Reg no."></td>
                                                    <td><input type="text"name="name<?php echo $sn;?>"placeholder="Full Name"required></td>
                                                    <td><input type="date"name="dob<?php echo $sn;?>"placeholder="Date of birth"required></td>
                                                    <td><input type="text"name="course<?php echo $sn;?>"value="<?php echo $course;?>"></td>
                                                    <td><input type="year"name="batch<?php echo $sn;?>"value="<?php echo $batch;?>"></td>
                                                    <td><input type="tel"name="contact<?php echo $sn;?>"placeholder="Contact"></td>
                                                    <input type="hidden" name="sem<?php echo $sn;?>"value="<?php echo $sem;?>">
                                                    <?php $sn++;?>
                                                </tr>
                                                <?php
                                            }
                                        ?>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="center"><input type="submit"name="save"value="SAVE"class="btn-primary input-responsive"></td>
                                            <input type="hidden" name="count"value="<?php echo $count;?>">
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </table>
                                    <?php
                                }
                            }
                            else
                            {
                                echo "<h3>Number of students should be atleast 1.</h3>";
                            }
                        ?>
                    </fieldset>
                </form>
                <?php
            }
        ?> 
    </div>
</div>

<?php include('partials/footer.php');?>

<?php
    if(isset($_POST['save']))
    {
        $count=array_pop($_POST);
        array_pop($_POST);
        print_r($_POST);
        $num=1;
        while($count>=$num)
        {
            $roll=$_POST['roll_no'.$num];
            $regno=$_POST['regno'.$num];
            $name=$_POST['name'.$num];
            $dob=$_POST['dob'.$num];
            $course=$_POST['course'.$num];
            $batch=$_POST['batch'.$num];
            $contact=$_POST['contact'.$num];
            $sem=$_POST['sem'.$num];

            
            $sql=" INSERT INTO student VALUES('$roll','$name','$sem','$regno','$dob','$batch','$contact','$course')";
        
            $res=mysqli_query($conn,$sql);

            $num2=0;
            if($res==TRUE)
            {
                $num2++;
            }
        }
        if($num2>0)
        {
            $_SESSION['succ']="<div class='success text-center'> $num2 students added.</div>";
            header('location:'.SITEURL.'admin/add-new-batch.php');
        }
        else
        {
            $_SESSION['succ']="<div class='error text-center'>Failed to add new batch.</div>";
            header('location:'.SITEURL.'admin/add-new-batch.php');
        }
    }
?>
