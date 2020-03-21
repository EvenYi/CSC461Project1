<?php
include_once './inc/config.php';
include_once './inc/db_connect.php';           
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_POST["x"], false);
$conn=connection();
$sql = "INSERT INTO VIDEO (Uploader_id, Video_name, Video_url, Intro) VALUE (";
$sql =$sql.$obj->Uploader_id.",'".$obj->Video_name."', '".$obj->Video_url."', '".$obj->Intro."' );";
$result = execute_bool($conn,$sql);
$outp=array("result"=>$result);
mysqli_close($conn);
echo json_encode($outp);
?>