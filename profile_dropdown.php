<?php
// logout
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["logout"])) {
    session_destroy();
    header("location: ./login.php");
}
$name = "Sign in";
$link = "./login.php";
if (isset($_SESSION["firstname"]) && isset($_SESSION["lastname"])) {
    $name = $_SESSION["firstname"]." ".$_SESSION["lastname"];
    $link = "./profile.php";
    if (strlen($name) >= 14) {
        $fname_parts = explode(" ", $_SESSION["firstname"]);
        $name= $fname_parts[0][0].". ";
        for ($i = 1; $i < count($fname_parts); $i++)
            $name .= $fname_parts[$i][0]. ". ";
        if (strlen($name) + strlen($_SESSION["lastname"]) >= 14)
            $name .= $_SESSION["lastname"][0];
        else $name.= $_SESSION["lastname"];
    }
}
?>
<div class="profile float">
    <a href="#" class="profile-a" style="font-size: 2em; color:#999;" onclick="toggleProfile()">&vellip;</a>
    <!-- what's under profile -->
    <div class="profile-content" id="profile-content">
        <div class="profile-link">
            <a href=<?php echo $link; ?>><?php echo $name; ?></a>
        </div>
        <div class="my-papers"><a href="./profile.php#my-papers">My papers</a></div>
        <div class="starred-papers"><a href="./profile.php#bookmarks">Starred papers</a></div>
        <div class="add-paper"><a href="./upload.php">Add a paper</a></div>
        <div class="logout-link">
            <form method="post" style="margin: 0; padding: 0;">
                <button class="logout-btn" type="submit" name="logout" style="margin: 0; padding: 0;">Log out</button>
            </form>
        </div>
        <script type="text/javascript">
            var logout = document.getElementsByClassName("logout-link")[0];
            if (("<?php echo $name ?>") == "Sign in") {
                for (let child of document.getElementsByClassName("profile-content")[0].children) {
                    child.style.pointerEvents = "none";
                    child.style.opacity = 0.4;
                }
                logout.style.display = "none";
                document.getElementsByClassName("profile-link")[0].style.pointerEvents = "auto";
                document.getElementsByClassName("profile-link")[0].style.opacity = 1;
            }
        </script>
    </div>
</div>
