<?php
include_once './inc/config.php';
include_once './inc/db_connect.php';           
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_POST["x"], false);
$conn=connection();
$sql = "INSERT INTO COMMENT (Video_id, User_id, Content) VALUE (";
$sql =$sql.$obj->Video_id.",".$obj->User_id.", '".$obj->Content."' );";
$result = execute_bool($conn,$sql);
$outp=array("result"=>$result);
mysqli_close($conn);
echo json_encode($outp);
?>