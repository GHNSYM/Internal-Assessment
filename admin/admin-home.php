<?php include('partials/admin-navbar.php');

$sql="SELECT COUNT(*) FROM student WHERE current_sem NOT LIKE '%pass out%'";
$res=mysqli_query($conn,$sql);

if($res==TRUE)
{
  $row=mysqli_fetch_assoc($res);
  $count=$row['COUNT(*)'];
}
else
{
  $count=0;
}

?>

<div class="main cards">
<?php
        if(isset($_SESSION['login']))
        {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }
    ?>
    <div class="row">
        <div class="col">
            <!--roll search section starts here-->
            <section class="roll-search text-center">
                <div class="container">
                  <form action="roll-search.php" method="POST">
                    <input type="search"name="search" placeholder="Enter Roll No.."required>
                    <input type="submit" name="submit" value="Search" class="btn btn-primary">
                  </form>
                </div>
            </section>
            <div class="count">
              <h1>Student Count: <?php echo $count; ;?></h1>
            </div>
            <!--roll search section ends here-->
        </div>    
        <div class="col">
          
          <div class="card card2">
            <h5>New Batch</h5>
            <div class="btn-tertiary">
              <a href="<?php echo SITEURL."admin/add-new-batch.php"?>">BCA</a>
              <a href="#">BSc.IT</a>
            </div>
          </div>
          <div class="card card1">
            <h5>Students</h5>
            <div class="btn-tertiary">
              <a href="<?php echo SITEURL."admin/student-bca.php"?>">BCA</a>
              <a href="<?php echo SITEURL."admin/student-it.php"?>">BSc.IT</a>
            </div>    
          </div>
          <div class="card card3">
            <h5>Result</h5>
            <div class="btn-tertiary">
              <a href="<?php echo SITEURL."admin/add-result.php"?>">Add</a>
              <a href="<?php echo SITEURL."admin/view-result.php"?>">View</a>
            </div>
          </div>
            <div class="card card4">
              <h5>Others</h5>
              <div class="btn-tertiary">
              <a href="<?php echo SITEURL."admin/manage-admin.php"?>">Admin</a>
              <a href="<?php echo SITEURL."admin/promote.php"?>">Promote</a>
            </div>
            </div>
          </div>
            
        </div>

    </div>

<?php include('partials/footer.php');?>