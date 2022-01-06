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

        .container1{
            /* background-color: rgba(29,98,217,0.8); */
            /* background-color: rgba(99,247,5,0.8); */
            background-color: rgba(0,0,0,0.8);


            position: absolute;
            
            backdrop-filter: brightness(1.12);
            height: 500px;
            width: 500px;
            display: inline-block;
            border-radius: 3px;
        }
      
        .img0{
            /* height: inherit;
            width: inherit; */
            height: 500px;
            width: 600px;
            border-radius: 3px;
        }
        p{
            font-size: large;
            color: #FFFFFF;
            /* color: pink; */
            display: inline;
        }
        #edit-button{
            position: relative;
            top: 3.5px;
            left: 12px;
            border: none;
            padding: 0px;
            cursor: pointer;
            background-color: inherit;
            transition: all 1s;
        }
        #edit-button:hover{
            width: 24px;
            height: 24px;
        }
        .caption{
            padding-top: 10px;
        }
        .download{
            height: 70px;
            position: absolute;
            bottom: 0.001%;
        }
        .b1{
            border-radius: 8px;
        }
        .caption-edit{
            visibility: hidden;
        }
    </style>
</head>
<body>
    
        <!-- <div class="container0"> -->
        <?php
                echo '<img class="img0" src="'.$_GET['link'].'" alt="">';
                ?>


            <!-- </div> -->
            <div class="container1">
                <div class="caption">
                <p>&nbsp; this is a photo caption</p><button id="edit-button"><img src="res/edit1.png" alt="edit"></button>
                <form class="caption-edit" method="POST">
                    <input type="text">
                    <input type="submit" value="save">
                </form>
                </div>
                <hr>
                <a class="download"download href="<?php echo $_GET['link'] ?> ">
                <img class="b1" src="res/download.gif" alt="Download" height="70px" width="500px">
                </a>     
            </div>
</body>
</html>