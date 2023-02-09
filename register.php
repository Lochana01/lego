<?php

    include("classes/connect.php");
    include("classes/user_information_management.php");
    include("classes/register.php");

    $role = "";
    $gender = "";
    $nic_number = "";
    $username = "";
    $first_name = "";
    $last_name = "";
    $address_street_number = "";
    $address_street_name = "";
    $address_city_name = "";
    $address_province_code = "";
    $address_post_code = "";
    $email_address = "";
    $mobile_number = "";
    $land_number = "";
    $medium = "";
    $institute = "";
    $school = "";
    $stream = "";
    $subject = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $register = new Register();
        $result = $register->evaluate($_POST);
        if ($result != "") {
            echo "<div style='text-align:center;font-size:12px;color:white;background-color:grey'>";
            echo "<br>The following errors have occured:<br><br>";
            echo $result;
            echo "</div>";
        }
        else 
        {
            header("Location: login.php");
            die;
        }

        $role = $_POST['role'];
        $gender = $_POST['gender'];
        $nic_number = $_POST['nic_number'];
        $username = $_POST['username'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $address_street_number = $_POST['address_street_number'];
        $address_street_name = $_POST['address_street_name'];
        $address_city_name = $_POST['address_city_name'];
        $address_province_code = $_POST['address_province_code'];
        $address_post_code = $_POST['address_post_code'];
        $email_address = $_POST['email_address'];
        $mobile_number = $_POST['mobile_number'];
        $land_number = $_POST['land_number'];
        $medium = $_POST['medium'];
        $institute = $_POST['institute'];
        $school = $_POST['school'];
        $stream = $_POST['stream'];
        $subject = $_POST['subject'];
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
    <link href="./styles/register.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins" id="bars"/>
    <title>Register</title>
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
        <a href="./home.php" class="navgation_bar_item">
            <img src="./images/home_icon.png" width="50" height="50">
        </a>
        <a href="#" class="navgation_bar_item">
            <img src="./images/close_icon.png" width="50" height="50">
        </a>
    </nav>
    <h1 class="main_title">Registration</h1><br>

    

    <section class="content">
        <form class="form" method="post" enctype="multipart/form-data" action="">
        <div style="display: flex;flex-direction: row;flex-wrap: wrap; justify-content: space-between;">

        <div class="left" style="display: grid; grid-template-columns: auto; justify-self: start;; text-decoration: none;">
        <div><label class="lbl">Role</label></div>
        <div><label class="lbl">Gender</label></div>
        <div><label class="lbl">NIC Number</label></div>
        <div><label class="lbl">Username</label></div>
        <div><label class="lbl">Password</label></div>
        <div><label class="lbl">Retype Password</label></div>
        <div><label class="lbl">First Name</label></div>
        <div><label class="lbl">Last Name</label></div>
        <div><label class="lbl">Address Street Number</label></div>
        <div><label class="lbl">Address Street Name</label></div>
        <div><label class="lbl">Address City Name</label></div>
        <div><label class="lbl">Address Province Code</label></div>
        <div><label class="lbl">Address Post Code</label></div>
        <div><label class="lbl">Email Address</label></div>
        <div><label class="lbl">Mobile Number</label></div>
        <div><label class="lbl">Land Number</label></div>
        <div><label class="lbl">Medium</label></div>
        <div><label class="lbl">Institute</label></div>
        <div><label class="lbl">School</label></div>
        <div><label class="lbl">Stream</label></div>
        <div><label class="lbl">Subject</label></div>
        <div><label class="lbl">Profile Image</label></div>
        <div><label class="lbl">Cover Image</label></div>
        
        </div>
        
        <div class="right" style="display: grid; grid-template-columns: auto; justify-self: start;; text-decoration: none;">
        <div><select name="role" class="data">
                <option disabled="disabled" selected="selected">--Choose Role--</option>
                <option>student</option>
                <option>tutor</option>               
            </select></div>
        <div><select name="gender" class="data">
                <option disabled="disabled" selected="selected">--Choose Gender--</option>
                <option>male</option>
                <option>female</option>
            </select></div>
        <div><input type="text" name="nic_number" placeholder="Enter NIC Number" class="data"></div>
        <div><input type="text" name="username" placeholder="Enter Username" class="data"></div>
        <div><input type="password" name="password" placeholder="Enter Password" class="data"></div>   
        <div><input type="password" name="retype_password" placeholder="Enter Password Again" class="data"></div>
        <div><input type="text" name="first_name" placeholder="Enter First Name" class="data"></div>
        <div><input type="text" name="last_name" placeholder="Enter Last Name" class="data"></div>
        <div><input type="text" name="address_street_number" placeholder="Enter Address Street Number" class="data"></div>
        <div><input type="text" name="address_street_name" placeholder="Enter Address Street Name" class="data"></div>
        <div><input type="text" name="address_city_name" placeholder="Enter Address City Name" class="data"></div>
        <div><input type="text" name="address_province_code" placeholder="Enter Address Province Code" class="data"></div>
        <div><input type="text" name="address_post_code" placeholder="Enter Address Post Code" class="data"></div>
        <div><input type="text" name="email_address" placeholder="Enter Email Address" class="data"></div>
        <div><input type="text" name="mobile_number" placeholder="Enter Mobile Number" class="data"></div>
        <div><input type="text" name="land_number" placeholder="Enter Land Number" class="data"></div>
        <div><input type="text" name="medium" placeholder="Enter Medium" class="data"></div>
        <div><input type="text" name="institute" placeholder="Enter Serving Institute" class="data"></div>
        <div><input type="text" name="school" placeholder="Enter School" class="data"></div>
        <div><input type="text" name="stream" placeholder="Enter Stream" class="data"></div>
        <div><input type="text" name="subject" placeholder="Enter Subject" class="data"></div>
        <div><input type="file" name="profile_image" class="data"></div>
        <div><input type="file" name="cover_image" class="data"></div>

        </div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
            <!-- <label class="lbl">Role</label> -->
            <!-- <select name="role" class="data">
                <option disabled="disabled" selected="selected">--Choose Role--</option>
                <option>student</option>
                <option>tutor</option>               
            </select><br> -->
            <!-- <label class="lbl">Gender</label> -->
            <!-- <select name="gender" class="data">
                <option disabled="disabled" selected="selected">--Choose Gender--</option>
                <option>male</option>
                <option>female</option>
            </select><br> -->
            <!-- <label class="lbl">NIC Number</label> -->
            <!-- <input type="text" name="nic_number" placeholder="Enter NIC Number" class="data"><br> -->
            <!-- <label class="lbl">Username</label> -->
            <!-- <input type="text" name="username" placeholder="Enter Username" class="data"><br> -->
            <!-- <label class="lbl">Password</label> -->
            <!-- <input type="password" name="password" placeholder="Enter Password" class="data"><br> -->
            <!-- <label class="lbl">Retype Password</label> -->
            <!-- <input type="password" name="retype_password" placeholder="Enter Password Again" class="data"><br> -->
            <!-- <label class="lbl">First Name</label> -->
            <!-- <input type="text" name="first_name" placeholder="Enter First Name" class="data"><br> -->
            <!-- <label class="lbl">Last Name</label> -->
            <!-- <input type="text" name="last_name" placeholder="Enter Last Name" class="data"><br> -->
            <!-- <label class="lbl">Address Street Number</label> -->
            <!-- <input type="text" name="address_street_number" placeholder="Enter Address Street Number" class="data"><br> -->
            <!-- <label class="lbl">Address Street Name</label> -->
            <!-- <input type="text" name="address_street_name" placeholder="Enter Address Street Name" class="data"><br> -->
            <!-- <label class="lbl">Address City Name</label> -->
            <!-- <input type="text" name="address_city_name" placeholder="Enter Address City Name" class="data"><br> -->
            <!-- <label class="lbl">Address Province Code</label> -->
            <!-- <input type="text" name="address_province_code" placeholder="Enter Address Province Code" class="data"><br> -->
            <!-- <label class="lbl">Address Post Code</label> -->
            <!-- <input type="text" name="address_post_code" placeholder="Enter Address Post Code" class="data"><br> -->
            <!-- <label class="lbl">Email Address</label> -->
            <!-- <input type="text" name="email_address" placeholder="Enter Email Address" class="data"><br> -->
            <!-- <label class="lbl">Mobile Number</label> -->
            <!-- <input type="text" name="mobile_number" placeholder="Enter Mobile Number" class="data"><br> -->
            <!-- <label class="lbl">Land Number</label> -->
            <!-- <input type="text" name="land_number" placeholder="Enter Land Number" class="data"><br> -->
            <!-- <label class="lbl">Medium</label> -->
            <!-- <input type="text" name="medium" placeholder="Enter Medium" class="data"><br> -->
            <!-- <label class="lbl">Institute</label> -->
            <!-- <input type="text" name="institute" placeholder="Enter Serving Institute" class="data"><br> -->
            <!-- <label class="lbl">School</label> -->
            <!-- <input type="text" name="school" placeholder="Enter School" class="data"><br> -->
            <!-- <label class="lbl">Stream</label> -->
            <!-- <input type="text" name="stream" placeholder="Enter Stream" class="data"><br> -->
            <!-- <label class="lbl">Subject</label> -->
            <!-- <input type="text" name="subject" placeholder="Enter Subject" class="data"><br> -->
            <!-- <label class="lbl">Profile Image</label> -->
            <!-- <input type="file" name="profile_image" class="data"><br> -->
            <!-- <label class="lbl">Cover Image</label> -->
            <!-- <input type="file" name="cover_image" class="data"><br> -->
            <input style="margin-left:15%" type="submit" value="Register" name="btnregister" class="btnregister">
        </form>
        <p>If you wish to register as an Admin, contact the administration department.</p>
        <p>Phone Number:- 081-4782400</p>
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
    <style type="text/css"> .content{
            min-height:62%;
            height:auto;
            min-height: 120px;
        }
        *{
            font-family:poppins;
        }

        .footer{
            padding-top:auto;
        }

        .form{
            padding-top:10px;
            text-align:left;
            align-content:center;
            padding-left:40%;
        }

        .data{
            text-align:left;
            margin-left: 10%;
            margin-top:5px;

        }
        .lbl{
            margin-top:5px;
            align-items:left;
            align-content:left;

        }

        .btnregister{
            padding:5px;
            font-weight:bold;
            margin-top:20px;
        }
    </style>
    <script src="../scripts/signature.js"></script>
</body>
</html>