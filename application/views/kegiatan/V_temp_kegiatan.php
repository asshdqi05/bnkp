<table class="table table-bordered">
    <tr>
        <th width=10>No</th>
        <th>Nama</th>
        <th>Posisi</th>
        <th width=100>Aksi</th>
    </tr>
    <?php
    $no = 0;
    $data = $this->db->get('temp_petugas_kegiatan')->result();
    foreach ($data as $d) {
        $no++;
    ?>
        <tr>
            <td><?= $no ?></td>
            <td><?= $d->nama ?></td>
            <td><?= $d->posisi ?></td>
            <td><button type="button" class="btn btn-danger btn-xs" id="<?= $d->id ?>" name="hapus_petugas" value="<?= $d->id  ?>">HAPUS <i class="fas fa-trash"></i></button></td>
        </tr>
        <script>
            $('#<?= $d->id  ?>').click(function() {
                // var base_url = '<?= base_url() ?>';
                var id = $("#<?= $d->id  ?>").val();
                $.ajax({
                    url: "delete_temp_kegiatan",
                    type: 'POST',
                    data: {
                        id: id
                    },
                    dataType: 'html',
                    success: function(responsed) {
                        $('#data_petugas').html(responsed);
                    },
                })
            });
        </script>
    <?php } ?>
</table>