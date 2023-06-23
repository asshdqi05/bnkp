<div class="row">
    <div class="col-sm-12">
        <div class="card">

            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <th class="text-center">No</th>
                        <th>Nama</th>
                        <th>No Telepon</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Email</th>
                        <th class="text-center">Aksi</th>
                    </thead>

                    <tbody>
                        <?php $no = 1;
                        foreach ($data_anggota as $d) {
                        ?>
                            <tr>
                                <td width="50px" class="text-center"><?php echo $no . '.'; ?></td>
                                <td><?= $d->nama_anggota ?></td>
                                <td><?= $d->no_telepon ?></td>
                                <td><?= $d->jenis_kelamin ?></td>
                                <td><?= $d->alamat ?></td>
                                <td><?= $d->email ?></td>
                                <td class="text-center" width="100px">
                                    <a class="btn btn-xs btn-success" href="javascript:void(0)" onclick="konfirmasi(
                                    '<?= $d->id_anggota ?>',
                                    '<?= $d->nama_anggota ?>',
                                    '<?= $d->no_telepon ?>',
                                    '<?= $d->jenis_kelamin ?>',
                                    '<?= $d->alamat ?>',
                                    '<?= $d->email ?>'
                                    )">
                                        <i class="fas fa-check"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php $no++;
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    function konfirmasi(id, nama, telp, jk, alamat, email) {
        $('#hid').val(id);
        $('#nama').val(nama);
        $('#telp').val(telp);
        $('#jk').val(jk);
        $('#alamat').val(alamat);
        $('#email').val(email);
        $('#konfirmasi_data').modal('show');
    }
</script>

<div class="modal fade" id="konfirmasi_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Anggota</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <form method="POST" action="<?php echo site_url('C_konfirmasi/konfirmasi_anggota') ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Anggota</label>
                        <input type="hidden" name="id" id="hid" class="form-control">
                        <input type="text" name="nama" id="nama" readonly class="form-control">
                    </div>
                    <div class="form-group">
                        <label>No telepon</label>
                        <input type="number" name="no_telepon" id="telp" readonly class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <input type="text" name="jk" id="jk" readonly class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="5" readonly></textarea>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" id="email" readonly class="form-control">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Konfirmasi</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-close"></i>Close</button>
                </div>
            </form>
        </div>
    </div>
</div>