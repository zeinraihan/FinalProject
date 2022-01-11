<?php echo form_open('peminjaman/edit'); ?>
<?php echo form_hidden('idpeminjaman', $dataalat[0]->idpeminjaman); ?>

<table>
    <tr>
        <td>IDPEMINJAM</td>
        <td><?php echo form_input('idbarang', $dataalat[0]->idpeminjaman, "disabled"); ?></td>
    </tr>
    <tr>
        <td>NAMAPEMINJAMAN</td>
        <td><?php echo form_input('namapeminjam', $dataalat[0]->namapeminjam); ?></td>
    </tr>
    <tr>
        <td>NAMABARANG</td>
        <td><?php echo form_input('namabarang', $dataalat[0]->namabarang); ?></td>
    </tr>
    <tr>
        <td>IDUNIT</td>
        <td><?php echo form_input('idunit', $dataalat[0]->idunit); ?></td>
    </tr>
    <tr>
        <td>JUMLAH</td>
        <td><?php echo form_input('jumlah', $dataalat[0]->jumlah); ?></td>
    </tr>
    <tr>
        <td colspan="2">
            <?php echo form_submit('submit', 'Simpan'); ?>
            <?php echo anchor('peminjaman', 'Kembali'); ?></td>
    </tr>
</table>
<?php
echo form_close();
?>