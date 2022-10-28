<?php
$key = "YOUR_KEY_HERE";
if(isset($_GET["mode"]) && isset($_GET["document"]) && isset($_GET["isMulti"])){
    if($_GET["mode"] == "w"){
        //write

    }
    else if($_GET["mode"] == "r"){
        //read
        
    }
    else{
        echo "Error 9215 Invalid mode.";
    }
}
else{
    echo "Error 9114 Missing parameter.";
}
?>