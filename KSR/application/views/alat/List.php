<a href="http://localhost/FinalProject/KSR/index.php/alat/">alat</a>
    <a href="http://localhost/FinalProject/KSR/index.php/peminjaman/">peminjam</a>
<font color="orange">
    <?php echo $this->session->flashdata('hasil'); ?>
</font>
<table border="1">
    <tr>
        <th>ID</th>
        <th>NAMA</th>
        <th>NOMOR</th>
        <th></th>
    </tr>
    <?php
    foreach ($dataalat as $alat) {
        echo "<tr>
              <td>$alat->idbarang</td>
              <td>$alat->namabarang</td>
              <td>$alat->jumlah</td>
              <td>" . anchor('alat/edit/' . $alat->idbarang, 'Edit') . "
                  " . anchor('alat/delete/' . $alat->idbarang, 'Delete') . "</td>
              </tr>";
    }
    ?>
</table>
<a href="http://localhost/FinalProject/KSR/index.php/alat/create">+ Tambah data<a>