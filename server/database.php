<?php
    $servername = "chat";
    $serverhost = "localhost";
    $serverUser = "root";
    $serverPassword = "";
    $conn = mysqli_connect($serverhost,$serverUser,$serverPassword,$servername);
    if($conn){
        // echo "sucess";
        //WE passed
    }else{
        echo "There was a problem connecting to the server";
    }
?>