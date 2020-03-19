
<?php
include_once './inc/config.php';
include_once './inc/db_connect.php';           
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_POST["x"], false);
$conn=connection();
$sql = "SELECT Tag_id,Tag_name FROM VIDEO_TAG JOIN TAG ON Tag_id = T_id WHERE Video_id=";
$sql = $sql.$obj->Vid." ;";
$result = execute_sql($conn,$sql);
$outp = $result->fetch_all(MYSQLI_ASSOC);
echo json_encode($outp);
?>