<?php
include_once './inc/config.php';
include_once './inc/db_connect.php';           
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_POST["x"], false);
$conn=connection();
$sql = "INSERT INTO USER (User_name, Pwd, Gender, Authority) VALUE ('";
$sql =$sql.$obj->username."','".$obj->pwd."', '".$obj->gender."', 1 );";
$result = execute_bool($conn,$sql);
$outp=array("result"=>$result);
mysqli_close($conn);
echo json_encode($outp);
?>