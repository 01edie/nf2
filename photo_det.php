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
            background-color: rgba(138,132,132,0.5);
            position: absolute;
            
            /* backdrop-filter: brightness(1.12); */
            height: 500px;
            width: 450px;
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
            color: whitesmoke;
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
                <p>&nbsp; this is a photo</p>
            </div>
   
</body>
</html>