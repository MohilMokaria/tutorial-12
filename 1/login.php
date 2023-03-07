<?php
    if(isset($_POST["login"])){

        session_start();
        include("../connection.php");

        $mail=$_POST['email'];
        $pass=$_POST['pass'];

        $query = "SELECT * FROM login WHERE mail='$mail' && pass='$pass'";
        $resp = mysqli_query($connection, $query);

        if(mysqli_num_rows($resp) == 0){
            $_SESSION['message'] = "User Not Found!";
            header("Location: ./index.php");
        }else{
            $row = mysqli_fetch_array($resp);

            if(isset($_POST['remember'])){
                setcookie("user", $row['mail'], time() + (86500 * 30));
                setcookie("pass", $row['pass'], time() + (86500 * 30));
            }

            $_SESSION['id'] = $row['mail'];
            header("Location: ./success.php");
        }
    }
?>