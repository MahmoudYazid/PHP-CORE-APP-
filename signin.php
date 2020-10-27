<html lang="">

<head>
    <link rel="stylesheet" href="signin.css" type="text/css">
    <title>

    </title>
</head>

<body style="overflow-x: hidden;">

    <form method="post">
        <div class="image">
            <div class="_box">
                <label>
                    <p>user</p>
                    <input type="text" name="email_u" id="email" class="email" />
                </label>
                <label>
                    <p>Password</p>
                    <input type="password" id="pass" class="password" name="pass" />

                </label>
                <br><br>
                <label>
                    <button id="signin_btm" name="signin_btm" class="_loginbtm" value="sign in">sign in</button>
                    </br>
                    <BUTTON id="post_btm" name="back" class="_loginbtm">signup</BUTTON>
                </label>
            </div>
        </div>

    </form>


</body>

</html>
<?php


if (isset($_POST['signin_btm'])) {
    $user = $_POST['email_u'];
    $pass = $_POST['pass'];
    $conn2 = mysqli_connect("localhost", "root", "", "pharmacist");
    $select_db2 = mysqli_select_db($conn2, "user_names");
    $Q2 = mysqli_query($conn2, ' SELECT username FROM `user_names` WHERE username="' . $user . '"');

    if (mysqli_num_rows($Q2) >= 1) {
        $b_name = $user . "_" . "main";
        $conn3 = mysqli_connect("localhost", "root", "", "pharmacist");
        $select_db3 = mysqli_select_db($conn2, '".$b_name."');


        $Q3 = mysqli_query($conn3, "SELECT `password` FROM $b_name WHERE username='" . $user . "' ");

        while ($ck = mysqli_fetch_array($Q3)) {

            switch ($ck[0]) {
                case ($ck[0] == $pass):
                    $Q2 = mysqli_query($conn2, ' SELECT user_name FROM `opened_users` WHERE user_name="' . $user . '"');
                    if (mysqli_num_rows($Q2) >= 1) {

                        $url = "main.php?id=" . $user;
                        header('Location:' . $url . '&ph=' . $pass);
                        break;
                    } else {

                        $conn = mysqli_connect("localhost", "root", "", "pharmacist");
                        $select_database = mysqli_select_db($conn, "pharmacist");
                        mysqli_query($conn, "INSERT INTO `opened_users`(`user_name`, `_serverIP`, `server_name`, `server_port`, `ip_address`, `machine_port`) VALUES('" . $user . "','" . $_SERVER['SERVER_ADDR'] . "','" . $_SERVER['SERVER_NAME'] . "','" . $_SERVER['SERVER_PORT'] . "','" . $_SERVER['REMOTE_ADDR'] . "','" . $_SERVER['REMOTE_PORT'] . "')");




                        $url = "main.php?id=" . $user;
                        header('Location:' . $url . '&ph=' . $pass);

                        break;
                    }


                case ($ck[0] != $pass):
                    echo '<script>alert("if you forget your account you can send an email to get it back")</script>';
            }

            break;
        }
    } else {
        echo '<script>alert("if you forget your account you can send an email to get it back")</script>';
    }
}
if (isset($_POST['back'])) {

    $url = 'signup.php';
    header('Location:' . $url);
}

?>