<?php

if(isset($_POST['skrati-btn'])) {

    include_once './dbh.inc.php';
    session_start();

    $url = $_POST['url'];

    //Provjera praznog polja
    if(!empty($url)) {

        //Provjera URL-a
        if(filter_var($url, FILTER_VALIDATE_URL)) {

            //Provjera da li je URL vec u bazi
            $sql = "SELECT * FROM url WHERE url = ?";
            $stmt = mysqli_stmt_init($conn);
            mysqli_stmt_prepare($stmt,$sql);
            mysqli_stmt_bind_param($stmt, "s", $url);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $check = mysqli_num_rows($result);

            if($check > 0) {
                $row = mysqli_fetch_assoc($result);
                $_SESSION['feedback'] = "<a href='http://localhost/URLSHORT/".$row['url_code']."' target='_blank'>http://localhost/URLSHORT/".$row['url_code']."</a>";

                header("location: ../index.php?success");
                exit();
            } else {
                
                do {
                    //Generisanje kratkog URL-a
                    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
                    $newUrl = '';
                    for ($i = 0; $i < 5; $i++)
                        $newUrl .= $characters[mt_rand(0, 61)];

                    //Provjera da li je kratki URL vec u bazi
                    $sql = "SELECT * FROM url WHERE url_code = ?";
                    $stmt = mysqli_stmt_init($conn);
                    mysqli_stmt_prepare($stmt,$sql);
                    mysqli_stmt_bind_param($stmt, "s", $newUrl);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    $check = mysqli_num_rows($result);
                } while ($check > 0);

                //Dodavanje novog URL-a u bazu
                $sql = "INSERT INTO url (url, url_code, url_time) VALUES (?,?, now())";
                $stmt = mysqli_stmt_init($conn);
                mysqli_stmt_prepare($stmt,$sql);
                mysqli_stmt_bind_param($stmt, "ss", $url, $newUrl);
                mysqli_stmt_execute($stmt);

                $_SESSION['feedback'] = "<a href='http://localhost/URLSHORT/".$newUrl."' target='_blank'>http://localhost/URLSHORT/".$newUrl."</a>";

                header("location: ../index.php?success");
                exit();
                }
        } else {
            $_SESSION['error'] = '*Nevažeći URL';
            header("location: ../index.php");
            exit();
        }
    } else {
        $_SESSION['error'] = '*Niste unijeli URL';
        header("location: ../index.php");
        exit();
    }
} else {
    header("location: ../index.php");
    exit();
}