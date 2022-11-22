<?php
include "header.php";
session_start();
?>

<html>
    <link rel="stylesheet" href="style.css">
    <body>
        <table align="center" border="1" height="30%" width="45%">
            <td align="center" valign="top">- Selamat datang <?php echo $_SESSION['username']?> di Aplikasi Peduli Diri -</td>
        </table>
        <table width="982px">
            <tr>
                <td align="right"><a href="isidata.php"><input type="submit" name="isi" value="Isi Catatan Perjalanan"></td>
            </tr>
        </table>
    </body>
</html>
