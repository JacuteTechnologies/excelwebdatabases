<?php
$key = "YOUR_KEY_HERE";//replace YOUR_KEY_HERE with your key
if(isset($_GET["mode"]) && isset($_GET["document"]) && isset($_GET["isMulti"])){
    $document = $_GET["document"];
    $mode = $_GET["mode"];
    $isMulti = $_GET["isMulti"];
    if(isset($_GET["row"]) && isset($_GET["column"])){
        $row = $_GET["row"];
        $column = $_GET["column"];
        if(isset($_GET["data"])){
            $data = $_GET["data"];
            echo file_get_contents("https://s.jacute.xyz/main/users/APIv4.php?document=$document&mode=$mode&isMulti=$isMulti&row=$row&column=$column&data=$data&key=$key");
        }
        else{
            echo file_get_contents("https://s.jacute.xyz/main/users/APIv4.php?document=$document&mode=$mode&isMulti=$isMulti&row=$row&column=$column&key=$key");
        }
    }
    else if(isset($_GET["cell"])){
        $cell = $_GET["cell"];
        if(isset($_GET["data"])){
            $data = $_GET["data"];
            echo file_get_contents("https://s.jacute.xyz/main/users/APIv4.php?document=$document&mode=$mode&isMulti=$isMulti&cell=$cell&data=$data&key=$key");
        }
        else{
            echo file_get_contents("https://s.jacute.xyz/main/users/APIv4.php?document=$document&mode=$mode&isMulti=$isMulti&cell=$cell&key=$key");
        }
    }
    else{
        echo "Missing parameter.";
    }
}
else{
    echo "Error 9114 Missing parameter.";
}
?>