<?php
$host='localhost';
$db='smk';
$user='root';
$pass='';
$conn= new mysqli($host,$user,$pass,$db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Masukkan siswa yang terlambat</h2>
    <form  method="POST" action="keterlambatan.php" >
        <label >nisn <br>
            <input type="int" name="nisn">
        </label><br>
        <label >jam <br>
            <input type="time" name="time">
        </label><br>
        <button type="submit">submit</button>
    </form>
</body>
</html>
<?php
$nisn = isset($_POST["nisn"]) ? $_POST["nisn"] : null;
$date =date('y-m-d');
$time = isset($_POST["time"]) ? $_POST["time"] : null;

$sql ="INSERT INTO keterlambatan (nisn,tanggal,jam)VALUES('$nisn','$date','$time')";

if($conn->query($sql)===TRUE){
 
}else{
    echo"error:".$sql."<br>".$conn->eror;
}
$conn->close();
?>