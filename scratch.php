<?php
include("./php/config.php");

$sql = "SELECT * FROM users WHERE email='rob@hein'";
$res = mysqli_fetch_assoc(mysqli_query($link, $sql));
echo "<pre>";

print_r("num rows: " . count($res)."\n");
echo   ("data    : ");
print_r($res);

echo "</pre>";
?>

<form enctype="multipart/form-data" method="post">
    <input type="text" name="name[]" /><br><br>
    <input type="text" name="name[]" /><br><br>
    <input type="text" name="name[]" /><br><br>
    <input type="submit" value="Send"/><br><br>
</form>
