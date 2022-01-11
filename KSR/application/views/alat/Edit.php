<a href="http://localhost/FinalProject/KSR/index.php/alat/">alat</a>
    <a href="http://localhost/FinalProject/KSR/index.php/peminjaman/">peminjam</a>
<?php echo form_open('alat/edit'); ?>
<?php echo form_hidden('idbarang', $dataalat[0]->idbarang); ?>

<table>
    <tr>
        <td>ID</td>
        <td><?php echo form_input('', $dataalat[0]->idbarang, "disabled"); ?></td>
    </tr>
    <tr>
        <td>NAMA</td>
        <td><?php echo form_input('nama', $dataalat[0]->namabarang); ?></td>
    </tr>
    <tr>
        <td>JUMLAH</td>
        <td><?php echo form_input('nomor', $dataalat[0]->jumlah); ?></td>
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