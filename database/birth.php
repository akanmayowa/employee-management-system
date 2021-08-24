<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
{	
header('location:../index.php');
exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pms";
$mysql = new mysqli($servername, $username, $password, $dbname);
if ($mysql->connect_error)
{
    die("Connection failed: " . $mysql->connect_error);
} 
$sql = "CREATE TABLE birth
(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    ent VARCHAR(100) NOT NULL UNIQUE,
    dob VARCHAR(200) NOT NULL,
    town VARCHAR(200) NOT NULL,
    city VARCHAR(200) NOT NULL,
    stateoforigin VARCHAR(200) NOT NULL, 
    nationality VARCHAR(200) NOT NULL,
createdby  VARCHAR(200) NOT NULL
)";


if ($mysql->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $mysql->error;
}

$mysql->close();
?>