<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <a href="<?= site_url('C_kegiatan/add_kegiatan') ?>" class="btn btn-primary btn-flat">
                    <span class="fa fa-plus"></span>
                    Tambah Data
                </a>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <th class="text-center">No</th>
                        <th>Nama Kegiatan</th>
                        <th>Tanggal</th>
                        <th>Tata Ibadah</th>
                        <th class="text-center">Aksi</th>
                    </thead>

                    <tbody>
                        <?php $no = 1;
                        foreach ($data_kegiatan as $d) {
                        ?>
                            <tr>
                                <td width="50px" class="text-center"><?php echo $no . '.'; ?></td>
                                <td><?= $d->nama_kegiatan ?></td>
                                <td><?= $d->tanggal ?></td>
                                <td><?= $d->tata_ibadah ?></td>
                                <td class="text-center" width="100px">
                                    <a class="btn btn-xs btn-success" href="<?= site_url('C_kegiatan/edit_kegiatan/' . $d->id_kegiatan) ?>">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a class="btn btn-xs btn-danger" href="javascript:void(0)" onclick="hapus('<?= $d->id_kegiatan ?>','<?= $d->nama_kegiatan ?>')">
                                        <i class="fas fa-trash"></i>
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
    function hapus(id, nama) {
        $('#hid').val(id);
        $('#hnama').html(nama);
        $('#hapus_data').modal('show');
    }
</script>

<div class="modal fade" id="hapus_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <form method="POST" action="<?php echo site_url('C_kegiatan/delete_kegiatan') ?>">
                <div class="modal-body">
                    <input type="hidden" name="id" id="hid">
                    Anda yakin hapus data <strong><span id="hnama"></span></strong> ?
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-trash"></i> Hapus</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-close"></i>Close</button>
                </div>
            </form>
        </div>
    </div>
</div>