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
    <title>USN France | CRM Companies</title>

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
        <li class="nav-item active">
          <a class="nav-link" href="companies.php">Companies</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="finances.php">Finances</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="sales.php">Sales</a>
        </li>
        <li class="nav-item">
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
          Companies <small>| Manage Companies</small></h1>
        </div>
          <div class="col-md-2">
            <div class="dropdown create">
              <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Create New
              </button>
              <div class="dropdown-menu bg-warning">
                <a class="dropdown-item" href="addCompany.php">Company</a>
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
        <li class="active"><h3> Companies</h3></li>
      </ol>
    </div>
  </section>

  <!-- Main -->

  <section id="main">
    <div class="container">
      <div class="card">
        <div class="card-header">
         <h6> Companies Overview</h6>
        </div>
        <br>
          <form action="config/functions.php" method="POST">
          <div class="col-md-12">
            <div class="card text-dark bg-warning">
              <div class="card-body">

                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label>Search</label>
                      <input type="text" name="search_text" id="search_text" placeholder="Search by Customer Details" class="form-control" />
                  </div> <!-- form-group end.// -->
                  </div> <!-- form-row.// -->
                  </div>
                  </div>
                  <br />
                  <div>
                <div id="result"></div>
              </div>
            <div style="clear:both"></div>
              
            <br />

            <!-- <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="search" placeholder="Search Companies" aria-label="Search">
          <span>     <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">Search</button></span> 
            </form> -->
                    
            <table class="table table-striped table-hover">
              <tr>
                <th>ID</th>
                <th>Ref:</th>
                <th>Name</th>
                <th>Address</th>
                <th>City</th>
                <th>C. Name</th>
                <th>C. Tel.</th>
                <th>C. Email</th>
                <th>Action</th>
              </tr>

              <?php foreach($companies as $company) { ?>

              <tr>
                <td><?php echo $company['C_ID'] ?></td>
                <td name="coRef" id="coRef"><?php echo $company['C_REF_NUMBER'] ?></td>
                <td><?php echo substr($company['C_NAME'], 0, 10) ?></td>
                <td><?php echo substr($company['C_BILLING_ADDRESS'], 0, 11) ?></td>
                <td><?php echo substr($company['C_CITY'], 0, 5) ?></td>
                <td><?php echo $company['C_CONTACT_NAME'] ?></td>
                <td><?php echo $company['C_CONTACT_TEL'] ?></td>
                <td><?php echo substr($company['C_CONTACT_EMAIL'], 0, 10) ?></td>
                <td>
                <a class="btn text-warning btn-dark btn-sm" id="viewCompany" href="viewCompany.php?id=<?=$company['C_ID']?>">V</a>

                <a href="editCompany.php?id=<?=$company['C_ID']?>"><button
                type="button" id="editCompany"
                class="btn text-dark btn-warning btn-sm">E</button></a>
                
                <button type="submit" name="deleteCompany" value="<?= $company['C_ID'] ?>" class="btn btn-danger btn-sm" >D</button> 
                </td>
              </tr>

              <?php } ?>
              
            </table>
            </form>
          </div>
        </div>
      </div>
    <br>                
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

    <!-- Removed the below to avoid double-click on dropdown -->
    <!-- <script src="js/bootstrap.min.js"></script> -->
    
  </body>
</html>

<!-- jQuery /  Asynchronous JavaScript And XML -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Bootstrap core JavaScript -->

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<!-- jQuery / Ajax Script -->

<script>
$(document).ready(function(){
	load_data();
	function load_data(query)
	{
		$.ajax({
			url:"config/jQueryFetchCompanies.php",
			method:"post",
			data:{query:query},
			success:function(data)
			{
				$('#result').html(data);
			}
		});
	}
	
	$('#search_text').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search);
		}
		else
		{
			load_data();			
		}
	});
});
</script>
