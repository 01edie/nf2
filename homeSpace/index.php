<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="preload" href="../res/a13.jpg" as="image">
    <?php
    session_start();
    if(!isset($_SESSION["loggedin"]) || $_SESSION['loggedin']!==1){
        $_SESSION['loggedin']=2;
        header("location: ./../index.php");
        

        exit;
    }
    $username0=$_SESSION['name'];
    if(!isset($_SESSION['page'])){
        $_SESSION['page']=1;

    }
  
    ?>
    <style>
        body{
            background-image: url("../res/a13.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
        }


    /* panel */

        .panel0{
            position: absolute;
            top: 1%;
            right: 1%;
            background-color: inherit;
            transition: all 1.5s;
            
        }

        .panel00{
            position: absolute;
            top: 1%;
            right: 1%;
            border: 1px solid;
            background-color: inherit;
            border-radius: 4px;  


        }

        #account1{
            background-color: inherit;

            cursor: pointer;
            border-radius: 8px;
        }

        #panel2{
            visibility: hidden;
            transition: all 1s;

        }

        /* ----- */
        .txt{
            color: white;
        }

        .username{
            position: absolute;
            top: 4%;
            right: 7%;
            color: black;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-size: 22px;
            text-decoration: overline dashed;
            transition: all 0.3s;
        }
        .username:hover{
            font-size: 25px;
            font-style: italic;
            font-weight: 500;
        }

        .username:hover{
            text-decoration: overline;

        }
        /* image container -------------- */
        .image-container{
            position:absolute;
            top:18%;
            left: 4.1%;
            width: 90%;
            border-radius: 3px;
        }
        

        /* upload btn ---------- */

        input[type="file"] {
        position: absolute;
        z-index: -1;
        top: 15px;
        left: 4px;
        font-size: 17px;
        color: black;
        /* #b8b8b8 */
        display: inline;
        width: 250px;

        }
        
        .button-wrap {
            position: relative;
        }
        .button1 {
            display: inline;
            /* background-color: #1d6355; */
            background-color: rgb(67,61,61);
            
            border-radius: 10px;
            border: 4px double #cccccc;
            color: #ffffff;
            text-align: center;
            font-size: 17px;
            padding: 8px;
            width: 100px;
            transition: all 0.4s;
            cursor: pointer;
            margin: 5px;
        }
        .button1:hover {
            /* background-color: #00ab97; */
            background-color: rgb(214,212,212);
            /* font-size: 20px; */
            /* font-style: italic; */
        }
        /* root upload box  ------------ */
        .uploadbox{
            position: absolute;
            top: 9%;
            left:4.8%;
            width: 45%;
            /* height: 6%; */

        }
        #usuccess{
            position: relative;
            top: 14px;
            left: 5px;
            color: white;
            font-weight: 700;
            /* visibility: hidden; */
        }
        .upload1{
            position: relative;
            left:110px;
            top: 6.5px;
            border-radius: 17px;
            background-color: inherit;
            backdrop-filter: brightness(1.31);
            cursor: pointer;

        }
        .upload1:hover{
            background-color: rgb(214,212,212);
        }


    
    </style>

</head>
<body>


        <!-- panel  -->
        

        <div class="panel0" id="panel0">
        
        <div class="panel1" id="panel1">
            <table>
                <tr>
                    <td>
                        <button name="account" id="account1">
                        <img src="../res/1.png" alt="pane"  title="<?php echo $username0;  ?>">
                        </button>
                    </td>
                </tr>
            </table>
        </div>                                                                                            <!-- panel 2 -->
        <div class="panel2" id="panel2">
                                                                                <!-- login button -->

        <table>
        <tr>
                <td>
                    <button id="account1" class="account1" onclick="wall()">
                        
                        <img src="../res/wall.png" alt="wall" title="wall">
                        
                    </button>
                </td>
            </tr>  
            <tr>
                <td>
                    <button id="account1" class="account1" onclick="logout()">
                        <img src="../res/2.png" alt="logout" title="Log Out">
                    </button>
                </td>
            </tr>                           
                                                                                <!-- register button -->
        </table>
        </div>
    
        </div>

            <!-- ------ -->


            <a href="#" class="username"><?php
                echo $username0;

            ?></a>
    <!-- uplaod box  -->
        <div class="uploadbox">
            <form method="POST" enctype="multipart/form-data">
            <div class="button-wrap">
            <label class="button1" for="upload">Upload File</label>
            <input id="upload" type="file" name="uploadfile">
            <button id="upload1" class="upload1" name="usubmit" value="a" type="submit">
            <img src="../res/upload1.png" alt="upload">

            </button>
           
            </div>
            <div id="usuccess">

            <!-- upload logic php  -->
            <?php
                $target_dir = "../str/";
                $random_num=(String) rand(1,10000);
                if(isset($_POST["usubmit"])){
                $target_file = $target_dir.basename($random_num.$_FILES["uploadfile"]["name"]);
                include "../dbconnection.php";

                
                if( move_uploaded_file($_FILES["uploadfile"]["tmp_name"], $target_file)){
                $usql="INSERT INTO `pg0` (`pg_id0`, `username0`, `f_address`, `f_like`, `pg_dt`) VALUES (NULL, '$username0', '$target_file', '0', CURRENT_TIME())";
                $query0= mysqli_query($connection0, $usql);
                // if(!$query0){
                //     echo "0";
                // }
                if($query0){
                        echo "file uploaded succesfully!";
                        echo "<script>function usuccess(){
                            setTimeout(function(){document.getElementById('usuccess').style.visibility='hidden';},1200);
                            };</script>";
                        echo "<script>usuccess();</script>";

                    }


                }
                
                mysqli_close($connection0);
                }

    
            ?>

    <!-- --close upload logic php ---  -->

            </div>
            </form>
        </div>
        
        
<!-- ----image container---- -->

       <iframe class="image-container" src="./tst0.php" height="80%"  frameborder="0"  >


              
           
       </iframe>     





    
    
    
    <script>
        function logout(){
            location.replace("../logout.php")
        }
        function wall(){
            location.replace("../wall/")
        }

    //panel popup and popout
    document.getElementById("panel1").onmouseover=function(){
            document.getElementById("panel2").style.visibility="visible";
            document.getElementById("panel0").className="panel00";
        }
        document.getElementById("panel0").onmouseleave=function(){
            document.getElementById("panel2").style.visibility="hidden";
            document.getElementById("panel0").className="panel0";

        }
    
    
    // var us1= document.getElementById("usuccess").style.visibility;
    // usuccess();
    // setTimeout(function(){document.getElementById("usuccess").style.visibility="hidden";},1500);

    // ----
    </script>
</body>
</html>