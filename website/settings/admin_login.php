<?php
session_start();
include("./helper_methods.php"); //buradan da get post session islemlerinin kısyaol emtotlarını çekiyorum
include("./Connector.php"); //baglantiyi burdan cekicem

//giris islemi icin
if (get("islem") == "giris") {
    $login_query = $conn->prepare("SELECT username FROM admin WHERE username = ? AND password = ?"); //calistirilacak query'i hazirladim
    if (trimPost(post("username")) && trimPost(post("password"))) { //burada direkt kullanamdan önce helper metotlara yeni bir metot gönder ve sql injection yapılmasını önleyecek kodları yaz şimdilik sadece trimPost ile boşlukları alıyorum
        $login_record_query = $conn->prepare('INSERT INTO log_records (description,admin_name) VALUES ("Logged in", :admin_name )'); //giris yapilacak log kaydi
        $login_query->execute([trimPost(post("username")), trimPost(post("password"))]); //queryi calistir
        $login_result = $login_query->fetch(PDO::FETCH_ASSOC); //sonucu fetch mode assoc ile alıp login_result'a eşitledik (burada tek bir değer döndüğü için fetch kullandım birden fazla değer döndürecek olsaydı fetchAll kullanılabilirdi)
        if ($login_result) { //eger login basarili ise
            $login_query->execute();
            $_SESSION["login"] = true; //sessiona login true yap
            $_SESSION["username"] = $login_result["username"]; //sessiona username değerini yaz
            $login_record_query->execute([":admin_name" => $_SESSION["username"]]);
            header("Location: ../admin/panel.php"); //panel.php ye yonlendir
        } else {
            $_SESSION["alert"] = "Incorrect username or password! Kullanıcı adı veya şifre hatalı!"; //kullanıcı adı veya şifre hatalı olduğu kısımdaki işlemleri burada yapacağız
            header("Location: ../admin/login.php");
        }
    } else if (post("username") == null || post("password") == null) { //burası tam bitmedi şifreyi kullanıcı adı ve şifreyi kontrol etmelisin null mu boşluk mu vs
        $_SESSION["alert"] = "Lütfen kullanıcı adı ve şifrenizi giriniz";
        header("Location: ../admin/login.php");
    }
}

if (get("islem") == "cikis") { //cikis islemi
    $logout_record_query = $conn->prepare('INSERT INTO log_records (description,admin_name) VALUES ("Logged out", :admin_name )'); //cikis yapilacak log kaydi
    $logout_record_query->execute([":admin_name" => $_SESSION["username"]]);
    $_SESSION["login"] = false;
    unset($_SESSION["username"]); //sesionda set edilen bilgileri temizle
    session_destroy(); //sessionu kapat nasıl olsa yönlendirdiğin sayfada tekrar session_start() ediliyor
    $_SESSION["alert"] = "Çıkış yapıldı!"; //yönlendirmeden önce cikis bilgisi gönder
    header("Location: ../admin/login.php");
}
