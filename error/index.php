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
        <link rel="icon" href="/source/favicon.ico">
        <script src="https://www.google.com/recaptcha/api.js?render=6LclS6ohAAAAAFLHXInxx2UrrOtjRIHvBfs9B1Ki"></script>
        <link rel="stylesheet" href="/source/jacute.css">
    </head>
    <body>
        <div class="topDiv">
            <p class="bt">Jacute Technologies</p>
            <p class="mt">Error</p>
            <a href="" class="optionOn">Error</a>
            <a href="/" class="optionOff">ExcelWebDatabases Home</a>
            <a href="https://jacute.xyz" class="optionOff" target="_blank">Jacute Technologies Home</a>
            <br><br>
        </div>
        <div class="box">
            <p style="font-size:40px">An Error Occurred</p>
            <p style="font-size:30px">Description:</p>
            <p style="font-size:30px;color:red"><?php echo $e;?></p>
            <br><br>
        </div>
        <br>
        <div class="bottomDiv">
        <p>(c)2022 Jacute Technologies</p>
        <a href="mailto:jacute@iota.ws" style="color:white">Contact</a>
        </div>
    </body>
</html>