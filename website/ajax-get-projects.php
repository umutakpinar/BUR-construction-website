<?php

include "./settings/Connector.php";
include "./settings/helper_methods.php";

if (get("projects")) {
    if (get("projects") == "gel_projelerimiz") {
        $projects = $conn->prepare("SELECT * FROM gel_projelerimiz");
        $projects->execute();
    } else if (get("projects") == "ger_projelerimiz") {
        $projects = $conn->prepare("SELECT * FROM ger_projelerimiz");
        $projects->execute();
    }
    $projects_result = $projects->fetchAll(PDO::FETCH_ASSOC);
    print_r(json_encode($projects_result));
} else {
    echo "Bir şeyler ters gitti...";
}


// $projects = $conn->prepare("SELECT * FROM gel_projelerimiz");
// $projects->execute();
// $projects_result = $projects->fetchAll(PDO::FETCH_ASSOC);
// print_r(json_encode($projects_result));
