<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>mathgen</title>
    </head>
    <body>
        <pre>
            <div class='sneak-peek'>
                <?php
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL);

                $output = array();
                shell_exec("qpdf mathgen.pdf --pages . 1-1 -- mathgen1.pdf");
                #exec("convert -density 300 mathgen1.pdf mathgen1.jpg", $output  );
                #exec("rm mathgen1.pdf", $output);
                print_r($output);
                ?>
            </div>
        </pre>
    </body>
</html>
