<?php
if(isset($_GET["e"])){
    $e = $_GET["e"];
}
else{
    $e = "Unspecifed/Unknown";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Jacute Technologies - Error</title>
        <link rel="icon" href="https://jacute.xyz/favicon.ico">
        <script src="https://www.google.com/recaptcha/api.js?render=6LclS6ohAAAAAFLHXInxx2UrrOtjRIHvBfs9B1Ki"></script>
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
            <p class="mt">Error</p>
            <a href="" class="optionOn">Error</a>
            <a href="https://s.jacute.xyz" class="optionOff">ExcelWebDatabases Home</a>
            <a href="https://jacute.xyz" class="optionOff">Jacute Technologies Home</a>
            <br><br>
        </div>
        <div class="box">
            <p style="font-size:40px">An Error Occurred</p>
            <p style="font-size:30px">Description:</p>
            <p style="font-size:30px;color:red"><?php echo $e;?></p>
            <br><br>
        </div>
        <br>
        <div class="topDiv">
        <p>(c)2022 Jacute Technologies</p>
        <a href="mailto:jacute@iota.ws" style="color:white">Contact</a>
        </div>
    </body>
</html>