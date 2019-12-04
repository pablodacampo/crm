<?php
    include('config/functions.php');
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>USN France | Add Company</title>

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
    Admin Area <small>| Add Company</small></h1>
        </div>

      </div>
    </div>
  </header>

  <!-- Main -->

  <section id="main">
    <div class="container">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <form class="text-center" id="addUser" action="config/functions.php" method="POST">

          <br>

            <h5><span class="border border-primary p-2 rounded shadow w-2" padding="5">Company Data</span></h5>

            <br>

              <div class="form-row">
                  <div class="col-md-6">
                    <label>Reference Number</label>
                      <input type="text" class="form-control text-center bg-dark text-primary" name="coRef" id="coRef" placeholder="">
                  </div> <!-- form-group end.// -->

                  <div class="col-md-6">
                    <label>Company Name</label>
                      <input type="text" class="form-control text-center bg-dark text-primary" name="coName" id="coName" placeholder="">
                  </div> <!-- form-group end.// -->
                  </div> <!-- form-row end.// -->

                <div class="form-row">
                  <div class="col form-group">
                    <label>Billing Address</label>
                      <input type="text" class="form-control text-center bg-dark text-primary" name="coAdd" id="coAdd" placeholder="">
                  </div> <!-- form-group end.// -->

                  <div class="col form-group">
                    <label>City</label>
                      <input type="text" class="form-control text-center bg-dark text-primary" name="coCity" id="coCity" placeholder="">
                  </div> <!-- form-group end.// -->
                </div> <!-- form-row end.// -->

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label>Owner</label>
                      <input type="text" class="form-control text-center bg-dark text-primary" name="coOwn" id="coOwn">
                  </div> <!-- form-group end.// -->

                  <div class="form-group col-md-6">
                    <label>Company Tel:</label>
                      <input type="text" class="form-control text-center bg-dark text-primary" name="coTel" id="coTel">
                  </div> <!-- form-group end.// -->
                </div> <!-- form-row end.// -->

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label>Company Website</label>
                      <input type="text" class="form-control text-center bg-dark text-primary" name="coWeb" id="coWeb">
                  </div> <!-- form-group end.// -->

                  <div class="form-group col-md-6">
                    <label>Company Email</label>
                      <input type="text" class="form-control text-center bg-dark text-primary" name="coEmail" id="coEmail">
                  </div> <!-- form-group end.// -->
                </div> <!-- form-row end.// -->  
  
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label>Contact Name</label>
                      <input type="text" class="form-control text-center bg-dark text-primary" name="conName" id="conName">
                  </div> <!-- form-group end.// -->

                  <div class="form-group col-md-6">
                    <label>Contact Tel:</label>
                      <input type="text" class="form-control text-center bg-dark text-primary" name="conTel" id="conTel">
                  </div> <!-- form-group end.// -->
                </div> <!-- form-row end.// --> 

                <div class="form-row">
                  <div class="col-md-6 offset-md-3">
                    <label>Contact Email</label>
                      <input type="text" class="form-control text-center bg-dark text-primary" name="conEmail" id="conEmail">
                  </div> <!-- form-group end.// -->
                </div> <!-- form-row end.// -->

                <br><br>

                <h5><span class="border border-primary p-2 rounded shadow w-2" padding="5">Financial Data</span></h5>

                <br>

                <div class="form-row"><div class="form-group col-md-6">
                <label>Discount & Pay Terms</label>
                  <input type="text" class="form-control text-center bg-dark text-primary" name="fiDisPay" id="fiDisPay">
              </div> <!-- form-group end.// -->

              <div class="form-group col-md-6">
                <label>Next Payment</label>
                  <input type="text" class="form-control text-center bg-dark text-primary" name="fiNext" id="fiNext" placeholder="YYYY/MM/DD">
              </div> <!-- form-group end.// -->
            </div> <!-- form-row end.// -->  

            <div class="form-row">
              <div class="col-md-6 offset-md-3">
                <label>Invoice Numbers</label>
                  <input type="text" class="form-control text-center bg-dark text-primary" name="fiInv" id="fiInv">
              </div> <!-- form-group end.// -->
            </div> <!-- form-row end.// -->

            <br><br>

            <h5><span class="border border-primary p-2 rounded shadow w-2" padding="5">Sales Data</span></h5>

            <br>
            
         <?php foreach($salesUsers as $salesUser) { ?>
            
            <div class="form-row">
              <div class="form-group col-md-6 offset-md-3">
               <label>Sales Rep</label>
                <div class="dropdown">
                  <button type="button" class="btn bg-dark text-primary dropdown-toggle" name="saRep" id="saRep" data-toggle="dropdown">
                    Select Sales Rep
                  </button>                  
                    <div class="dropdown-menu">                 
                    <div class="dropdown-item" ><?php echo $salesUser['U_USERNAME'] ?></div>
                  </div>
                </div>
               </div> <!-- form-group end. -->
             </div> <!-- form-row end. -->

             <?php } ?>

             <div class="form-row">
              <div class="col-md-6 offset-md-3">
                <label>Sales Rep Entered</label>
                  <input type="text" class="form-control text-center bg-dark text-primary" >
              </div> <!-- form-group end.// -->
            </div> <!-- form-row end.// --> 

            <br>

            <div class="form-row">
              <div class="form-group col-md-12">
                <label>Notes</label>
                <textarea class="form-control text-center bg-dark text-primary" rows="3" name="saNotes" id="saNotes"></textarea>
              </div> <!-- form-group end.// -->  
            </div> <!-- form-row end.// -->                       

              <a href="companies.php"><button type="button" class="btn btn-outline-danger col-2">Cancel</button></a>
            <button type="submit" name="saveNewCompany" class="btn btn-outline-success col-2">Save</button>
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
