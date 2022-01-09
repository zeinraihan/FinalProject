<?php echo form_open_multipart('alat/create'); ?>
<table>
    <tr>
        <td>ID</td>
        <td><?php echo form_input('idbarang'); ?></td>
    </tr>
    <tr>
        <td>NAMA</td>
        <td><?php echo form_input('namabarang'); ?></td>
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