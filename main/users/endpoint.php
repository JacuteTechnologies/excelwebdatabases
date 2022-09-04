<?php
$key = "YOUR_KEY_HERE";
if($key == "YOUR_KEY_HERE"){
    echo "Please enter your key first.";
}
else{
    if(isset($_GET["mode"]) && isset($_GET["document"]) && isset($_GET["multi"]) && isset($_GET["cell"]) && isset($_GET["data"])){
        $mode = $_GET["mode"];
        $document = $_GET["document"];
        $multi = $_GET["multi"];
        $cell = $_GET["cell"];
        $data = $_GET["data"];
        if($data == null){
            echo file_get_contents("https://s.jacute.xyz/main/users/api.php?key=$key&mode=$mode&document=$document&isMulti=$multi&cell=$cell");
        }
        else{
            echo file_get_contents("https://s.jacute.xyz/main/users/api.php?key=$key&mode=$mode&document=$document&isMulti=$multi&cell=$cell&data=$data");
        }
    }
    else{
        echo "Parameter missing";
    }
}
?>