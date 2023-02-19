<?php include('partials/admin-navbar.php');?>

<div class="main">
    <div class="student">
        <h1>Select batch to promote.</h1>
        <?php
            if(isset($_SESSION['promoted'])){
                echo $_SESSION['promoted'];
                unset($_SESSION['promoted']);
            }
        ?>
            <fieldset>    
                <div class="promote-batch">
                    <?php
                        $sql="SELECT DISTINCT batch,course,current_sem FROM student WHERE current_sem NOT IN('passed out')";
                        $res=mysqli_query($conn,$sql);

                        if($res==TRUE)
                        {
                            $count=mysqli_num_rows($res);

                            if($count>0)
                            {
                                ?>
                                <table>
                                        <tr>
                                            <th>Batch</th>
                                            <th>Course</th>
                                            <th>Current Semester</th>
                                            <th>Promote to</th>
                                            <th>Action</th>
                                        </tr>

                                <?php
                                while($row=mysqli_fetch_assoc($res))
                                {
                                    $batch=$row['batch'];
                                    $course=$row['course'];
                                    $current_sem=$row['current_sem'];
                                    if($current_sem=="1st"){
                                        $next_sem="2nd";
                                    }
                                    else if($current_sem=="2nd"){
                                        $next_sem="3rd";
                                    }
                                    else if($current_sem=="3rd"){
                                        $next_sem="4th";
                                    }
                                    else if($current_sem=="4th"){
                                        $next_sem="5th";
                                    }
                                    else if($current_sem=="5th"){
                                        $next_sem="6th";
                                    }
                                    else if($current_sem=="6th"){
                                        $next_sem="passed out";
                                    }
                                    ?>
                                    
                                        <tr>
                                            <td><?php echo $batch;?></td>
                                            <td><?php echo $course;?></td>
                                            <td><?php echo $current_sem;?> Semester</td>
                                            <td><?php 
                                                    if($next_sem=="passed out"){
                                                        echo $next_sem;
                                                    }
                                                    else{
                                                        echo $next_sem." Semester";
                                                    }
                                                ?>
                                            </td>
                                            <td><form method="POST">
                                                    <input type="hidden" name="course" value="<?php echo $course;?>">
                                                    <input type="hidden"name="batch"value="<?php echo $batch;?>">
                                                    <button value="<?php echo $next_sem;?>" name="next" type="submit">Promote</button>
                                                </form>
                                            </td>
                                        </tr>
                                    
                                    <?php
                                } 
                                ?>
                                </table>
                                <?php
                            }
                            else
                            {
                                ?><h3> No batch found.</h3><?php
                            }
                        }
                        else
                        {
                            ?><h3>Couldn't retrieve batches.</h3><?php
                        }
                    ?>                  
                </div>           
            </fieldset>
        <br>
        <div class="promote-batch">
            <h3>This can't be undone. If needed has to be done individually for each student.</h3>
        </div>
    </div>
</div>

<?php include('partials/footer.php');

if(isset($_POST['batch'])){
    $batch=$_POST['batch'];
    $course=$_POST['course'];
    $semester=$_POST['next'];
    $sql="UPDATE student SET current_sem='$semester' WHERE batch='$batch' and course='$course'";
    $res=mysqli_query($conn,$sql);
    if($res==TRUE){
        $_SESSION['promoted']="Batch promoted successfully.";
        header('location:'.SITEURL.'admin/promote.php');
    }
    else{
        $_SESSION['promoted']="Failed to promote.";
        header('location:'.SITEURL.'admin/promote.php');
    }
}
?>

