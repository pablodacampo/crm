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
    <title>USN France | CRM Finances</title>

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
        <li class="nav-item active">
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
          Finances <small>| Manage Finances</small></h1>
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
        <li class="active"><h3> Finances</h3></li>
      </ol>
    </div>
  </section>

  <!-- Main -->

  <section id="main">
    <div class="container">
      <div class="card">
        <div class="card-header">
         <h6> Finances Overview</h6>
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
			url:"config/jQueryFetchFinances.php",
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
