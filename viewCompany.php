<?php
        include('config/functions.php');
?> 

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>USN France | View Company</title>

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
    Admin Area <small>| View Company</small></h1>
        </div>
      </div>
    </div>
  </header>

  <!-- Main -->

  <section id="main">
    <div class="container">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <form class="text-center" id="viewCompany" action="config/functions.php" method="POST">

          <div class="form-row">

                  <div class="form-group col-md-6">
                    <label>Reference Number</label>
                      <span class="d-block p-2 bg-info text-white"><?php echo $coRef ?></span>
                  </div> <!-- form-group end.// -->

                  <div class="form-group col-md-6">
                    <label>Company Name</label>
                    <span class="d-block p-2 bg-info text-white"><?php echo $coName ?></span>
                  </div> <!-- form-group end.// -->
                </div> <!-- form-row end.// -->

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label>Billing Address</label>
                    <span class="d-block p-2 bg-info text-white"><?php echo $coAdd ?></span>
                  </div> <!-- form-group end.// -->

                  <div class="form-group col-md-6">
                    <label>City</label>
                    <span class="d-block p-2 bg-info text-white"><?php echo $coCity ?></span>
                  </div> <!-- form-group end.// -->
                </div> <!-- form-row end.// -->

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label>Owner</label>
                    <span class="d-block p-2 bg-info text-white"><?php echo $coOwn ?></span>
                  </div> <!-- form-group end.// -->

                  <div class="form-group col-md-6">
                    <label>Company Tel:</label>
                    <span class="d-block p-2 bg-info text-white"><?php echo $coTel ?></span>
                  </div> <!-- form-group end.// -->
                </div> <!-- form-row end.// -->

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label>Company Website</label>
                    <span class="d-block p-2 bg-info text-white"><?php echo $coWeb ?></span>
                  </div> <!-- form-group end.// -->

                  <div class="form-group col-md-6">
                    <label>Company Email</label>
                    <span class="d-block p-2 bg-info text-white"><?php echo $coEmail ?></span>
                  </div> <!-- form-group end.// -->
                </div> <!-- form-row end.// -->  
  
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label>Contact Name</label>
                    <span class="d-block p-2 bg-info text-white"><?php echo $conName ?></span>
                  </div> <!-- form-group end.// -->

                  <div class="form-group col-md-6">
                    <label>Contact Tel:</label>
                    <span class="d-block p-2 bg-info text-white"><?php echo $conTel ?></span>
                  </div> <!-- form-group end.// -->
                </div> <!-- form-row end.// --> 

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label>Contact Email</label>
                    <span class="d-block p-2 bg-info text-white"><?php echo $conEmail ?></span>
                  </div> <!-- form-group end.// -->

                  <div class="form-group col-md-6">
                    <label>Sales Rep</label>
                    <span class="d-block p-2 bg-info text-white"><<< To Be Added >>></span>
                  </div> <!-- form-group end.// -->
                </div> <!-- form-row end.// -->
                <br>
              <a href="companies.php"><button type="button" class="btn btn-outline-dark col-2">Exit</button></a>              

              <button type="submit"

              <?php foreach($companies as $company) { ?> 
              
              name="deleteCompany"              

              value="<?=$company['C_ID'] ?>"

              <?php } ?>
              
              class="btn btn-outline-danger col-2" >Delete</button>             
            
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
