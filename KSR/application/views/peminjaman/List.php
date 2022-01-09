<font color="orange">
    <?php echo $this->session->flashdata('hasil'); ?>
</font>
<table border="1">
    <tr>
        <th>IDPEMINJAMAN</th>
        <th>NAMAPEMINJAM</th>
        <th>NAMABARANG</th>
        <th>IDUNIT</th>
        <th>JUMLAH</th>
        <th>ACTION</th>
        
    </tr>
    <?php
    foreach ($datapeminjaman as $data) {
        echo "<tr>
            <td>$data->idpeminjaman</td>
              <td>$data->namapeminjam</td>
              <td>$data->namabarang</td>
              <td>$data->idunit</td>
              <td>$data->jumlah</td>
              <td>" . anchor('alat/edit/' . $data->idpeminjaman, 'Edit') . "
                  " . anchor('alat/delete/' . $data->idpeminjaman, 'Delete') . "</td>
              </tr>";
    }
    ?>
</table>
<a href="http://localhost/FinalProject/KSR/index.php/peminjaman/create">+ Tambah data<a>