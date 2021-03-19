<?php
        $servername = "chat";
        $serverhost = "localhost";
        $serverUser = "root";
        $serverPassword = "";
        $conn = mysqli_connect($serverhost,$serverUser,$serverPassword,$servername);    
    function validate($msg){
        if(empty($msg)){
            echo '<div style"background: red;padding 10px">Please write a message</div>';
        }else{
           
        }    
    }
    $username1 = "User 1";
    if(isset($_POST['submit'])){
        $msg = $_POST['message'];
        
        if(!empty($msg)){
            $query = "INSERT INTO sent_messages (username,body) VALUES ('$username1','$msg')";
            $act = mysqli_query($conn, $query);
            if($act){
                
            }else{
                echo 'not sent';
            }
        }
    }
    $query = "SELECT * FROM sent_messages";
  $result = mysqli_query($conn,$query);
  $messages = mysqli_fetch_all($result,MYSQLI_ASSOC);
  mysqli_free_result($result);
  mysqli_close($conn);  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/lib.css">
    <title>Simple Chat system</title>
</head>
<body>
    <div class="container-main">
        <div class="head">
            <h1>Start chat</h1>
        </div>
        <div class="content">
        <?php foreach($messages as $message):?>
            <div class="message">
                <?php echo $message['body']?>
                <br>

                <?php 
                    $time = substr($message['time'],10,6);
                
                ?>
                <small><?php echo $time?></small>
            </div>
            <?php endforeach ?>
        </div>
        <div class="form-container">
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                <textarea name="message" id="" cols="30" rows="5"></textarea>
                <input type="submit" value="send" name="submit">
            </form>
        </div>
    </div>
</body>
</html>