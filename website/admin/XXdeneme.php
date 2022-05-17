<?php
include "../settings/helper_methods.php";
include "../settings/Connector.php";
if (true) {
    $getir_query = $conn->prepare("SELECT deger FROM hakkimizda WHERE baslik = ?");
    if (true) {
        $getir_query->execute(["tarihcemiz"]);
    }
    $response = $getir_query->fetch(PDO::FETCH_ASSOC);
    echo json_encode($response);
}
