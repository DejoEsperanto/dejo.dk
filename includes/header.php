<?php
    /*
     * Copyright (C) 2017 Mia Nordentoft, Anton S. Meiner, GitHub contributors
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
     */
    
    require 'passwords.php';
    /*
     define('SMTPCredentials', [
          'host' => '',
          'port' => '',
          'auth' => true,
          'secure' => 'ssl',
          'username' => '',
          'password' => ''
     ]);

     define('RECAPTCHA_SECRET', '');
     */

    define('VERSION', '1.0.2');
    define('PAGES', [ /* path => [filename, show in menu] */
        '/'                 => ['index',               true],
        '/novajhoj'         => ['novajhoj',            true],
        '/okazajhoj'        => ['okazajhoj',           true],
        '/alighi'           => ['alighi',              true],
        '/alighi/dankon'    => ['dankon_pro_aligho',   false],
        '/pri'              => ['pri',                 true],
        '/pri/strukturo'    => ['strukturo',           false],
        '/pri/statuto'      => ['statuto',             false],
        '/kontakti'         => ['kontakti',            true],
        '/kontakti/dankon'  => ['dankon_pro_kontakto', false],

        '/eraro_404'        => ['404', false]
    ]);

    // Define inverse array
    $inverse = [];
    foreach (PAGES as $url => $page) {
        $inverse[$page[0]] = array_merge([$url], array_slice($page, 1));
    }
    define('PAGES_INVERSE', $inverse);

    define('LOCALES', ['da' => 'Dansk', 'eo' => 'Esperanto']);

    if (isset($_COOKIE['lang']) && array_key_exists($_COOKIE['lang'], LOCALES)) {
        define('LOCALE', $_COOKIE['lang']);
    } else {
        define('LOCALE', 'da');
        setcookie('lang', 'da');
    }

    define('LSTR', json_decode(file_get_contents('../locales/' . LOCALE . '.json'), true));

    function showError($code, $message) {
        http_response_code($code);
        if ($code == '404') {
            parse_str($_SERVER['QUERY_STRING'], $query);
            $query['eraro'] = '404';
            $queryString = http_build_query($query);
            header('Location: ' . strtok($_SERVER['REQUEST_URI'], '?') . '?' . $queryString);
        } else {
            die("$code $message");
        }
    }

    function isRecaptchaValid ($response, $ip) {
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = [
            'secret' => RECAPTCHA_SECRET,
            'response' => $response,
            'remoteip' => $ip
        ];
        $options = [
            'http' => [
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data)
            ]
        ];
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        if (!$result) {
            error_log($e);
            showError(500, 'Okazis interna servila eraro');
        }
        $recaptchaResult = json_decode($result, true);
        return (bool)($recaptchaResult['success']);
    }

    function imageCredit ($picture) {
        $license = preg_match('/(.+)\..+/', $picture, $matches);

        return '(' . LSTR['photo'] . ': ' . trim(file_get_contents(__DIR__ . '/../img/' . $matches[1] . '.permesilo')) . ')';
    }

    function headerPhoto ($page, $picture) {
        return '<div class="headerPhoto">' .
                   '<img src="/img/' . $picture . '">' .
                   '<span>' . LSTR['pages'][$page]['picture'] . '<br>' . imageCredit($picture) . '</span>' .
                '</div>';
}
