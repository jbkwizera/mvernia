<?php
printf("<pre>\n");
#-------------------------------------------------------

include("./paperobject.php");
include("../config.php");

$res_lines    = preg_split("/\n+/", file_get_contents("results_log.txt"));
$size         = count($res_lines)-1;
$index        = intval($res_lines[$size]);

for ($i = 0;  $i+$index < $size && $i < 10; $i++) {

    $title = trim($res_lines[$i+$index]);
    $sql   = "SELECT * FROM papers WHERE title='$title'";
    $paper = mysqli_fetch_assoc(mysqli_query($link, $sql));

    $temp   = preg_split("/_sep[12]_/", $paper["authors"]);
    $auths  = array();
    for ($j=0; $j < count($temp); $j++) {
        if ($j % 2 == 0) $auths[] = $temp[$j];
    }
    $auths  = implode(", ", $auths);
    printf($auths."\n");
}
#-------------------------------------------------------
printf("</pre>\n");
?>
