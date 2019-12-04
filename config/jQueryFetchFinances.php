<?php

// Finances Fetch

$connect = mysqli_connect("localhost", "root", "", "pab_crm");

$outputFinances = '';

if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * FROM companies 
	WHERE C_REF_NUMBER LIKE '%".$search."%'
	OR C_NAME LIKE '%".$search."%' 
	OR C_CITY LIKE '%".$search."%'
	ORDER BY C_REF_NUMBER LIMIT 25
	";
}
else
{
	$query = "
	SELECT * FROM companies ORDER BY M_DATE_MOD LIMIT 10";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	$outputFinances .= '<div class="table-responsive">
					<table class="table table-striped table-hover">
						<tr>
						<th>ID</th>
						<th>Ref:</th>
						<th>Name</th>
						<th>Address</th>
						<th>Total €\'s</th>
						<th>Pay Terms</th>
						<th>Paid Last</th>
						<th>Pay Due</th>
						<th>Invoices</th>
						<th>Sales Rep</th>
						<th>Action</th>
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
		
		$outputFinances .= '
			<tr>
				<td>'.$row['C_ID'].'</td>
				<td>'.$row['C_REF_NUMBER'].'</td>
				<td>'.substr($row['C_NAME'], 0, 10).'</td>
				<td>'.substr($row['C_BILLING_ADDRESS'], 0, 10).'</td>
				<td>'.substr($row['F_TOTAL_SALES'], 0, 8).'</td>
				<td>'.$row['F_DISC_TERMS'].'</td>
				<td>'.substr($row['F_PAYMENT_LAST'], 2, 8).'</td>
				<td>'.substr($row['F_PAYMENT_NEXT'], 2, 8).'</td>
				<td>'.substr($row['F_INVOICES'], 0, 7).'</td>
				<td>'.substr($row['S_NOTES'], 0, 10).'</td>
				<td>
				<button type="button" name="" id="" class="btn btn-sm btn-dark">
				<a href="viewFinances.php?id='.$row['C_ID'].'">View</a>
				</button>
				
				<button type="button" name="" id="" class="btn btn-sm btn-warning">
				<a href="editFinances.php?id='.$row['C_ID'].'">Edit</a>
				</button>
				
				</td>
				</tr>
			
		';
	}
	echo $outputFinances;
}
else
{
	echo 'Data Not Found';
}

mysqli_close($connect);