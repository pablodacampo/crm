<?php
    // include('config/login.php'); // Includes Login Script
    include('config/functions.php');
    // if(isset($_SESSION['login_user'])){
    // header("location: dashboard.php"); // Redirecting To Profile Page
    // }
?> 

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>USN France | Edit Sales</title>

  <!-- CSS Header -->
  
    <?php
    include('config/cssHeader.php');
    ?> 

  <body>

  <!-- Navbar --> 

  <nav class="navbar navbar-expand-md">
    <a class="navbar-brand" href="#"><img src="img/usn-logo-small.png" class="usn-logo-small" alt="usn-logo-small"> <b><em>USN France</em></b>  </a>
    <button class="navbar-toggler bg-warning" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>Menu
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
</nav>

  <!-- Header -->

  <header id="header">
    <div class="container">
      <div class="row"> <!-- Grid Format-->
        <div class="col-md-12">
          <h1 class="text-center"> <img src="img/usn-logo-small.png" class="usn-logo-small" alt="usn-logo-small">
    Admin Area <small>| Edit Sales</small></h1>
        </div>

      </div>
    </div>
  </header>

  <!-- Main -->

  <section id="main">
    <div class="container">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <form class="text-center" id="edit_sales" action="config/functions.php" method="POST">

            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Reference Number</label>
                  <input type="text" class="form-control text-center bg-dark text-primary" name="coRef" id="coRef" value="<?=$coRef ?>">
              </div> <!-- form-group end.// -->

              <div class="form-group col-md-6">
                <label>Company Name</label>
                  <input type="text" class="form-control text-center bg-dark text-primary" name="coName" id="coName" value="<?=$coName ?>">
              </div> <!-- form-group end.// -->
              </div> <!-- form-row end.// -->

            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Billing Address</label>
                  <input type="text" class="form-control text-center bg-dark text-primary" name="coAdd" id="coAdd" value="<?=$coAdd ?>">
              </div> <!-- form-group end.// -->

              <div class="form-group col-md-6">
                <label>City</label>
                  <input type="text" class="form-control text-center bg-dark text-primary" name="coCity" id="coCity" value="<?=$coCity ?>">
              </div> <!-- form-group end.// -->
            </div> <!-- form-row end.// -->

            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Total Sales</label>
                  <input type="text" class="form-control text-center bg-dark text-primary" name="fiSal" id="fiSal" value="<?=$fiSal ?>">
              </div> <!-- form-group end.// -->

              <div class="form-group col-md-6">
                <label>Discount & Pay Terms</label>
                  <input type="text" class="form-control text-center bg-dark text-primary" name="fiDisPay" id="fiDisPay" value="<?=$fiDisPay ?>">
              </div> <!-- form-group end.// -->
            </div> <!-- form-row end.// -->

            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Last Payment</label>
                  <input type="text" class="form-control text-center bg-dark text-primary" name="fiLast" id="fiLast" value="<?=$fiLast ?>">
              </div> <!-- form-group end.// -->

              <div class="form-group col-md-6">
                <label>Next Payment</label>
                  <input type="text" class="form-control text-center bg-dark text-primary" name="fiNext" id="fiNext" value="<?=$fiNext ?>">
              </div> <!-- form-group end.// -->
            </div> <!-- form-row end.// -->  

            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Invoice Numbers</label>
                  <input type="text" class="form-control text-center bg-dark text-primary" name="fiInv" id="fiInv" value="<?=$fiInv ?>">
              </div> <!-- form-group end.// -->

              <div class="form-group col-md-6">
                <label>Sales Expected</label>
                  <input type="text" class="form-control text-center bg-dark text-primary" name="saExp" id="saExp" value="<?=$saExp ?>">
              </div> <!-- form-group end.// -->
            </div> <!-- form-row end.// -->

            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Last Called</label>
                  <input type="text" class="form-control text-center bg-dark text-primary" name="saCaLast" id="saCaLast" value="<?=$saCaLast ?>">
              </div> <!-- form-group end.// -->

              <div class="form-group col-md-6">
                <label>Last Visited</label>
                  <input type="text" class="form-control text-center bg-dark text-primary" name="saViLast" id="saViLast" value="<?=$saViLast ?>">
              </div> <!-- form-group end.// -->
            </div> <!-- form-row end.// --> 

            <div class="form-row">
              <div class="form-group col-md-12">
                <label>Notes</label>
                  <input type="text" class="form-control text-center bg-dark text-primary" name="saNotes" id="saNotes" value="<?=$saNotes ?>">
              </div>    
            </div> <!-- form-row end.// --> 

            <div><input type="hidden" name="company_id" value="<?=$id?>" >
            </div>

            <br>

            <a href="sales.php"><button type="button" class="btn btn-outline-danger col-2">Cancel</button></a>

            <button type="submit" name="editSales" class="btn btn-outline-success col-2">Save</button> 
          </div>
        </form>
        </div>
      </div>
    </div>
  </section>  
  
  <!-- Footer -->

    <?php
    include('config/footer.php');
    ?>
           
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Removed the below to avoid double-click on dropdown -->
    <!-- <script src="js/bootstrap.min.js"></script> -->
  </body>
</html>
