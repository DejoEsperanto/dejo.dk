<?php
    require '../includes/header.php';

    $pageDetails = PAGES[$_SERVER['REQUEST_URI']];
    $page = '../includes/templates/' . $pageDetails[0];
    $notFound = !file_exists(dirname(__FILE__) . "/${page}_pre.php");
    if ($notFound) {
        http_response_code(404);
        echo '404 File not found';
        die();
    }
    require "${page}_pre.php";
?>
<!doctype html>
<html>
    <head>
        <!--
             * Copyright (C) 2017 Mia Nordentoft, Anton S. Meiner, dejo.dk contributors
             *
             * This file is part of dejo.dk.
             *
             * dejo.dk is free software: you can redistribute it and/or modify
             * it under the terms of the GNU General Public License as published by
             * the Free Software Foundation, either version 3 of the License, or
             * (at your option) any later version.
             *
             * dejo.dk is distributed in the hope that it will be useful,
             * but WITHOUT ANY WARRANTY; without even the implied warranty of
             * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
             * GNU General Public License for more details.
             *
             * You should have received a copy of the GNU General Public License
             * along with dejo.dk. If not, see <http://www.gnu.org/licenses/>.
        -->
        <meta charset="utf-8">
        <title>DEJO - <?=$data['title']?></title>
        <link rel="stylesheet" href="css/main.css?v=<?=VERSION?>">
        <?php require "${page}_head.php"; ?>
    </head>
    <body>
        <header>
            <div id="preMenu">
                <div>
                    <ul>
                        <?php
                            foreach (LOCALES as $lang) {
                                echo "<li>$lang</li>";
                            }
                        ?>
                    </ul>
                </div>
            </div>
            <nav>
                <div>
                    <a href="/"><img src="img/logo.svg"/></a>
                    <div id="menuo">
                        <ul>
                            <?php

                            ?>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <section id="titleBox"></section>
        <main>
            <div>
                <?php require "${page}_content.php"; ?>
            </div>
        </main>
        <footer>
            <div></div>
        </footer>
        <script src="js/main.js"></script>
    </body>
</html>
