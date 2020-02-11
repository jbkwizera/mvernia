<?php
// logout
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["logout"])) {
    session_destroy();
    header("location: ./login.php");
}
?>
<div class="profile float">
    <a href="#" class="profile-a" style="font-size: 2em; color:#999;" onclick="toggleProfile()">&vellip;</a>
    <!-- what's under profile -->
    <div class="profile-content" id="profile-content">
        <div class="profile-link">
            <a href="./profile.php">
                <?php
                $display_name = $_SESSION["firstname"]." ".$_SESSION["lastname"];
                if (strlen($display_name) >= 14) {
                    $fname_parts = explode(" ", $_SESSION["firstname"]);
                    $display_name= $fname_parts[0][0].". ";
                    for ($i = 1; $i < count($fname_parts); $i++)
                        $display_name .= $fname_parts[$i][0]. ". ";
                    if (strlen($display_name) + strlen($_SESSION["lastname"]) >= 14)
                        $display_name .= $_SESSION["lastname"][0];
                    else $display_name.= $_SESSION["lastname"];
                }
                echo $display_name;
                ?>
            </a>
        </div>
        <div class="my-papers"><a href="./profile.php#my-papers">My papers</a></div>
        <div class="starred-papers"><a href="./profile.php#bookmarks">Starred papers</a></div>
        <div class="add-paper"><a href="./upload.php">Add a paper</a></div>
        <div class="logout-link">
            <form method="post">
                <button class="logout-btn" type="submit" name="logout">Log out</button>
            </form>
        </div>
    </div>
</div>
