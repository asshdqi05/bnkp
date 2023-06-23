<div class="card">
    <div class="card-header">
        <a class="btn btn-primary" href="<?= site_url('C_kegiatan') ?>"><i class="fas fa-chevron-circle-left"></i> Kembali </a>
    </div>
    <form class="form-horizontal" method="POST" action="<?php echo site_url('C_kegiatan/save_kegiatan') ?>">
        <div class="modal-body">
            <div class="form-group">
                <label>Nama kegiatan</label>
                <input type="text" name="nama_kegiatan" class="form-control">
            </div>
            <div class="form-group">
                <label>Tanggal Kegiatan</label>
                <input type="date" name="tanggal" class="form-control">
            </div>
            <div class="form-group">
                <label>Waktu Kegiatan</label>
                <input type="text" name="waktu" class="form-control">
            </div>
            <div class="form-group">
                <label>Tata Ibadah</label>
                <textarea name="tata_ibadah" id="" cols="30" rows="3" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label>Daftar Petugas</label>
                <br>
                <button type="button" data-toggle="modal" data-target="#cari_petugas" class="btn btn-warning">Cari Petugas</button>
                <br>
                <br>
                <div class="row form-group">
                    <div class="col-sm-5">
                        <input type="text" id="nama" placeholder="Nama Petugas" readonly class="form-control">
                        <input type="hidden" id="id_petugas" readonly class="form-control">
                    </div>
                    <div class="col-sm-5">
                        <input type="text" id="posisi" placeholder="Posisi" readonly class="form-control">
                    </div>
                    <button type="button" id="tambah" class="btn btn-warning">Tambah</button>
                </div>
                <div class="col-lg-12 col-md-10 form-group">
                    <div id="data_petugas">
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>SIMPAN</button>
        </div>
    </form>
</div>

<script>
    function pilih(id, nama, posisi) {
        $('#id_petugas').val(id);
        $('#nama').val(nama);
        $('#posisi').val(posisi);
        $('#cari_petugas').modal('hide');
    }
</script>

<div class="modal fade" id="cari_petugas">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Petugas</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Posisi</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        foreach ($data_petugas as $d) :
                            $no++; ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?= $d->nama_anggota ?></td>
                                <td><?= $d->posisi ?></td>
                                <td><?= $d->tanggal ?></td>
                                <td>
                                    <button type="button" class="btn btn-primary" onclick="return pilih('<?= $d->id_petugas ?>','<?= $d->nama_anggota ?>','<?= $d->posisi ?>')">
                                        Pilih
                                    </button>
                                </td>
                            </tr>
                        <?php
                        endforeach;
                        ?>
                    </tbody>
                </table>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>