<?php
    include "header.php";
    include "koneksi.php";
    session_start();

    if (isset($_POST['simpan'])){
        $tanggal = $_POST['tanggal'];
        $jam = $_POST['jam'];
        $lokasi = $_POST['lokasi'];
        $suhu = $_POST['suhu'];

        mysqli_query($koneksi, "INSERT INTO tb_perjalanan SET
        tanggal = '$_POST[tanggal]',
        jam = '$_POST[jam]',
        lokasi = '$_POST[lokasi]',
        suhu = '$_POST[suhu]'");

            echo '<script>alert("Catatan Berhasil Disimpan!");</script>';
        } 
?>

<html>
<link rel="stylesheet" href="style.css">
    <body>
        <table border="1" align="center" width="50%" height="40%">
            <td>
                <form action="" method="POST">
                    <table align="center">
                        <tr>
                            <td>Tanggal</td>
                            <td><input type="date" name="tanggal"></td>
                        </tr>
                        <tr>
                            <td>Jam</td>
                            <td><input type="time" name="jam"></td>
                        </tr>
                        <tr>
                            <td>Lokasi yang dikunjungi</td>
                            <td><input type="text" name="lokasi"></td>
                        </tr>
                        <tr>
                            <td>Suhu Tubuh</td>
                            <td><input type="text" name="suhu">℃</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td align="right"><input type="submit" name="simpan" value="Simpan"></td>
                        </tr>
                    </table>
                </form>
            </td>
        </table>
    </body>
</html>
