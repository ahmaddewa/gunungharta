<?php 

session_start();
include 'koneksi.php';

$terangkanlah = 'https://www.youtube.com/watch?v=1YdUrJfuiPo';
$username = trim(mysqli_real_escape_string($koneksi, $_POST['username']));
$password = md5(trim(mysqli_real_escape_string($koneksi, $_POST['password'])));

$login = mysqli_query($koneksi,"select * from agen where username='$username' and password='$password'");
$cek = mysqli_num_rows($login);


//cek hacker
if(strpos($username, "'") !== false){
        echo("<script> alert('Ups.. Karakter yang kamu gunakan dilarang!.');</script><script>window.location='".$terangkanlah."';</script>");
        exit();
}
if(strpos($username, "-") !== false){
        echo("<script> alert('Ups.. Karakter yang kamu gunakan dilarang!.');</script><script>window.location='".$terangkanlah."';</script>");
        exit();
}
if(strpos($password, "'") !== false){
        echo("<script> alert('Ups.. Karakter yang kamu gunakan dilarang!.');</script><script>window.location='".$terangkanlah."';</script>");
        exit();
}
if(strpos($password, "-") !== false){
        echo("<script> alert('Ups.. Karakter yang kamu gunakan dilarang!.');</script><script>window.location='".$terangkanlah."';</script>");
        exit();
}


if($cek > 0){
 
        $data = mysqli_fetch_assoc($login);

        if($data['level']==2){       
                $_SESSION['username'] = $username;
                $_SESSION['level'] = 2;
                header("location:admin/indexAdmin.php");
        }else if($data['level']==1){
                $_SESSION['username'] = $username;
                $_SESSION['level'] = 1;
                header("location:admin/index.php");
        }else{
                header("location:login.php?pesan=gagal");
        }
}else{
        header("location:login.php?pesan=gagal");
}


?>