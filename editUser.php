<?php    include('config/functions.php'); ?> 

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>USN France | Edit User</title>

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
    Admin Area <small>| Edit User</small></h1>
        </div>

      </div>
    </div>
  </header>

  <!-- Main -->

  <section id="main">
    <div class="container">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <form class="text-center" id="edit_user" action="config/functions.php" method="POST"> 

          <div class="form-row">
                  <div class="col form-group">
                    <label>User Name</label>
                      <input type="text" class="form-control" name="username" id="username" value="<?=$username ?>" >
                  </div> <!-- form- group end.// -->

                  <div class="col form-group">
                    <label>Email</label>
                      <input type="text" class="form-control" name="email" id="email" value="<?=$email ?>" >
                  </div> <!-- form-group end.// -->
                </div> <!-- form-row end.// -->

                <div class="form-row">
                  <div class="col form-group">
                    <label>Password</label>
                      <input type="text" class="form-control" name="password" id="password" value="<?=$password ?>" >
                  </div> <!-- form-group end.// -->

                  <div class="col form-group">
                    <label>Phone Number</label>
                      <input type="text" class="form-control" name="tel" id="tel" 
                      value="<?=$tel ?>" >
                  </div> <!-- form-group end.// -->
                </div> <!-- form-row end.// -->

                <div class="form-row">
                  <div class="col form-group">
                    <label>Role</label>
                      <input type="text" class="form-control" name="role" id="role" 
                      value="<?=$role ?>" >
                  </div> <!-- form-group end.// -->

                  <div class="col form-group">
                    <label>Salary</label>
                      <input type="text" class="form-control" name="salary" id="salary" value="<?=$salary ?>" >
                  </div> <!-- form-group end.// -->
                </div> <!-- form-row end.// -->
              
              <div><input type="hidden" name="user_id" value="<?=$id?>" >
              </div>

              <a href="users.php"><button type="button" class="btn btn-outline-danger col-2">Cancel</button></a>

            <button type="submit" name="editUser" class="btn btn-outline-success col-2">Edit User</button>           
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