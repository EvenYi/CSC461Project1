<?php
include_once './inc/config.php';
include_once './inc/db_connect.php';
$conn = connection();

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>URTube</title>
    <style>
        table {
            margin: auto;
            border: 3px solid #6aa9ff;
            /* or margin: 0 auto 0 auto */
        }
    </style>
</head>

<body>
    <table>
        <tr align="center">
            <td colspan="5">USER Table</td>
        </tr>
        <tr>
            <td>Uid</td>
            <td>User_name</td>
            <td>Pwd</td>
            <td>Gender</td>
            <td>Authority</td>
        </tr>
        <?php
        $sql = " SELECT * FROM USER LIMIT 5;";
        $result = execute_sql($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . $row['Uid'] . "</td><td>" . $row['User_name'] . "</td><td>" . $row['Pwd'] . "</td><td>" . $row['Gender'] . "</td><td>" . $row['Authority'] . "</td></tr>";
        }
        ?>
    </table>
</body>

</html>
<?php
mysqli_close($conn);
?>