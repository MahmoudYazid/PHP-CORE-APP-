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

            <button class="btm" name="back">back to posts</button>
            <button class="btm" name="make_this_order">order this offer</button>
            <button class="btm" name="copy_link">copy share link</button>


        </form>
    </div>

    <body style="overflow-x: hidden;">
        <form method="post">
            <div class="container">
                <?php
                $con = mysqli_connect("localhost", "root", "", "pharmacist");
                $delete = mysqli_query($con, "SELECT * FROM posts WHERE postid=" . $_GET['postid'] . " ");
                while ($myresult = mysqli_fetch_array($delete)) {
                    echo '
                <div class="container">
                            <div class="pic">
                                  <img src=".\final background\logo.jpg" style="width: 100%;">
                            </div>
                            <div style="background-color: black;width:30%;height:70%;position: relative;left: 35%;border-color: blue;border: 2px solid ;" >
                                <div style="position: relative;top: 50px;left: 0%;color:gold;font-family: Impact, Charcoal, sans-serif;">' . $myresult[1] . '</div>
                            </div>
                </div>
                ';
                }

                ?>


            </div>
            </br>

        </form>
    </body>

</html>
<?php
if (isset($_POST['copy_link'])) {

    echo '<script>alert("showoffer.php?postid=' . $_GET['postid'] . '")</script>';
    return 0;
}



if (isset($_POST['back'])) {
    $user = $_GET['id'];
    $pass = $_GET['ph'];

    if(!empty($user)&& !empty($pass))
    {
        $url = "main.php?id=" . $user;
        header('Location:' . $url . '&ph=' . $pass);


    }else{
        $url = 'signin.php';
        header('Location:' . $url);

    }
   
        
       

    
    }


if (isset($_POST['make_this_order'])) {
    $user = $_GET['id'];
    $pass = $_GET['ph'];
    if (!empty($user) && !empty($pass)) {

        $user = $_GET['id'];
        $con = mysqli_connect("localhost", "root", "", "pharmacist");

        $DB_NAME = $user . "_" . "main";
        $delete = mysqli_query($con, "SELECT * FROM `$DB_NAME` ");
        while ($phone_result = mysqli_fetch_array($delete)) {
            $DB_NAME2 = $_GET['post_auther'] . "_" . "main";
            $delete2 = mysqli_query($con, "SELECT * FROM `$DB_NAME2` ");
            
       
            while ($phone_result2 = mysqli_fetch_array($delete2)) {
                if ($_GET['post_auther'] == $_GET['id']) {
                    echo '<script>alert("cant buy order from your self")</script>';
                    break;
                } else {
                    $make_qury = mysqli_query($con, "INSERT INTO `orders`(`buyer`, `seller`, `price`, `_day`, `_month`, `_year`, `_order`, `buyer_phone`, `seller_phone`,`name_of_drug`) VALUES('" . $_GET['id'] . "','" . $_GET['post_auther'] . "','" . $_GET['price'] . "'," . date('d') . ",'" . date('m') . "','" . date('y') . "','" . $_GET['postid'] . "','" . $phone_result[1] . "','" . $phone_result2[1] . "','".$_GET['drug_name']."')");
                    echo '<script>alert("order done")</script>';
                }
            }
        }
        
    } else {
        $url = 'signin.php';
        header('Location:' . $url);
    }

}
?>