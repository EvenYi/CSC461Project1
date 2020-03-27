
<?php
include_once './inc/config.php';
include_once './inc/db_connect.php';
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_POST["x"], false);
$conn = connection();
$sql = " SELECT (select count(*) from USER) as U_n, (select count(*) from VIDEO) as V_n, (select count(*) from TAG) as T_n;";
$result = execute_sql($conn, $sql);
$outp = $result->fetch_all(MYSQLI_ASSOC);
mysqli_close($conn);
echo json_encode($outp);

?>