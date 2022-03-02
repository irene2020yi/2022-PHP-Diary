<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <title>diary</title>
    </head>
    <body>
        <p>Diary v20220301 <hr></p>
        <form action="diary.php" method="get">
            <table>
                <tr>
                    <td>日期</td>
                    <td><input type="number" name="date"></td>
                </tr>
                <tr>
                    <td>紀錄</td>
                    <td><textarea name="note" cols="30" rows="10"></textarea></td>
                </tr>
            </table>
            <input type="submit" value="新增"><hr>
        </form>
    </body>
</html>

<?php
header('Content-Type: text/html; charset = utf-8');
$link = mysqli_connect("localhost", "username要更改", "password要更改", "databaseName要更改");

// 新增資料
@$ndate = $_GET['date'];
if( $ndate ){
    // echo 'get new data';
    @$nnote = $_GET['note'];
    $nsql = "INSERT INTO `diary` (`date`, `note`) VALUES ('$ndate', '$nnote')";
    mysqli_query( $link, $nsql);
}

// 顯示資料
$sql = "SELECT * FROM `diary`";
$result = mysqli_query( $link, $sql );
while( @$row = mysqli_fetch_array($result) ){
    echo "
    <table>
        <tr>
            <td width=100>$row[1]</td>
            <td width=200>$row[2]</td>
        </tr>
    </table>
    ";
}


?>