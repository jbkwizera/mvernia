<?php
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["signup"])) {
    // establish connection
    include("./php/config.php");

    // read form for sign up credentials
    $fname = trim($_POST["firstname"]);
    $lname = trim($_POST["lastname"]);
    $email = trim($_POST["email"]);
    $insti = trim($_POST["institution"]);
    $passw = trim($_POST["password"]);
    $confm = trim($_POST["confirm"]);
    // errors that may occur
    $errors= array_fill(0, 5, "");


    // validate firstname and lastname
    if (empty($fname)) $errors[0] = "Please enter your first name";
    if (empty($lname)) $errors[1] = "Please enter your last name";

    // validate email
    if (empty($email)) $errors[2] = "Please enter your email";
    if (empty($errors[2])) {
        $sql = "SELECT * FROM users WHERE email='$email'";
        if (mysqli_num_rows(mysqli_query($link, $sql)) > 0)
            $errors[2] = "This email is already taken";
    }

    // validate password
    if (empty($passw)) $errors[3] = "Please enter a password";
    if (empty($errors[3])) {
        if (strlen($passw) < 6)
            $errors[3] = "Password must be at least 6 characters";
        elseif ($passw !== $confm)
            $errors[4] = "Password doesn't match";
    }

    // Report any errors to javascript
    $isValid = true;
    foreach ($errors as $i => $err) {
        if (!empty($err)) {
            $isValid = false;
            break;
        }
    }
    // if none-- register the user with default params
    if ($isValid) {
        $hash_ = password_hash($passw, PASSWORD_DEFAULT);
        $sql   = "INSERT INTO users (firstname, lastname, password, institution, email, phone, street, city, state, district, country)
                  VALUES ('$fname', '$lname', '$hash_', '$insti', '$email', '+1-234-567-8910', '', '', '', '', '')";

        if (!mysqli_query($link, $sql))
            die("Something went wrong. Try again later.");
        // everything went well. send them to login
        header("location: ./login.php");
    }
    mysqli_close($link);
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sign Up</title>
        <link rel="stylesheet" href="./css/master.css">
        <link rel="stylesheet" href="./css/login.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <header><h1>Mouseion</h1></header>
        <div class="row">
            <div class="col-md-6 col-sm-1 offset-left">
                <!-- images -->
                <img src="./media/bgimage.png" alt="">
            </div>
            <div class="col-md-4 col-sm-10 form-container">
                <!-- login or signup -->
                <form class="signin-form" method="post">
                    <div>
                        <h3 class="signin-text" style="float:left;">Create an account</h3>
                        <h5 style="float: right;">or
                            <a href="./login.php" class="sign-up-link">sign in</a>
                        </h5>
                    </div><br style="clear:both;">
                    <span class="error-msg"><?php echo $errors[0]; ?></span>
                    <input type="text" name="firstname" placeholder="First name"
                          value="<?= htmlentities($fname); ?>"  />

                    <span class="error-msg"><?php echo $errors[1]; ?></span>
                    <input type="text" name="lastname" placeholder="Last name"
                          value="<?= htmlentities($lname); ?>"  />
                    <span class="error-msg"><?php echo $errors[2]; ?></span>
                    <input type="email" name="email" value="" placeholder="Email"
                          value="<?= htmlentities($email); ?>"  />
                    <input list="institutions" name="institution" placeholder="Institution">
                    <datalist id="institutions">
                        <option value="University of Redlands">
                    </datalist>
                    <span class="error-msg"><?php echo $errors[3]; ?></span>
                    <input type="password" name="password" value="" placeholder="Password"
                          value="<?= htmlentities($passw); ?>"  />
                    <span class="error-msg"><?php echo $errors[4]; ?></span>
                    <input type="password" name="confirm" placeholder="Confirm password"
                          value="<?= htmlentities($confm); ?>"  />
                    <div class="row remember-signin">
                        <div class="col-md-6 col-sm-12 row remember">
                            <input type="checkbox" name="remember" id="remember-me" value="Remember me" style="margin:0; width: 1.2em;" checked="">
                            <label for="remember-me">Mouseion <a href="#">terms</a></label>
                        </div>
                        <div class="col-md-6 col-sm-12 signin-btn-div">
                            <button type="submit" name="signup" class="signin-btn">Create an account</button>
                        </div>
                    </div>
                    <h5 class="separator"><span class="hr-label">or</span></h5>
                    <div class="row with-g" style="margin-top:2em;">
                        <button class="g-logo"><strong>G</strong></button>
                        <button class="sign-with-g">Sign up with Google</button>
                    </div>
                </form>
            </div>
            <div class="col-md-2 col-sm-1 offset-right"></div>
        </div>
        </body>
    </html>
