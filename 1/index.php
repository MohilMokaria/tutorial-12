<?php
    session_start();
    include('../connection.php');
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
        input{
            margin: 1% 2%;
        }
    </style>
</head>

<body>

    <div class="card">
        <div class="card-header">
            <h2 style="text-align: center;">PHP Mailer</h2>
        </div>
        <form method="post" action="./login.php">
            <div class="card-body">
                <div class="mb-3">
                    <label for="sender" class="form-label"><h3>Email</h3></label>
                    <input type="email" class="form-control mineColor" id="email" name="email" required value="<?php if(isset($_COOKIE['user'])){echo $_COOKIE['user'];} ?>">
                </div>
                <div class="mb-3">
                    <label for="pass" class="form-label"><h3>Password</h3></label>
                    <input type="password" class="form-control mineColor" id="pass" name="pass" required value="<?php if(isset($_COOKIE['pass'])){echo $_COOKIE['pass'];} ?>">
                </div>
                <div class="mb-3">
                    <input type="checkbox" name="remember" id="remember" checked>
                    <label for="remember">Remember Me!</label>
                </div>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <input class="btn btn-primary" name="login" type="submit" value="Login">
                    <br>
                    <span>
                        <?php
                            if(isset($_SESSION['message'])){
                                echo $_SESSION['message'];
                            }
                            unset($_SESSION['message']);
                        ?>
                    </span>
                </div>
            </div>
            <div class="card-footer">
                Defalt Mail : admin@mail.com and Password : 12345678
            </div>
        </form>
    </div>
</body>

</html>