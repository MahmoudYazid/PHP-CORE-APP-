<html lang="">

<head>
    <link rel="stylesheet" href="newpost.css" type="text/css">
    <title>

    </title>
</head>

<body style="overflow-x: hidden;">

    <form method="post" enctype="multipart/form-data">
        <div class="image">
            <div class="_box">
                <label>
                    <p>offer</p>
                    <input type="text" name="offer" id="offer" class="email" />
                </label>
                <label>
                    <p>how long this offer</p>
                    <input type="text" id="how_long_this_offer" class="password" name="how_long_this_offer" />

                </label>
                <label>
                    <p> original price</p>
                    <input type="text" id="original_price" class="password" name="original_price" />

                </label>
                <label>
                    <p>post</p>
                    <textarea rows="5" cols="60" id="post" class="email" name="post">

                    </textarea>


                </label>

                <label>
                    <p>name of drug</p>
                    <input type="text" id="phone" class="email" name="drug_name" />

                </label>


                <label><br /><br />
                    <BUTTON id="post_btm" name="post_btm" class="_loginbtm">post</BUTTON></br>
                    <BUTTON id="post_btm" name="back" class="_loginbtm">back to main</BUTTON>
                </label>
            </div>
        </div>
    </form>






</body>


</html>
<?php


if (isset($_POST['post_btm'])) {
    if ($_POST['post'] == "" or $_POST['offer'] == "" or $_POST['original_price'] == "" or $_POST['how_long_this_offer'] == "" or $_GET['id'] == "" ) {
        echo '<script>alert("fill the empty fields")</script>';
        return 0;
    }

    $drug_name_ = $_POST['drug_name'];
    $user = $_GET['id'];
    $pass = $_GET['ph'];
    $conn2 = mysqli_connect("localhost", "root", "", "pharmacist");
    $select_db2 = mysqli_select_db($conn2, "user_names");
    $Q2 = mysqli_query($conn2, ' SELECT username FROM `user_names` WHERE username="' . $user . '"');

    if (mysqli_num_rows($Q2) >= 1) {
        $b_name = $user . "_" . "main";
        $conn3 = mysqli_connect("localhost", "root", "", "pharmacist");


        $Q3 = mysqli_query($conn3, "SELECT `password` FROM $b_name WHERE username='" . $user . "' ");

        while ($ck = mysqli_fetch_array($Q3)) {



            if ($ck[0]) {
                if ($ck[0] == $pass) {
                    $conn3 = mysqli_connect("localhost", "root", "", "pharmacist");
                    $select_db3 = mysqli_select_db($conn3, "opened_users");

                    $Q4 = mysqli_query($conn3, "SELECT `_serverIP`, `server_name`, `server_port`, `ip_address`, `machine_port` FROM `opened_users` WHERE `user_name`='" . $user . "' ");
                    while ($ck2 = mysqli_fetch_array($Q4)) {

                        if ($Q4) {
                            /*upload photo */


                            /*insert post */
                            $conn = mysqli_connect("localhost", "root", "", "pharmacist");
                            $select_database = mysqli_select_db($conn, "pharmacist");
                            $post_content = $_POST['post'];
                            $offers = $_POST['offer'];
                            $op = $_POST['original_price'];
                            $hl = $_POST['how_long_this_offer'];
                            $sess = $_GET['id'];
                            $ph = $_GET['nu'];
                            $day = date('d');
                            $month = date('m');
                            $make_qury = mysqli_query($conn, "INSERT INTO `posts`(`post_content`,`_day`,`_month`,`offer`,`original_price`,`link`,`how_many_days`,`post_auth`,`phone`,`name_of_drug`) VALUES('" . $post_content . "','" . $day . "','" . $month . "','" . $offers . "','" . $op . "','photo','" . $hl . "','" . $sess . "','" . $ph . "','" . $drug_name_ . "') ");
                            if ($make_qury) {
                                echo '<script> alert("the post shared")</script>';
                            }
                        }
                    }
                }


                if ($ck[0] != $pass) {
                    echo '<script>alert("if you forget your account you can send an email to get it back 55555")</script>';
                    $con = mysqli_connect("localhost", "root", "", "pharmacist");
                    $select_db = mysqli_select_db($con, 'opened_users');
                    $delete = mysqli_query($con, "DELETE FROM `opened_users` WHERE `user_name`='" . $_GET['id'] . "' ");
                    $url = 'signin.php';
                    header('Location:' . $url);

                    break;
                }
            }
        }
    } else {
        echo '<script>alert("if you forget your account you can send an email to get it back")</script>';
        $con = mysqli_connect("localhost", "root", "", "pharmacist");
        $select_db = mysqli_select_db($con, 'opened_users');
        $delete = mysqli_query($con, "DELETE FROM `opened_users` WHERE `user_name`='" . $_GET['id'] . "' ");
        $url = 'signin.php';
        header('Location:' . $url);
    }
}
if(isset($_POST['back']))
{
    $user = $_GET['id'];
    $pass = $_GET['ph'];
    $url = "main.php?id=" . $user;
    header('Location:' . $url . '&ph=' . $pass);

    


}

?>