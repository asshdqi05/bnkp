<input type="hidden" id="id_kegiatan" value="<?= $id_kegiatan ?>">
<table class="table table-bordered">
    <tr>
        <th width=10>No</th>
        <th>Nama</th>
        <th>Posisi</th>
    </tr>
    <?php
    $no = 0;
    $data = $this->db->get_where('petugas_kegiatan', ['id_kegiatan' => $id_kegiatan])->result();
    foreach ($data as $d) {
        $no++;
    ?>
        <tr>
            <td><?= $no ?></td>
            <td><?= $d->nama ?></td>
            <td><?= $d->posisi ?></td>
        </tr>
    <?php } ?>
</table>