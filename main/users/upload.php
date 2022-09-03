<?php
    $recaptcha = $_POST["token"];
    if(checkCaptcha($recaptcha)){
        //succeed
        if(!is_dir($_POST["key"])){
            header("Location:https://s.jacute.xyz/error/?e=Key does not exist - upload error");
        }
        else{
            $target_dir = $_POST["key"]."/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $ext = substr($_FILES["fileToUpload"]["name"], -4);
            if($ext == "xlsx"){
                if (file_exists($target_file)) {
                    header("Location:https://s.jacute.xyz/error/?e=File already exists - upload error");
                    $uploadOk = 0;
                }
                if ($_FILES["fileToUpload"]["size"] > 1000000) {
                    header("Location:https://s.jacute.xyz/error/?e=File to big - upload error");
                    $uploadOk = 0;
                }
                if ($uploadOk == 0) {
                  echo "if you are seeing this error something has gone very wrong";
                } else {
                  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    header("Location:https://s.jacute.xyz/main/users/");
                  } else {
                    echo "if you are seeing this error something has gone wrong";
                  }
                }
            }
            else{
                header("Location:https://s.jacute.xyz/error/?e=File must be XLSX");
            }
        }
    }
    else{
        //fail
        header("Location:https://s.jacute.xyz/error/?e=Captcha Failed. Please Try Again.");
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