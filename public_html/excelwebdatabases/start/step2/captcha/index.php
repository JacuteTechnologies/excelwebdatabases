<?php
if(isset($_GET["l"])){
    $l = $_GET["l"];
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Jacute Technologies - ExcelWebDatabases</title>
        <link rel="icon" href="https://jacute.xyz/favicon.ico">
        <link rel="stylesheet" href="https://s.jacute.xyz/excelwebdatabases/source/jacute.css">
        <style>
            .box{
                border-radius:10px;
                background-color:lightgreen;
                margin-left:auto;
                margin-right:auto;
                display:block;
                width:800px;
                padding:5px;
                margin-top:20px;
                text-align:center;
            }
        </style>
    </head>
    <body>
        <div class="topDiv">
            <p class="bt">Jacute Technologies</p>
            <p class="mt">ExcelWebDatabases</p>
            <a href="https://s.jacute.xyz/excelwebdatabases/" class="optionOff">ExcelWebDatabases</a>
            <a href="" class="optionOff">Get Started</a>
            <a href="start/login/" class="optionOff">ExcelWebDatabases Login</a>
            <a href="https://jacute.xyz" class="optionOff">Main Home</a>
            <br><br>
        </div>
        <div class="box">
            <p style="font-size:40px">Beep Boop? Are you a robot?</p>
            <p style="font-size:30px">That captcha didn't go so well.</p>
            <a href="<?php echo $l;?>" class="visitButton" style="font-size:25px">Try Again</a>
            <br><br>
        </div>
        <br>
        <div class="topDiv">
        <p>(c)2022 Jacute Technologies</p>
        <a href="mailto:jacute@iota.ws" style="color:white">Contact</a>
        </div>
    </body>
</html>