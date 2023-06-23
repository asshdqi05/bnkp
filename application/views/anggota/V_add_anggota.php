<div class="card">
    <div class="card-header">
        <a class="btn btn-primary" href="<?= site_url('C_anggota') ?>"><i class="fas fa-chevron-circle-left"></i> Kembali </a>
    </div>
    <form class="form-horizontal" method="POST" action="<?php echo site_url('C_anggota/save_anggota') ?>">
        <div class="modal-body">
            <div class="form-group">
                <label>Nama Anggota</label>
                <input type="text" name="nama" class="form-control">
            </div>
            <div class="form-group">
                <label>No telepon</label>
                <input type="number" name="no_telepon" class="form-control">
            </div>
            <div class="form-group">
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control">
                    <option disabled selected>PILIH</option>
                    <option value="Laki - laki">Laki - laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat" id="" cols="30" rows="5" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control">
            </div>
            <hr>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
            </div>

        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>SIMPAN</button>
        </div>
    </form>
</div>