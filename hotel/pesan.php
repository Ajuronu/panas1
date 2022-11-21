<?php
    include "header.php";
    session_start();

    if (isset($_POST['simpan'])){
        $namapemesan = $_POST['namapemesan'];
        $nik = $_POST['nik'];
        $checkin = $_POST['checkin'];
        $checkout = $_POST['checkout'];
        $jumlahkamar = $_POST['jumlahkamar'];
        $tipekamar = $_POST['tipekamar'];
        $nama = $_SESSION['username'];
        $text = $namapemesan . "," . $nik . "," . $checkin . "," . $checkout . "," . $jumlahkamar . "," . $tipekamar . "</tr> \n";
        $data = "catatan/$nama.txt";
        $dirname = dirname($data);
        if(!is_dir($dirname)){
            mkdir($dirname, 0755, true);
        }
        $fp = fopen($data, 'a+');
        if(fwrite($fp,$text)){
            echo '<script>alert("Berhasil membuat pesanan!");</script>';
        }
    } 
?>

<html>
    <body>
<table border="1" align="center" width="50%" height="40%">
    <td>
    <form action="" method="POST">
        <table align="center">
            <tr>
                <td>Nama Pemesan</td>
                <td><input type="text" name="namapemesan"></td>
            </tr>
            <tr>
                <td>NIK</td>
                <td><input type="text" name="nik"></td>
            </tr>
            <tr>
                <td>Check In</td>
                <td><input type="date" name="checkin"></td>
            </tr>
            <tr>
                <td>Check Out</td>
                <td><input type="date" name="checkout"></td>
            </tr>
            <tr>
                <td>Jumlah Kamar</td>
                <td><input type="text" name="jumlahkamar"></td>
            </tr>
            <tr>
                <td>Tipe Kamar</td>
                <td><input type="radio" value="Family Room" name="tipekamar"> Family Room</td>
                <td><input type="radio" value="Deluxe Room" name="tipekamar"> Deluxe Room</td>
            </tr>
            </tr>
            <tr>
                <td></td>
                <td align="right"><input type="submit" name="simpan" value="Pesan" ></td>
            </tr>
        </table>
    </form>
    </td>
</table>
</body>
</html>