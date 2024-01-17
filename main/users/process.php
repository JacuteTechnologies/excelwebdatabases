<?php
$recaptcha = $_POST["token"];
if(checkCaptcha($recaptcha)){
//    succeed
    $k = file_get_contents("keys.txt");
    $r = mt_rand(100000000000000, 999999999999999);
    $r2 = mt_rand(100000000000000, 999999999999999);
    $h = md5($r);
    $r3 = $h.$r2;
    $r4 = md5($r3);
    $r = $r4;
    if(strpos($k, $r) === false){
        file_put_contents("keys.txt", $k."\n".$r);
    }
    else{
        header("Location:https://s.jacute.xyz/error/?e=Error 205 - Key generation failed");
    }
   $key = "EWD".$r."K";
   mkdir($key);
} else {
   //fail-->
    header("Location:/start/step2/captcha?l=/excelwebdatabases/public_html/excelwebdatabases/start/");
}
function checkCaptcha($recaptcha){
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $data = array(
        'secret' => '',
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
        <link rel="icon" href="/source/favicon.ico">
        <script src="https://www.google.com/recaptcha/api.js?render=6LclS6ohAAAAAFLHXInxx2UrrOtjRIHvBfs9B1Ki"></script>
        <script>
            grecaptcha.ready(function() {
                grecaptcha.execute("6LclS6ohAAAAAFLHXInxx2UrrOtjRIHvBfs9B1Ki", {action: "homepage"}).then(function(token) {
                   document.getElementById("token").value = token;
                });
            });
        </script>
        <link rel="stylesheet" href="/source/jacute.css">
    </head>
    <body>
        <div class="topDiv">
            <p class="bt">Jacute Technologies</p>
            <p class="mt">ExcelWebDatabases</p>
            <a href="/" class="optionOff">ExcelWebDatabases</a>
            <a href="/start/login.html" class="optionOff">ExcelWebDatabases Login</a>
            <a href="https://jacute.xyz" class="optionOff" target="_blank">Main Home</a>
            <br>
            <br>
            <br>
            <br><br>
        </div>
        <div class="box">
            <p style="font-size:40px"><img src="/source/excel.png" style="width:40px">ExcelWebDatabases</p>
            <p style="font-size:30px">Get Started: Step Two: Save your API key</p>
            <input type="text" style="border:2px solid black; border-radius:5px;padding:3px;font-size:30px;width:500px;text-align:center" value="<?php echo $key;?>" readonly>
            <p>You will use this to log in and access your documents, don't lose it</p>
            <a href="/start/login.html" class="btn" style="font-size:30px">Proceed to Login</a>
            <br><br>
        </div>
        <br><br>
        <div class="bottomDiv">
        <p>(c)2022 Jacute Technologies</p>
        <a href="mailto:jacute@iota.ws" style="color:white">Contact</a>
        </div>
    </body>
</html>
