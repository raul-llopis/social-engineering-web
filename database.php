<?php
session_start();
ob_start();
$host = "localhost";
$username = "root";
$password = "{LINUX PASSWORD}";
$db_name = "kapitol";
$tbl_name = "statistics";

$dbconnection = mysqli_connect($host, $username, $password, $db_name);

if (!$dbconnection) {
    die("CONNECTION FAILED: " . $dbconnection-> mysqli_connect_error());
}

$rrss = $_POST['rrss'];
$gender = $_POST['gender'];
$faculty = $_POST['faculty'];
$free = $_POST['free'];
$malware = "";

$date=date('m/d/Y h:i:s a', time());
#$input_date=$_POST['date'];
#$date=date("Y-m-d H:i:s",strtotime($input_date));

$sqlinsert = "INSERT INTO statistics(rrss, gender, faculty, free, date, malware) VALUES ('$rrss', '$gender', '$faculty', '$free', '$date', '$malware');";

if (mysqli_query($dbconnection, $sqlinsert)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sqlinsert . "<br>" . mysqli_error($dbconnection);
}

$dbconnection->close();
sleep(2);
header("location:connection.html");
ob_end_flush();
?>
