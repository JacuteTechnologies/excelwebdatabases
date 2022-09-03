<?php
$recaptcha = $_POST["token"];
if(checkCaptcha($recaptcha)){
    //succeed
    $k = file_get_contents("keys.txt");
    $r = mt_rand(100000000000000, 999999999999999);
    if(strpos($k, $r) === false){
        file_put_contents("keys.txt", $k."\n".$r);
    }
    $key = "EWD".$r."K";
    mkdir($key);
}
    
else{
    //fail
    header("Location:https://s.jacute.xyz/excelwebdatabases/start/step2/captcha?l=https://s.jacute.xyz/excelwebdatabases/start/");
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
        <script>
            grecaptcha.ready(function() {
                grecaptcha.execute("6LclS6ohAAAAAFLHXInxx2UrrOtjRIHvBfs9B1Ki", {action: "homepage"}).then(function(token) {
                   document.getElementById("token").value = token;
                });
            });
        </script>
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
            <a href="" class="optionOn">Get Started</a>
            <a href="start/login/" class="optionOff">ExcelWebDatabases Login</a>
            <a href="https://jacute.xyz" class="optionOff">Main Home</a>
            <br><br><br>
            <a href="" class="optionOff">Step One</a>
            <a href="" class="optionOn">Step Two</a>
            <br><br>
        </div>
        <div class="box">
            <p style="font-size:40px"><img src="/excelwebdatabases/source/excel.png" style="width:40px">ExcelWebDatabases</p>
            <p style="font-size:30px">Get Started: Step Two: Save your API key</p>
            <input type="text" style="border:2px solid black; border-radius:5px;padding:3px;font-size:30px;width:500px;text-align:center" value="<?php echo $key;?>" readonly>
            <p>You will use this to log in and access your documents, don't lose it</p>
            <a href="https://s.jacute.xyz/excelwebdatabases/start/login/" class="visitButton" style="font-size:30px">Proceed to Login</a>
            <br><br>
        </div>
        <br>
        <div class="topDiv">
        <p>(c)2022 Jacute Technologies</p>
        <a href="mailto:jacute@iota.ws" style="color:white">Contact</a>
        </div>
    </body>
</html>
