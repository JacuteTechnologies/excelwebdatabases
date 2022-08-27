<?php
$recaptcha = $_POST["token"];
if(checkCaptcha($recaptcha)){
    //succeed
    if(!is_dir($_POST["key"])){
        header("Location:");
    }
}
    
else{
    //fail
    header("Location:https://s.jacute.xyz/excelwebdatabases/start/step2/captcha/?l=https://s.jacute.xyz/excelwebdatabases/start/");
}
function checkCaptcha($recaptcha){
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $data = array(
        'secret' => '6LclS6ohAAAAAGg8lT1oCi2iGBTn6S3vaDBtNmhR',
        'response' => $recaptcha
    );
    $options = array(
        'http' => array (
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($data)
        )
    );
    $context  = stream_context_create($options);
    $verify = file_get_contents($url, false, $context);
    $captcha_success = json_decode($verify);
    return $captcha_success->success;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Jacute Technologies - ExcelWebDatabases</title>
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
            <p class="mt">ExcelWebDatabases</p>
            <a href="https://s.jacute.xyz/excelwebdatabases/" class="optionOn">ExcelWebDatabases</a>
            <a href="https://jacute.xyz" class="optionOff">Main Home</a>
            <br><br>
        </div>
        <div class="box">
            <p style="font-size:40px"><img src="/excelwebdatabases/source/excel.png" style="width:40px">ExcelWebDatabases</p>
            <p style="font-size:30px">API Key: <?php echo $_POST["key"];?></p>
            
            <br><br>
        </div>
        <br>
        <div class="topDiv">
        <p>(c)2022 Jacute Technologies</p>
        <a href="mailto:jacute@iota.ws" style="color:white">Contact</a>
        </div>
    </body>
</html>
