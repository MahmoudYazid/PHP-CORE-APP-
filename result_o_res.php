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


            <button class="btm" name="back_main">back to main</button>
            <button class="btm" name="back_search">back to search</button>

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
        $delete = mysqli_query($con, "SELECT * FROM posts WHERE `name_of_drug`='" . $_GET['searchid'] . "' ");


        while ($myresult = mysqli_fetch_array($delete)) {
            echo '
            <form method="post">
            </br>
                <div class="container" style="float: center;" >
                            <div style="background-color: black;width:100%;height:70%;position: relative;left: 0%;border-color: blue;border: 2px solid ;    filter: opacity(100%);" >
                                <div  style="position: relative;top: 40px;left: -40%;color:black;font-family: Impact, Charcoal, sans-serif;">call me on</br>"' . $myresult[9] . '"</div>
                                
                                <div style="background-color:white; width:100%; height:10%;"></div>
                                <div  style="position: relative;top: 350px;left: -30%;color:gold;font-family: Impact, Charcoal, sans-serif;"> auther </br> <a href="pr.php?p=' . $myresult[8] . '"> ' . $myresult[8] . '</a></div>
                                <div  style="position: relative;top: -90px;left: -1%;color:black;font-family: Impact, Charcoal, sans-serif;"> name of drug </br><a href="showoffer.php?postid=' . $myresult[0] . '&id=' . $_GET['id'] . '&ph=' . $_GET['ph'] . '&post_auther=' . $myresult[8] . '&price=' . $myresult[4] . '&drug_name=' . $myresult[10] . '">' . $myresult[10] . '</a></div>
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
if (isset($_POST['back_main'])) {
    $user = $_GET['id'];
    $pass = $_GET['ph'];
    $url = "main.php?id=" . $user;
    header('Location:' . $url . '&ph=' . $pass);
}
if (isset($_POST['back_search'])) {
    $url = 'finddrug.php?id=' . $_GET['id'] . '&ph=' . $_GET['ph'];
    header('Location:' . $url);
    ob_end_flush();
}
?>