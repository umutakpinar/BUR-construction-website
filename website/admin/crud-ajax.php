<?php
include "../settings/Connector.php";
include "../settings/helper_methods.php";

if (get("action") == "insert") {
    if (get("section") == "haberler") {
        /* codes */
    } else if (get("section") == "ger_projelerimiz") {
        /* codes */
    } else if (get("section") == "gel_projelerimiz") {
        /* codes */
    } else if (get("section") == "hizmetlerimiz") {
        /* codes */
    }
} else if (get("action") == "read") {
    if (get("section") == "haberler") {
        /* codes databasede tablo var ancak içerisi doldurulmadı*/
    } else if (get("section") == "ger_projelerimiz") {
        $query = $conn->prepare("SELECT * FROM ger_projelerimiz");
        $query->execute();
        $results->$query->fetchAll(PDO::FETCH_ASSOC);
        print_r(json_encode($results)); //gerçekleştirilen projeleri json formatında geri döndür.
    } else if (get("section") == "gel_projelerimiz") {
        $query = $conn->prepare("SELECT * FROM gel_projelerimiz");
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        print_r(json_encode($results));
    } else if (get("section") == "hizmetlerimiz") {
        /* codes henüz databasede bu tablo oluşturulmadı*/
    } else if (get("section") == "iletisim") {
        /* codes databasede tablo var ancak içerisi doldurulmadı*/
    }
} else if (get("action") == "update") {
    if (get("section") == "haberler") {
        /* codes */
    } else if (get("section") == "ger_projelerimiz") {
        /* codes */
    } else if (get("section") == "gel_projelerimiz") {
        /* codes */
    } else if (get("section") == "hizmetlerimiz") {
        /* codes */
    }
} else if (get("action") == "delete") {
    if (get("section") == "haberler") {
        /* codes */
    } else if (get("section") == "ger_projelerimiz") {
        /* codes */
    } else if (get("section") == "gel_projelerimiz") {
        /* codes */
    } else if (get("section") == "hizmetlerimiz") {
        /* codes */
    }
} else {
    echo "Bir şeyler ters gitti";
}
