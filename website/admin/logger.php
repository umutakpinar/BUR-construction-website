<?php
include "../settings/Connector.php";
include "../settings/helper_methods.php";

if (get("action") == "log") {
    $log_description = post("log_description");
    $admin_name = post("admin_name");
    $log_query = $conn->prepare("INSERT INTO log_records (description,admin_name) VALUES (?,?)");
    $log_query->execute([$log_description, $admin_name]);
}
