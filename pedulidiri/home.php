<?php
include "header.php";
session_start();
?>

<html>
    <body>
        <table align="center" border="1" height="30%" width="50%">
            <td align="center" valign="top">- Selamat datang <?php echo $_SESSION['username']?> di aplikasi Peduli Diri -</td>
        </table>
    </body>
