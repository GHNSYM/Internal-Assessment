<?php include('partials/admin-navbar.php');

if(isset($_GET['roll']))
{
    $roll=$_GET['roll'];

    $sql="SELECT * FROM student WHERE roll_no='$roll'";

    $res=mysqli_query($conn,$sql);

    if($res==TRUE)
    {
        $row= mysqli_fetch_assoc($res);

        $name=$row['name']; 
        $sem=$row['current_sem'];  
    }
}
?>
<div class="main">
    <div class="marks">
        <h1>Marks</h1>
        <br>
        <div class="row">
            <div class="col font">
            <h2>Name: <?php echo $name;?></h2>
            <h2>Roll: <?php echo $roll;?></h2>
            </div>
            <div class="col">
                <a class="btn-primary edit" href="<?php echo SITEURL."admin/marks-edit.php?roll=$roll"?>">EDIT</a>
            </div>
        </div>
        
        <div class="clearfix"></div>
                    <div class="sub-main">
                        <br>
                        <table class="marks-tbl">
                            <tr>
                                <th>Semester</th>
                                <th>Paper Code</th>
                                <th>Subject</th>
                                <th>Sessional</th>
                                <th>Assignment</th>
                                <th>Attendence</th>
                                <th>Total</th>
                            </tr>
                            <?php
                                $sql2="SELECT * FROM marks JOIN paper ON marks.paper_code=paper.paper_code WHERE roll_no='$roll' ORDER BY semester ";

                                $res2=mysqli_query($conn,$sql2);
                            
                                if($res2==TRUE)
                                {
                                    $count=mysqli_num_rows($res2);
                            
                                    if($count>0)
                                    {
                                        while($row2=mysqli_fetch_assoc($res2))
                                        {
                                            $sem=$row2["semester"];
                                            $code= $row2['paper_code'];
                                            $sub=$row2['subject'];
                                            $sess=$row2['sessional'];
                                            $assi=$row2['assignment'];
                                            $atten=$row2['attendance'];

                                            ?>
                                                <tr>             
                                                    <td><?php echo $sem;?></td>      
                                                    <td><?php echo $code;?></td>
                                                    <td><?php echo $sub;?></td>
                                                    <td><?php echo $sess;?></td>
                                                    <td><?php echo $assi;?> </td>
                                                    <td><?php echo $atten;?> </td>
                                                    <td><?php echo $sess+$assi+$atten;?></td>
                                                </tr>
                                            <?php
                                        }
                                    }
                                }
                            ?>
                        </table>
                    </div>
                </div> 
    </div>
</div>
<?php include('partials/footer.php');?>
