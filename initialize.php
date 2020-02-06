<?php
include("./php/config.php");

$sql = "SELECT * FROM papers";
$papers = mysqli_query($link, $sql);

$results_logf = fopen("results_log.txt", "w");
file_put_contents($results_logf, "");
fclose($results_logf);
$results_logf = fopen("results_log.txt", "a");

while ($row = mysqli_fetch_assoc($papers))
    fwrite($results_logf, $row["title"]."\n");

include("./loadmore.php");
fclose($results_logf);
?>
