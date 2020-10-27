<html lang="">

<head>
    <link rel="stylesheet" href="signup.css" type="text/css">
    <title>

    </title>
</head>

<body style="overflow-x: hidden;">

    <form method="post">
        <div class="image">
            <div class="_box">
                <label>
                    <p>Email</p>
                    <input type="text" name="email" id="email" class="email" />
                </label>
                <label>
                    <p>Password</p>
                    <input type="password" id="pass" class="password" name="pass" />

                </label>
                <label>
                    <p> confirm Password</p>
                    <input type="password" id="confirm_pass" class="password" name="confirm_pass" />

                </label>
                <label>
                    <p>username</p>
                    <input type="text" id="username" class="email" name="username" />

                </label>
                <label>
                    <p>phone numper</p>
                    <input type="text" id="phone" class="email" name="phone" />

                </label>
                <br><br>

                <label>
                    <BUTTON id="signin_btm" name="signup_btm" class="_loginbtm">signup</BUTTON>
                    </br>






                        </form>
                    </div>
                    <BUTTON id="post_btm" name="back" class="_loginbtm">back signin</BUTTON>
                </label>
            </div>
        </div>
    </form>






</body>


</html>

<?php

if (isset($_POST['signup_btm'])) {

    $user = $_POST['username'];
    $pass = $_POST['pass'];
    $conf_pass = $_POST['confirm_pass'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $db_name = $user . "_" . "main";
    $db_posts = $user . "_" . "posts";

    switch ($conf_pass) {
        case ($conf_pass != $pass):
            echo '<script>alert("the 2 passwords isn`t the same")</script>';
            break;
    }


    switch ($conf_pass) {
        case "":
            switch ($user) {
                case "":
                    switch ($pass) {
                        case "":
                            switch ($phone) {
                                case "":

                                    switch ($email) {
                                        case "":
                                            echo '<script>alert("complete the form")</script>';

                                            break;
                                    }
                                    break;
                            }
                            break;
                    }
                    break;
            }
            break;
    }


    switch ($conf_pass) {
        case (!empty($conf_pass)):
            switch ($user) {
                case (!empty($user)):
                    switch ($pass) {
                        case (!empty($pass)):
                            switch ($conf_pass) {
                                case (!empty($conf_pass)):
                                    switch ($email) {
                                        case (!empty($email)):
                                            switch ($phone) {
                                                case (!empty($phone)):
                                                    $conn2 = mysqli_connect("localhost", "root", "", "pharmacist");
                                                    $select_db2 = mysqli_select_db($conn2, "user_names");
                                                    $Q2 = mysqli_query($conn2, ' SELECT username FROM `user_names` WHERE username="' . $user . '"');

                                                    if (mysqli_num_rows($Q2) >= 1) {
                                                        echo '<script>alert("USER USED BEFORE")</script>';
                                                    } else {
                                                        $result2 = mysqli_query($conn2, "INSERT INTO `user_names`(`username`) VALUES('$user') ");
                                                        $make_qury = mysqli_query($conn2, "CREATE TABLE $db_name (username TEXT,numper TEXT,password TEXT,email TEXT,friends TEXT)");
                                                        $make_qury = mysqli_query($conn2, "INSERT INTO `$db_name`(`username`,`numper`,`password`,`email`,`friends`) VALUES('$user','$phone','$pass','$email','pharmacist') ");
                                                        $dir_name = $user;
                                                        mkdir("./uploads/'" . $dir_name . "'");
                                                        echo '<script>alert("create new user")</script>';
                                                        break;
                                                    }


                                                    break;
                                            }
                                            break;
                                    }
                                    break;
                            }
                            break;
                    }
                    break;
            }
            break;
    }
}
if (isset($_POST['back'])) {

    $url = 'signin.php';
    header('Location:' . $url);
}


?>