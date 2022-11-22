<?php
if (isset($_POST['daftar'])) {
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
