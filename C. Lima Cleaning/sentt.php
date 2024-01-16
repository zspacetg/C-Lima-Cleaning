<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'vendor/autoload.php';

if (isset($_POST['submit'])) {

    $mail = new PHPMailer(true);

    try {
        
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();                          
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'ccleaninglima@gmail.com';
        $mail->Password   = 'qmvptooonjdvupue';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;

        //Recipients
        $mail->setFrom('ccleaninglima@gmail.com', 'Mailer');
        $mail->addAddress('ccleaninglima@gmail.com', 'User');     //Add a recipient
        $mail->addReplyTo('ccleaninglima@gmail.com', 'Information');
        $mail->isHTML(true);

        $name = $_POST['name'];
        $date = $_POST['date'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $bath = $_POST['bathroom'];
        $bed= $_POST['bedrooms'];
        $pets = $_POST['pets'];
        $balcony = $_POST['balcony'];
        $floors = $_POST['floors'];
        $residence = $_POST['residence'];
        $desc = $_POST['description'];
        $mes = $_POST['message'];

        $body = "<!DOCTYPE html>
            <html>
                <head>
                  <style>
                    *{
                        font-size: 20px;
                    }
                    table {
                      font-family: Arial, sans-serif;
                      border-collapse: collapse;
                      width: 100%;
                    }

                    th, td {
                      border: 1px solid #dddddd;
                      text-align: left;
                      padding: 8px;
                    }

                    th {
                      background-color: #f2f2f2;
                    }
                  </style>
                </head>
                <body>
                <p>Email: ".$email."\n"."contact phone: ".$phone."\n"."</p>
                <br>
                <h1>Quantitys: </h1>    
                  <table>
                    <thead>
                      <tr>
                        <th>Bathroom</th>
                        <th>Bedrooms</th>
                        <th>Pets</th>
                        <th>Balcony</th>
                        <th>Floors</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>".$bath."</td>
                        <td>".$bed."</td>
                        <td>".$pets."</td>
                        <td>".$balcony."</td>
                        <td>".$floors."</td>
                      </tr>
                      <!-- Add more rows as needed -->
                    </tbody>
                  </table>
                  <br>
                  <p>"."\n"."Type of building: ".$residence."<br>"."\n".$desc."<br>"."\n".$mes."\n"." - client: ".$name."</p>
                </body>
            </html>";


        $mail->Subject = "Service quote - ".$name." - ".$date;

        $mail->Body =  $body;

        $mail->send();
        echo "<script>alert('Email successfully sent!');</script>";
        print("<script>location.href='index.html';</script>");
    } catch (Exception $e) {
        echo "<script>alert('Something went wrong with the email! Error:{$mail->ErrorInfo}');</script>";
        print("<script>location.href='index.html';</script>");
    }
} else{
    echo 'Form error!';
    print("<script>location.href='index.html';</script>");
}