<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .unit1{
            height: 130px;
            width: 170px;
            /* padding: 4px; */
            /* padding-left: 5px;
            padding-top: 5px; */
            /* opacity: 0.68; */
            border-radius: 9px;
            transition: all 1s;
        }
        
    .d_box{
    border: 1px solid #32a1ce;
    display: inline-block;
    width: 166px;
    background-color: rgba(255, 255, 255, 0.4);
    border-radius: 4px;
    color: black;
    padding: 1px;
      /* visibility: hidden; */
    
    }
    .unit0{
    display: inline-block;
    transform: rotate(-30deg);
      /* border: 1px solid aqua; */

      /* transform: rotate(0.5turn); */
    position: relative;
    top: 35px;
    left: 25px;
    margin: 50px;
    margin-top: 45px;
    }
    .pin0{
    position: absolute;
    top: 2px;
    left: 4px;
    }
    .pin1{
    position: absolute;
    top: 2px;
    right: 4px;
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
        <div class="main">
        <?php
        include "dbconnection.php";
        $pgsql="SELECT f_address, username0, pg_dt, caption FROM pg0 ORDER BY pg_id0 DESC LIMIT 8;";
        $fresult=mysqli_query($connection0,$pgsql);
        $c1=8;
        while($c1>=1){
            $m_result=mysqli_fetch_array($fresult,MYSQLI_NUM);
            if(!empty($m_result)){
                $time=substr($m_result[2],0,16);
                echo '<a  href="./photo_det.php?link='.$m_result[0].'">';
                echo '<div class="unit0" style="transform: rotate('.rand(-60,60).'deg);">
                <img class="pin0" src="./res/pins/3.png" alt="a">
            
                <img class="pin1" src="./res/pins/3.png" alt="a">
            
                <img class="unit1" src="nf2/'.$m_result[0].'" alt="img"><br>
                <div class="d_box"><strong>
                '.$m_result[1].' @ '.$time.' <br> '.$m_result[3].'</strong>
                </div>
            </div>';
                echo "</a>";
            }

            $c1=$c1-1;
        }


        ?>

        </div>
</body>
</html>