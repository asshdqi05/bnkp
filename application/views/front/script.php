<script>
    $('#tampil_ptg').on('click', function() {
        var id_kegiatan = $('#id_kegiatan').val();
        $.ajax({
            url: "././C_front/tampil_data_petugas",
            type: "POST",
            data: {
                id_kegiatan: id_kegiatan
            },
            dataType: 'html',
            success: function(response) {
                $('#dat_pet').modal('show');
                $('#dt_ptg').html(response);
            },
        })
    });

    $('#close_btn').on('click', function() {
        $('#dat_pet').modal('hide');
    });
</script>