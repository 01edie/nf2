<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <title>Document</title>
    <?php
    session_start();
    $username0=$_SESSION['name'];
    include "dbconnection.php";
    $f_address=$_GET["link"];
    $sql='SELECT username0 FROM pg0 WHERE f_address="'.$f_address.'"';
    $res1=mysqli_query($connection0,$sql);
    $mres=mysqli_fetch_array($res1);
    if($mres['username0']==$username0){
        echo "<script>var auth=1;</script>";
    }
    else{
        echo "<script>var auth=0;</script>";
    }
    mysqli_free_result($res1);


    if(isset($_POST['save-button'])){
        $sql2="UPDATE pg0 SET caption = '".$_POST["new_caption"]."' WHERE f_address='".$_GET["link"]."'";
        $res_update=mysqli_query($connection0,$sql2);
    }
    $sql1='SELECT username0, pg_dt, caption FROM pg0 WHERE f_address="'.$_GET["link"].'"';
    $sql_comment='SELECT username0, data0, comment_dt FROM comment WHERE f_address="'.$_GET["link"].'"'.' ORDER BY comment_id DESC LIMIT 5;';

    $res_caption=mysqli_query($connection0,$sql1);
    $mres_caption=mysqli_fetch_array($res_caption);
    mysqli_free_result($res_caption);

    if(isset($_POST['comment-btn'])){
        $data0=$_POST['data0'];
        $sql_insert="INSERT INTO comment VALUES (NULL, '$username0', '$f_address', '', '', '$data0', CURRENT_TIME())";
        $res_insert=mysqli_query($connection0,$sql_insert);
        // header("Refresh:0");
    }
    $res_comment=mysqli_query($connection0,$sql_comment);



    ?>
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
            /* visibility: hidden; */
            padding-left: 8.5px;
            padding-top: 2px;
        }
        #input{
            border-radius: 3px;
            border-color: #00f557;
            /* height: 16px; */
            padding-left: 7px;
            background-color: inherit;
            padding: 3px 6px;
            color: #FFFFFF;
            font-size: 15px;
        }
        #save-button{
            border:none;
            padding: 0px;
            position: relative;
            top: 6.5px;
            left: 1.5px;
            cursor: pointer;
            
            background-color: inherit;
            transition: all 0.1s;
        }
        #save-button:hover{
            left: 3.5px;
        }
        #edit-button{
            visibility: visible;
        }
        #caption-edit{
            visibility: hidden;
            display: inline;
            padding-left: 25px;

        }
        .p_det{
            color: wheat;
            padding-left: 8px;
            position: relative;
            top: 4px;
        }
        .input-box{
            border-radius: 3px;
            border-color: #00f557;
            padding-left: 7px;
            background-color: inherit;
            padding: 3px 6px;
            color: #FFFFFF;
            font-size: 15px;
            margin: 6px;
            margin-right: 3px;
        }
        .unit-comment{
            color: #FFFFFF;
            font-size: 18px;
            padding-left: 7px;
            margin-top: 20px;     
        }
        .comment-box{
            position: absolute;
            bottom: 15%;
        }
        #comment-btn{
            font-size: large;
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
                <p>&nbsp; <?php echo $mres_caption['caption']; ?></p><button id="edit-button"><img src="res/edit1.png" alt="edit"></button>
                <form class="caption-edit" id="caption-edit" method="POST">
                    <input id="input" type="text" name="new_caption" placeholder="" size="20px" maxlength="25">
                    <button id="save-button"  name="save-button" value="1" type="submit"><img src="res/save2.png" alt=""></button>
                </form>
                <br><strong class="p_det"><?php echo $mres_caption['username0']; ?> | <?php echo substr($mres_caption['pg_dt'],0,16); ?></strong>
                </div>
                <hr>
                <!-- comments  -->
                <?php 
                $c=5;
                while($c>=1){
                    $mres_comment=mysqli_fetch_array($res_comment);
                    if(!empty($mres_comment['username0'])){
                        echo '<div class="unit-comment">
                        #'.$mres_comment['username0'].' | '.substr($mres_comment['comment_dt'],0,16).'<br>
                        '.$mres_comment['data0'].'</p>
                        </div>';
                    }
                   
                    $c=$c-1;
                }
                ?>
                

              
                <!-- comment box  -->
                <form method="POST" class="comment-box">
                    <input class="input-box" name="data0" type="text"><input id="comment-btn" name="comment-btn" type="submit" value="comment">
                </form>


                <!-- download  -->
                <a class="download"download href="<?php echo $_GET['link'] ?> ">
                <img class="b1" src="res/download.gif" alt="Download" height="70px" width="500px">
                </a>
                <script>
                    // input box visibility by edit button 
                    if(auth==1){
                        document.getElementById("edit-button").onclick=function(){
                        document.getElementById("caption-edit").style.visibility="visible";
                        }
                    }
                    
                </script>     
            </div>
</body>
</html>