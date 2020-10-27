<html>

<body>
    <form method="POST">

        <button name="class_access">create class_access</button>
        <button name="class_access2">create class_access 2</button>
        <button name="class_access3">create class_access 3</button>
        <button name="class_access4">create class_access 4</button>




    </form>
</body>

</html>
<?php
//main access user 
if (isset($_POST['class_access'])) {
    $conn = mysqli_connect("localhost", "root", "", "pharmacist");
    $select_database = mysqli_select_db($conn, "pharmacist");
    $_query_crate_user = "CREATE TABLE user_names (username TEXT)";
    $make_qury = mysqli_query($conn, $_query_crate_user);
    $make_qury = mysqli_query($conn, "INSERT INTO `user_names`(`username`) VALUES('pharmacist') ");
    mysqli_close($conn);
}
if (isset($_POST['class_access2'])) {
    $conn = mysqli_connect("localhost", "root", "", "pharmacist");
    $select_database = mysqli_select_db($conn, "pharmacist");

    $Q3 = "CREATE TABLE posts (
    postid int AUTO_INCREMENT,
    post_content varchar(5000) ,
    _day varchar(5000) ,
    _month varchar(5000) ,
    offer varchar(5000) ,
    original_price varchar(5000),
    link varchar(5000),
    how_many_days varchar(5000) ,
    post_auth varchar(5000),
    phone varchar(5000),
    name_of_drug varchar(5000),

    PRIMARY KEY (postid)
)";
    $make_qury = mysqli_query($conn, $Q3);
    $make_qury = mysqli_query($conn, "INSERT INTO `posts`(`post_content`,`_day`,`_month`,`offer`,`original_price`,`link`,`how_many_days`) VALUES('pharmacist is website give the pharmacist his need easly'," . date('d') . "," . date('m') . ",'for free', 'for free','','for ever','pharmacist') ");
}
if (isset($_POST['class_access3'])) {
    $conn = mysqli_connect("localhost", "root", "", "pharmacist");
    $select_database = mysqli_select_db($conn, "pharmacist");

    $Q3 = mysqli_query($conn, "CREATE TABLE opened_users (user_name Text,_serverIP TEXT, server_name TEXT,server_port TEXT , ip_address TEXT , machine_port TEXT )");
}
if (isset($_POST['class_access4'])) {
    $conn = mysqli_connect("localhost", "root", "", "pharmacist");
    $select_database = mysqli_select_db($conn, "pharmacist");
    $make_qury = mysqli_query($conn, "CREATE TABLE orders (orderid int AUTO_INCREMENT,buyer varchar(255), seller varchar(255) ,price varchar(255),_day varchar(255) ,_month varchar(255), _year varchar(255) ,_order varchar(255),buyer_phone varchar(255) ,seller_phone varchar(255),name_of_drug varchar(255),PRIMARY KEY (orderid))");
    echo 'done';
    mysqli_close($conn);
}
?>