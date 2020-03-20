<?php
include_once './inc/config.php';
include_once './inc/db_connect.php';           
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_POST["x"], false);
$conn=connection();
$sql = "SELECT Vid,Video_name,Video_url,Upload_date,Intro,Uid,User_name FROM VIDEO, USER WHERE Uid = Uploader_id AND Vid=";
$sql = $sql.$obj->Vid." ;";
$result = execute_sql($conn,$sql);
$outp = $result->fetch_all(MYSQLI_ASSOC);
mysqli_close($conn);
echo json_encode($outp);
?>