<?php

    session_start();
    include("classes/connect.php");
    include("classes/login.php");
    include("classes/user.php");
    include("classes/create_message.php");

    if(isset($_SESSION['userid']) && is_numeric($_SESSION['userid']))
    {
        $userid = $_SESSION['userid'];
        $login = new Login();
        $result = $login->check_login($userid);

        if($result) 
        {
            $user = new User();
            $user_data = $user->get_data($userid);

            $inbox = new Message();
            $messages = $inbox->inbox();
                                                                                                                    
            if(!$user_data)
            {
                header("Location: login.php");
                die;
            }
        }
        else
        {
            header("Location: login.php");
            die;
        }
    }
    else
    {
        header("Location: login.php");
        die;
    }

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="apple-touch-icon" sizes="180x180" href="./apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./favicon-16x16.png">
    <link rel="manifest" href="./manifest.json">
    <link rel="mask-icon" href="./safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins" id="bars"/>
    <link href="./styles/message.css" rel="stylesheet" type="text/css">
    <title></title>
</head>
<body class="body">
    <form method="post" action="" class="message_form">
        <label class="label">Sender</label>
        <input type="text" name="sender" placeholder="Enetr Sender's Username" class="data"><br>
        <label class="label">Receiver</label>
        <input type="text" name="receiver" placeholder="Enetr Receivers's Username" class="data"><br>
        <label class="label">Subject</label>
        <input type="text" name="subject" placeholder="Enetr Subject" class="data"><br>
        <label class="label">Message Content</label>
        <textarea name="message_content" class="" placeholder="Enter Message" class="data"></textarea><br>
        <input type="submit" name="send" value="Send">
    </form>
    <script src="../scripts/signature.js"></script>
</body>
</html>