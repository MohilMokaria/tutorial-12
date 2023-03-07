<?php
    include "../connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>12 | 3</title>

    <!-- bootstrapCDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <style>
        body{
            background-color: #202225;
            color: white;
        }
        .card{
            margin: 5% 18%;
            padding: 4%;
            background-color: #2f3136;
        }
        button, input{
            margin: 4%;
        }
        a{
            margin: 2%;
        }
        img{
            width: 200px;
        }
    </style>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        <div class="card">
            <div class="form-row first">
                <center>
                <div class="form-group col-md-6">
                    <label for="file"> <h3>Select a Image to Upload.</h3> </label>
                    <br>
                    <input type="file" name="file" id="file" required>
                </div>
                <?php
                    if(isset($_GET['error'])):?>
                        <p><?php echo $_GET['error']; ?></p>
                <?php endif?>
                </center>
            </div>
            <button class="btn btn-primary" type="submit" name="submit" value="upload">Submit</button>
            <br>
            <hr>
            <br>
            <?php
                $query = "SELECT * FROM images ORDER BY id DESC";
                $response = mysqli_query($connection, $query);

                if(mysqli_num_rows($response)>0){
                    while($images = mysqli_fetch_assoc($response)){ ?>
                        <img src="uploaded/<?=$images['url']?>">
            <?php }
            }?>
        </div>
    </form>
</body>
</html>

<?php
    if(isset($_POST['submit']) && isset($_FILES['file'])){
        // echo "<pre>";
        // print_r($_FILES['file']);
        // echo "</pre>";

        $img_name = $_FILES['file']['name'];
        $img_size = $_FILES['file']['size'];
        $tmp_name = $_FILES['file']['tmp_name'];
        $error = $_FILES['file']['error'];

        if($error === 0){
            if($img_size > 125000){
                echo "<script>alert(\"File Size too Big!\");</script>";
            }else{
                $imgExt = pathinfo($img_name,PATHINFO_EXTENSION);
                $imgExtLoc = strtolower($imgExt);

                $allowed = array("jpg", "jprg", "png");

                if(in_array($imgExtLoc, $allowed)){
                    $newImg = uniqid("IMG-", true).'.'.$imgExtLoc;
                    $imgUploadPath = "./uploaded/".$newImg;

                    move_uploaded_file($tmp_name, $imgUploadPath);

                    $query = "INSERT INTO images(url) VALUES('$newImg')";
                    mysqli_query($connection, $query);
                    header("Location: ./index.php");

                }else{
                    echo "<script>alert(\"File Format Not Accepted!\");</script>";
                }
            }
        }else{
            echo "<script>alert(\"Unkown Error Occurred!\");</script>";
        }
    }
?>