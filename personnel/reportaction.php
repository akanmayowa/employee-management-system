

<?php
$dbHost     = "localhost"; 
$dbUsername = "root"; 
$dbPassword = ""; 
$dbName     = "pms"; 
 
$con = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName); 
 
if ($con->connect_error) { 
    die("Connection failed: " . $con->connect_error); 
}

	$output = "";
	if (isset($_POST['query']))
	 {
		$search = mysqli_real_escape_string($con, $_POST['query']);
		$sql = "SELECT * FROM employee WHERE ent LIKE '%$search%' || fname LIKE '%$search%' || 
				lname LIKE '%$search%'  || phone LIKE '%$search%'  || mname LIKE '%$search%'";
	$query = mysqli_query($con, $sql);
	if (mysqli_num_rows($query) > 0) 
	{
		$output .= "<table  class='display table table-striped table-bordered table-hover'>
		<thead class='thead-dark'>
			<tr>
				<th>EMPLOYEE NUMEBR</th>
				<th>FULL NAME</th>	
			</tr>
		</thead>";
		while ($row = mysqli_fetch_assoc($query)) {
		$output .= "<tbody>
			<tr>
				<td><a href='reportview.php?ent={$row['ent']}'>{$row['ent']}</a></td>
<td ><a  href='reportview.php?ent={$row['ent']}'>{$row['fname']} {$row['lname']} {$row['mname']}</a></td>

			</tr>
			</tbody>";
		}
	$output .="</table>";
		echo $output;
	}else{
		echo "<h5>No record found</h5>";
	}
	 }
	 else {
		 return false;
	 }	
?>