<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Home</title>
        <link rel="stylesheet" href="./css/master.css">
        <link rel="stylesheet" href="./css/home.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <header class="row">
            <div class="col-md-3 col-sm-2 brand">
                <h1 class="logo-name-h">Eklex</h1>
            </div>
            <div class="col-md-6 col-sm-8 search-bar" id="search-bar">
                <button type="submit" class="search-btn"><i class="fa fa-search"></i></button>
                <input type="text" id="search-input" placeholder="Search..." name="" value="">
            </div>
            <div class="col-md-3 col-sm-2 notification-profile">
                <div class="profile float">
                    <a href="#" class="profile-a" style="font-size: 2em; color:#999;" onclick="toggleProfile()">&vellip;</a>
                    <!-- what's under profile -->
                    <div class="profile-content" id="profile-content">
                        <div class="profile-link"><a href="./profile.php">Profile</a></div>
                        <div class="my-papers"><a href="./profile.php#my-papers">My papers</a></div>
                        <div class="starred-papers"><a href="./profile.php#bookmarks">Starred papers</a></div>
                        <div class="add-paper"><a href="./upload.php">Add a paper</a></div>
                        <div class="logout-link">
                            <button class="logout-btn" type="submit" name="submit">Log out </button>
                        </div>
                    </div>
                </div>
                <div class="notification float">
                    <i class="fa fa-bell" style="font-size:1.5em;color:#23C265"></i>
                </div>
            </div>
        </header>
        <main class="row">
            <div class="col-md-3 col-sm-1  main-left-offset"></div>
            <div class="col-md-6 col-sm-10 paper-section">
                <!-- populate paper-section -->
                <?php include("./initialize.php"); ?>
                <div class="load-more">
                    <button type="button" name="button">Load more results</button>
                </div>
            </div>
            <div class="col-md-3 col-sm-1 main-right-offset"></div>
        </main>
        <script type="text/javascript" src="./js/home.js">
        </script>
    </body>
</html>
