<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $_SESSION["firstname"]." ".$_SESSION["lastname"]; ?></title>
        <link rel="stylesheet" href="./css/master.css">
        <link rel="stylesheet" href="./css/home.css">
        <link rel="stylesheet" href="./css/profile.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <header class="row">
            <div class="col-md-3 col-sm-2 brand">
                <h1 class="logo-name-h">Mouseion</h1>
            </div>
            <div class="col-md-6 col-sm-8 search-bar" id="search-bar">
                <button type="submit" class="search-btn"><i class="fa fa-search"></i></button>
                <input type="text" id="search-input" placeholder="Search..." name="" value="">
            </div>
            <div class="col-md-3 col-sm-2 notification-profile">
                <?php include("./profile_dropdown.php"); ?>
                <div class="notification float">
                    <i class="fa fa-bell" style="font-size:1.5em;color:#23C265"></i>
                </div>
            </div>
        </header>

        <div class="main">
            <div class="row header">
                <div class="personal-information col-md-6">
                    <h2>Sheldon Cooper, PhD</h2><br>
                    <p class="short-bio">Hi! I'm Sheldon Cooper. I love to be insensitive. I'm interested in String theory, Dark matter, Comics, Flags, Fun facts.</p>
                    <br>
                    <h3>Contact</h3>
                    <ul>
                        <li>Phone: <a class="contact-phone" href="tel: <?php echo $_SESSION['phone']; ?>"><?php echo $_SESSION["phone"]; ?></a></li>
                        <li>Email: <a class="contact-email" href="mailto: <?php echo $_SESSION['email']; ?>"><?php echo $_SESSION["email"]; ?></a></li>
                    </ul>
                </div>
                <div class="photo-canvas col-md-6">
                    <div class="photo">
                        <img src="./media/sheldon-main.png" alt="">
                    </div>
                </div>
            </div>
            <div class="paper-information">
                <div class="my-papers" id="my-papers">
                    <h2>My papers</h2>
                    <ul class="papers-list">
                        <li class="paper-visible"><a href="#">Paradoxical Moment-of-Inertia Changes Due to Putative Super-Solids</a></li>
                        <li class="paper-visible"><a href="#">A Rederivation of Maxwell’s Equations Regarding Electromagnetism</a></li>
                        <li class="paper-visible"><a href="#">A Proof That Algebraic Topology Can Never Have a Non-self-contradictory Set of Abelian Groups</a></li>
                        <li class="paper-visible"><a href="#">The Cooper-Hofstadter Theory of the Superfluid Vacuum</a></li>
                        <li class="paper-visible"><a href="#">Rocket Reentry & Retropropulsion</a></li>
                    </ul>
                </div>
                <div class="bookmarks" id="bookmarks">
                    <h2>Bookmarked papers</h2>
                    <ul class="papers-list">
                        <li class="paper-visible"><a href="#">Paradoxical Moment-of-Inertia Changes Due to Putative Super-Solids</a></li>
                        <li class="paper-visible"><a href="#">A Rederivation of Maxwell’s Equations Regarding Electromagnetism</a></li>
                        <li class="paper-visible"><a href="#">A Proof That Algebraic Topology Can Never Have a Non-self-contradictory Set of Abelian Groups</a></li>
                        <li class="paper-visible"><a href="#">The Cooper-Hofstadter Theory of the Superfluid Vacuum</a></li>
                        <li class="paper-visible"><a href="#">Rocket Reentry & Retropropulsion</a></li>
                    </ul>
                </div>
            </div>
            <script type="text/javascript" src="./js/home.js"></script>
            <script type="text/javascript"> /*
                function setMainHeight() {
                    var mainHeight = window.innerHeight - document.querySelector("header").offsetHeight;
                    document.querySelector(".main").style.minHeight = mainHeight + "px";
                }
                window.onload   = setMainHeight;
                window.onresize = setMainHeight; */
            </script>
        </div>
    </body>
</html>
