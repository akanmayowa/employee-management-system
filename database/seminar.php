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
$sql = "CREATE TABLE seminar
(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    ent VARCHAR(100) NOT NULL,
    title VARCHAR(200) NOT NULL,
    location VARCHAR(200) NOT NULL,
    startdate VARCHAR(200) NOT NULL,
    enddate VARCHAR(200) NOT NULL,
    remarks VARCHAR(200) NOT NULL,
    modified  timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    modifier  VARCHAR(200) NOT NULL
)";


if ($mysql->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $mysql->error;
}

$mysql->close();
?>
