<div class="card">
    <div class="card-header">
        <a class="btn btn-primary" href="<?= site_url('C_petugas') ?>"><i class="fas fa-chevron-circle-left"></i> Kembali </a>
    </div>
    <form class="form-horizontal" method="POST" action="<?php echo site_url('C_petugas/update_petugas') ?>">
        <div class="modal-body">
            <div class="form-group">
                <label>Nama Anggota</label>
                <select name="id_anggota" class="form-control" value="<?= $data_petugas->id_anggota ?>">
                    <option disabled>PILIH</option>
                    <?php
                    $petugas =  $this->db->get_where('anggota', ['status' => "Aktif"])->result();
                    foreach ($petugas as $d) : ?>
                        <option value="<?= $d->id_anggota ?>"><?= $d->nama_anggota ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-group">
                <label>Tanggal</label>
                <input type="date" name="tanggal" class="form-control" value="<?= $data_petugas->tanggal ?>">
                <input type="hidden" name="id_petugas" class="form-control" value="<?= $data_petugas->id_petugas ?>">
            </div>
            <div class="form-group">
                <label>Posisi</label>
                <select name="posisi" class="form-control" value="<?= $data_petugas->posisi ?>">
                    <option disabled>PILIH</option>
                    <option value="Pemusik">Pemusik</option>
                    <option value="Persembahan">Persembahan</option>
                    <option value="Liturgos">Liturgos</option>
                    <option value="Pelayan">Pelayan</option>
                </select>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>SIMPAN</button>
        </div>
    </form>
</div>