<?php
require "settings/init.php";

$data = json_decode(file_get_contents('php://input'), true);

header('Content-Type: application/json; charset=utf-8');

if (isset($data["password"]) && $data["password"] == "MovDBAPI") {

    $sql = "SELECT * FROM movie WHERE 1=1";
    $bind = [];

    if (!empty($data["nameSearch"])) {
        $sql .= " AND movName LIKE CONCAT('%', :movName, '%') ";
        $bind[":movName"] = $data["nameSearch"];
    }

    $movie = $db->sql($sql, $bind);
    header("HTTP/1.1 200 OK");

    echo json_encode($movie);

} else {
    header("HTTP/1.1 401 Unauthorized");
    $error["errorMessage"] = "Your password was incorrect";
    echo json_encode($error);
}
?>
