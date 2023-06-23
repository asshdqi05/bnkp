<div class="col-md-12">
    <div class="card card-primary card-outline">
        <div class="card-header">
            <?php if ($this->session->userdata('level') == 4) { ?>
                <a href="<?= site_url('C_laporan') ?>" class="btn btn-primary btn-flat">
                    <span class="fas fa-arrow-circle-left"></span>
                    Kembali
                </a>
            <?php } else { ?>
                <a href="<?= site_url('C_laporan/laporan_keuangan') ?>" class="btn btn-primary btn-flat">
                    <span class="fas fa-arrow-circle-left"></span>
                    Kembali
                </a>
            <?php } ?>
        </div>

        <div class="invoice col-sm-12 p-3 mb-3">
            <!-- title row -->
            <div id="div1">
                <div class="row">
                    <div class="col-12">
                        <table>
                            <tr>
                                <td width=100>
                                    <img src="<?= base_url('assets') ?>/dist/img/bnkp.jpg" width="100" alt="">
                                </td>
                                <td width=750>
                                    <center>
                                        <h2>
                                            <p> BNKP Jemaat Padang</p>
                                        </h2>
                                        <p> LAPORAN DATA KAS</p>
                                    </center>
                                </td>
                                <td></td>
                            </tr>
                        </table>
                        <hr>
                        <center>
                            <b>
                            </b>
                        </center>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- info row -->

                <!-- <div class="row">
                    <div class="col-sm-2">
                        <div class="col-sm">
                            <p>TAHUN </p>
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <div class="col-sm">
                            <p>:</p>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="col-sm">
                            <strong>
                                <p><?= $tahun ?></>
                            </strong>
                        </div>
                    </div>
                </div> -->


                <div class="row">
                    <div class="col-12 table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>KAS :</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <th class="text-center">
                                        <h1><?= 'Rp. ' . number_format($uang_masuk - $uang_keluar) ?></h1>
                                    </th>
                                </tr>

                            </tbody>

                        </table>
                    </div>
                    <!-- /.col -->
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <div class="col-sm">
                            <center>
                                <br>
                                <br>
                                <p>Bendahara </p>
                                <br>
                                <br>
                                <br>
                                <p>(.........................)</p>
                            </center>
                        </div>
                    </div>
                    <div class="col-sm-8">
                    </div>
                    <div class="col-sm float-right">
                        <div class="col-sm">
                            <center>
                                <br>
                                <br>
                                <p>Pimpinan</p>
                                <br>
                                <br>
                                <br>
                                <p>(.........................)</p>
                            </center>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row no-print">
                <div class="col-sm-12">
                    <?php if ($this->session->userdata('level') == 4 || $this->session->userdata('level') == 2) { ?>
                        <button onclick="printContent('div1')" class="btn btn-primary float-right"><i class="fa fa-print"></i>Cetak</button>
                    <?php } ?>
                </div>

            </div>

        </div>
    </div>
</div>


<script>
    function printContent(el) {
        var restorepage = document.body.innerHTML;
        var printcontent = document.getElementById(el).innerHTML;
        document.body.innerHTML = printcontent;
        window.print();
        document.body.innerHTML = restorepage;
    }
</script>