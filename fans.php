
<?php
include_once './inc/config.php';
include_once './inc/db_connect.php';
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_POST["x"], false);
$conn = connection();
$sql = " SELECT ( SELECT count(*) FROM FOLLOWING WHERE Following_id = ";
$sql = $sql.$obj->Uid.")"; 
$sql = $sql." as Followers, ( SELECT count(*) FROM FOLLOWING WHERE User_id = ";
$sql = $sql.$obj->Uid.") as Following;";
$result = execute_sql($conn, $sql);
$outp = $result->fetch_all(MYSQLI_ASSOC);
mysqli_close($conn);
echo json_encode($outp);
?>