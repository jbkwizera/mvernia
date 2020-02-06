<?php
// database parameters
define ("DB_SERVER",   "localhost");
define ("DB_USERNAME", "localhost");
define ("DB_NAME",     "paper_mock");
define ("DB_PASSWORD", "1234");

// establish a connection
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// check connection
if ($link === false)
    die("ERROR: Could not connect" . mysqli_connect_error());
?>
