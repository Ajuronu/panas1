<?php
include "header_ajron.php";
include "koneksi_ajron.php";

$query = mysqli_query($koneksi, "SELECT * FROM tb_perjalanan ORDER BY tanggal DESC");
?>

<html>
    <link rel="stylesheet" href="style.css">
    <body>
        <table border="1" align="center" width="70%">
            <br>
            <td>
                <a>Urutkan Berdasarkan</a>
                <select id="urut" onclick="urutkan(this)">
                    <option value="0">Tanggal</option>
                    <option value="1">Waktu</option>
                    <option value="2">Lokasi</option>
                    <option value="3">Suhu</option>
                </select>
                <input type="submit" value="Urutkan">
            </td>
        </table>
        <br>
        <table border="1" align="center" width="70%" height="40%">
            <td>
                <br>
                <table align="center" border="1" width="80%" id="myTable">
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Lokasi Yang Dikunjungi</th>
                        <th>Suhu Tubuh</th>
                    </tr>
                    <?php if(mysqli_num_rows($query)>0){ ?>
                    <?php
                    $no = 1;
                    while($data = mysqli_fetch_array($query)){
                    ?>
                    <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $data["tanggal"];?></td>
                        <td><?php echo $data["jam"];?></td>
                        <td><?php echo $data["lokasi"];?></td>
                        <td><?php echo $data["suhu"];?></td>
                    </tr>
                    <?php $no++; } ?>
                    <?php } ?>
                </table>
                <br>
                <table width="845px">
                    <tr>
                        <td align="right" valign="bottom">
                            <a href="isidata.php"><input type="submit" name="isi" value="Isi Catatan Perjalanan"></td>
                        </tr>
                    </table>
                </td>
            </table>
            <script src="main_ajron.js"></script>
        </body>
    </html>