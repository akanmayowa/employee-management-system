<?php

class DB_con
{
function __construct()
{
$con = mysqli_connect('localhost','root','','pms');
$this->dbh=$con;
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
}

//Data read Function
public function fetchdata()
	{
	$result=mysqli_query($this->dbh,"");
	return $result;
	}
//Data one record read Function
public function fetchonerecordemployee($userid)
	{
	$oneresult=mysqli_query($this->dbh,"SELECT * FROM employee WHERE ent=$userid");
	return $oneresult;
	}

	public function fetchonerecordservice($userid)
	{
	$oneresult=mysqli_query($this->dbh,"SELECT * FROM services WHERE ent=$userid");
	return $oneresult;
	}


	public function fetchonerecordleave($userid)
	{
	$oneresult=mysqli_query($this->dbh,"SELECT * FROM leaves WHERE ent=$userid");
	return $oneresult;
	}

	public function fetchonerecordeducation($userid)
	{
	$oneresult=mysqli_query($this->dbh,"SELECT * FROM education WHERE ent=$userid");
	return $oneresult;
	}


	public function fetchonerecordchildren($userid)
	{
	$oneresult=mysqli_query($this->dbh,"SELECT *  FROM children WHERE ent=$userid");
	return $oneresult;
	}

	public function fetchonerecordnok($userid)
	{
	$oneresult=mysqli_query($this->dbh,"SELECT * FROM kin  WHERE ent=$userid");
	return $oneresult;
	}

	
	public function fetchonerecordupload($userid)
	{
	$oneresult=mysqli_query($this->dbh,"SELECT * FROM upload WHERE ent=$userid");
	return $oneresult;
	}

	public function fetchonerecordphotograph($userid)
	{
	$oneresult=mysqli_query($this->dbh,"SELECT * FROM photograph  WHERE ent=$userid");
	return $oneresult;
	}

	public function fetchonerecordcensor($userid)
	{
	$oneresult=mysqli_query($this->dbh,"SELECT * FROM censor  WHERE ent=$userid");
	return $oneresult;
	}

	public function fetchonerecordseminar($userid)
	{
	$oneresult=mysqli_query($this->dbh,"SELECT * FROM seminar  WHERE ent=$userid");
	return $oneresult;
	}
	

	public function showAllData($userid)
	{ 
$sql=mysqli_query($this->dbh,"SELECT structure FROM services WHERE id=$userid");

		while($row = mysqli_fetch_assoc($sql))
		{
		if($row['structure']==1)
		{
			echo "USS";
		}
		elseif($row['structure']==2)
		{
			echo "EUSS";
		}
		elseif($row['structure']==3)
		{
	
			echo "HATISS";
		}
		elseif($row['structure']==4)
		{
			echo "CONTISS";
		}
		elseif($row['structure']==5)
		{
			echo "CONHESS";
		}
		elseif($row['structure']==6)
		{
			echo "CONMESS";			
		}
		elseif($row['structure']==7)
		{
			echo "CONTOPSAL";
				}
				elseif($row['structure']==8)
		{
			echo "HAPSS";
			
		}
		else
		{
			echo $row['structure'];

		}
		
		} 
		return $sql;
	}  
}
?>
