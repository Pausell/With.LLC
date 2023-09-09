<?php
session_start();

$servername = "localhost";
$username = "uzdbcuiq1aafl";
$password = "&5#~5b^e}224";
$dbname = "dbhldp5bpzdut7";

$db = new mysqli($servername, $username, $password, $dbname);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>