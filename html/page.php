<?php
    require '../includes/header.php';

    $uri = $_SERVER['REQUEST_URI'];
    if (isset($_GET['eraro']) && $_GET['eraro'] === '404') {
        $uri = '/eraro_404';
        http_response_code(404);
    }

    if ($uri !== '/' && substr($uri, -1) === '/') {
        $uri = substr($uri, 0, strlen($uri) - 1);
    }
    $pageDetails = PAGES[$uri];
    define('PAGE', '../includes/templates/' . $pageDetails[0]);
    $notFound = !file_exists(dirname(__FILE__) . '/' . PAGE  . '_pre.php');
    if ($notFound) {
        showError('404', 'Ni ne trovis tiun paĝon');
    }
    require PAGE . '_pre.php';
    define('TITLE', isset(LSTR['pages'][$pageDetails[0]]['title']) ? LSTR['pages'][$pageDetails[0]]['title'] : $data['description']);

    header('Content-Language: ' . LOCALE);
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
        <meta charset="utf-8" lang="<?=LOCALE?>">
        <title>DEJO - <?=TITLE?></title>
        <link rel="stylesheet" href="/css/main.css?v=<?=VERSION?>">
        <link rel="icon" type="image/png" href="/img/favicon.png">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <meta property="og:type" content="website">
        <meta property="og:url" content="https://dejo.dk<?=$_SERVER['REQUEST_URI']?>">
        <meta property="og:site_name" content="Dana Esperantista Junulara Organizo">
        <meta property="og:title" content="<?=TITLE?>">
        <meta property="og:description" content="<?=$data['description']?>">
        <meta property="og:image" content="https://dejo.dk/img/twitter_card.png">

        <meta name="twitter:card" content="summary">
        <meta name="twitter:site" content="@dejoesperanto">
        <meta name="twitter:title" content="<?=TITLE?>">
        <meta name="twitter:description" content="<?=$data['description']?>">
        <meta name="twitter:image" content="https://dejo.dk/img/twitter_card.png">

        <meta name="description" content="<?=$data['description']?>">
        <meta name="keywords" content="esperanto,dejo,dana,esperantista,junulara,organizo,danmark,danio,denmark,international,language,ungdomsforening,ungdom">

        <meta http-equiv="content-language" content="<?=LOCALE?>">

        <?php require PAGE . '_head.php'; ?>
    </head>
    <body>
        <header>
            <div id="preMenu">
                <div>
                    <ul>
                        <?php
                            foreach (LOCALES as $code => $name) {
                                echo "<li title=\"$name\">$code</li>";
                            }
                        ?>
                    </ul>
                </div>
            </div>
            <nav>
                <div>
                    <a href="/"><img id="logo" src="/img/logo.svg" alt="<?=LSTR['header']['logo_alt']?>" title="<?=LSTR['header']['logo_title']?>"></a>
                    <div id="menu">
                        <ul>
                            <?php
                                foreach (PAGES as $url => $page) {
                                    if ($page[1]) {
                                        echo '<li><a href="' . $url . '">' . LSTR['pages'][$page[0]]['title'] . '</a></li>';
                                    }
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
            if (isset($data['submenu'])) {
                require 'submenu.php';
            }
        ?>
        <main>
            <div>
                <?php require PAGE . '_content.php'; ?>
            </div>
        </main>
        <footer>
            <div>
                <div>
                    <h4><?=LSTR['footer']['contact']?></h4>
                    <p>
                        <script>document.write('<'+'a'+' '+'h'+'r'+'e'+'f'+'='+"'"+'&'+'#'+'1'+'0'+'9'+';'+'a'+'i'+'l'+'t'+'o'+'&'+'#'+'5'+'8'+';'+ 'd'+'e'+'&'+'#'+'1'+'0'+'6'+';'+'o'+'&'+'#'+'6'+'4'+';'+'%'+'6'+'4'+'%'+'6'+'&'+'#'+'5'+'3'+';'+'j'+ '%'+'6'+'F'+'&'+'#'+'4'+'6'+';'+'d'+'%'+'6'+'B'+"'"+'>'+'d'+'e'+'j'+'&'+'#'+'1'+'1'+'1'+';'+'&'+'#'+ '6'+'4'+';'+'d'+'e'+'&'+'#'+'1'+'0'+'6'+';'+'o'+'&'+'#'+'4'+'6'+';'+'d'+'&'+'#'+'1'+'0'+'7'+';'+'<'+ '/'+'a'+'>');</script>
                        &middot; <a href="/kontakti"><?=LSTR['footer']['moreinfo']?></a>
                        &middot; <a href="/privatvivo"><?=LSTR['footer']['privacy']?></a>
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
                <div>
                    <img src="/img/logo_nigra.svg" alt="<?=LSTR['footer']['logo_alt']?>">
                </div>
            </div>
        </footer>
        <img id="zamenhofSherco" src="/img/zamenhof_malgranda.png">
        <script src="/js/main.js?<?=VERSION?>"></script>
    </body>
</html>
