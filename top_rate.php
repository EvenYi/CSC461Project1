
<?php
include_once './inc/config.php';
include_once './inc/db_connect.php';          


header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_POST["x"], false);

$conn=connection();
$sql = "SELECT Vid, Video_name, avg(Rate) as Rate FROM VIDEO JOIN RATING ON Video_id=Vid GROUP BY Vid ORDER BY avg(Rate) DESC LIMIT 5;";
$result = execute_sql($conn,$sql);
$outp = $result->fetch_all(MYSQLI_ASSOC);
mysqli_close($conn);
echo json_encode($outp);
               

?>