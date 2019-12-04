<?php
    if(!isset($_SESSION['login_user'])){ 
      include('config/functions.php'); 
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>USN France | CRM Users</title>

  <!-- CSS Header -->
  
    <?php
    include('config/cssHeader.php');
    ?> 

  <body>

  <!-- Left Navbar --> 

  <nav class="navbar navbar-expand-md">
    <a class="navbar-brand" href="#"><img src="img/usn-logo-small.png" class="usn-logo-small" alt="usn-logo-small"> <b><em>USN France</em></b></a>
    <button class="navbar-toggler bg-warning" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>Menu
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="companies.php">Companies</a>       
        </li>
        <li class="nav-item">
          <a class="nav-link" href="finances.php">Finances</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="sales.php">Sales</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="users.php">Users</a>
        </li>
      </ul>

  <!-- Right Navbar -->

      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="">Welcome : <i><?php echo $login_session; ?></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="config/logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </nav>

  <!-- Header -->

  <header id="header">
    <div class="container">
      <div class="row"> <!-- Grid Format-->
        <div class="col-md-10">
          <h1> <img src="img/usn-logo-small.png" class="usn-logo-small" alt="usn-logo-small">
          Users <small>| Manage Users</small></h1>
        </div>
        <div class="col-md-2">
            <div class="dropdown create">
              <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Create New
              </button>
              <div class="dropdown-menu bg-warning">
                <a class="dropdown-item" href="addCompany.php">Company</a>
                <a class="dropdown-item" href="addUser.php">User</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Breadcrumb -->

  <section id="breadcrumb">
    <div class="container">
      <ol class="breadcrumb">
        <li class="active"><h3>Users</h3></li>
      </ol>
    </div>
  </section>


  <!-- Main -->

  <section id="main">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
             <h6> Users Overview</h6>
            </div>
            <br>
              <div class="col-md-12">
                <div class="card text-dark bg-warning">
                  <div class="card-body">
                    <input class="form-control" type="text" placeholder="Filter Users...">
                  </div>
                </div>
                <form action="config/functions.php" method="POST">
                <table class="table table-striped table-hover">
                  <tr>
                    <th>ID</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Phone Number</th>
                    <th>Role</th>
                    <th>Salary</th>
                    <th>Last Login</th>
                    <th>Action</th>
                  </tr>

                  <?php foreach($users as $user) { ?>

                  <tr>                
                    <td><?php echo $user['U_ID'] ?></td>
                    <td><?php echo $user['U_USERNAME'] ?></td>
                    <td><?php echo $user['U_EMAIL'] ?></td>
                    <td><?php echo $user['U_PASSWORD'] ?></td>
                    <td><?php echo $user['U_TEL'] ?></td>
                    <td><?php echo $user['U_ROLE'] ?></td>
                    <td><?php echo $user['U_SALARY'] ?></td>
                    <td><?php echo $user['U_LOGIN'] ?></td>             
                    <td>
                      <a href="editUser.php?id=<?=$user['U_ID']?>"><button
                       type="button" id="editUser"
                       class="btn text-dark btn-warning btn-sm">E</button></a>
                      <button type="submit" name="deleteUser" value="<?= $user['U_ID'] ?>" class="btn btn-danger btn-sm" >D</button>

                    </td>
                  </tr>

                  <?php } ?>

                </table>
                </form>
              </div>
            </div>
          </div>
          <br>
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


