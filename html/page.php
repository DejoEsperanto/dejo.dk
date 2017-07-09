<?php
    require '../includes/header.php';

    $pageDetails = PAGES[$_SERVER['REQUEST_URI']];
    define(PAGE, '../includes/templates/' . $pageDetails[0]);
    define(TITLE, LSTR['pages']['index']['title']);
    $notFound = !file_exists(dirname(__FILE__) . '/' . PAGE  . '_pre.php');
    if ($notFound) {
        http_response_code(404);
        echo '404 File not found';
        die();
    }
    require PAGE . '_pre.php';
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
        <title>DEJO - <?=TITLE?></title>
        <link rel="stylesheet" href="css/main.css?v=<?=VERSION?>">
        <?php require PAGE . '_head.php'; ?>
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
                    <div id="menu">
                        <ul>
                            <?php
                                foreach (PAGES as $url => $page) {
                                    echo '<li><a href="' . $url . '">' . LSTR['pages'][$page[0]]['title'] . '</a></li>';
                                }
                            ?>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <?php
            if ($data['titleBox']) {
                require 'titlebox.php';
            }
        ?>
        <main>
            <div>
                <?php require PAGE . '_content.php'; ?>
            </div>
        </main>
        <footer>
            <div>
                <h4><?=LSTR['footer']['contact']?></h4>
                <p>
                    <script>document.write('<'+'a'+' '+'h'+'r'+'e'+'f'+'='+"'"+'&'+'#'+'1'+'0'+'9'+';'+'a'+'i'+'l'+'t'+'o'+'&'+'#'+'5'+'8'+';'+ 'd'+'e'+'&'+'#'+'1'+'0'+'6'+';'+'o'+'&'+'#'+'6'+'4'+';'+'%'+'6'+'4'+'%'+'6'+'&'+'#'+'5'+'3'+';'+'j'+ '%'+'6'+'F'+'&'+'#'+'4'+'6'+';'+'d'+'%'+'6'+'B'+"'"+'>'+'d'+'e'+'j'+'&'+'#'+'1'+'1'+'1'+';'+'&'+'#'+ '6'+'4'+';'+'d'+'e'+'&'+'#'+'1'+'0'+'6'+';'+'o'+'&'+'#'+'4'+'6'+';'+'d'+'&'+'#'+'1'+'0'+'7'+';'+'<'+ '/'+'a'+'>');</script>
                </p>
                <br/>
                <p>
                    <?=LSTR['footer']['copyright']?><br/>
                    <?php
                        $line = LSTR['footer']['license_code'];
                        $line = str_replace('$1', '<a href="https://www.gnu.org/licenses/gpl-3.0.en.html">', $line);
                        $line = str_replace('$2', '</a>', $line);
                        $line = str_replace('$3', '<a href="https://github.com/DejoEsperanto/dejo.dk">', $line);
                        $line = str_replace('$4', '</a>', $line);
                        echo $line;
                    ?><br/>
                    <?=LSTR['footer']['license_contents']?>
                </p>
            </div>
        </footer>
        <script src="js/main.js"></script>
    </body>
</html>
