<?php
    // Starting Session 
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

    if (isset($_POST['submit'])) { 
      if (empty($_POST['email']) || empty($_POST['password'])) { 
        $error = "Email or Password is invalid"; 
      } 
      else{ 
        // Define $email and $password 
        $email = $_POST['email']; 
        $password = $_POST['password'];
        // mysqli_connect() function opens a new connection to the MySQL server. 
        $conn = mysqli_connect("localhost", "root", "", "pab_crm"); 
        // SQL query to fetch information of registerd users and finds user match. 
        $query = "SELECT U_EMAIL, U_PASSWORD from users where U_EMAIL=? AND U_PASSWORD=?"; 
        // To protect MySQL injection for Security purpose 
        $stmt = $conn->prepare($query); 
        $stmt->bind_param("ss", $email, $password); 
        $stmt->execute(); 
        $stmt->bind_result($email, $password); 
        $stmt->store_result(); 
        if($stmt->fetch()) //fetching the contents of the row { 
          $_SESSION['login_user'] = $email; // Initializing Session

        header("location: //dashboard.php"); // Redirecting To Profile Page 
      } 
      mysqli_close($conn); // Closing Connection 
    }

    ?>