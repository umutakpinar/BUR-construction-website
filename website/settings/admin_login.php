<?php
include("./helper_methods.php");
include("./Connector.php");

//BURADA BÜYÜK BİR HATA VAR !!!
if (get("islem") == "giris") {
    $queryUsername = $conn->query("SELECT username FROM admin WHERE username = '" . post("username") . "'");
    if ($queryUsername) {
        print_r($queryUsername->fetch(2));
    } else {
        echo "bir hata oluştu";
    }
}
