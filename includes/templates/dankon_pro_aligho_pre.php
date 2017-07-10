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

    $data = [
        'titleBox' => true
    ];

    if (!isset($_POST['firstname']) ||
        !isset($_POST['birthday'])  ||
        !isset($_POST['country'])   ||
        !isset($_POST['email'])) {
        header("Location: /alighi", true, 307);
        die();
    }

    require_once __DIR__ . '/../libraries/PHPMailer/PHPMailerAutoload.php';

    $mail = new PHPMailer(true);
    $mail->IsSMTP();

    try {
        $mail->Host = SMTPCredentials['host'];
        $mail->SMTPAuth = SMTPCredentials['auth'];
        $mail->Username = SMTPCredentials['username'];
        $mail->Password = SMTPCredentials['password'];
        $mail->SMTPSecure = SMTPCredentials['secure'];
        $mail->Port = SMTPCredentials['port'];
    } catch (phpmailerException $e) {
        error_log($e);
        die('Io rompis'); // TODO: Handle this properly
    }

    $firstname = $_POST['firstname'];
    $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';

    $mail->setFrom('dejo@dejo.dk', 'DEJO');
    $mail->addAddress($_POST['email'], "$firstname $lastname");
    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->Subject = LSTR['pages']['dankon_pro_aligho']['subject'];
    $mail->Body = '<b>Test!</b>';
    $mail->AltBody = '*Test!*';

    if (!$mail->send()) {
        error_log($e->ErrorInfo);
        die('Io rompis'); // TODO: Handle this properly
    } else {
        // Hura!
    }
?>
