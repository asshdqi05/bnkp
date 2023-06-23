<input type="hidden" id="id_kegiatan" value="<?= $id_kegiatan ?>">
<table class="table table-bordered">
    <tr>
        <th width=10>No</th>
        <th>Nama</th>
        <th>Posisi</th>
        <th width=100>Aksi</th>
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
            <td>
                <!-- <a href="javascript:void(0)" class="btn btn-warning btn-xs" onclick="edit('<?= $d->id ?>','<?= $d->nama ?>','<?= $d->posisi ?>','<?= $d->id_kegiatan ?>')"><i class="fas fa-edit"></i></a> -->
                <button type="button" class="btn btn-danger btn-xs" id="<?= $d->id ?>" name="hapus_petugas" value="<?= $d->id  ?>"><i class="fas fa-trash"></i></button>
            </td>
        </tr>
        <script>
            $('#<?= $d->id  ?>').click(function() {
                var id = $("#<?= $d->id  ?>").val();
                var id_kegiatan = $("#id_kegiatan").val();
                $.ajax({
                    url: "../delete_petugas",
                    type: 'POST',
                    data: {
                        id: id,
                        id_kegiatan: id_kegiatan
                    },
                    dataType: 'html',
                    success: function(responsed) {
                        $('#data_ptg').html(responsed);
                    },
                })
            });
        </script>
    <?php } ?>
</table>


<!-- <script>
    function edit(id, nama, posisi, id_kegiatan) {
        $('#id_pk').val(id);
        $('#nama').val(nama);
        $('#posisi').val(id_lw);
        $('#modal_edit_kriteria').modal('show');
    }

    $('#edit_kriteria').click(function() {
        // var base_url = '<?= base_url() ?>';
        $.ajax({
            url: "../edit_kriteria",
            type: 'POST',
            data: $("#edit_kri").serialize(),
            dataType: 'html',
            success: function(response) {
                $('#modal_edit_kriteria').modal('toggle');
                $('#dt_kriteria').html(response);
            },
        })
    });
</script> -->