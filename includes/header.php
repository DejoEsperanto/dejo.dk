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
     define('SMTP', [
          'host' => '',
          'port' => '',
          'auth' => true,
          'secure' => 'ssl',
          'username' => '',
          'password' => ''
     ]);
     */

    define('VERSION', '1.0.0');
    define('PAGES', [ /* path => [filename, show in menu] */
        '/'                  => ['index',             true],
        '/novajhoj'          => ['novajhoj',          true],
        '/okazajhoj'         => ['okazajhoj',         true],
        '/alighi'            => ['alighi',            true],
        '/pri'               => ['pri',               true],
        '/kontakti'          => ['kontakti',          true],
        '/dankon_pro_aligho' => ['dankon_pro_aligho', false]
    ]);
    define('LOCALES', ['da' => 'Dansk', 'eo' => 'Esperanto']);

    if (array_key_exists($_COOKIE['lang'], LOCALES)) {
        define('LOCALE', $_COOKIE['lang']);
    } else {
        define('LOCALE', 'eo');
        setcookie('lang', 'eo');
    }

    define('LSTR', json_decode(file_get_contents('../locales/' . LOCALE . '.json'), true));

    function showError($code, $message) {
        http_response_code($code);
        echo "$code $message";
        die();
    }
