<?php
include "../settings/Connector.php";
include "../settings/helper_methods.php";

try {
    if (get("action") == "insert") {
        if (get("section") == "haberler") {
            $query = $conn->prepare("INSERT INTO haberler (baslik, icerik, tags) VALUES (?, ?, ?)");
            $query->execute([post("baslik"), post("icerik"), post("tags")]);
        } else if (get("section") == "ger_projelerimiz") {
            $query = $conn->prepare("INSERT INTO ger_projelerimiz (baslik, info, icerik) VALUES (?, ?, ?)");
            $query->execute([post("baslik"), post("info"), post("icerik")]);
        } else if (get("section") == "gel_projelerimiz") {
            $query = $conn->prepare("INSERT INTO gel_projelerimiz (baslik, info, icerik) VALUES (?, ?, ?)");
            $query->execute([post("baslik"), post("info"), post("icerik")]);
        } else if (get("section") == "hizmetlerimiz") {
            $query = $conn->prepare("INSERT INTO hizmetlerimiz (hizmet_adi, aciklama) VALUES (?, ?)");
            $query->execute([post("hizmet_adi"), post("aciklama")]);
        } else if (get("section") == "iletisim") {
            $query = $conn->prepare("INSERT INTO iletisim (adSoyad, email, konu, mesaj) VALUES (?, ?, ?, ?)");
            $query->execute([post("adSoyad"), post("email"), post("konu"), post("mesaj")]);
        }
    } else if (get("action") == "read") {
        if (get("section") == "haberler") {
            $query = $conn->prepare("SELECT * FROM haberler");
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_ASSOC);
            print_r(json_encode($results));
        } else if (get("section") == "ger_projelerimiz") {
            $query = $conn->prepare("SELECT * FROM ger_projelerimiz");
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_ASSOC);
            print_r(json_encode($results)); //gerçekleştirilen projeleri json formatında geri döndür.
        } else if (get("section") == "gel_projelerimiz") {
            $query = $conn->prepare("SELECT * FROM gel_projelerimiz");
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_ASSOC);
            print_r(json_encode($results));
        } else if (get("section") == "hizmetlerimiz") {
            $query = $conn->prepare("SELECT * FROM hizmetlerimiz");
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_ASSOC);
            print_r(json_encode($results));
        } else if (get("section") == "iletisim") {
            $query = $conn->prepare("SELECT * FROM iletisim");
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_ASSOC);
            print_r(json_encode($results));
        }
    } else if (get("action") == "update") {
        if (get("section") == "haberler") {
            $query = $conn->prepare("UPDATE haberler SET baslik = ?, icerik = ?, yayin_tarihi = CURRENT_TIMESTAMP, tags = ? WHERE haber_id = ?");
            $query->execute([post("baslik"), post("icerik"), post("tags"), post("haber_id")]);
        } else if (get("section") == "ger_projelerimiz") {
            $query = $conn->prepare("UPDATE ger_projelerimiz SET baslik = ?, info = ?, icerik = ? WHERE project_id = ?");
            $query->execute([post("baslik"), post("info"), post("icerik"), post("project_id")]);
        } else if (get("section") == "gel_projelerimiz") {
            $query = $conn->prepare("UPDATE gel_projelerimiz SET baslik = ?, info = ?, icerik = ? WHERE project_id = ?");
            $query->execute([post("baslik"), post("info"), post("icerik"), post("project_id")]);
        } else if (get("section") == "hizmetlerimiz") {
            $query = $conn->prepare("UPDATE hizmetlerimiz SET hizmet_adi = ?, aciklama = ? WHERE hizmet_id = ? ");
            $query->execute([post("hizmet_adi"), post("aciklama"), post("hizmet_id")]);
        }
    } else if (get("action") == "delete") {
        if (get("section") == "haberler") {
            $query = $conn->prepare("DELETE FROM haberler WHERE haber_id = ?");
            $query->execute([post("haber_id")]);
        } else if (get("section") == "ger_projelerimiz") {
            $query = $conn->prepare("DELETE FROM ger_projelerimiz WHERE project_id = ?");
            $query->execute([$_POST["project_id"]]);
            $_POST["project_id"] = "";
        } else if (get("section") == "gel_projelerimiz") {
            $query = $conn->prepare("DELETE FROM gel_projelerimiz WHERE project_id = ?");
            $query->execute([$_POST["project_id"]]);
            $_POST["project_id"] = "";
        } else if (get("section") == "hizmetlerimiz") {
            $query = $conn->prepare("DELETE FROM hizmetlerimiz WHERE hizmet_id = ?");
            $query->execute([$_POST["hizmet_id"]]);
            $_POST["hizmet_id"] = "";
        } else if (get("section") == "iletisim") {
            $query = $conn->prepare("DELETE FROM iletisim WHERE iletisim_id = ?");
            $query->execute([$_POST["iletisim_id"]]);
            $_POST["iletisim_id"] = "";
        }
    } else {
        echo "Bir şeyler ters gitti";
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
