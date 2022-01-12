<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preload" href=""res/bg9.jpg"">
  <title>Wall</title>
  <?php
    session_start();
    if(!isset($_SESSION["loggedin"]) || $_SESSION['loggedin']!==1){
        $_SESSION['loggedin']=2;
        header("location: ../");
        

        exit;
    }
    $username0=$_SESSION['name'];
    if(!isset($_SESSION['page'])){
        $_SESSION['page']=1;

    }
  
    ?>
  <style>
    body{
            background-image: url("../res/bg9.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
        }
    
    br{
      padding: 0px;
      margin: 0px;
      height: 0px;
      width: 0px;
    }
    .main{
      width: 90%;
      height: 90%;
      position: absolute;
      top: 6%;
      left: 5%;
    }


   

            /* panel */

            .panel0{
            position: absolute;
            top: 1%;
            right: 1%;
            background-color: inherit;
            transition: all 1s;
            
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
            backdrop-filter: brightness(1.2);
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
                    <button id="account1" class="account1" onclick="home()">
                        
                        <img src="../res/homespace.png" alt="homespace" title="home! sweet home">
                        
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


<!-- ------ -->

<iframe class="main" src="../tst1.php" frameborder="0" ></iframe>

            
<script>
  function logout(){
            location.replace("../logout.php");
        }
  function home(){
            location.replace("../homeSpace/");
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
</script>
</body>
</html>