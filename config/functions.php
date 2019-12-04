<?php

include('session.php');

// MAIN DATA

// COMPANIES

// Create Query
$queryCompanies = "SELECT * FROM companies ORDER BY M_DATE_MOD DESC LIMIT 3";

// Get Result
$resultCompanies = mysqli_query($conn, $queryCompanies);

// Free Result
// mysqli_free_result($resultCompanies);

// Fetch Data
$companies = mysqli_fetch_all($resultCompanies, MYSQLI_ASSOC);
// var_dump($companies);



// FINANCES

// $queryFinances = 'SELECT * FROM finances ORDER BY C_REF_NUMBER ASC LIMIT 10';

// $resultFinances = mysqli_query($conn, $queryFinances);

// mysqli_free_result($resultFinances);

// $finances = mysqli_fetch_all($resultFinances, MYSQLI_ASSOC);


// SALES

// Create Query
// $querySales = 'SELECT * FROM sales ORDER BY C_REF_NUMBER ASC LIMIT 10';

// // Get Result
// $resultSales = mysqli_query($conn, $querySales);

// // Fetch Data
// $sales = mysqli_fetch_all($resultSales, MYSQLI_ASSOC);
// // var_dump($sales);

// // Free Result
// mysqli_free_result($resultSales);


// USERS

// Create Query
$queryUsers = "SELECT * FROM users ORDER BY U_ID ASC LIMIT 10";

// var_dump($queryUsers);

// Get Result
$resultUsers = mysqli_query($conn, $queryUsers);

// Free Result
// mysqli_free_result($resultUsers);

// Fetch Data
$users = mysqli_fetch_all($resultUsers, MYSQLI_ASSOC);
// var_dump($users);

// SALES ID

// Create Query
$querySalesUsers = "SELECT * FROM users WHERE U_ROLE LIKE '%Sales%'";

// Get Result
$resultSalesUsers = mysqli_query($conn, $querySalesUsers);

// Free Result
//mysqli_free_result($resultSalesUsers);

// Fetch Data
$salesUsers = mysqli_fetch_all($resultSalesUsers, MYSQLI_ASSOC);
// var_dump($salesUsers);

// if (isset($_POST[''])) {

// }




// OTHER DATA

// COMPANY COUNT

// Create Query
$queryCompanyCount = "SELECT * FROM companies ORDER BY C_ID DESC LIMIT 1";

// Get Result
$resultCompanyCount = mysqli_query($conn, $queryCompanyCount);

// Free Result
// mysqli_free_result($resultCompanyCount);

// Fetch Data
$companyCount = mysqli_fetch_row($resultCompanyCount);
// var_dump($companyCount);


// FINANCE COUNT

// Create Query
// $queryFinanceCount = 'SELECT * FROM finances ORDER BY F_ID DESC LIMIT 1';

// // Get Result
// $resultFinanceCount = mysqli_query($conn, $queryFinanceCount);

// Free Result
// mysqli_free_result($resultFinanceCount);

// // Fetch Data
// $financeCount = mysqli_fetch_row($resultFinanceCount);
// var_dump($financeCount);





// SALES COUNT

// Create Query
// $querySaleCount = 'SELECT * FROM sales ORDER BY S_ID DESC LIMIT 1';

// // Get Result
// $resultSaleCount = mysqli_query($conn, $querySaleCount);

// // Free Result
// mysqli_free_result($resultSaleCount);

// // Fetch Data
// $saleCount = mysqli_fetch_row($resultSaleCount);
// // var_dump($saleCount);


// USER COUNT

// Create Query
$queryUserCount = "SELECT * FROM users ORDER BY U_ID DESC LIMIT 1";

// Get Result
$resultUserCount = mysqli_query($conn, $queryUserCount);

// Free Result
// mysqli_free_result($resultUserCount);

// Fetch Data
$userCount = mysqli_fetch_row($resultUserCount);
// var_dump($userCount);


// LAST LOGIN


// <<<<< TBA >>>>>


// COMPANY DATA SEARCH

// $conn = mysqli_connect("localhost", "root", "", "pab_crm");

// $set = $_POST['Search']; 

// if($set) {
  
//     $show = "SELECT * FROM companies WHERE C_NAME='$set'";
//     $result = mysqli_query($conn, $show);

//     while($rows = mysqli_fetch_array($result)) {

//         echo $rows['C_REF_NUMBER'];
//         echo $rows['C_NAME'];
//         echo $rows['C_C_CITY'];
//         echo "<br/>";
//     }
// } else {
//     echo "No Data Found";
// }


// CITY SEARCH

// if(isset($_POST['co2Search'])) {

//     $enterSearch = $_POST['co2Search'];
//     $queryToSearch = "SELECT * FROM `companies` WHERE (C_REF_NUMBER, `C_NAME`, C_CITY) LIKE '%".$enterSearch."%' ORDER BY `C_REF_NUMBER` LIMIT 5" ;
//     $searchResult = filterCity($queryToSearch);

// } else {

//     $searchQuery = "SELECT * FROM `companies`";
//     $searchResult = filterCity($searchQuery);
// }

// function filterCity($searchQuery) {

//     $conn = mysqli_connect("localhost", "root", "", "pab_crm"); 

//     $filterResult = mysqli_query($conn, $searchQuery);
//     return $filterResult;
//     header("Location: ../companies.php");
// }

// CITY DROPDOWN

// // Create Query
// $queryCities = 'SELECT DISTINCT C_CITY FROM companies ORDER BY C_CITY DESC';

// // Get Result
// $resultCities = mysqli_query($conn, $queryCities);

// // Fetch Data
// $cities = mysqli_fetch_all($resultCities, MYSQLI_ASSOC);
// // var_dump($cities);

// // Free Result
// mysqli_free_result($resultCities);


// C.R.U.D

// Add User

if (isset($_POST['saveNewUser'])) {

    if(!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['tel']) && !empty($_POST['role']) && !empty($_POST['salary'])) {

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $tel = $_POST['tel'];
        $role = $_POST['role'];
        $salary = $_POST['salary'];    
        
    $addUserQuery = "INSERT INTO `users` (
        `U_USERNAME`, 
        `U_EMAIL`, 
        `U_PASSWORD`, 
        `U_TEL`, 
        `U_ROLE`, 
        `U_SALARY`, 
        `U_LOGIN`) 
        VALUES (?, ?, ?, ?, ?, ?, NOW())";

    $stmt = $conn->prepare($addUserQuery); 
    $stmt->bind_param("ssssss", $username, $email, $password, $tel, $role, $salary);

    if ($stmt->execute()) {
        $_SESSION['msg'] = "New User Successfully Added";
        $_SESSION['alert'] = "alert alert-success role-alert";
    }    
    $stmt->close();
    $conn->close();
    }
     else {
        $_SESSION['msg'] = "Incorrect Data Entered";
        $_SESSION['alert'] = "alert alert-danger role-alert";
    }
    // sleep(5);    
    header("Location: ../users.php");
}

// Delete User

if (isset($_POST['deleteUser'])) {
    $U_ID = $_POST['deleteUser'];

    $deleteUserQuery = "DELETE FROM `users` WHERE `U_ID` =?";
    $stmt = $conn->prepare($deleteUserQuery);
    $stmt->bind_param('i', $U_ID);
    if ($stmt->execute()) {
        $_SESSION['msg'] = "User Successfully Deleted";
        $_SESSION['alert'] = "alert alert-success role-alert";
    }
    $stmt->close();   
    $conn->close();
    header("Location: ../users.php");
}

// Update User

if(isset($_POST['editUser'])) {

    $updateUser = "UPDATE `users` SET
     `U_USERNAME` = '".$_POST['username']."',
     `U_EMAIL` = '".$_POST['email']."',
     `U_PASSWORD` = '".$_POST['password']."',
     `U_TEL` = '".$_POST['tel']."',
     `U_ROLE` = '".$_POST['role']."',
     `U_SALARY` = '".$_POST['salary']."',
     `U_LOGIN` = '".date('Y-m-d')."'

     WHERE `U_ID` = '".$_POST['user_id']."'    
    ";

    if(mysqli_query($conn, $updateUser)) {
        header('Location: ../users.php');
    } else {
        echo "Error : ". mysqli_error($conn);
    }
}

$id = '';
$username = '';
$email = '';
$password = '';
$tel = '';
$role = '';
$salary = '';
$login = '';

if(isset($_GET['id'])) {

    $userQuery = "SELECT `U_ID`, `U_USERNAME`, `U_EMAIL`, `U_PASSWORD`, `U_TEL`, `U_ROLE`, `U_SALARY`, `U_LOGIN` FROM `users` WHERE `U_ID`=" . $_GET['id'];

    $resultUserQuery = mysqli_query($conn, $userQuery);

    if(mysqli_num_rows($resultUserQuery) > 0) {
        $userRow = mysqli_fetch_assoc($resultUserQuery);

        $id = $userRow['U_ID'];
        $username = $userRow['U_USERNAME'];
        $email = $userRow['U_EMAIL'];
        $password = $userRow['U_PASSWORD'];
        $tel = $userRow['U_TEL'];
        $role = $userRow['U_ROLE'];
        $salary = $userRow['U_SALARY'];
        $login = $userRow['U_LOGIN'];
    }
}


// View Company

// if(isset($_POST['viewCompany'])) {

//     $view = "SELECT * FROM companies";
// }

// if(!empty($_POST['user_id'])){
//     $data = array();

//     //get user data from the database
//     $query = $db->query("SELECT * FROM users WHERE id = {$_POST['C_ID']}");
    
//     if($query->num_rows > 0){
//         $userData = $query->fetch_assoc();
//         $data['status'] = 'ok';
//         $data['result'] = $userData;
//     }else{
//         $data['status'] = 'err';
//         $data['result'] = '';
//     }
    
//     //returns data as JSON format
//     echo json_encode($data);
// }

// Add Company

if (isset($_POST['saveNewCompany'])) {

    if(!empty($_POST['coRef']) && !empty($_POST['coName']) && !empty($_POST['coAdd']) && !empty($_POST['coCity']) && !empty($_POST['coOwn']) && !empty($_POST['coTel']) && !empty($_POST['coWeb']) && !empty($_POST['coEmail']) && !empty($_POST['conName']) && !empty($_POST['conTel']) && !empty($_POST['conEmail']) && !empty($_POST['fiDisPay']) && !empty($_POST['fiNext']) && !empty($_POST['fiInv']) && !empty($_POST['saNotes']) && !empty($_POST['saRep'])) {

        $coRef = $_POST['coRef'];
        $coName = $_POST['coName'];
        $coAdd = $_POST['coAdd'];
        $coCity = $_POST['coCity'];
        $coOwn = $_POST['coOwn'];
        $coTel = $_POST['coTel'];   
        $coWeb = $_POST['coWeb'];   
        $coEmail = $_POST['coEmail'];   
        $conName = $_POST['conName'];   
        $conTel = $_POST['conTel'];   
        $conEmail = $_POST['conEmail'];
        $fiDisPay = $_POST['fiDisPay'];
        $fiNext = $_POST['fiNext'];
        $fiInv = $_POST['fiInv'];
        $saNotes = $_POST['saNotes'];  
        $saRep = $_POST['saRep'];  
        
    $addCompanyQuery = "INSERT INTO `companies` (
        `C_REF_NUMBER`,
        `C_NAME`,
        `C_BILLING_ADDRESS`,
        `C_CITY`,
        `C_OWNER`,
        `C_TEL`,
        `C_WEBSITE`,
        `C_EMAIL`,
        `C_CONTACT_NAME`,
        `C_CONTACT_TEL`,
        `C_CONTACT_EMAIL`,
        `F_DISC_TERMS`,
        `F_PAYMENT_NEXT`,
        `F_INVOICES`,
        `F_TOTAL_SALES`,
        `F_PAYMENT_LAST`, 
        `S_SALES_EXP`,
        `S_CALL_LAST`,
        `S_VISIT_LAST`, 
        `S_NOTES`,
        `S_REP_ID`,
        `M_DATE_MOD`) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 0, NOW(), 0.0, NOW(), NOW(), ?, ?, NOW())";

    $stmt = $conn->prepare($addCompanyQuery); 
    $stmt->bind_param("ssssssssssssssss", $coRef, $coName, $coAdd, $coCity, $coOwn, $coTel, $coWeb, $coEmail, $conName, $conTel, $conEmail, $fiDisPay, $fiNext, $fiInv, $saNotes, $saRep);

    if ($stmt->execute()) {
        $_SESSION['msg'] = "New Company Successfully Added";
        $_SESSION['alert'] = "alert alert-success role-alert";
    }    
    $stmt->close();
    $conn->close();
    }
     else {
        $_SESSION['msg'] = "Incorrect Data Entered";
        $_SESSION['alert'] = "alert alert-danger role-alert";
    }
    // sleep(5);    
    header("Location: ../companies.php");
}

// Delete Company

if (isset($_POST['deleteCompany'])) {
    $C_ID = $_POST['deleteCompany'];

    $deleteCompanyQuery = "DELETE FROM `companies` WHERE `C_ID` =?";
    $stmt = $conn->prepare($deleteCompanyQuery);
    $stmt->bind_param('i', $C_ID);
    if ($stmt->execute()) {
        $_SESSION['msg'] = "Company Successfully Deleted";
        $_SESSION['alert'] = "alert alert-success role-alert";
    }
    $stmt->close();   
    $conn->close();
    header("Location: ../Companies.php");
}

// Update company

if(isset($_POST['editCompany'])) {

    $updateCompany = "UPDATE `companies` SET
        `C_REF_NUMBER` = '".$_POST['coRef']."',
        `C_NAME` = '".$_POST['coName']."',
        `C_BILLING_ADDRESS` = '".$_POST['coAdd']."',
        `C_CITY` = '".$_POST['coCity']."',
        `C_OWNER` = '".$_POST['coOwn']."',
        `C_TEL` = '".$_POST['coTel']."',
        `C_WEBSITE` = '".$_POST['coWeb']."',
        `C_EMAIL` = '".$_POST['coEmail']."',
        `C_CONTACT_NAME` = '".$_POST['conName']."',
        `C_CONTACT_TEL` = '".$_POST['conTel']."',
        `C_CONTACT_EMAIL` = '".$_POST['conEmail']."',
        `M_DATE_MOD` = '".date('Y-m-d')."'

     WHERE `C_ID` = '".$_POST['company_id']."'    
    ";

    if(mysqli_query($conn, $updateCompany)) {
        header('Location: ../companies.php');
    } else {
        echo "Error : ". mysqli_error($conn);
    }
}

$coId = '';
$coRef = '';
$coName = '';
$coAdd = '';
$coCity = '';
$coOwn = '';
$coTel = '';
$coWeb = '';
$coEmail = '';
$conName = '';
$conTel = '';
$conEmail = '';
$datMod = '';

if(isset($_GET['id'])) {

    $companyQuery = "SELECT 
    `C_ID`,
    `C_REF_NUMBER`,
    `C_NAME`,
    `C_BILLING_ADDRESS`,
    `C_CITY`,
    `C_OWNER`,
    `C_TEL`,
    `C_WEBSITE`,
    `C_EMAIL`,
    `C_CONTACT_NAME`,
    `C_CONTACT_TEL`,
    `C_CONTACT_EMAIL`,
    `M_DATE_MOD`
    FROM `companies` WHERE `C_ID`=" . $_GET['id'];

    $resultCompanyQuery = mysqli_query($conn, $companyQuery);

    if(mysqli_num_rows($resultCompanyQuery) > 0) {
        $companyRow = mysqli_fetch_assoc($resultCompanyQuery);

        $coId = $companyRow['C_ID'];
        $coRef = $companyRow['C_REF_NUMBER'];
        $coName = $companyRow['C_NAME'];
        $coAdd = $companyRow['C_BILLING_ADDRESS'];
        $coCity = $companyRow['C_CITY'];
        $coOwn = $companyRow['C_OWNER'];
        $coTel = $companyRow['C_TEL'];
        $coWeb = $companyRow['C_WEBSITE'];
        $coEmail = $companyRow['C_EMAIL'];
        $conName = $companyRow['C_CONTACT_NAME'];
        $conTel = $companyRow['C_CONTACT_TEL'];
        $conEmail = $companyRow['C_CONTACT_EMAIL'];
        $datMod = $companyRow['M_DATE_MOD'];
    }
}



// Update Finances

if(isset($_POST['editFinances'])) {

    $updateFinance = "UPDATE `companies` SET
        `C_REF_NUMBER` = '".$_POST['coRef']."',
        `C_NAME` = '".$_POST['coName']."',
        `C_BILLING_ADDRESS` = '".$_POST['coAdd']."',
        `C_CITY` = '".$_POST['coCity']."',
        `C_OWNER` = '".$_POST['coOwn']."',
        `C_TEL` = '".$_POST['coTel']."',
        `C_WEBSITE` = '".$_POST['coWeb']."',
        `C_EMAIL` = '".$_POST['coEmail']."',
        `C_CONTACT_NAME` = '".$_POST['conName']."',
        `C_CONTACT_TEL` = '".$_POST['conTel']."',
        `C_CONTACT_EMAIL` = '".$_POST['conEmail']."',
        `F_TOTAL_SALES` = '".$_POST['fiSal']."',
        `F_DISC_TERMS` = '".$_POST['fiDisPay']."',
        `F_PAYMENT_LAST` = '".$_POST['fiLast']."',
        `F_PAYMENT_NEXT` = '".$_POST['fiNext']."',
        `F_INVOICES` = '".$_POST['fiInv']."',
        `S_SALES_EXP` = '".$_POST['saExp']."',
        `S_CALL_LAST` = '".$_POST['saCaLast']."', 
        `S_NOTES` = '".$_POST['saNotes']."',
        `S_VISIT_LAST` = '".$_POST['saViLast']."',
        `M_DATE_MOD` = '".date('Y-m-d')."'

     WHERE `C_ID` = '".$_POST['company_id']."'    
    ";

    if(mysqli_query($conn, $updateFinance)) {
        header('Location: ../finances.php');
    } else {
        echo "Error : ". mysqli_error($conn);
    }
}

$coId = '';
$coRef = '';
$coName = '';
$coAdd = '';
$coCity = '';
$coOwn = '';
$coTel = '';
$coWeb = '';
$coEmail = '';
$conName = '';
$conTel = '';
$conEmail = '';
$fiSal = '';
$fiDisPay = '';
$fiLast = '';
$fiNext = '';
$fiInv = '';
$saExp = '';
$saCaLast = '';
$saNotes = '';
$saViLast = '';
$datMod = 'NOW()';

if(isset($_GET['id'])) {

    $financeQuery = "SELECT 
    `C_ID`,
    `C_REF_NUMBER`,
    `C_NAME`,
    `C_BILLING_ADDRESS`,
    `C_CITY`,
    `C_OWNER`,
    `C_TEL`,
    `C_WEBSITE`,
    `C_EMAIL`,
    `C_CONTACT_NAME`,
    `C_CONTACT_TEL`,
    `C_CONTACT_EMAIL`,
    `F_TOTAL_SALES`,
    `F_DISC_TERMS`,
    `F_PAYMENT_LAST`,
    `F_PAYMENT_NEXT`,
    `F_INVOICES`,
    `S_SALES_EXP`,
    `S_CALL_LAST`, 
    `S_NOTES`, 
    `S_VISIT_LAST`,
    `M_DATE_MOD`
    FROM `companies` WHERE `C_ID`=" . $_GET['id'];

    $resultFinanceQuery = mysqli_query($conn, $financeQuery);

    if(mysqli_num_rows($resultFinanceQuery) > 0) {
        $financeRow = mysqli_fetch_assoc($resultFinanceQuery);

        $coId = $financeRow['C_ID'];
        $coRef = $financeRow['C_REF_NUMBER'];
        $coName = $financeRow['C_NAME'];
        $coAdd = $financeRow['C_BILLING_ADDRESS'];
        $coCity = $financeRow['C_CITY'];
        $coOwn = $financeRow['C_OWNER'];
        $coTel = $financeRow['C_TEL'];
        $coWeb = $financeRow['C_WEBSITE'];
        $coEmail = $financeRow['C_EMAIL'];
        $conName = $financeRow['C_CONTACT_NAME'];
        $conTel = $financeRow['C_CONTACT_TEL'];
        $conEmail = $financeRow['C_CONTACT_EMAIL'];
        $fiSal = $financeRow['F_TOTAL_SALES'];
        $fiDisPay = $financeRow['F_DISC_TERMS'];
        $fiLast = $financeRow['F_PAYMENT_LAST'];
        $fiNext = $financeRow['F_PAYMENT_NEXT'];
        $fiInv = $financeRow['F_INVOICES'];
        $saExp = $financeRow['S_SALES_EXP'];
        $saCaLast = $financeRow['S_CALL_LAST'];
        $saNotes = $financeRow['S_NOTES'];
        $saViLast = $financeRow['S_VISIT_LAST'];
        $datMod = $financeRow['M_DATE_MOD'];
    }
}


// Update Sales

if(isset($_POST['editSales'])) {

    $updateSale = "UPDATE `companies` SET
        `C_REF_NUMBER` = '".$_POST['coRef']."',
        `C_NAME` = '".$_POST['coName']."',
        `C_BILLING_ADDRESS` = '".$_POST['coAdd']."',
        `C_CITY` = '".$_POST['coCity']."',
        `C_OWNER` = '".$_POST['coOwn']."',
        `C_TEL` = '".$_POST['coTel']."',
        `C_WEBSITE` = '".$_POST['coWeb']."',
        `C_EMAIL` = '".$_POST['coEmail']."',
        `C_CONTACT_NAME` = '".$_POST['conName']."',
        `C_CONTACT_TEL` = '".$_POST['conTel']."',
        `C_CONTACT_EMAIL` = '".$_POST['conEmail']."',
        `F_TOTAL_SALES` = '".$_POST['fiSal']."',
        `F_DISC_TERMS` = '".$_POST['fiDisPay']."',
        `F_PAYMENT_LAST` = '".$_POST['fiLast']."',
        `F_PAYMENT_NEXT` = '".$_POST['fiNext']."',
        `F_INVOICES` = '".$_POST['fiInv']."',
        `S_SALES_EXP` = '".$_POST['saExp']."',
        `S_CALL_LAST` = '".$_POST['saCaLast']."', 
        `S_NOTES` = '".$_POST['saNotes']."',
        `S_VISIT_LAST` = '".$_POST['saViLast']."',
        `M_DATE_MOD` = '".$_POST['datMod']."'

     WHERE `C_ID` = '".$_POST['company_id']."'    
    ";

    if(mysqli_query($conn, $updateSale)) {
        header('Location: ../sales.php');
    } else {
        echo "Error : ". mysqli_error($conn);
    }
}

$coId = '';
$coRef = '';
$coName = '';
$coAdd = '';
$coCity = '';
$coOwn = '';
$coTel = '';
$coWeb = '';
$coEmail = '';
$conName = '';
$conTel = '';
$conEmail = '';
$fiSal = '';
$fiDisPay = '';
$fiLast = '';
$fiNext = '';
$fiInv = '';
$saExp = '';
$saCaLast = '';
$saNotes = '';
$saViLast = '';
$datMod = 'NOW()';


if(isset($_GET['id'])) {

    $saleQuery = "SELECT 
    `C_ID`,
    `C_REF_NUMBER`,
    `C_NAME`,
    `C_BILLING_ADDRESS`,
    `C_CITY`,
    `C_OWNER`,
    `C_TEL`,
    `C_WEBSITE`,
    `C_EMAIL`,
    `C_CONTACT_NAME`,
    `C_CONTACT_TEL`,
    `C_CONTACT_EMAIL`,
    `F_TOTAL_SALES`,
    `F_DISC_TERMS`,
    `F_PAYMENT_LAST`,
    `F_PAYMENT_NEXT`,
    `F_INVOICES`,
    `S_SALES_EXP`,
    `S_CALL_LAST`, 
    `S_NOTES`, 
    `S_VISIT_LAST`,
    `M_DATE_MOD`
     FROM `companies` WHERE `C_ID`=" . $_GET['id'];

    $resultSaleQuery = mysqli_query($conn, $saleQuery);

    if(mysqli_num_rows($resultSaleQuery) > 0) {
        $saleRow = mysqli_fetch_assoc($resultSaleQuery);

        $coId = $saleRow['C_ID'];
        $coRef = $saleRow['C_REF_NUMBER'];
        $coName = $saleRow['C_NAME'];
        $coAdd = $saleRow['C_BILLING_ADDRESS'];
        $coCity = $saleRow['C_CITY'];
        $coOwn = $saleRow['C_OWNER'];
        $coTel = $saleRow['C_TEL'];
        $coWeb = $saleRow['C_WEBSITE'];
        $coEmail = $saleRow['C_EMAIL'];
        $conName = $saleRow['C_CONTACT_NAME'];
        $conTel = $saleRow['C_CONTACT_TEL'];
        $conEmail = $saleRow['C_CONTACT_EMAIL'];
        $fiSal = $saleRow['F_TOTAL_SALES'];
        $fiDisPay = $saleRow['F_DISC_TERMS'];
        $fiLast = $saleRow['F_PAYMENT_LAST'];
        $fiNext = $saleRow['F_PAYMENT_NEXT'];
        $fiInv = $saleRow['F_INVOICES'];
        $saExp = $saleRow['S_SALES_EXP'];
        $saCaLast = $saleRow['S_CALL_LAST'];
        $saNotes = $saleRow['S_NOTES'];
        $saViLast = $saleRow['S_VISIT_LAST'];
        $datMod = $saleRow['M_DATE_MOD'];
    }
}


mysqli_close($conn);

