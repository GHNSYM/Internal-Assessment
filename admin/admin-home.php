<?php include('partials/admin-navbar.php');

?>

<div class="main">
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
                  <form method="POST">
                    <input type="search"name="search" placeholder="Enter Roll No.."required>
                    <input type="submit" name="submit" value="Search" class="btn btn-primary">
                  </form>
                </div>
            </section>
            <div class="count">
              <h1>Student Count: 345</h1>
            </div>
            <!--roll search section ends here-->
        </div>    
        <div class="col">
          
          <div class="card card2">
            <h5>New Batch</h5>
              <button class="btn-secondary">
               BCA
              </button>
              <button class="btn-secondary">
                BSc.IT
              </button>
            </div>
            <div class="card card1">
            <h5>Students</h5>
            <button class="btn-secondary">
              BCA
            </button>
            <button class="btn-secondary">
              BSc.IT
            </button>
          </div>
            <div class="card card3">
              <h5>Result</h5>
              <button class="btn-secondary">
              Add
              </button>
            </div>
            <div class="card card4">
              <h5>Others</h5>
              <button class="btn-secondary">
               Add
              </button>
            </div>
          </div>
            
</div>

</div>

<?php include('partials/footer.php');

      if(isset($_POST['submit']))
      {
        $keyword=$_GET['search'];
        $_SESSION['search']="$keyword";
        header('location:'.SITEURL.'admin/roll-search.php');
      }
?>