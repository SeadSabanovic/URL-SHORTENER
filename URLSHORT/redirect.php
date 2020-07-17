<?php

include_once './inc/dbh.inc.php';

if(isset($_GET['code'])) {
    $code = $_GET['code'];

    //Nabavljanje pravog URL-a
    $sql = "SELECT url FROM url WHERE url_code = ?";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt,$sql);
        mysqli_stmt_bind_param($stmt, "s", $code);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $check = mysqli_num_rows($result);

        if($check > 0) {
            $row = mysqli_fetch_assoc($result);
            header("location: ".$row['url']);
            die();
        } else {
            header("location: ../index.php");
            exit();
        }
            
} else {
    header("location: ../index.php");
    exit();
}