
<?php
include_once './inc/config.php';
include_once './inc/db_connect.php';
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_POST["x"], false);
$conn = connection();

if ((int) $obj->Branch == 1) {
    $sql = " SELECT Uid, User_name, Gender, COUNT(*) as V_numbers FROM USER JOIN VIDEO ON Uid=Uploader_id AND Uid =";
    $sql = $sql . $obj->Uid . " ;";
    $result = execute_sql($conn, $sql);
    $outp = $result->fetch_all(MYSQLI_ASSOC);
} else if ((int) $obj->Branch == 2) {
    $sql = " SELECT Uid, User_name, COUNT(*) as C_numbers FROM USER JOIN COMMENT ON Uid=User_id AND Uid =";
    $sql = $sql . $obj->Uid . " ;";
    $result = execute_sql($conn, $sql);
    $outp = $result->fetch_all(MYSQLI_ASSOC);
}
mysqli_close($conn);
echo json_encode($outp);

?>