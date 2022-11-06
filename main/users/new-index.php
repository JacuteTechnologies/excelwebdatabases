<?php
session_start();
if(isset($_SESSION["key"])){
    $key = $_SESSION["key"];
}
if(!isset($_SESSION["key"])){
    $recaptcha = $_POST["token"];
    if(checkCaptcha($recaptcha)){
        //succeed
        if(!is_dir($_POST["key"])){
            header("Location:https://s.jacute.xyz/error/?e=Key does not exist.");
        }
        else{
            $_SESSION["key"] = $_POST["key"];
            $files = scandir($_POST["key"]);
            $key = $_POST["key"];
        }
    }
    else{
        //fail
        header("Location:https://s.jacute.xyz/error/?e=Captcha Failed. Please Try Again.");
    }
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
        <link rel="icon" href="/source/favicon.ico">
        <script src="https://www.google.com/recaptcha/api.js?render=6LclS6ohAAAAAFLHXInxx2UrrOtjRIHvBfs9B1Ki"></script>
        <link rel="stylesheet" href="/source/jacute.css">
        <script>
            grecaptcha.ready(function() {
                grecaptcha.execute("6LclS6ohAAAAAFLHXInxx2UrrOtjRIHvBfs9B1Ki", {action: "homepage"}).then(function(token) {
                   document.getElementById("token").value = token;
                });
            });
        </script>
    </head>
    <body>
        <div class="topDiv">
            <p class="bt">Jacute Technologies</p>
            <p class="mt">ExcelWebDatabases</p>
            <a href="/" class="optionOn">ExcelWebDatabases</a>
            <a href="/documentation/" class="optionOff" target="_blank">Documentation</a>
            <a href="https://jacute.xyz" class="optionOff" target="_blank">Main Home</a>
            <br><br>
        </div>
        <div class="box" style="padding-bottom: 15px;">
            <p style="font-size:30px">Upload Files:</p>
            <p>These will become your databases. You can re-download at any time.</p>
            <form action="upload.php" method="post" enctype="multipart/form-data">
             <input type="file" name="fileToUpload" id="fileToUpload">
             <br><br>
             <input type="hidden" id="token" name="token">
             <input type="hidden" name="key" value="<?php echo $key;?>">
             <input type="submit" value="Upload Excel" name="submit" id="login-btn">
            </form>
        </div>
        <div class="box" style="margin-top: 325px;">
            <p style="font-size:40px"><img src="/source/excel.png" style="width:40px">ExcelWebDatabases</p>
            <p style="font-size:30px">API Key: <?php echo $key?></p>
            <p style="font-size:20px">Files:</p>
            <p>
            <?php
                    $c = scandir($key);
                    foreach($c as $i){
                        if($i != ".." && $i != "." && $i != "" && strpos($i, ".xlsx") !== false){
                            $entry = "  ".$i;
                            $t = $i;
                            echo "<a href='$key/$t' style='text-decoration:none;color:black'><div style='background-color:lightgrey;border-radius:5px;border:1px solid black;margin-left:auto;margin-right:auto;display:block;width:400px;padding:3px;text-align:left'><img src='/source/excel.png' style='width:20px'>".$entry."</div></a><br>";
                        }
                    }
                ?>
            </p>
        </div>
        <br>
<!--        <div class="bottomDiv">-->
<!--        <p>(c)2022 Jacute Technologies</p>-->
<!--        <a href="mailto:jacute@iota.ws" style="color:white">Contact</a>-->
<!--        </div>-->
    </body>
</html>
