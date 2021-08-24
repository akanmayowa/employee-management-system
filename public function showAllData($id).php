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
			if($row['structure']==8)
			{
				echo "<option value='". $row['structure'] ."'>" .'USS'."</option>";
				
			}
			if($row['structure']==7)
			{
				echo "<option value='". $row['structure'] ."'>" .'EUSS'."</option>";
				
			}
			if($row['structure']==6)
			{
				echo "<option value='". $row['structure'] ."'>" .'HATISS'."</option>";
				
			}
			if($row['structure']==5)
			{
				echo "<option value='". $row['structure'] ."'>" .'CONTISS'."</option>";
				
			}
			if($row['structure']==4)
			{
				echo "<option value='". $row['structure'] ."'>" .'CONHESS'."</option>";
				
			}
			if($row['structure']==3)
			{
				echo "<option value='". $row['structure'] ."'>" .'CONMESS'."</option>";
				
			}
			if($row['structure']==2)
			{
				echo "<option value='". $row['structure'] ."'>" .'CONTOPSAL'."</option>";
				
			}
			if($row['structure']==1)
			{
				echo "<option value='". $row['structure'] ."'>" .'HAPSS'."</option>";
				
			}
			else
			{
				echo "<option value='". $row['structure'] ."'>" .$row['structure']."</option>";

			}
			


			} 
		}  



        <?php $service1 = $serviceObj->showAllData($editId); ?>


    public function fetchonerecordservice($userid)
	{
	$oneresult=mysqli_query($this->dbh,"SELECT * FROM services WHERE ent=$userid");
	return $oneresult;
	}




        public function showAllData($userid)
		{ 
    $oneresult1=mysqli_query($this->dbh,"SELECT structure FROM services WHERE ent=$userid");
	return $oneresult;
			if(!$oneresult1)
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