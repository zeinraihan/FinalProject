<a href="http://localhost/FinalProject/KSR/index.php/alat/">alat</a>
    <a href="http://localhost/FinalProject/KSR/index.php/peminjaman/">peminjam</a>
<?php echo form_open_multipart('peminjaman/create'); ?>
<table>
    <tr>
        <td>ID</td>
        <td><?php echo form_input('idpeminjaman'); ?></td>
    </tr>
    <tr>
        <td>NAMA PEMINJAM</td>
        <td><?php echo form_input('namapeminjam'); ?></td>
        </tr>
    <tr>
        <td>NAMA BARANG</td>
        <td><?php echo form_input('namabarang'); ?></td>
        </tr>
    <tr>
        <td>ID UNIT</td>
        <td><?php echo form_input('idunit'); ?></td>
    </tr>
    <tr>
        <td>JUMLAH</td>
        <td><?php echo form_input('jumlah'); ?></td>
    </tr>
    <tr>
        <td colspan="2">
            <?php echo form_submit('submit', 'Simpan'); ?>
            <?php echo anchor('alat', 'Kembali'); ?></td>
    </tr>
</table>
<?php
echo form_close();
?>