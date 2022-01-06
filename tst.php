<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tst</title>
<style>
.b{
    color: blue;
}
.r{
    color: red;
}
#abc1{
    /* display: inline; */
    width: 10%;
}
#abc2{
    /* display: inline; */
    width: 10%;

}
</style>

</head>
<body>
    <button name="0" id="btn0" onclick="a0()">tst btn0</button>
    <button name="1" id="btn1" onclick="a1()">tst btn1</button>

    <?php
    echo "<script>var q=1;</script>"
    ?>
    <p id="z" >btn0</p>
    <p id="y">btn1</p>
    <p id="a">abc</p>
    <p id="b">uvw</p>
    <div id="abc1">1</div>
    <div id="abc2">2</div>


<script>
    function a0(){
        document.getElementById("z").className="b";
    }
    function a1(){
        document.getElementById("z").className="r";
    }
    // document.getElementById("btn0").onclick=a0();
    // document.getElementById("btn0").onclick=a1();
if(q===1){
    document.getElementById("a").innerHTML="def";
} 
document.getElementById("b").innerHTML="xyz";   

</script>
</body>

</html>