<?php

include "./settings/Connector.php";
include "./settings/helper_methods.php";

if (get("projects")) {
    if (get("projects") == "gel_projelerimiz") {
        $result = $conn->prepare("SELECT * FROM gel_projelerimiz");
        $result->execute();
    } else if (get("projects") == "ger_projelerimiz") {
        $result = $conn->prepare("SELECT * FROM ger_projelerimiz");
        $result->execute();
    }
    $fetched_result = $result->fetchAll(PDO::FETCH_ASSOC);
    print_r(json_encode($fetched_result));
} else {
    echo "Bir şeyler ters gitti...";
}


// $projects = $conn->prepare("SELECT * FROM gel_projelerimiz");
// $projects->execute();
// $projects_result = $projects->fetchAll(PDO::FETCH_ASSOC);
// print_r(json_encode($projects_result));
