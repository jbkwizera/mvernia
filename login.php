<?php
// initialize login session
session_start();

// send them to home page if already in
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: ./home.php");
    exit;
}
else if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["signin"])) {
    // establish a connection
    include("./php/config.php");

    $email_err= $pass_err = "";
    $email    = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $res = mysqli_fetch_assoc(mysqli_query($link, $sql));
    if (count($res) > 0) {
        if (password_verify($password, $res["password"])) {
            // set session variables and redirect.
            $_SESSION["loggedin"] = true;
            foreach ($res as $data => $value)
                $_SESSION[$data] = $value;
            header("location: ./home.php");
        }
        else $pass_err = "Wrong password";
    }
    else $email_err = "No account with such email";
    mysqli_close($link);
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Log In</title>
        <link rel="stylesheet" href="./css/master.css">
        <link rel="stylesheet" href="./css/login.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <header>
            <h1>mvernia</h1>
        </header>
        <div class="row">
            <div class="col-md-6 col-sm-1 offset-left">
                <!-- images -->
                <img src="./media/bgimage.png" alt="">
            </div>
            <div class="col-md-4 col-sm-10 form-container">
                <!-- login or signup -->
                <form class="signin-form" method="post">
                    <div>
                        <h3 class="signin-text" style="float:left;">Sign in</h3>
                        <h5 style="float: right;">or
                            <a href="./signup.php" class="sign-up-link">create an account</a>
                        </h5>
                    </div><br>
                    <div class="row with-g" style="margin-top:2em;">
                        <button class="g-logo"><strong>G</strong></button>
                        <button class="sign-with-g">Sign in with Google</button>
                    </div>
                    <h5 class="separator"><span class="hr-label">or</span></h5>
                    <span class="error-msg"><?php echo $email_err; ?></span>
                    <input type="email" name="email" value="" placeholder="Email" required><br>
                    <span class="error-msg"><?php echo $pass_err; ?></span>
                    <input type="password" name="password" value="" placeholder="Password" required><br>
                    <div class="row remember-signin">
                        <div class="col-md-6 col-sm-12 row remember">
                            <input type="checkbox" name="remember" id="remember-me" value="Remember me" style="margin:0; width: 1.2em;" checked>
                            <label for="remember-me">Remember me</label>
                        </div>
                        <div class="col-md-6 col-sm-12 signin-btn-div">
                            <button type="submit" name="signin" class="signin-btn">Sign in</button>
                        </div>
                    </div>
                    <div class="forgot-password">
                        <a href="#">Forgot your password?</a>
                    </div>
                </form>
            </div>
            <div class="col-md-2 col-sm-1 offset-right"></div>
        </div>
    </body>
</html>
