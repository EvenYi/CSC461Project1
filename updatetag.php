<?php
include_once './inc/config.php';
include_once './inc/db_connect.php';           
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_POST["x"], false);
$conn=connection();
$sql = "UPDATE TAG SET Tag_name ='";
$sql =$sql.$obj->Tag_name."' WHERE T_id = ";
$sql =$sql.$obj->T_id." ;";
$result = execute_bool($conn,$sql);
$outp=array("result"=>$result);
mysqli_close($conn);
echo json_encode($outp);
?>