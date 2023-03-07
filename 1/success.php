<?php

    session_start();
    if(!isset($_SESSION['id']) || trim($_SESSION['id']) == ''){
        header("Location: ./index.php");
        exit();
    }
    include('../connection.php');
    $query = mysqli_query($connection, "SELECT * FROM login where mail='".$_SESSION['id']."'");
    $row = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loggedin</title>

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
        a{
            margin: 3%;
        }
    </style>
</head>
<body>

    <div class="card">
        <div class="card-header">
            <h2 style="text-align: center;">You are loggedin!</h2>
        </div>
        <div class="text-center">
                <?php session_destroy() ?>
                <a href="./index.php" class="btn btn-danger">Logout</a>
        </div>
    </div>
</body>
</html>