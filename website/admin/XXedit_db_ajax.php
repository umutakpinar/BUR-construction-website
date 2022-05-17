<?php
include "../settings/helper_methods.php";
include "../settings/Connector.php";

//getir
if (get("getir")) {
    $getir_query = $conn->prepare("SELECT deger FROM hakkimizda WHERE baslik = ?");
    if (get("getir") == "tarihcemiz") {
        $getir_query->execute(["tarihcemiz"]);
        $response = $getir_query->fetch(PDO::FETCH_ASSOC);
        echo $response["deger"];
    } else if (get("getir") == "misyonumuz") {
        $getir_query->execute(["misyonumuz"]);
        $response = $getir_query->fetch(PDO::FETCH_ASSOC);
        echo $response["deger"];
    } else if (get("getir") == "vizyonumuz") {
        $getir_query->execute(["vizyonumuz"]);
        $response = $getir_query->fetch(PDO::FETCH_ASSOC);
        echo $response["deger"];
    } else if (get("getir") == "degerlerimiz") {
        $getir_query->execute(["degerlerimiz"]);
        $response = $getir_query->fetch(PDO::FETCH_ASSOC);
        echo $response["deger"];
    } else if (get("getir") == "genel-Mudurun-Mesaji") {
        $getir_query->execute(["genel mudurun mesaji"]);
        $response = $getir_query->fetch(PDO::FETCH_ASSOC);
        echo $response["deger"];
    } else if (get("getir") == "baskanin-Mesaji") {
        $getir_query->execute(["baskanin mesaji"]);
        $response = $getir_query->fetch(PDO::FETCH_ASSOC);
        echo $response;
    }
}

//kaydet
else if ("kaydet") {
    $kaydet_query = $conn->prepare("UPDATE hakkimizda SET deger = ? WHERE baslik = ?");
    if (get("kaydet") == "tarihcemiz") {
    } else if (get("kaydet") == "misyonumuz") {
    } else if (get("kaydet") == "vizyonumuz") {
    } else if (get("kaydet") == "degerlerimiz") {
    } else if (get("kaydet") == "genel-mudurun-mesaji") {
    } else if (get("kaydet") == "baskanin-mesaji") {
    }
}
