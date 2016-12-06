<?php
//define connection specifications
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "volvo");

//make a variable that can be used throughout the pages
$conn = mysqli_connect("localhost", "root", "", "volvo");

//connect to database
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if($mysqli->connect_errno) {
	echo "fail";
}

mysqli_set_charset($conn, "utf8");
setlocale(LC_ALL, 'sv_SE');
$stmt = $conn->stmt_init();


?>