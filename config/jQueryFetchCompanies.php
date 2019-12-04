<?php
    include('functions.php');

$connect = mysqli_connect("localhost", "root", "", "pab_crm");

// Companies Fetch

$outputCompanies = '';

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
	SELECT * FROM companies ORDER BY M_DATE_MOD LIMIT 3";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	$outputCompanies .= '<div class="table-responsive">
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
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
		
		$outputCompanies .= '
			<tr>
				<td>'.$row['C_ID'].'</td>
				<td>'.$row['C_REF_NUMBER'].'</td>
				<td>'.substr($row['C_NAME'], 0, 10).'</td>
				<td>'.substr($row['C_BILLING_ADDRESS'], 0, 10).'</td>
				<td>'.substr($row['C_CITY'], 0, 5).'</td>
				<td>'.substr($row['C_CONTACT_NAME'], 0, 6).'</td>
				<td>'.$row['C_CONTACT_TEL'].'</td>
				<td>'.substr($row['C_CONTACT_EMAIL'], 0, 10).'</td>
				<td>
				<button type="button" name="" id="viewCompany" class="btn btn-sm btn-dark">
				<a href="viewCompany.php?id='.$row['C_ID'].'">View</a>
				</button>
				
				<button type="button" name="" id="editCompany" class="btn btn-sm btn-warning">
				<a href="editCompany.php?id='.$row['C_ID'].'">Edit</a>
				</button>

				<button type="submit" name="deleteCompany" id="deleteCompany" class="btn btn-sm btn-danger" value="<?='.$row['C_ID'].' ?>">Delete
				</button>
				
				</td>
				</tr>
			
		';
	}
	echo $outputCompanies;
}
else
{
	echo 'Data Not Found';
}

mysqli_close($connect);



