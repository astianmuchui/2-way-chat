<?php
    $servername = "chat";
    $serverhost = "localhost";
    $serverUser = "root";
    $serverPassword = "";
    $conn = mysqli_connect($serverhost,$serverUser,$serverPassword,$servername);   
    $username2 = "User 2";
    if(isset($_POST['submit'])){
        $msg = $_POST['message'];
        
        if(!empty($msg)){
            $query = "INSERT INTO received_messages (username,content) VALUES ('$username2','$msg')";
            $act = mysqli_query($conn, $query);
            if($act){
                
            }else{
                echo 'not sent';
            }
        }
    }
    $query = "SELECT * FROM received_messages";
  $result = mysqli_query($conn,$query);
  $receipts = mysqli_fetch_all($result,MYSQLI_ASSOC);
  mysqli_free_result($result);
  mysqli_close($conn); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/min.css ">
    <title>Recepient side</title>
</head>
<body>
<div class="container-main">
        <div class="head">
            <h1>Chat</h1>
        </div>
        <div class="content">
        <?php 
        require './server/fetch_sent.php';
        foreach($messages as $message):?>
            <div class="message_two">
                <?php echo $message['body']?>
                <br>

                <?php 
                    $time = substr($message['time'],10,6);
                
                ?>
                <small><?php echo $time?></small>
            </div>
            <?php endforeach?>
        <?php foreach($receipts as $receipt):?>
        <?php  $gmt = substr($receipt['time'],10,6); ?>
            <div class="message">
                    <?php echo $receipt['content']; ?> <br>
                    <small><?php echo $gmt;?>   </small>
            </div>
            <?php endforeach ?>
        </div>
        <div class="form-container">
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                <textarea name="message" id="" cols="30" rows="5" placeholder="write message"></textarea>
                <input type="submit" value="send" name="submit">
            </form>
        </div>

    </div>
</body>
</html>