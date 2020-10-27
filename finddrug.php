<?php
ob_start();
?>
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
                    <p>find your drug</p>
                    <input type="text" name="email_u" id="email" class="email" />
                </label>
                <label>


                </label>
                <br><br>
                <label>

                    <BUTTON id="post_btm" name="search" class="_loginbtm">search</BUTTON></br>
                    <BUTTON id="post_btm" name="back" class="_loginbtm" style="position: relative;left:2%;">back to main</BUTTON>
                </label>
            </div>
        </div>

    </form>


</body>

</html>
<?php


if (isset($_POST['back'])) {
    $user = $_GET['id'];
    $pass = $_GET['ph'];
    $url = "main.php?id=" . $user;
    header('Location:' . $url . '&ph=' . $pass);
}
if (isset($_POST['search'])) {
    if (!empty($_POST['email_u'])) {

        $user = $_GET['id'];
        $pass = $_GET['ph'];
        $url = "result_o_res.php?id=" . $user;
        header('Location:' . $url . '&ph=' . $pass . '&searchid=' . $_POST['email_u']);
    } else {
        echo '<script>alert("the search field is empty")</script>';
    }
}

?>