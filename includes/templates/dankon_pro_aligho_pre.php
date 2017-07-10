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

    require_once __DIR__ . '/../libraries/PHPMailer/class.phpmailer.php';

    $mail = new PHPMailer(true);
    $mail->IsSMTP();

    try {
        $mail->Host = SMTP['host'];
        $mail->SMTPAuth = SMTP['auth'];
        $mail->Username = SMTP['username'];
        $mail->Password = SMTP['password'];
        $mail->SMTPSecure = SMTP['secure'];
        $mail->Port = SMTP['port'];
    } catch (phpmailerException $e) {
        error_log($e);
        die('Io rompis'); // TODO: Handle this properly
    }

    $mail->setFrom('dejo@dejo.dk', 'DEJO');
    $mail->addAddress($_POST['email'], $_POST['firstname'] . ' ' . $_POST['latname'] ?: '');
    $mail->isHTML(true);
    $mail->Subject = LSTR['pages']['dankon_pro_aligho']['subject'];
    $mail->Body = '<b>Test!</b>';
    $mail->Body = '*Test!*';

    if (!$mail->send()) {
        error_log($e->ErrorInfo);
        die('Io rompis'); // TODO: Handle this properly
    } else {
        // Hura!
    }
?>
