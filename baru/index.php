<?php
$host='localhost';
$db ='smk';
$user='root';
$pass='';


$conn = new mysqli($host,$user,$pass,$db);

if($conn->connect_error){
    die("connection failed:".$conn->connect_error);
}

$sql ="SELECT * FROM siswa";


$search = isset($_GET['search']) ? $_GET['search']:'';
$sql="SELECT * FROM siswa  WHERE nama_siswa LIKE '%$search%'";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>siswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Daftar Siswa</h2>
<div class="atas">
<form method="GET" action="index.php">
    <input type="text" name="search" placeholder="cari nama siswa">
    <button type="submit">cari</button>
</form>
<a href="rekap_absen.php"><button>absen</button></a>
<a href="rekap_semester.php"><button>rekap absen</button></a>
<a href="jurnal.php"><button>jurnal</button></a>
<a href="keterlambatan.php"><button>keterlambatan</button></a>
</div>


<table border="1">
    <thead>
        <tr>
        <th>NISN</th>
        <th>nama</th>
        <th>Jurusan</th>
        <th>aksi</th>
        </tr>
    </thead>

<tbody>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
            <td>{$row['nisn']}</td>
            <td>{$row['nama_siswa']}</td>
            <td>{$row['jurusan']}</td>
            <td><button onclick=\"processSiswa('{$row['nisn']}')\">Proses</button></td>
            </tr>";
        }
    }else{
        echo "<tr><td colspan='4'>No records found</td></tr>";
    }
    ?>
</tbody>
</table>

<script>
function processSiswa(nisn) {
    window.location.href = 'process_siswa.php?nisn=' + nisn;
}
</script>
</body>
</html>

<?php $conn->close(); ?>
<!-- SELECT
siswa.nisn AS nisn,
siswa.nama_siswa AS nama,
COUNT(absensi.id_absen) AS jumlah_absensi,
tipe_absen.nama_absen AS STATUS
FROM absensi 
JOIN siswa ON absensi.nisn = siswa.nisn
JOIN tipe_absen ON absensi.id_absen= tipe_absen.id_absen
WHERE 
siswa.nisn ='2302050019'
AND absensi.tanggal_absensi BETWEEN '2025-12-31'AND '2025-07-01' AND tipe_absen.id_absen=1
GROUP BY siswa.nisn,tipe_absen.nama_absen;  -->

<!-- SELECT

COUNT(absensi.id_absen) AS jumlah_absensi
FROM absensi 
JOIN siswa ON absensi.nisn = siswa.nisn
JOIN tipe_absen ON absensi.id_absen= tipe_absen.id_absen
WHERE 
siswa.nisn ='2302050019'
AND absensi.tanggal_absensi BETWEEN '2025-02-18'AND '2025-03-18' AND tipe_absen.id_absen=1
GROUP BY siswa.nisn,tipe_absen.nama_absen;  -->