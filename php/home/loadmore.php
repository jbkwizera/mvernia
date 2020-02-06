<?php
include("./paperobject.php");
include("../config.php");

$res_elements = array_fill(0, 10, $PAPER_OBJECT);
$res_lines    = preg_split("/\n+/", file_get_contents("results_log.txt"));
$size         = count($res_lines)-1;
$index        = intval($res_lines[$size]);

for ($i = 0;  $i+$index < $size && $i < 10; $i++) {

    $title = trim($res_lines[$i+$index]);
    $sql   = "SELECT * FROM papers WHERE title='$title'";
    $paper = mysqli_fetch_assoc(mysqli_query($link, $sql));
    $auths = preg_split("/_sep[12]_/", $papers["authors"]);


    $res_elements[$i] = substr_replace($res_elements[$i], $paper["title"],      strpos($res_elements[$i], "_title"),      6);
    $res_elements[$i] = substr_replace($res_elements[$i], $paper["author"],     strpos($res_elements[$i], "_last_seen"), 10);
    $res_elements[$i] = substr_replace($res_elements[$i], $paper["category"],   strpos($res_elements[$i], "_category"),   9);
    $res_elements[$i] = substr_replace($res_elements[$i], $paper["bookmarks"],  strpos($res_elements[$i], "_bookmarks"), 10);
    $res_elements[$i] = substr_replace($res_elements[$i], $paper["downloads"],  strpos($res_elements[$i], "_downloads"), 10);
    $res_elements[$i] = substr_replace($res_elements[$i], $paper["views"],      strpos($res_elements[$i], "_views"),      6);
    echo $res_elements[$i];
}

// append the end line to the results log file
fwrite(fopen("results_log.txt", "a"), $i+$index+1."\n");
?>
