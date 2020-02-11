<?php
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["publish"])) {
    // establish a connection
    include("./php/config.php");

    // read in title,  authors category abstract
    $title   = trim($_POST["title"]);
    $filename= md5($title).".json";
    $zip     = array_map(null, $_POST["auth-name"], $_POST["auth-inst"]);
    $authors = array();
    foreach ($zip as $index => $auth)
        $authors[] = $auth[0]."_sep1_".$auth[1];
    $authors = implode("_sep2_", $authors);
    $category  = implode("_", preg_split("/\\s+/", $_POST["category"]));
    $abstract  = $_POST["abstract"];

    // Get file and move it to ./paper/category/
    $upload_err  = "";
    $destination = "";
    if (isset($_FILES["paper"]) && $_FILES["paper"]["error"] == false) {
        $destination  = "./paper/" . strtolower($category) . "/";
        if (!is_dir($destination)) mkdir($destination);

        $destination .= basename($filename);
        if (file_exists($destination))
            $upload_err = "File already exists.";
        elseif (!move_uploaded_file($_FILES["paper"]["tmp_name"], $destination))
            $upload_err = "File upload unsuccessful :(";
        else {
            $comments_path = "./comment/".$filename;
            $pcomments = fopen($comments_path, "w");
            file_put_contents($comments_path, "parent = []");
            fclose($pcomments);
        }
    }

    // get publish date/today
    $publish_date  =     getdate()["wday"];
    $publish_date .= "/".getdate()["mon"];
    $publish_date .= "/".getdate()["mday"];
    $publish_date .= "/".getdate()["year"];

    $category = $_POST["category"];
    $insert_err = "";
    $sql = "INSERT INTO papers (title, filepath, abstract, authors,
            date_published, category, likes, downloads, views, comment_count, comment_quality, comments)
            VALUES ('$title', '$destination', '$abstract', '$authors',
                    '$publish_date', '$category', '0', '0', '0', '0', '0', '$comments_path')";
    if (!mysqli_query($link, $sql))
        $insert_err = "Insert unsuccessful.";
    mysqli_close($link);
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Publish a new paper</title>
        <link rel="stylesheet" href="./css/master.css">
        <link rel="stylesheet" href="./css/home.css">
        <link rel="stylesheet" href="./css/upload.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <div class="main">
            <form enctype="multipart/form-data" class="upload-form" method="post">
                <div class="row">
                    <div class="col-md-2 form-offset"></div>
                    <div class="col-md-10"><h1>Publish a new paper</h1></div>
                </div>
                <div class="row title">
                    <div class="col-md-2"><label for="title">Title</label></div>
                    <div class="col-md-10">
                        <input type="text" name="title" id="title" value="" placeholder="Title">
                    </div>
                </div>
                <div class="row authors">
                    <div class="col-md-2"><label for="authors">Author(s)</label></div>
                    <div class="col-md-10">
                        <div><input type="text" name="auth-name[]" class="auth-name" value="" placeholder="Full name"></div>
                        <div><input type="text" name="auth-inst[]" class="auth-inst" value="" placeholder="Institution"></div>
                        <div><button type="button" name="add-author" id="add-author">Add an author</button></div>
                    </div>
                </div>
                <div class="row category">
                    <div class="col-md-2"><label for="category">Field(s)</label></div>
                    <div class="col-md-10">
                        <input type="text" name="category" id="category" value="" placeholder="Field">
                    </div>
                </div>
                <div class="row abstract">
                    <div class="col-md-2"><label for="abstract">Abstract or Summary</label></div>
                    <div class="col-md-10">
                        <textarea name="abstract" rows="8" cols="80" placeholder="Paper abstract"></textarea>
                    </div>
                </div>
                <!-- no need to be anonymous !-->
                <div class="row anonymous" style="display: none;">
                    <div class="col-md-2  col-sm-8">Go anonymous</div>
                    <div class="col-md-10 col-sm-4">
                        <input type="checkbox" id="anon-check" style="margin: 0;">
                    </div>
                </div>
                <div class="row upload">
                    <div class="col-md-2 form-offset"></div>
                    <div class="col-md-10">
                        <div><input type="file" id="upload-file" name="paper" value=""></div>
                        <div><button type="submit" name="publish" id="upload-btn">Publish</button></div>
                        <span class="error-msg"><?php echo $upload_err; ?></span>
                        <span class="error-msg"><?php echo $insert_err; ?></span>
                    </div>
                </div>
            </form>
        </div>
        <script type="text/javascript" src="home.js"></script>
        <script type="text/javascript" src="./js/upload.js"></script>
    </body>
</html>
