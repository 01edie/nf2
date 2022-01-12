<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .a1{
            position: absolute;
            width: 567px;
            height: 425px;
            top: 15%;
            left: 28%;
            justify-content: center;
            border-radius: 5px;
            backdrop-filter: brightness(1.26);

        }
        .a2{
            visibility: hidden;

        }
        .l1{
            height: 42px;
            width: 193px;
            background-color: aqua;
            left: 15%;
            margin-top: 2%;
            position: relative;
            font-size: 20px;
            padding: 20px 0px 0px 0px;
            border-radius: 6px;
            visibility: visible;
            float: left;
            display: flex;
            justify-content: center;
            box-shadow: 5px 10px 18px rgb(5, 139, 216);
            cursor: grab;
            


        }
        .l1:active{
            cursor: grabbing;
        }
        .s1{
            height: 42px;
            width: 193px;
            background-color:rgb(219, 242, 248);
            position: relative;
            visibility: visible;
            margin-top: 2%;

            left: 16%;
            padding: 20px 0px 0px 0px;
            border-radius: 6px;
            float: left;
            text-align: center;
            display: flex;
            justify-content: center;
            font-size: 20px;
            box-shadow: 5px 10px 18px rgb(156, 234, 253);
            cursor: grab;
        }
        .s1:active{
            cursor: grabbing;
        }
        #input{
            font-size: 1.15em;
            border-radius: 5px;
            padding: 3px;
            border-color: aqua; 
        }
        .tp{
            padding-left: 64px;
            padding-bottom: 11px;
        }
        .ib{
            font-size: 1.15em;
            border-radius: 3px;
            padding: 5px;
            border-color: aqua;
            width: 392px;
            border-radius: 7px;
            background-color: rgba(73, 214, 219, 0.3);
            height: 62px;
            box-shadow: 5px 10px 18px rgb(3, 172, 214);

            

        }
        .line{
            position: relative;
            margin-top: 18%;
            width: 482px;
            color: blue;
        }
        .signup{
            visibility: hidden;
            position: absolute;

        }
        .login{
            visibility: visible;
            position: absolute;


        }

        /* error msg  */
        .error{
            color: rgba(255,1,1,1);
            font-size: 15px;
            position: absolute;
            top: 88%;
            left: 18%;

            
        }
        .registered{
            color: green;
            font-size: 20px;
            font-weight: 200;
            position: absolute;
            top: 94%;
            left: 1%;
            visibility: inherit;
            
            
        }

        .lsuccess{
            color: black;
            font-size: 18px;
            position: absolute;
            top: 103%;
            left: 1%;
            
        }



    
        
    </style>
         <?php
            // if(isset($_POST['vs'])){
            //     if($_POST['vs']=="su"){
            //         echo 1;
            //         echo " <script>vssu();</script> ";
            //     }
            //     elseif($_POST['vs']=='li'){
            //         $vs=1;
            //     }
            // }

             session_start();

          
            if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === 1){
                header("location: ./homeSpace");
                exit;
            }
            if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === 2){
                echo "please login before entering! ";
                
            }

            //sign in php
            $um0="";
            $pm0="";
            echo "<script>var ss=0;</script>" ;
           
            if(isset($_POST['signin'])){
                // $email=$_POST['username'];
                // $sql="select 'address' from 'log' where 'id1' = 'email'";
                include "dbconnection.php";

                if(!empty($_POST['password'])){
                    $password=$_POST['password'];
                    
                    if(strlen($password)>=4){
                        // authentication part 
                        if(!empty($_POST['username'])){
                            $username=$_POST['username'];
                            $sqlz="SELECT password0 FROM uauth0 WHERE username0 = '$username'";
                            $r9=mysqli_query($connection0, $sqlz);
                            $r91=mysqli_fetch_array($r9, MYSQLI_ASSOC);
                            if($r91==NULL){
                                
                                $um0="#Account doesn't exist!";
        
                            }
                            else{
                                if($r91['password0']==$password){

                
                
                                    $_SESSION["loggedin"]=1;
                                    $_SESSION['name']=$username;
                                    header("location: ./homeSpace");
                                    mysqli_close($connection0);
                                    
                                    
                                }
                                else{
                                        echo "<script> ss=1;</script>" ;
                                    }
                                }
                            }
                        else{
                            $um0="#Sorry, you can't go ghost mode! ";
                        }
        
                    }
                    else{
                        $pm0="#Password should be atleast 4 characters!";

                    }
                }
                else{
                        $pm0="#You missed the password!";
                }

            }
                

                

            //sign up php
            $um="";
            $em="";
            $pm="";
            echo "<script>var reg=0;</script>";


            if(isset($_POST['signup'])){
                include "dbconnection.php";

                
                // validation
                if(!empty($_POST['username'])){
                    $username=$_POST['username'];
                    $sqlu="SELECT email0 FROM udata WHERE username0 = '$username'";
                    $r0=mysqli_query($connection0, $sqlu);
                    $r01=mysqli_fetch_array($r0, MYSQLI_ASSOC);
                    if($r01==NULL){
                        $u0=true;
                    }
                    else{
                        $u0=false;
                        $um="#Username already exists!";
                    }

                }
                else{
                    $um="#We don't create accounts with empty Username! ";
                    $u0=false;
                }

                if(!empty($_POST['email'])){
                    $email=$_POST['email'];
                    $sqle="SELECT username0,email0 FROM udata WHERE email0 = '$email'";
                    $r1=mysqli_query($connection0, $sqle);
                    $r11=mysqli_fetch_array($r1, MYSQLI_ASSOC);

                    if($r11==NULL){
                        $e0=true;
                    }
                    else{
                        $e0=false;
                        

                        $em="#You are registered with ".$r11['email0']." as ".$r11['username0'];
                    }

                }
                else{
                    $e0=false;
                    $em="#You forgot to enter your email id! ";
                }

                if(!empty($_POST['password'])){
                    $password=$_POST['password'];
                    
                    if(strlen($password)>=4){
                        $p0=true;
                    }
                    else{
                        $p0=false;
                        $pm="#Password should be atleast 4 characters!";
                    }

                }
                else{
                    $p0=false;
                    $pm="#Well, SomeOne forgot to enter password!";
                }



                // database data hit portion
                if($u0 && $e0 && $p0){
                    $sql0="INSERT INTO `uauth0` (`ua_sn`, `username0`, `password0`, `ua_dt`) VALUES (NULL, '$username', '$password', CURRENT_TIME())";
                    $sql1="INSERT INTO `udata` (`username0`, `email0`, `bio0`, `interests0`, `folder_count`, `dt_input`) VALUES ('$username', '$email', '', '', '', CURRENT_TIME())";
                    $r1=mysqli_query($connection0,$sql0);
                    $r2=mysqli_query($connection0,$sql1);
                
                    if($r1 && $r2 ==true){
                       echo "<script>reg = 1;
                       var username = '$username';
                       </script>";
                       
                   }
                   mysqli_close($connection0);

                   
                    
                    


                }

                // -----

                // if($r2=)
                // 


            }

            // signin php 

            // if(isset($_POST['signin'])){
            //     $username
            // }

    ?>
<style>
    .name{
        position: absolute;
        top: 24%;
        right: 2%;
        transform: rotate(10deg);
    }
</style>
</head>
<body
 style=" background-image: url('res/ae4.jpg');
 background-repeat: no-repeat;
 background-attachment: fixed;
 background-size: 100% 100%;">

<img class="name" src="res/name.png" alt="name" height="120px" width="240px">


    <div class="a1" >
                

        <div  style="position: relative;padding: 20px; height: auto; width: auto;">
        
            <div class="l1" id="l1" onclick="vsli()">LOG IN</div>
            <div class="s1" id="s1" onclick="vssu()">SIGN UP</div>
            <hr class="line">

            <!-- SIGN UP part -->
            <div class="signup" id="signup">
                <form method="post" enctype="multipart/form-data">


                <table style="padding: 15px;justify-content: center;">  

                    <tr>

                        <td class="tp">
                            <input id="input" type="text" name="username"  placeholder=" USERNAME" size="37px">
                        </td>
                    </tr>
                    <tr>
                        <td class="tp">
                            <input id="input" type="email" name="email"  placeholder=" EMAIL" size="37px">
                            
                        </td>
                    </tr>
                    <tr>
                        <td class="tp">
                            <input id="input" type="password" name="password"  placeholder=" PASSWORD" size="37px">
                            
                        </td>
                    </tr>
                    <tr><td><input type="hidden" name="vs" value="su"></td></tr>

                    <tr>
                        <td class="tp">
                            <button class="ib" type="submit" name="signup">SIGN UP</button>
                            
                        </td>
                    </tr>
                </table>
                </form>
                <div class="error" id="error">
                        <p><?php echo $um."<br>".$em."<br>".$pm?></p>  
                </div>
                
                <div class="registered" id="registered">
                   
                </div>

            </div>
                
        

            <!-- LOG IN part -->

            <div class="login" id="login">

                    <form method="POST" enctype="multipart/form-data">
                    <table  style="padding: 15px;justify-content: center;">

                        
                        <tr>
                            <td class="tp">
                                <input id="input" type="text" name="username"  placeholder=" USERNAME" size="37px">
                                
                            </td>
                        </tr>
                        <tr>
                            <td class="tp">
                                <input id="input" type="password" name="password"  placeholder=" PASSWORD" size="37px">
                                
                            </td>
                        </tr>
                        <tr><td><input type="hidden" name="vs" value="li"></td></tr>

                        <tr>
                            <td class="tp">
                                <button class="ib" type="submit" name="signin">SIGN IN</button>
                                
                            </td>
                        </tr>

                        
                        </table>
                    </form>
                    <div class="error" id="errors">
                        <p><?php echo $um0."<br>".$pm0?></p>  
                    </div>
                    <div class="lsuccess" id="lsuccess"></div>
                    
            </div>
            



        </div>






    </div>

   


   
    <!-- log in php -->
  

    <!-- SCRIPT -->
    <script>
        // on click log in 
        // document.getElementById("l1").onclick=vsli();
            
         <?php
         if(isset($_POST['vs'])){
                if($_POST['vs']=="su"){
                    echo "vssu();";
                }
                elseif($_POST['vs']=='li'){
                    echo "vsli();";


                }

               
            }
           
        ?>
       

        // registered 


       

        if(reg==1){
            registered(username);   
        }
       

        if(ss==1){
            lis();
        }
       

        

        // on click sign up 
        // document.getElementById("s1").onclick=vssu();

        // function definations 

        function vssu(){
            document.getElementById("signup").style.visibility="visible";
            document.getElementById("login").style.visibility="hidden";
            document.getElementById("lsuccess").style.visibility="hidden";

            document.getElementById("s1").style.backgroundColor="aqua";
            document.getElementById("l1").style.backgroundColor="rgb(219, 242, 248)";
            document.getElementById("s1").style.boxShadow="5px 10px 18px rgb(5, 139, 216)";
            document.getElementById("l1").style.boxShadow="5px 10px 18px rgb(156, 234, 253)";
        }

        function vsli(){
            document.getElementById("login").style.visibility="visible";
            document.getElementById("signup").style.visibility="hidden";
            document.getElementById("registered").style.visibility="hidden";
            document.getElementById("erro")
            document.getElementById("l1").style.backgroundColor="aqua";
            document.getElementById("s1").style.backgroundColor="rgb(219, 242, 248)";
            document.getElementById("l1").style.boxShadow="5px 10px 18px rgb(5, 139, 216)";
            document.getElementById("s1").style.boxShadow="5px 10px 18px rgb(156, 234, 253)";
        }
        
        function registered(a){
            var a1="Yup "+a+", You are done! you can get into homeSpace by signing in!";    
            document.getElementById("registered").innerHTML= a1;
            document.getElementById("registered").style.visibility="visible";

        }
        function lis(){
            document.getElementById("lsuccess").innerHTML="<p>Wrong Credentials! your device has been marked as suspect!</p>";
            document.getElementById("errors").style.visibility="hidden";
        }
        
    </script>
</body>
</html>