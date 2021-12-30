<?php 
// menghubungkan dengan koneksi

$koneksi =mysqli_connect("localhost","root","","db_rfid");
// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];
// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($koneksi,"select * from admin where username='$username' and password='$password'");//mengambil data admin
// menghitung jumlah data yang ditemukan
$q= mysqli_fetch_array($data); //cek username admin
if (mysqli_num_rows($data)> 0) { //login admin
    $_SESSION['username'] = $q['username'];
    $_SESSION['password'] = $q['password'];
    header("location:home.php");
}else { //jika gagal akan kembali ke halaman login
    header("location:index.php?pesan=gagal");
}

?>