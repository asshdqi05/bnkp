<div class="card">
    <div class="card-header">
        <a class="btn btn-primary" href="<?= site_url('C_admin/user') ?>"><i class="fas fa-chevron-circle-left"></i> Kembali </a>
    </div>
    <form class="form-horizontal" method="POST" action="<?php echo site_url('C_admin/update_user') ?>">
        <div class="modal-body">
            <div class="form-group">
                <label>Nama User</label>
                <input type="hidden" name="id_user" class="form-control" value="<?= $data_user->id_user ?>">
                <input type="text" name="nama" class="form-control" value="<?= $data_user->nama_user ?>">
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?= $data_user->username ?>">
            </div>
            <div class="form-group">
                <label>Password(Masukan Jika ingin mengganti password.)</label>
                <input type="password" name="password" class="form-control">
                <input type="hidden" name="old_password" class="form-control" value="<?= $data_user->password ?>">
            </div>
            <div class="form-group">
                <label>Level</label>
                <select name="level" class="form-control" value="<?= $data_user->level ?>">
                    <option disabled>PILIH</option>
                    <?php
                    $user = $this->db->get('level_user')->result();
                    foreach ($user as $d) : ?>
                        <option value="<?= $d->id ?>"><?= $d->nama_level ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>SIMPAN</button>
        </div>
    </form>
</div>