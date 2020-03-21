<?php
include_once './inc/config.php';
include_once './inc/db_connect.php';           
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_POST["x"], false);
$conn=connection();
$sql = "DELETE FROM COMMENT WHERE Comment_id = ";
$sql =$sql.$obj->Comment_id."; ";
$result = execute_bool($conn,$sql);
$outp=array("result"=>$result);
mysqli_close($conn);
echo json_encode($outp);
?>