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
        'titleBox' => true,
        'breadcrumb' => ['kontakti']
    ];

    if (!isset($_POST['name'])                  ||
        !isset($_POST['email'])                 ||
        !isset($_POST['subject'])               ||
        !isset($_POST['message'])               ||
        !isset($_POST['g-recaptcha-response'])) {
        header("Location: /kontakti", true, 307);
        die();
    }

    // Verify recaptcha
    if (!isRecaptchaValid($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR'])) {
        error_log($e);
        showError(401, 'Nevalida reCAPTCHA');
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

    $name    = substr($_POST['name'],    0, 100);
    $email   = substr($_POST['email'],   0, 100);
    $subject = substr($_POST['subject'], 0, 200);
    $message = substr($_POST['message'], 0, 4000);

    $time = (new DateTime())->format('Y-m-d H:i:s');

    $mail->setFrom('dejo@dejo.dk', "DEJO ($name)");
    $mail->addAddress('dejo@dejo.dk', 'DEJO');
    $mail->AddReplyTo($email, $name);
    $mail->CharSet = 'UTF-8';
    $mail->Subject = "Kontakto: $subject";
    $mail->Body = "$name <$email> kontaktis vin je $time per la reta formularo:\n\n$message";

    if (!$mail->send()) {
        error_log($e->ErrorInfo);
        showError(500, 'Okazis interna servila eraro');
    }
?>
