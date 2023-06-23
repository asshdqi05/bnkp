<div class="card">
    <div class="card-header">
        <a class="btn btn-primary" href="<?= site_url('C_uang_masuk') ?>"><i class="fas fa-chevron-circle-left"></i> Kembali </a>
    </div>
    <form class="form-horizontal" method="POST" action="<?php echo site_url('C_uang_masuk/update_uang_masuk') ?>">
        <div class="modal-body">
            <div class="form-group">
                <label>Tanggal</label>
                <input type="date" name="tanggal" class="form-control" value="<?= $data_uang_masuk->tanggal ?>">
                <input type="hidden" name="id_uang_masuk" class="form-control" value="<?= $data_uang_masuk->id_uang_masuk ?>">
            </div>
            <div class="form-group">
                <label>Jumlah</label>
                <input type="number" name="jumlah" class="form-control" value="<?= $data_uang_masuk->jumlah ?>">
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <textarea name="keterangan" id="" cols="30" rows="5" class="form-control"><?= $data_uang_masuk->keterangan ?></textarea>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>SIMPAN</button>
        </div>
    </form>
</div>