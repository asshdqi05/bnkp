<div class="container">
    <div class="card">
        <div class="card-header bg-danger">
            <h3 class="card-title">Laporan</h3>
        </div>
        <div class="card-body">
            <div class="row no-gutters">

                <div class="col-md-3">
                    <form method="POST" action="<?php echo site_url('C_laporan/laporan_uang_masuk') ?>">
                        <table>
                            <tr>
                                <div class="col-md">
                                    <div class="card card-solid">
                                        <div class="card-header bg-danger">
                                            <div class="card-title">Laporan Uang Masuk</div>
                                        </div>
                                        <div class="card-body">
                                            <div>
                                                <div class="form-group">
                                                    <label>Tanggal Awal</label>
                                                    <input type="date" required class="form-control" name="tgl_awal">
                                                </div>
                                                <div class="form-group">
                                                    <label>Tanggal Akhir</label>
                                                    <input type="date" required class="form-control" name="tgl_akhir">
                                                </div>
                                            </div>
                                            <br>
                                            <div class="col-xs">
                                                <button type="submit" class="btn btn-block btn-dark"><i class="fa fa-print"></i> Cetak</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                        </table>
                    </form>
                </div>

                <div class="col-md-3">
                    <form method="POST" action="<?php echo site_url('C_laporan/laporan_uang_keluar') ?>">
                        <table>
                            <tr>
                                <div class="col-md">
                                    <div class="card card-solid">
                                        <div class="card-header bg-danger">
                                            <div class="card-title">Laporan Uang Keluar</div>
                                        </div>
                                        <div class="card-body">
                                            <div>
                                                <div class="form-group">
                                                    <label>Tanggal Awal</label>
                                                    <input type="date" required class="form-control" name="tgl_awal">
                                                </div>
                                                <div class="form-group">
                                                    <label>Tanggal Akhir</label>
                                                    <input type="date" required class="form-control" name="tgl_akhir">
                                                </div>
                                            </div>
                                            <br>
                                            <div class="col-xs">
                                                <button type="submit" class="btn btn-block btn-dark"><i class="fa fa-print"></i> Cetak</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                        </table>
                    </form>
                </div>

                <div class="col-md-3">
                    <form method="POST" action="<?php echo site_url('C_laporan/laporan_kas_perbulan') ?>">
                        <div class="col-md">
                            <div class="card card-solid">
                                <div class="card-header bg-danger">
                                    <div class="card-title">Laporan Kas Perbulan</div>
                                </div>
                                <div class="card-body">
                                    <div>
                                        <select class="chosen-select form-control" name="bulan">
                                            <option disabled="" selected="">Pilih Bulan</option>
                                            <option value="1">Januari</option>
                                            <option value="2">Februari</option>
                                            <option value="3">Maret</option>
                                            <option value="4">April</option>
                                            <option value="5">Mei</option>
                                            <option value="6">Juni</option>
                                            <option value="7">Juli</option>
                                            <option value="8">Agustus</option>
                                            <option value="9">September</option>
                                            <option value="10">Oktober</option>
                                            <option value="11">November</option>
                                            <option value="12">Desember</option>
                                        </select>
                                    </div>
                                    <div class=""></div>
                                    <br>
                                    <div>
                                        <select class="chosen-select form-control" name="tahun">
                                            <option disabled selected>Pilih Tahun</option>
                                            <?php
                                            $now = date('Y');
                                            for ($a = 2000; $a <= $now; $a++) {
                                                echo "<option value='$a'>$a</option>";
                                            } ?>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="col-xs">
                                        <button type="submit" class="btn btn-block btn-dark"><i class="fa fa-print"></i> Cetak</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table>
                            <tbody>
                                <tr>

                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>

                <div class="col-md-3">
                    <form method="POST" action="<?php echo site_url('C_laporan/laporan_kas_pertahun') ?>">
                        <div class="col-md">
                            <div class="card card-solid">
                                <div class="card-header bg-danger">
                                    <div class="card-title">Laporan Kas Pertahun</div>
                                </div>
                                <div class="card-body">
                                    <div>
                                        <select class="chosen-select form-control" name="tahun">
                                            <option disabled selected>Pilih Tahun</option>
                                            <?php
                                            $now = date('Y');
                                            for ($a = 2000; $a <= $now; $a++) {
                                                echo "<option value='$a'>$a</option>";
                                            } ?>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="col-xs">
                                        <button type="submit" class="btn btn-block btn-dark"><i class="fa fa-print"></i> Cetak</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table>
                            <tbody>
                                <tr>

                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>

                <div class="col-md-3">
                    <form method="POST" action="<?php echo site_url('C_laporan/laporan_kas') ?>">
                        <table>
                            <tr>
                                <div class="col-md">
                                    <div class="card card-solid">
                                        <div class="card-header bg-danger">
                                            <div class="card-title">Laporan Kas</div>
                                        </div>
                                        <div class="card-body">
                                            <div class="col-xs">
                                                <button type="submit" class="btn btn-block btn-dark"><i class="fa fa-print"></i> Cetak</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                        </table>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>