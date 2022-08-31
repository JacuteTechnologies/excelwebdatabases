<?php
if(isset($_GET["l"])){
    $l = $_GET["l"];
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Jacute Technologies - ExcelWebDatabases</title>
        <link rel="icon" href="/excelwebdatabases/public_html/excelwebdatabases/source/favicon.ico">
        <link rel="stylesheet" href="/excelwebdatabases/public_html/excelwebdatabases/source/jacute.css">
    </head>
    <body>
        <div class="topDiv">
            <p class="bt">Jacute Technologies</p>
            <p class="mt">ExcelWebDatabases</p>
            <a href="/excelwebdatabases/public_html/excelwebdatabases/" class="optionOff">ExcelWebDatabases</a>
            <a href="" class="optionOff">Get Started</a>
            <a href="/excelwebdatabases/public_html/excelwebdatabases/start/login/" class="optionOff">ExcelWebDatabases Login</a>
            <a href="/excelwebdatabases/public_html/excelwebdatabases/" class="optionOff">Main Home</a>
            <br><br>
        </div>
        <div class="box">
            <p style="font-size:40px">Beep Boop? Are you a robot?</p>
            <p style="font-size:30px">That captcha didn't go so well.</p>
            <a href="<?php echo $l;?>" class="btn" style="font-size:25px">Try Again</a>
            <br><br>
        </div>
        <br>
        <div class="topDiv">
        <p>(c)2022 Jacute Technologies</p>
        <a href="mailto:jacute@iota.ws" style="color:white">Contact</a>
        </div>
    </body>
</html>