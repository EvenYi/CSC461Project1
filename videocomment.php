<?php
include_once './inc/config.php';
include_once './inc/db_connect.php';           
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_POST["x"], false);
$conn=connection();
$sql = " SELECT Uid, User_name, Content, Release_date FROM COMMENT JOIN USER ON User_id = Uid WHERE Video_id =";
$sql = $sql.$obj->Vid." ;";
$result = execute_sql($conn,$sql);
$outp = $result->fetch_all(MYSQLI_ASSOC);
mysqli_close($conn);
echo json_encode($outp);
?>