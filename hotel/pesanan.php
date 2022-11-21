<?php
include "header.php";

session_start();
$user = $_SESSION['username'];
$datauser = "catatan/$user.txt";

if(!file_exists($datauser)){
    die('<center>Kamu Belum Memesan Kamar</center>');
} else {
    $file = fopen($datauser, "r");
}
?>

<html>
    <body>
        <table border="1" align="center" width="50%">
            <td>
                <a>Urutkan Berdasarkan</a>
                <select id="urut" onclick="urutkan(this)">
                    <option value="0">Waktu Check In</option>
                    <option value="1">Waktu Check Out</option>
                    <option value="2">Jumlah Kamar</option>
                    <option value="3">Tipe Kamar</option>
                </select>
                <input type="submit" value="Urutkan">
            </td>
        </table>
        <br>
        <table border="1" align="center" width="50%" height="40%">
            <td>
                <table align="center" border="1" width="80%" id="myTable">
                    <tr>
                        <th>Nama Pemesan</th>
                        <th>NIK</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                        <th>Jumlah Kamar</th>
                        <th>Tipe Kamar</th>
                    </tr>
                    <?php
                        while(($row = fgets($file)) !=false){
                            $col = explode(",",$row);
                            foreach($col as $data){
                                echo "<td>". trim($data). "</td>";
                            }
                        }
                    ?>
                </table>
            </td>
        </table>
        <script src="main.js"></script>
    </body>
</html>