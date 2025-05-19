<?php

$host='localhost';
$db='smk';
$user='root';
$pass='';
$conn= new mysqli($host,$user,$pass,$db);

if($conn->connect_error){
    die("conection failed:".$conn->connect_error);
}

$nisn =$_POST['nisn'];
$status =$_POST['status'];
$date =date('y-m-d');

$sql ="INSERT INTO absensi (nisn,id_absen,tanggal_absensi)VALUES('$nisn','$status','$date')";

if($conn->query($sql)===TRUE){
  header ("location:index.php");
}else{
    echo"error:".$sql."<br>".$conn->eror;
}
$conn->close();
?>                                                                                           