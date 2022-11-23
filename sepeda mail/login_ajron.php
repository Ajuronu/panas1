<?php
session_start();
include "koneksi_ajron.php";

if(isset($_POST['daftar'])){
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];

    if($nik == "" || $nama == ""){
        echo '<script>alert("Data tidak boleh kosong!")</script>';
        return;
    }

    mysqli_query($koneksi, "INSERT INTO tb_user SET
    nik = '$_POST[nik]',
    nama = '$_POST[nama]'");

    echo '<script>alert("Anda berhasil mendaftar")</script>';
}

if ( isset( $_POST["masuk"] ) ) {
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];

    include "koneksi_ajron.php";
    $query = mysqli_query( $koneksi, "SELECT*FROM tb_user WHERE nik='$nik' AND nama='$nama'" );
    if ( mysqli_num_rows( $query ) == 0 ) {
        echo '<script>alert("NIK dan Nama belum terdaftar");</script>';
    } else {
        session_start();
        $_SESSION['nik'] = $nik;
        $_SESSION['nama'] = $nama;
        $_SESSION['login'] = true;

        header( "location: home_ajron.php" );
    }
    }
?>

<html>
    <form action="" method="POST">
        <br><br><br><br><br><br><br><br><br><br>
        <table align="center">
            <tr>
                <td><input type="number" name="nik" placeholder="NIK"></td>
            </tr>
            <tr>
                <td><input type="text" name="nama" placeholder="Nama"></td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="daftar" value="Saya Pengguna Baru">
                    <input type="submit" name="masuk" value="Masuk">
                </td>
            </tr>
        </table>
    </form>
</html>