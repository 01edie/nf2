<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .image-container{
            position:absolute;
            /* top:1%;
            left: 1%; */
        }
       

        .unit1{
            height: 150px;
            width: 200px;
            /* padding: 4px; */
            padding-left: 5px;
            padding-top: 5px;
            opacity: 0.68;
            border-radius: 9px;
            transition: all 1s;
        }
        .unit1:hover{
            opacity: 1;
            height: 250px;
            width: 300px;
            position: sticky;
        }
        /* --------next and previous button------ */
        .mbutton{
            background-color: inherit;
            border-radius: 7px;
            cursor: pointer;
        }
        #next_page{

            position: relative;
            top:15px;
            display: inline;
            visibility: visible;
        }
        #previous_page{
            position: relative;
            top: 15px;
            left: 71%;
            display: inline;
            visibility: visible;
        }
        .empty{
            color: black;
            position: absolute;
            width: 400px;
            top: 200px;;
            left: 30%;

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
    <div class="image-container">

    <?php
        include "dbconnection.php";
        session_start();

        $username0=$_SESSION['name'];
        $page=$_SESSION['page'];
        $current_page=$page;
        $next_page_value=1;
        $previous_page_value=1;
        $pgsql="SELECT f_address FROM pg0 WHERE username0='$username0';";
        $fresult=mysqli_query($connection0,$pgsql);
        $c=mysqli_num_rows($fresult);
        // mysqli_data_seek($fresult,4);
        // $m_result=mysqli_fetch_array($fresult, MYSQLI_NUM);
        // echo $m_result[0];

        // var_dump($fresult);

        // null
        
        $c1=$c;
        if($c==null){
            echo "<div class='empty'>currently you are in void and ready to upload! </div>";
        }
        // function page($num){
        //     if($num>15);
        // }
        $file_count=0;
        $total_page=1;
        while($c1>15){
            $c1=$c1-15;
            $total_page=$total_page+1;
        }
        // cureent page content loading -------
        if(isset($_POST['next_page']) || isset($_POST['previous_page']) ){
            $current_page=(int)$_POST['pagenum'];
        }
        if($current_page==1){
            $previous_page_value=null;
        }
        if($current_page==$total_page){
            $next_page_value=null;
        }
        $tmp=$current_page;
        while($tmp>1){
            $file_count=$file_count+15;
            $tmp=$tmp-1;
        }

        
                            // main loading part 
        
        mysqli_data_seek($fresult,$file_count);
        
        if($current_page<$total_page){
            $c1=15;
            while($c1>=1){
                $m_result=mysqli_fetch_array($fresult,MYSQLI_NUM);
                echo '<a  href="./photo_det.php?link='.$m_result[0].'">';
                echo '<img class="unit1" src="'.$m_result[0].'" alt="img">';
                echo "</a>";

                $c1=$c1-1;
            }
       
        }
        else{
            while($c1>=1){
                $m_result=mysqli_fetch_array($fresult,MYSQLI_NUM);
                echo '<a  href="./photo_det.php?link='.$m_result[0].'">';
                echo '<img class="unit1" src="'.$m_result[0].'" alt="img">';
                echo "</a>";
                $c1=$c1-1;
                
            }
        }
        mysqli_free_result($fresult);
        mysqli_close($connection0);


        // next button and previous button availability ----
        echo '<script>var next_page_index=1;</script>';
        echo '<script>var previous_page_index=1;</script>';

        if($next_page_value==null){
            echo '<script> next_page_index=0;</script>';
        }

        if($previous_page_value==null){
            echo '<script> previous_page_index=0;</script>';
        }

        echo "<div>";
        echo '<form class="next_page" id="next_page" method="POST"><input type="hidden" name="pagenum" value="'.($current_page+1).'"><button class="mbutton" type="submit" name="next_page"><img src="res/next_page.png" alt="next page"></button></form>';
        echo '<form class="previous_page" id="previous_page" method="POST"><input type="hidden" name="pagenum" value="'.($current_page-1).'"><button class="mbutton" type="submit" name="previous_page"><img src="res/previous_page.png" alt="previous page"></button></form>';
        echo "</div>";
        // echo '<form method="POST"><input type="hidden" value="$next_page"></form>'
        $_SESSION['page']=$current_page;

        
    ?>
        
        
        

        <script>
            function next_button_visibility(){
            document.getElementById("next_page").style.visibility="hidden";

            }
            function previous_button_visibility(){
            document.getElementById("previous_page").style.visibility="hidden";

            }
            if(next_page_index==0){
                next_button_visibility();
            }
            if(previous_page_index==0){
                previous_button_visibility();
            }

        </script>
        
        

        
    </div>

</body>
</html>