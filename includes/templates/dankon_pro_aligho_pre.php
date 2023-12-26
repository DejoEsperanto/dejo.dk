<?php
    /*
     * Copyright (C) 2018 Mia Nordentoft, Anton S. Meiner, GitHub contributors
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
        'titleBox' => true,
        'breadcrumb' => ['alighi'],
        'description' => 'Dankon pro via aliĝo al DEJO'
    ];

    if (!isset($_POST['firstname'])           ||
        !isset($_POST['birthday'])            ||
        !isset($_POST['country'])             ||
        !isset($_POST['email'])
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
        showError(500, 'Okazis interna servila eraro');
    }

    $firstname = substr($_POST['firstname'], 0, 80);
    $lastname = isset($_POST['lastname']) ? substr($_POST['lastname'], 0, 80) : '';
    try {
        $birthday = DateTime::createFromFormat('Y-m-d', $_POST['birthday']);
    } catch (Exception $e) {
        header("Location: /alighi", true, 307);
        die();
    }
    $birthdayDisplay = $birthday->format('d/m/Y');
    $address = isset($_POST['address']) ? substr($_POST['address'], 0, 200) : '';
    $address .= isset($_POST['zipcode']) ? ', ' . substr($_POST['zipcode'], 0, 20) : '';
    $address .= isset($_POST['city']) ? ' ' . substr($_POST['city'], 0, 50) : '';
    $address .= isset($_POST['country']) ? ', ' . substr($_POST['country'], 0, 30) : '';
    $email = substr($_POST['email'], 0, 200);
    $phone = isset($_POST['phone']) ? substr($_POST['phone'], 0, 20) : '';
    $individual = isset($_POST['individual']) ? (bool)$_POST['individual'] : false;
    $eed = isset($_POST['eed']) ? (bool)$_POST['eed'] : false;

    $maxBirthday = new DateTime();
    $minBirthday = new DateTime();
    $minBirthday->modify('-35 years');
    $cheapBirthday = new DateTime();
    $cheapBirthday->modify('-26 years');

    if ($birthday > $maxBirthday || $birthday < $minBirthday) {
        header("Location: /alighi", true, 307);
        die();
    }

    if ($birthday >= $cheapBirthday) {
        $payment = 100;
    } else {
        $payment = 200;
    }

    if ($individual) {
        $payment += 330;
    }

    if ($eed) {
        $payment += 95;
    }

    $body = file_get_contents(__DIR__ . '/../../email/aligho_' . LOCALE . '_inline.html');
    $mail->AddEmbeddedImage(__DIR__ . '/../../email/logo_nigra.png', 'dejo-logo', 'logo.png');
    $body = str_replace('${logo-cid}', 'dejo-logo', $body);
    $body = str_replace('${name}', "$firstname $lastname", $body);
    $body = str_replace('${payment}', "$payment kr", $body);
    $body = str_replace('${bank_number}', LSTR['pages']['dankon_pro_aligho']['bank_number'], $body);
    $body = str_replace('${firstname}', $firstname, $body);
    $body = str_replace('${lastname}', $lastname, $body);
    $body = str_replace('${birthday}', $birthdayDisplay, $body);
    $body = str_replace('${address}', $address, $body);
    $body = str_replace('${email}', $email, $body);
    $body = str_replace('${phone}', $phone, $body);
    $body = str_replace('${uea-tejo}', $individual ? LSTR['pages']['dankon_pro_aligho']['yes'] : LSTR['pages']['dankon_pro_aligho']['no'], $body);
    $body = str_replace('${eed}', $eed ? LSTR['pages']['dankon_pro_aligho']['yes'] : LSTR['pages']['dankon_pro_aligho']['no'], $body);

    $altBody = file_get_contents(__DIR__ . '/../../email/aligho_' . LOCALE . '.txt');
    $altBody = str_replace('${name}', "$firstname $lastname", $altBody);
    $altBody = str_replace('${payment}', "$payment kr", $altBody);
    $altBody = str_replace('${bank_number}', LSTR['pages']['dankon_pro_aligho']['bank_number'], $altBody);
    $altBody = str_replace('${firstname}', $firstname, $altBody);
    $altBody = str_replace('${lastname}', $lastname, $altBody);
    $altBody = str_replace('${birthday}', $birthdayDisplay, $altBody);
    $altBody = str_replace('${address}', $address, $altBody);
    $altBody = str_replace('${email}', $email, $altBody);
    $altBody = str_replace('${phone}', $phone, $altBody);
    $altBody = str_replace('${uea-tejo}', $individual ? LSTR['pages']['dankon_pro_aligho']['yes'] : LSTR['pages']['dankon_pro_aligho']['no'], $altBody);
    $altBody = str_replace('${eed}', $eed ? LSTR['pages']['dankon_pro_aligho']['yes'] : LSTR['pages']['dankon_pro_aligho']['no'], $altBody);

    $mail->setFrom('dejo@dejo.dk', 'DEJO');
    $mail->addAddress($email, "$firstname $lastname");
    $mail->addBCC('dejo@dejo.dk');
    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->Subject = LSTR['pages']['dankon_pro_aligho']['subject'];
    $mail->Body = $body;
    $mail->AltBody = $altBody;

    if (!$mail->send()) {
        error_log($e->ErrorInfo);
        showError(500, 'Okazis interna servila eraro');
    }
?>
