<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* body{
            background-image: url("res/bg9.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
        } */
       
        .container0{
            height: 500px;
            width: 600px;
        }
        .img0{
            height: inherit;
            width: inherit;
        }
        /* scrollbar----- */

        /* width */
            ::-webkit-scrollbar {
            width: 5px;
            }

            /* Track */
            ::-webkit-scrollbar-track {
            box-shadow: inset 0 0 5px grey; 
            border-radius: 10px;
            }
            
            /* Handle */
            ::-webkit-scrollbar-thumb {
            background: aqua; 
            border-radius: 10px;
            }

            /* Handle on hover */
            ::-webkit-scrollbar-thumb:hover {
            background: blue; 
            }
        /* ------- */
    </style>
</head>
<body>
    <!-- <?php
    if(isset($_GET['link'])){
        echo "passed!";
    }
    ?> -->

    <div class="container0">
        <?php
        echo '<img class="img0" src="'.$_GET['link'].'" alt="">';
        ?>


    </div>
</body>
</html>