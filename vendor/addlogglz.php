<?php
$static_key = "pn3DvDHekKD4cGCAvP5o";
$mysqli = new mysqli('localhost', 'f0794045_systemrevo', 'systemrevo', 'f0794045_systemrevo');
if (!$mysqli) {
    echo json_encode(array('success' => false, 'reason' => 'database connect error'));
    exit;
}
$mysqli->set_charset("utf8");
$admin = isset($_GET['admin']) ? $mysqli->real_escape_string(urldecode($_GET['admin'])) : "";
$player = isset($_GET['player']) ? $mysqli->real_escape_string(urldecode($_GET['player'])) : "";
$action = isset($_GET['action']) ? $mysqli->real_escape_string($_GET['action']) : "";
$reason = isset($_GET['reason']) ? $mysqli->real_escape_string(urldecode($_GET['reason'])) : "";
$key = isset($_GET['key']) ? $mysqli->real_escape_string($_GET['key']) : "";
if ($static_key == $key && $key != "") {
    $admin = mb_convert_encoding($admin, "utf-8", "windows-1251");
    $player = mb_convert_encoding($player, "utf-8", "windows-1251");
    $action = mb_convert_encoding($action, "utf-8", "windows-1251");
    $reason = mb_convert_encoding($reason, "utf-8", "windows-1251");
    $mysqli->query("INSERT INTO `logs` (`TIME`, `ADMIN`, `NICKNAME`, `ACTION`, `REASON`) VALUES (CURRENT_TIMESTAMP, '$admin', '$player', '$action', '$reason')");
    echo json_encode(array('success' => true));
} else echo json_encode(array('success' => false, 'reason' => 'wrong key'));
?>
