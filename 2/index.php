<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mail by Local Host</title>

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <style>
        body{
            background-color: #202225;
            color: white;
        }
        .card{
            margin: 3% 7%;
            padding: 3%;
            background-color: #2f3136;
        }
        .mineColor{
            padding: 1%;
            background-color: #36393f;
            border: 0;
        }
    </style>
</head>

<body>

    <div class="card">
        <div class="card-header">
            <h2 style="text-align: center;">PHP Mailer</h2>
        </div>
        <form method="post">
            <div class="card-body">
                <div class="mb-3">
                    <label for="sender" class="form-label"><h3>Your Mail</h3></label>
                    <input type="email" class="form-control mineColor" id="Semail" name="Semail" required>
                </div>
                <div class="mb-3">
                    <label for="Spass" class="form-label"><h3>Password</h3></label>
                    <input type="password" class="form-control mineColor" id="Spass" name="Spass" required>
                </div>
            </div>

            <hr>

            <div class="card-body">
                <div class="mb-3">
                    <label for="Remail" class="form-label"><h3>Receiver's Mail</h3></label>
                    <input type="email" class="form-control mineColor" id="Remail" name="Remail" required>
                </div>
                <div class="mb-3">
                    <label for="sub" class="form-label"><h3>Subject</h3></label>
                    <input type="text" class="form-control mineColor" id="sub" name="sub" required>
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label"><h3>Body</h3></label>
                    <textarea class="form-control mineColor" id="body" name="body" rows="6" required></textarea>
                </div>
                <div class="text-center">
                    <input class="btn btn-primary" name="send" type="submit" value="SEND">
                </div>
            </div>
        </form>
    </div>
</body>

</html>

<?php
    if(isset($_POST["send"])){
        if($_POST){

            // From section
            $userMail = $_POST['Semail'];
            $userPass = $_POST['Spass'];
            // To section
            $sendingMail = $_POST['Remail'];
            $sendingSub = $_POST['sub'];
            $sendingBody = $_POST['body'];

            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = $userMail;
                $mail->Password = $userPass;
                $mail->SMTPSecure = "ssl";
                $mail->Port = 465;
                $mail->setFrom($userMail);
                $mail->addAddress($sendingMail);
                $mail->isHTML(true);
                $mail->Subject = $sendingSub;
                $mail->Body = $sendingBody;
                $mail->send();
                echo "<script>alert(\"Message has been sent\");</script>";
            } catch (Exception $e) {
                echo "<script>alert(\"Error Occured! Scroll Down\");</script>";
                echo "Message could not be sent. Mailer Error:{$mail->ErrorInfo}";

            }
        }
    }
?>