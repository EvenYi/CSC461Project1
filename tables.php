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
            border: 1px solid #6aa9ff;

            /* or margin: 0 auto 0 auto */
        }
    </style>
</head>

<body>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <h4 align="center">We have 7 Tables: USER, VIDEO, COMMENT, VIDEO_TAG, TAG, RATING and FOLLOWING table.</h4>
    <h4 align="center">All Tables Just Show 5 Rows</h4>
    <h4 align="center"><a href="./index.html">Go to the URTube</a></h4>
    <table border="1">
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
    </br>
    <table border="1">
        <tr align="center">
            <td colspan="6">VIDEO Table</td>
        </tr>
        <tr>
            <td>Vid</td>
            <td>Uploader_id</td>
            <td>Video_name</td>
            <td>Video_url</td>
            <td>Upload_date</td>
            <td>Intro</td>
        </tr>
        <?php
        $sql = " SELECT * FROM VIDEO LIMIT 5;";
        $result = execute_sql($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . $row['Vid'] . "</td><td>" . $row['Uploader_id'] . "</td><td>" . $row['Video_name'] . "</td><td>" . $row['Video_url'] . "</td><td>" . $row['Upload_date'] . "</td><td>" . $row['Intro'] . "</td></tr>";
        }
        ?>
    </table>
    </br>
    <table border="1">
        <tr align="center">
            <td colspan="5">COMMENT Table</td>
        </tr>
        <tr>
            <td>Comment_id</td>
            <td>Video_id/td>
            <td>User_id</td>
            <td>Content</td>
            <td>Release_date</td>
        </tr>
        <?php
        $sql = " SELECT * FROM COMMENT LIMIT 5;";
        $result = execute_sql($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . $row['Comment_id'] . "</td><td>" . $row['Video_id'] . "</td><td>" . $row['User_id'] . "</td><td>" . $row['Content'] . "</td><td>" . $row['Release_date'] . "</td></tr>";
        }
        ?>
    </table>
    </br>
    <table border="1">
        <tr align="center">
            <td colspan="6">VIDEO_TAG Table</td>
        </tr>
        <tr>
            <td>Video_id</td>
            <td>Tag_id</td>
        </tr>
        <?php
        $sql = " SELECT * FROM VIDEO_TAG LIMIT 5;";
        $result = execute_sql($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . $row['Video_id'] . "</td><td>" . $row['Tag_id'] . "</td></tr>";
        }
        ?>
    </table>
    </br>
    <table border="1">
        <tr align="center">
            <td colspan="6">TAG Table</td>
        </tr>
        <tr>
            <td>T_id</td>
            <td>Tag_name</td>
        </tr>
        <?php
        $sql = " SELECT * FROM TAG LIMIT 5;";
        $result = execute_sql($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . $row['T_id'] . "</td><td>" . $row['Tag_name'] . "</td></tr>";
        }
        ?>
    </table>
    </br>
    <table border="1">
        <tr align="center">
            <td colspan="6">RATING Table</td>
        </tr>
        <tr>
            <td>User_id</td>
            <td>Video_id</td>
            <td>Rate</td>
        </tr>
        <?php
        $sql = " SELECT * FROM RATING LIMIT 5;";
        $result = execute_sql($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . $row['User_id'] . "</td><td>" . $row['Video_id'] . "</td><td>" . $row['Rate'] . "</td></tr>";
        }
        ?>
    </table>
    </br>
    <table border="1">
        <tr align="center">
            <td colspan="6">FOLLOWING Table</td>
        </tr>
        <tr>
            <td>User_id</td>
            <td>Following_id</td>
        </tr>
        <?php
        $sql = " SELECT * FROM FOLLOWING LIMIT 5;";
        $result = execute_sql($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . $row['User_id'] . "</td><td>" . $row['Following_id'] . "</td></tr>";
        }
        ?>
    </table>
    </br>
</body>

</html>
<?php
mysqli_close($conn);
?>