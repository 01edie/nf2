<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
    <style>
        body{
            background-image: url("res/ae6.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
        }

        .upload0{
            position: absolute;
            top: 23%;
            left: 35%;
        }

        .uploadSource{

        }
        .uploadButton{
            width: 80px;
            height: 45px;
            border-radius: 27px;
            font-size: 22px;
            cursor: pointer;
        }
        .success{
            color: blue;
        }
    </style>
</head>
<body>
    <div class="upload0">
        <form action="#" method="post" enctype="multipart/form-data">
        <input class="uploadSource" type="file" name="uploadfile" >
            <input class="uploadButton" name="submit" type="submit" value="upload">
        </form>
                    
    

    <?php
    $target_dir = "str/";
    if(isset($_POST["submit"])){
     $target_file = $target_dir.basename($_FILES["uploadfile"]["name"]);
     

     //database connection
    $server="localhost";
    $username="root";
    $password="";
    $db="photogallery";

//connection

    $connection0=mysqli_connect($server,$username,$password,$db);

//connection check

    if(!$connection0){
       die("Connection failed: " . mysqli_connect_error()); 
    }
    // if($connection0){
    //     echo "conected!<br>"; 
    //  }
    if( move_uploaded_file($_FILES["uploadfile"]["tmp_name"], $target_file)){
    $sql0="INSERT INTO `log` (`id0`, `id1`, `address`) VALUES (NULL, 'a', '$target_file')" ;
    $query0= mysqli_query($connection0, $sql0);
    // if(!$query0){
    //     echo "0";
    // }
    if($query0){
            echo "<p class='success' >file uploaded succesfully!</p> </div>";
        }
    }
    




    mysqli_close($connection0);
    }

    
    ?>

</body>
</html>
