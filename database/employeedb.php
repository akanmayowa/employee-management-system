<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pms";
$mysql = new mysqli($servername, $username, $password, $dbname);
if ($mysql->connect_error)
{
    die("Connection failed: " . $mysql->connect_error);
} 
$sql = "CREATE TABLE employee
(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    ent VARCHAR(100) NOT NULL UNIQUE,
    ippis VARCHAR(200) NOT NULL,
    title VARCHAR(200) NOT NULL,
    fname VARCHAR(200) NOT NULL,
    mname VARCHAR(200) NOT NULL, 
    lname VARCHAR(200) NOT NULL,
    mdname VARCHAR(200) NOT NULL,
    gender VARCHAR(200)  NULL,
    marital VARCHAR(200)  NULL,
    address VARCHAR(200)  NULL,
    city VARCHAR(200)  NULL,
    stateoforigin VARCHAR(200)  NULL,
    phone VARCHAR(200) NULL,
    email VARCHAR(200)  NULL,
bgroup VARCHAR(200)  NULL,
genotype VARCHAR(200)  NULL,
height VARCHAR(200)  NULL,
weight VARCHAR(200)  NULL,
active  int(10) NOT NULL,
modified  timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
createdby  VARCHAR(200) NOT NULL
)";


if ($mysql->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $mysql->error;
}

$mysql->close();
?>