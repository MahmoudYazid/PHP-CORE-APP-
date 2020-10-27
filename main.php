<?php
ob_start();
?>
<html>

<head>
    <link rel="stylesheet" href="main.css">
</head>

<body style="overflow-x: hidden;">
    <div class="topnav">
        <form method="post">

            <button class="btm" name="newpost">new post</button>
            <button class="btm" name="newpost">my profile</button>
            <button class="btm" name="newpost">my orders</button>
            <button class="btm" name="newpost">make order</button>
            


            <button class="btm">contact us</button>
            <button class="btm">control phamacy</button>
            <button class="btm" name="find">find</button>

            <button class="btm" name="logout">logout</button>

        </form>
    </div>
    <br><br>
    <div class="pic">
        <img src=".\final background\logo.jpg" style="width: 100%;">
    </div>
    <div class="all_componants">



        <?php
        $con = mysqli_connect("localhost", "root", "", "pharmacist");
        $select_db = mysqli_select_db($con, 'opened_users');
        $delete = mysqli_query($con, "SELECT * FROM posts");


        while ($myresult = mysqli_fetch_array($delete)) {
            echo '
            <form method="post">
            </br>
                <div class="container" style="float: center;" >
                            <div style="background-color: black;width:100%;height:70%;position: relative;left: 0%;border-color: blue;border: 2px solid ;    filter: opacity(100%);" >
                                <div  style="position: relative;top: 40px;left: -40%;color:black;font-family: Impact, Charcoal, sans-serif;">call me on</br>"' . $myresult[9] . '"</div>
                                <div style="background-color:white; width:100%; height:10%;"></div>
                                <div  style="position: relative;top: 350px;left: -30%;color:gold;font-family: Impact, Charcoal, sans-serif;"> auther </br> <a href="pr.php?p=' . $myresult[8] . '"> ' . $myresult[8] . '</a></div>
                                <div  style="position: relative;top: -90px;left: -1%;color:black;font-family: Impact, Charcoal, sans-serif;"> name of drug </br><a href="showoffer.php?postid=' . $myresult[0] . '&id=' . $_GET['id'] . '&ph=' . $_GET['ph'] . '&post_auther=' . $myresult[8] . '&price=' . $myresult[4] . '&drug_name='.$myresult[10].'">' . $myresult[10] . '</a></div>
                                <div  style="position: relative;top: -120px;left: 40%;color:black;font-family: Impact, Charcoal, sans-serif;"> Date :- ' . $myresult[2] . '/' . $myresult[3] .   '</div>
                                <div  style="position: relative;top: -10px;left: -1%;color:gold;font-family: Impact, Charcoal, sans-serif;"> <h1>original price </br>' . $myresult[5] . '<h1></h1></div>
                                <div  style="position: relative;top: -10px;left: -1%;color:gold;font-family: Impact, Charcoal, sans-serif;"><h1>offer </br>' . $myresult[4] . '</h1></div>
                                <div  style="position: relative;top: -10px;left: -1%;color:gold;font-family: Impact, Charcoal, sans-serif;">this offer will end after </br>' . $myresult[7] . '</div>
                            </n>
                            </div></n>         
                               
                </div></n>
               
            </form>
            
            
            
            
            
            ';
        }



        ?>



    </div>
</body>

</html>
<?php
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
                        if (isset($_POST['logout'])) {
                            $url = 'signin.php';
                            header('Location:' . $url);
                            ob_end_flush();
                        }
                        if (isset($_POST['newpost'])) {
                            $user = $_GET['id'];
                            $con = mysqli_connect("localhost", "root", "", "pharmacist");

                            $DB_NAME = $user . "_" . "main";
                            $delete = mysqli_query($con, "SELECT * FROM `$DB_NAME` ");
                            while ($phone_result = mysqli_fetch_array($delete)) {
                                $url = 'newpost.php?id=' . $_GET['id'] . '&ph=' . $_GET['ph'] . '&nu=' . $phone_result[1];
                                header('Location:' . $url);
                                ob_end_flush();
                            }
                        }
                    }
                }
            }
            if ($ck[0] != $pass) {
                echo '<script>alert("if you forget your account you can send an email to get it back")</script>';
                $con = mysqli_connect("localhost", "root", "", "pharmacist");
                $select_db = mysqli_select_db($con, 'opened_users');
                $url = 'signin.php';
                header('Location:' . $url);
                ob_end_flush();
                break;
            }
        }
    }
} else {
    echo '<script>alert("if you forget your account you can send an email to get it back")</script>';
}



if (isset($_POST['find'])) {
    $url = 'finddrug.php?id=' . $_GET['id'] . '&ph=' . $_GET['ph'];
    header('Location:' . $url);
    ob_end_flush();
}

?>