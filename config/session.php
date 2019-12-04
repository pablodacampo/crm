<?php
    include('login.php'); // Includes Login Script
    // mysqli_connect() function opens a new connection to the MySQL server. 

    $conn = mysqli_connect("localhost", "root", "", "pab_crm") OR die(mysql_error()); 

    if(isset($_SESSION['login_user'])) {
    
    // session_start();// Starting Session 
    // Storing Session 
    $user_check = $_SESSION['login_user']; 
    // SQL Query To Fetch Complete Information Of User 
    $query = "SELECT U_EMAIL from users where U_EMAIL = '$user_check'"; 
    $ses_sql = mysqli_query($conn, $query); 
    $row = mysqli_fetch_assoc($ses_sql); 
    $login_session = $row['U_EMAIL'];
}
?>