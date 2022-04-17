<?php
include("./helper_methods.php"); //buradan da get post session islemlerinin kısyaol emtotlarını çekiyorum
include("./Connector.php"); //baglantiyi burdan cekicem

//giris islemi icin
if (get("islem") == "giris") {
    $login_query = $conn->prepare("SELECT username FROM admin WHERE username = ? AND password = ?"); //calistirilacak query'i hazirladim
    if (post("username") && post("password")) { //burada direkt kullanamdan önce helper metotlara yeni bir metot gönder ve sql injection yapılmasını önleyecek kodları yaz
        $login_query->execute([post("username"), post("password")]); //queryi calistir
        $login_result = $login_query->fetch(PDO::FETCH_ASSOC); //sonucu fetch mode assoc ile alıp login_result'a eşitledik (burada tek bir değer döndüğü için fetch kullandım birden fazla değer döndürecek olsaydı fetchAll kullanılabilirdi)
        if ($login_result) { //eger login basarili ise
            $_SESSION["login"] = true; //sessiona login true yap
            $_SESSION["username"] = $login_result["username"]; //sessiona username yaz
            header("Location: ../admin/panel.php"); //panel.php ye yonlendir
        } else {
            echo "Kullanıcı adı veya şifre hatalı"; //kullanıcı adı veya şifre hatalı olduğu kısımdaki işlemleri burada yapacağız
        }
    } else if (post("username") == " " || post("password") == " ") { //burası tam bitmedi işfreyi kullanıcı adı ve şifreyi kontrol etmelisin null mu boşluk mu vs
        $_SESSION["alert"] = "Lütfen kullanıcı adı ve şifrenizi giriniz";
    }
}
