<?php

	class Customers
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
			$modifier = $this->con->real_escape_string($_POST['modifier']);
            $photo1 = $_FILES['photo']['tmp_name'];
			$data = addslashes(file_get_contents($photo1)); 
			
        	$query="INSERT INTO photograph(ent,modifier,photo)VALUES('$ent','$modifier','$data')";
			$sql = $this->con->query($query);
			if ($sql==true) 
			{
				$query2 = "SELECT * FROM photograph WHERE ent = '$ent'";
				$result = $this->con->query($query2);
				while ($row = $result->fetch_assoc())
				 {
$ent = $row['ent'];
echo "<script type='text/javascript'>alert(' Sucessfull!');</script>";
header('Location:photograph.php?ent='.$ent.'&msg1=insert');
				}
				
				}
			else{
			    echo "Service Info updated failed try again!";
			}
		}


		// Fetch customer records for show listing
		public function displayData()
		{
            $ent = $_GET['ent'];
		    $query = "SELECT * FROM photograph WHERE ent ='$ent'";
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



		public function displyaRecordById($id)
		{
		
		    $query = "SELECT * FROM photograph WHERE id = '$id'";
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
			$id = $_GET['id'];
			$ent = $this->con->real_escape_string($_POST['ent']);
			$modifier = $this->con->real_escape_string($_POST['modifier']);
			$photo1 = $_FILES['photo']['tmp_name'];
			$data = addslashes(file_get_contents($photo1)); 
            $id = $this->con->real_escape_string($_POST['id']);
		
            if (!empty($id) && !empty($postData)) {
			$query = "UPDATE photograph SET ent = '$ent', modifier = '$modifier', photo = '$data' WHERE id = '$id'";
			$sql = $this->con->query($query);
			if ($sql==true)
			 {
				$query2 = "SELECT * FROM photograph WHERE ent = '$ent'";
				$result = $this->con->query($query2);
				while ($row = $result->fetch_assoc())
				 {
					$ent = $row['ent'];
					echo "<script type='text/javascript'>alert('Update Sucessfull!');</script>";
					header('Location:photograph.php?ent='.$ent.'&msg2=update');
				}
			}
			else
			{
				echo "<script type='text/javascript'>alert('failed try again!');</script>";
			}
		    }
			
		}


		// Delete customer data from customer table
		public function deleteRecord($id)
		{
		    $query = "DELETE FROM photograph WHERE id = '$id'";
		    $sql = $this->con->query($query);
			if ($sql==true) 
			{
				$query2 = "SELECT * FROM photograph WHERE id = '$id'";
					$result = $this->con->query($query2);
					while ($row = $result->fetch_assoc())
					 {
	           $ent = $row['ent'];
			   echo "<script type='text/javascript'>alert(' Sucessfully Deleted!');</script>";
			   header('Location:photograph.php?ent='.$ent.'&msg3=delete');
			}
			}else{
				echo "Record does not delete try again";
				}
		}

	}
?>
