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
    <div class="marks2 font">
        <h1>Marks</h1>
        <br>
        <form action="POST">
            <div class="row">
                <div class="col">
                    <h2>Name: <?php echo $name;?></h2>
                    <h2>Roll: <?php echo $roll;?></h2>
                </div>
                <div class="col">
                    <input  value="SAVE" type="submit" name="submit" class="btn-primary edit2">
                </div>
            </div>
        <div class="clearfix"></div>
            <div class="row">
                <div class="col">
                    <div class="sub-main">
                        <h2>1st Semester</h2>
                        <table class="marks-tbl">
                            <tr>
                                <th>Subject</th>
                                <th>Sessional</th>
                                <th>Assignment</th>
                                <th>Attendence</th>
                            </tr>
                            <tr>
                                <td>C-Programming:</td>
                                <td><input type="number"></td>
                                <td><input type="number"></td>
                                <td><input type="number"></td>
                            </tr>
                                <td>ICT Hardware:</td>
                                <td><input type="number"></td>
                                <td><input type="number"></td>
                                <td><input type="number"></td>
                            </tr>
                            <tr>
                                <td>English:</td>
                                <td><input type="number"></td>
                                <td><input type="number"></td>
                                <td><input type="number"></td>
                            </tr>
                            </tr>
                                <td><select class="dropdown2" name="GE" id="">
                                    <option value="BCA-HG-1016">Office Automation</option>
                                    <option value="BCA-HG-1026">Computer Based Accounting</option>
                                </select></td>
                                <td><input type="number"></td>
                                <td><input type="number"></td>
                                <td><input type="number"></td>
                            </tr>
                        </table>
                    </div>
                </div>    
                <div class="col">
                    <div class="sub-main">
                        <h2>2nd Semester</h2>
                        <table class="marks-tbl">
                            <tr>
                                <th>Subject</th>
                                <th>Sessional</th>
                                <th>Assignment</th>
                                <th>Attendence</th>
                            </tr>
                            <tr>
                                <td>Mathematics - I:</td>
                                <td><input type="number"></td>
                                <td><input type="number"></td>
                                <td><input type="number"></td>
                            </tr>
                            <tr>
                                <td>Digital Logic:</td>
                                <td><input type="number"></td>
                                <td><input type="number"></td>
                                <td><input type="number"></td>
                            </tr>
                            <tr>
                                <td>EVS:</td>
                                <td><input type="number"></td>
                                <td><input type="number"></td>
                                <td><input type="number"></td>
                            </tr>
                            <tr>
                                <td><select class="dropdown2" name="GE" id="">
                                    <option value="BCA-HG-2016">Basic Electronics</option>
                                    <option value="BCA-HG-2026">Introduction to Bio-Informatics</option>
                                </select></td>
                                <td><input type="number"></td>
                                <td><input type="number"></td>
                                <td><input type="number"></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>  
            <div class="row">
                <div class="col">
                    <div class="sub-main">
                        <h2>3rd Semester</h2>
                        <table class="marks-tbl">
                            <tr>
                                <th>Subject</th>
                                <th>Sessional</th>
                                <th>Assignment</th>
                                <th>Attendence</th>
                            </tr>
                            <tr>
                                <td>Software Engineering:</td>
                                <td><input type="number"></td>
                                <td><input type="number"></td>
                                <td><input type="number"></td>
                            </tr>
                            <tr>
                                <td>Data Structure:</td>
                                <td><input type="number"></td>
                                <td><input type="number"></td>
                                <td><input type="number"></td>
                            </tr>
                            <tr>
                                <td>DBMS:</td>
                                <td><input type="number"></td>
                                <td><input type="number"></td>
                                <td><input type="number"></td>
                            </tr>
                            <tr>
                            <td><select class="dropdown2" name="SEC" id="">
                                        <option value="BCA-SE-3014">Web Technology</option>
                                        <option value="BCA-SE-3024">Programming ith C#</option>
                                        <option value="BCA-HC-3034">Open Source Software</option>
                                    </select></td>
                                <td><input type="number"></td>
                                <td><input type="number"></td>
                                <td><input type="number"></td>
                            </tr>
                            <tr>
                                <td><select class="dropdown2" name="GE" id="">
                                    <option value="BCA-HG-3016">Introduction to Indian History</option>
                                    <option value="BCA-HG-3026">Positive Psychology</option></select></td>
                                <td><input type="number"></td>
                                <td><input type="number"></td>
                                <td><input type="number"></td>
                            </tr>
                        </table>
                    </div>
                </div>    
                <div class="col">
                    <div class="sub-main">
                        <h2> 4th Semester</h2>
                        <table class="marks-tbl">
                            <tr>
                                <th>Subject</th>
                                <th>Sessional</th>
                                <th>Assignment</th>
                                <th>Attendence</th>
                            </tr>
                            <tr>
                                <td>COA:</td>
                                <td><input type="number"></td>
                                <td><input type="number"></td>
                                <td><input type="number"></td>
                            </tr>
                            <tr>
                                <td>Mathematics II:</td>
                                <td><input type="number"></td>
                                <td><input type="number"></td>
                                <td><input type="number"></td>
                            </tr>
                            <tr>
                                <td>OOPS in C++:</td>
                                <td><input type="number"></td>
                                <td><input type="number"></td>
                                <td><input type="number"></td>
                            </tr>
                            <tr>
                                <td><select class="dropdown2" name="SEC" id="">
                                    <option value="BCA-SE-4024">Mobile Application</option>
                                    <option value="BCA-SE-4034">Advanced Web Technology</option>
                                    <option value="BCA-SE-4014">Animation</option>
                                </select></td>
                                <td><input type="number"></td>
                                <td><input type="number"></td>
                                <td><input type="number"></td>
                            </tr>
                            <tr>
                                <td><select class="dropdown2" name="GE" id="">
                                    <option value="BCA-HG-4026">Cyber Laws</option>
                                    <option value="BCA-HG-4016">Introduction to Dramatic Arts</option>
                                </select></td>
                                <td><input type="number"></td>
                                <td><input type="number"></td>
                                <td><input type="number"></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>  
            <div class="row">
                <div class="col">
                    <div class="sub-main">
                        <h2>5th Semester</h2>
                        <table class="marks-tbl">
                            <tr>
                                <th>Subject</th>
                                <th>Sessional</th>
                                <th>Assignment</th>
                                <th>Attendence</th>
                            </tr>
                            <tr>
                                <td>Java Programming:</td>
                                <td><input type="number"></td>
                                <td><input type="number"></td>
                                <td><input type="number"></td>
                            </tr>
                            <tr>
                                <td>Operating System:</td>
                                <td><input type="number"></td>
                                <td><input type="number"></td>
                                <td><input type="number"></td>
                            </tr>
                            <tr>
                                <td>Project:</td>
                                <td><input type="number"></td>
                                <td><input type="number"></td>
                                <td><input type="number"></td>
                            </tr>
                            <tr>
                                <td><select class="dropdown2" name="DSE" id="">
                                    <option value="BCA-HE-5046">Programming in Python</option>
                                    <option value="BCA-HE-5026">Data Mining and Warehousing</option>
                                    <option value="BCA-HE-4036">Computer Oriented Numericals</option>
                                </select></td>
                                <td><input type="number"></td>
                                <td><input type="number"></td>
                                <td><input type="number"></td>
                            </tr>
                        </table>
                    </div>
                </div>    
                <div class="col">
                    <div class="sub-main">
                        <h2>6th Semester</h2>
                        <table class="marks-tbl">
                            <tr>
                                <th>Subject</th>
                                <th>Sessional</th>
                                <th>Assignment</th>
                                <th>Attendence</th>
                            </tr>                          
                            <tr>
                                <td>Linux:</td>
                                <td><input type="number"></td>
                                <td><input type="number"></td>
                                <td><input type="number"></td>
                            </tr>
                            <tr>
                                <td>Networking:</td>
                                <td><input type="number"></td>
                                <td><input type="number"></td>
                                <td><input type="number"></td>
                            </tr>
                            <tr>
                                <td><select class="dropdown2" name="DSE" id="">
                                    <option value="BCA-HE-6016">Automata Theory and Languages</option>
                                    <option value="BCA-HE-6026"> Optimization Techniques</option>
                                    <option value="BCA-HE-6036"> Multimedia and Applications </option>                                  
                                </select></td>
                                <td><input type="number"></td>
                                <td><input type="number"></td>
                                <td><input type="number"></td>
                            </tr>
                            <tr>
                            <td><select class="dropdown2" name="DSE" id="">
                                    <option value="BCA-HE-6056">: Microprocessor</option>
                                    <option value="BCA-HE-6046">Distributed System</option>
                                    <option value="BCA-HE-6066"> Artificial Intelligence  </option>
                                </select></td>
                                <td><input type="number"></td>
                                <td><input type="number"></td>
                                <td><input type="number"></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>  
        </form>
    </div>  
</div>
<?php include('partials/footer.php');?>

