<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

include_once '../app_includes/db_connect.php';

$mysqli->query("SET NAMES 'utf8'");
$sql = "SELECT recordid, title, subtitle, url_link, img_bg, img_sm, description, news_date FROM news WHERE status = 'active' and cat_id = 2 ORDER BY news_date DESC LIMIT 10";
$result = $mysqli->query($sql);
$news = array();

while ($row = $result->fetch_assoc()) {
    $news[] = $row;
}

echo json_encode($news);
