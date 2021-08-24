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
$sql = "CREATE TABLE emolument
(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    ent VARCHAR(100) NOT NULL,
    structure VARCHAR(200) NOT NULL,
    level VARCHAR(200) NOT NULL,
    step VARCHAR(200) NOT NULL,
    basic VARCHAR(200) NOT NULL,
    paidform VARCHAR(200) NOT NULL,
    incmonth VARCHAR(200) NOT NULL,
    incyear VARCHAR(200) NOT NULL,
    mode VARCHAR(200) NOT NULL,
    createdby  VARCHAR(200) NOT NULL,
    modified  timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP

)";


if ($mysql->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $mysql->error;
}

$mysql->close();
?>