<?php
    session_start();
    include("classes/connect.php");
    include("classes/login.php");
    include("classes/user.php");

    //check if the user is logged in
    if(isset($_SESSION['userid']) && is_numeric($_SESSION['userid']))
    {
        $userid = $_SESSION['userid'];
        $login = new Login();
        $result = $login->check_login($userid);

        if($result) 
        {
            $user = new User();
            $user_data = $user->get_data($userid);
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
    <title>Message</title>
</head>
<body class="body">
<header class="header">
        <div style="display: flex;flex-direction: row;flex-wrap: wrap;text-align: center;justify-content: space-between;">
            <div><a href="#" class="header_item">
            <img src="./images/ministry_of_education_vertical_logo.png" width="100" height="100">
        </a></div>
            <div><img class="header_item" src="./images/administer.png" width="100" height="100"></div>
            <div><a href="./home.php" class="header_item">
            <img src="./images/system_logo.png" width="100" height="100">
        </a></div>
        </div>
    </header>
    <nav class="navgation_bar">
        <a href="./developer.php" class="navgation_bar_item">
            <img src="./images/developer_icon.png" width="50" height="50">
        </a>
        <a href="#" class="navgation_bar_item">
            <img src="./images/backward_icon.png" width="50" height="50">
        </a>
        <a href="#" class="navgation_bar_item">
            <img src="./images/forward_icon.png" width="50" height="50">
        </a>
        <a href="./dashboard_redirection.php" class="navgation_bar_item">
            <img src="./images/dashboard_icon.png" width="50" height="50">
        </a>
        <a href="./logout.php" class="navgation_bar_item">
            <img src="./images/logout_icon.png" width="50" height="50">
        </a>
        <a href="./home.php" class="navgation_bar_item">
            <img src="./images/home_icon.png" width="50" height="50">
        </a>
        <a href="#" class="navgation_bar_item">
            <img src="./images/close_icon.png" width="50" height="50">
        </a>
    </nav>
    <h1 class="main_title">Message</h1>
    <section class="content">
        <h3>Welcome! <?php echo $user_data['role'] . " " . $user_data['first_name'] . " " . $user_data['last_name'] ?></h3><br><br>
        <nav class="message_nav">
            <a href="./create_message.php" target="location">Create Message</a>
            <a href="#" target="location">Inbox</a>
            <a href="#" target="location">Sent</a>
            <a href="#" target="location">Spam</a>
        </nav>
        <iframe name="location" class="frame"></iframe>
    </section>
    <h4 class="copyright">&copy; Copyright 2023</h4>
    <footer class="footer">
        <a href="#" class="footer_item">
            <img src="./images/ministry_of_education_vertical_logo.png" width="100" height="100">
        </a>
        <img class="footer_item" src="./images/power.png" width="100" height="100">
        <a href="./developer.php" class="footer_item">
            <img src="./images/developer_logo.png" width="90" height="30">
        </a>
    </footer>
    <script src="../scripts/signature.js"></script>
</body>
</html>