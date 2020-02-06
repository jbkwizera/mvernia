<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $names = $_POST["name"];
    foreach ($names as $i => $name) {
        printf($name."<br>");
    }
}
?>

<form enctype="multipart/form-data" method="post">
    <input type="text" name="name[]" /><br><br>
    <input type="text" name="name[]" /><br><br>
    <input type="text" name="name[]" /><br><br>
    <input type="submit" value="Send" /><br><br>
</form>
