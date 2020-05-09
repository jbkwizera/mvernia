<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Quantum Chromodynamics with Matrix Octocalculations</title>
        <link rel="stylesheet" href="./css/master.css">
        <link rel="stylesheet" href="./css/home.css">
        <link rel="stylesheet" href="./css/paper.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
            <div class="row title-author">
                <div class="col-md-10">
                    <h1 class="title">Percolation and Random Graphs</h1>
                    <h3 class="author author-organization">Dr. Sheldon Cooper, California Institute of Technology (Calitech)</h3>
                </div>
                <div class="col-md-2 row paper-widgets">
                    <div class="view-paper">
                        <a href="#">
                            <i class="fa fa-star" style="font-size:1em;color:#23c265">894</i>
                        </a>
                    </div>
                    <div class="share-paper">
                        <a href="#">
                            <i class="fa fa-download" style="font-size:1em;color:#23c265">25</i>
                        </a>
                    </div>
                    <div class="download-paper">
                        <a href="#">
                            <i class="fa fa-eye" style="font-size:1em;color:#23c265"> 8475</i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="abstract-div">
                <h2 class="abstract-title">Abstract</h2>
                <div class="abstract">
                    <p>
                        <span class="dropcap">I</span>n 1973 the concept of color as the source
                        of a "strong field" was developed into the theory of QCD by physicists Harald
                        Fritzsch and Heinrich Leutwyler, together with physicist Murray Gell-Mann.[19]
                        In particular, they employed the general field theory developed
                        in 1954 by Chen Ning Yang and Robert Mills[20]
                        (see Yang–Mills theory), in which the carrier particles of a force
                        can themselves radiate further carrier particles. (This is different
                        from QED, where the photons that carry the electromagnetic force do
                        not radiate further photons.)
                    </p>
                    <p>
                        The other side of <span style="font-style: italic;">asymptotic freedom</span> is confinement. Since the force
                        between color charges does not decrease with distance, it is believed
                        that quarks and gluons can never be liberated from hadrons. This aspect
                        of the theory is verified within lattice QCD computations, but is not
                        mathematically proven. One of the Millennium Prize Problems announced
                        by the Clay Mathematics Institute requires a claimant to produce such
                        a proof. Other aspects of non-perturbative QCD are the exploration of
                        phases of quark matter, including the quark–gluon plasma.
                    </p>
                    <p>
                        The relation between the short-distance particle limit and the
                        confining long-distance limit is one of the topics recently explored
                        using string theory, the modern form of S-matrix theory.[21][22]
                    </p>
                </div>
            </div>
            <hr>
            <div class='sneak-peek'>
                <?php
                $document = new DOMDocument();
                @$document->loadHTML(@file_get_contents(basename(__FILE__)));
                $title  = $document->getElementsByTagName("title")[0]->textContent;
                $source = "./paper/mathematics/" . $title . ".pdf";
                $destin = "./paper/thumbnail/" . $title;
                exec("pdfjam -o ". $destin."pdf" . $source ." 1 ");
                exec("convert -density 300 ". $destin."pdf" . $destin."jpg");
                exec("rm ". $destin."pdf");
                ?>
            </div>
        </div>
        <?php include("commenting.php"); ?>
        <script type="text/javascript" src="./js/home.js"></script>
        <script type="text/javascript">
            var paperTitle = window.localStorage.getItem("paperTitle");
            // do some php work here in retrieving all data related to this title.
            for (let elem of document.getElementsByTagName("title"))
                elem.innerHTML = window.localStorage.getItem("paperTitle");
            document.getElementsByClassName("title")[0].innerHTML = paperTitle;
        </script>
    </body>
</html>
