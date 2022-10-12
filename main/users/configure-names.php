<?php
require "/source/BKVPlib.php";
$recaptcha = $_POST["token"];
if(checkCaptcha($recaptcha)){
    //succeed
    if(isset($_POST["key"]) && isset($_POST["docname"]) && isset($_POST["toBeNamed"]) && isset($_POST["name"])){
        $key = $_POST["key"];
        $docname = $_POST["docname"];
        $toBeNamed = $_POST["toBeNamed"];
        $name = $_POST["name"];
        if(file_exists($key)){
            if(file_exists($key."/".$docname.".bkvp")){
                //updating a file
                $file = file_get_contents($docname.".bkvp");
                if(strpos($file, $toBeNamed) !== false){
                    //updating key
                    writeBKVP($key."/".$docname.".bkvp", $name, $toBeNamed, false);
                    header("Location:/main/users/");
                }
                else{
                    //new key
                    writeBKVP($key."/".$docname.".bkvp", $name, $toBeNamed, true);
                    header("Location:/main/users/");
                }
            }
            else{
                //creating a new file
                file_put_contents("$key/$docname.bkvp", $name.":".$toBeNamed."|");
                header("Location:/main/users/");
            }
        }
    }
    else{
        header("Location:/error/?e=400 Bad Request - 5102 Parameters Missing");
    }
} else {
    //fail
    header("Location:/start/step2/captcha?l=/excelwebdatabases/public_html/excelwebdatabases/start/");
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