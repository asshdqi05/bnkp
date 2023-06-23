<script>
    $('#tambah').on('click', function() {
        var id_petugas = $('#id_petugas').val();
        var nama = $('#nama').val();
        var posisi = $('#posisi').val();
        if (nama != "" && posisi != "") {
            $.ajax({
                url: "save_temp_kegiatan",
                type: "POST",
                data: {
                    id_petugas: id_petugas,
                    nama: nama,
                    posisi: posisi
                },
                dataType: 'html',
                success: function(response) {
                    $('#id_petugas').val("");
                    $('#nama').val("");
                    $('#posisi').val("");
                    $('#data_petugas').html(response);
                },
            })
        } else {
            alert('Anda harus mengisi data dengan lengkap !');
        }
        return false;
    });


    //=============================================================================================================================================
    // ini untuk edit 


    $(document).ready(function() {
        $("#cari").hide();
        $("#tambah_petugas").hide();
        $("#posisi_p").hide();
        $("#nama_p").hide();
    })

    $('#tampil_petugas').on('click', function() {
        var id_kegiatan = $('#id_kegiatan').val();
        $.ajax({
            url: "../tampil_petugas",
            type: "POST",
            data: {
                id_kegiatan: id_kegiatan
            },
            dataType: 'html',
            success: function(response) {
                $("#cari").show();
                $("#tambah_petugas").show();
                $("#posisi_p").show();
                $("#nama_p").show();
                $('#data_ptg').html(response);
                $("#tampil_petugas").hide();
            },
        })
    });


    $('#tambah_petugas').on('click', function() {
        var id_petugas = $('#id_petugas_p').val();
        var nama = $('#nama_p').val();
        var posisi = $('#posisi_p').val();
        var id_kegiatan = $('#id_kegiatan').val();
        if (nama != "" && posisi != "") {
            $.ajax({
                url: "../save_petugas",
                type: "POST",
                data: {
                    id_petugas: id_petugas,
                    nama: nama,
                    posisi: posisi,
                    id_kegiatan: id_kegiatan
                },
                dataType: 'html',
                success: function(response) {
                    $('#id_petugas_p').val("");
                    $('#nama_p').val("");
                    $('#posisi_p').val("");
                    $('#data_ptg').html(response);
                },
            })
        } else {
            alert('Anda harus mengisi data dengan lengkap !');
        }
        return false;
    });
</script>