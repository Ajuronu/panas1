<?php error_reporting(0);
if (isset($_POST['daftar'])) {
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];

    if ($nik == "" || $nama == "") {
        echo '<script>alert("Data tidak boleh kosong!")</script>';
        return;
    } else {
        // Write data
        $text = $nik . "," . $nama . "\n";
        $write = fopen('config.txt', 'a+');

        if (fwrite($write, $text)) {
            echo '<script>alert("Anda berhasil mendaftar!")</script>';
        }
    }
}

if (isset($_POST['masuk'])) {
    $data = file_get_contents('config.txt');
    $contents = explode("\n", $data);
    $error = false;

    foreach ($contents as $values) {
        $login = explode(",", $values);
        $nik = $login[0];
        $nama = $login[1];

        if ($_POST['nik'] == "" || $_POST['nama'] == "") {
            echo '<script>alert("Data tidak boleh kosong!");</script>';
            return;
        } else if ($nik == $_POST['nik'] && $nama == $_POST['nama']) {
            session_start();
            $_SESSION['username'] = $nama;
            header('location: home.php');
        } else {
            $error = true;
        }
    }
    if ($error) {
        echo '<script>alert("Login Gagal!");</script>';
    }
}
?>

<html>
    <link rel="stylesheet" href="style.css">
    <form action="" method="POST">
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <table align="center">
            <tr>
                <td><input type="number" name="nik" placeholder="NIK"></td>
            </tr>
            <tr>
                <td><input type="text" name="nama" placeholder="Nama Lengkap"></td>
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
