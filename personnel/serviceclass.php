<?php

	class Service
	{
		private $servername = "localhost";
		private $username   = "root";
		private $password   = "";
		private $database   = "pms";
		public  $con;


		// Database Connection 
		public function __construct()
		{
		    $this->con = new mysqli($this->servername, $this->username,$this->password,$this->database);
		    if(mysqli_connect_error()) {
			 trigger_error("Failed to connect to MySQL: " . mysqli_connect_error());
		    }else{
			return $this->con;
		    }
		}

		// Insert customer data into customer table
		public function insertData($post)
		{
			$ent = $this->con->real_escape_string($_POST['ent']);
			$mode = $this->con->real_escape_string($_POST['mode']);
			$appointment = $this->con->real_escape_string($_POST['appointment']);
			$designation = $this->con->real_escape_string($_POST['designation']);
            $structure = $this->con->real_escape_string($_POST['structure']);
			$level = $this->con->real_escape_string($_POST['level']);
			$step = $this->con->real_escape_string($_POST['step']);
			$salary = $this->con->real_escape_string($_POST['salary']);
			$createdby = $this->con->real_escape_string($_POST['createdby']);
			$date = $this->con->real_escape_string($_POST['date']);
			$query="INSERT INTO services(ent,mode,appointment,designation,structure,level,step,salary,createdby,date) VALUES('$ent','$mode','$appointment','$designation','$structure','$level','$step','$salary','$createdby','$date')";
            $sql = $this->con->query($query);
			if ($sql==true)
			 {
				$query2 = "SELECT * FROM services WHERE ent = '$ent'";
				$result = $this->con->query($query2);
				while ($row = $result->fetch_assoc())
				 {
$ent = $row['ent'];
echo "<script type='text/javascript'>alert('Employee Service Registration Sucessfull!');</script>";
header('Location:service.php?ent='.$ent.'&msg1=insert');
				}
			}
			else
			{
				echo "<script type='text/javascript'>alert('Registration failed try again!');</script>";
			}
		}

		// Fetch customer records for show listing
		public function displayData()
		{
			$ent = $_GET['ent'];
		    $query = "SELECT * FROM services WHERE ent = '" . $ent . "'";
		    $result = $this->con->query($query);
		if ($result->num_rows > 0) {
		    $data = array();
		    while ($row = $result->fetch_assoc()) {
		           $data[] = $row;
		    }
			 return $data;
		    }else{
			 echo "No found records";
		    }
		}

		// Fetch single data for edit from customer table
		public function displyaRecordById($id)
		{
		    $query = "SELECT * FROM services WHERE id = '$id'";
		    $result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		    }else{
			echo "Record not found";
		    }
		}

		// Update customer data into customer table
		public function updateRecord($postData)
		{
			$ent = $this->con->real_escape_string($_POST['ent']);
			$mode = $this->con->real_escape_string($_POST['mode']);
			$appointment = $this->con->real_escape_string($_POST['appointment']);
			$designation = $this->con->real_escape_string($_POST['designation']);
            $structure = $this->con->real_escape_string($_POST['structure']);
			$level = $this->con->real_escape_string($_POST['level']);
			$step = $this->con->real_escape_string($_POST['step']);
			$salary = $this->con->real_escape_string($_POST['salary']);
			$createdby = $this->con->real_escape_string($_POST['createdby']);
			$date = $this->con->real_escape_string($_POST['date']);
		    $id = $this->con->real_escape_string($_POST['id']);
		if (!empty($id) && !empty($postData)) 
		{
			$query = "UPDATE services SET ent = '$ent', mode = '$mode', appointment = '$appointment', designation = '$designation', structure = '$structure', level = '$level', step = '$step', salary = '$salary', createdby = '$createdby', date = '$date' WHERE id = '$id'";
			$sql = $this->con->query($query);
			if ($sql==true) 
			{
				$query2 = "SELECT * FROM services WHERE id = '$id'";
				$result = $this->con->query($query2);
				while ($row = $result->fetch_assoc())
				 {
$ent = $row['ent'];
echo "<script type='text/javascript'>alert('Employee Service Update Sucessfull!');</script>";
header('Location:service.php?ent='.$ent.'&msg2=update');

				}
				
				}
			
			}else{
			    echo "Service Info updated failed try again!";
			}
		    }
			
		


		// Delete customer data from customer table
		public function deleteRecord($id)
		{
		    $query = "DELETE FROM services WHERE id = '$id'";
		    $sql = $this->con->query($query);
		if ($sql==true) 
		{
			$query2 = "SELECT * FROM services WHERE id = '$id'";
				$result = $this->con->query($query2);
				while ($row = $result->fetch_assoc())
				 {
$ent = $row['ent'];
			header('Location:service.php?ent='.$ent.'&msg3=delete');
				 }
		}else{
			echo "Record does not delete try again";
		    }
		}


		public function showAllData($id)
		{ 
			$query = "SELECT structure FROM services WHERE id = '$id'";
			$result = $this->con->query($query);
			if(!$result)
			{
				echo "Record not found";
			}
			while($row = mysqli_fetch_assoc($result))
			{
			if($row['structure']==1)
			{
				echo "<option value='". $row['structure'] ."'>" .'USS'."</option>";
				
			}
			if($row['structure']==2)
			{
				echo "<option value='". $row['structure'] ."'>" .'EUSS'."</option>";
				
			}
			if($row['structure']==3)
			{
				echo "<option value='". $row['structure'] ."'>" .'HATISS'."</option>";
				
			}
			if($row['structure']==4)
			{
				echo "<option value='". $row['structure'] ."'>" .'CONTISS'."</option>";
				
			}
			if($row['structure']==5)
			{
				echo "<option value='". $row['structure'] ."'>" .'CONHESS'."</option>";
				
			}
			if($row['structure']==6)
			{
				echo "<option value='". $row['structure'] ."'>" .'CONMESS'."</option>";
				
			}
			if($row['structure']==7)
			{
				echo "<option value='". $row['structure'] ."'>" .'CONTOPSAL'."</option>";
				
			}
			if($row['structure']==8)
			{
				echo "<option value='". $row['structure'] ."'>" .'HAPSS'."</option>";
				
			}
			else
			{
				echo "<option value='". $row['structure'] ."'>" .$row['structure']."</option>";

			}
			


			} 
		}  


		public function showAllDataApp($id)
		{ 
			$query = "SELECT appointment FROM services WHERE id = '$id'";
			$result = $this->con->query($query);
			if(!$result)
			{
				echo "Record not found";
			}
			while($row = mysqli_fetch_assoc($result))
			{
			echo "<option value='". $row['appointment'] ."'>" .$row['appointment']."</option>";
			
		}  
	}
	
	public function showAllDataLevel($id)
	{ 
		$query = "SELECT level FROM services WHERE id = '$id'";
		$result = $this->con->query($query);
		if(!$result)
		{
			echo "Record not found";
		}
		while($row = mysqli_fetch_assoc($result))
		{
		echo "<option value='". $row['level'] ."'>" .$row['level']."</option>";
		
	}  
}
	
	
public function showAllDataMode($id)
{ 
	$query = "SELECT mode FROM services WHERE id = '$id'";
	$result = $this->con->query($query);
	if(!$result)
	{
		echo "Record not found";
	}
	while($row = mysqli_fetch_assoc($result))
	{
		
			echo "<option value='". $row['mode'] ."'>" .$row['mode']."</option>";

		}
		


		}  
}


?>