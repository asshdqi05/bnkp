<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the . class with font-awesome or any other icon font library -->
    <?php $level = $this->session->userdata('level') ?>

    <li class="nav-item">
        <a href="<?= site_url('C_admin/index') ?>" class="nav-link <?php if (isset($mn_dashboard)) echo $mn_dashboard ?>">
            <i class="nav-icon fas fa-home"></i>
            <p>
                Home
            </p>
        </a>
    </li>

    <?php if ($level == 1) { ?>
        <li class="nav-item">
            <a href="<?= site_url('C_anggota') ?>" class="nav-link <?php if (isset($mn_anggota)) echo $mn_anggota ?>">
                <i class="nav-icon fas fa-user"></i>
                <p>
                    Data Anggota
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= site_url('C_konfirmasi') ?>" class="nav-link <?php if (isset($mn_konfirmasi)) echo $mn_konfirmasi ?>">
                <i class="nav-icon fas fa-check"></i>
                <p>
                    Konfirmasi Anggota
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= site_url('C_admin/user') ?>" class="nav-link <?php if (isset($mn_user)) echo $mn_user ?>">
                <i class="nav-icon fas fa-users"></i>
                <p>
                    Data User
                </p>
            </a>
        </li>

    <?php } else if ($level == 2) { ?>
        <li class="nav-item">
            <a href="<?= site_url('C_uang_masuk') ?>" class="nav-link <?php if (isset($mn_uang_masuk)) echo $mn_uang_masuk ?>">
                <i class="nav-icon fas fa-money-bill-wave"></i>
                <p>
                    Data Uang Masuk
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= site_url('C_uang_keluar') ?>" class="nav-link <?php if (isset($mn_uang_keluar)) echo $mn_uang_keluar ?>">
                <i class="nav-icon fas fa-money-bill-wave-alt"></i>
                <p>
                    Data Data Uang Keluar
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="<?= site_url('C_laporan/laporan_keuangan') ?>" class="nav-link <?php if (isset($mn_laporan_keuangan)) echo $mn_laporan_keuangan ?>">
                <i class="nav-icon fas fa-file"></i>
                <p>
                    Laporan Keuangan
                </p>
            </a>
        </li>

    <?php } else if ($level == 3) { ?>
        <li class="nav-item">
            <a href="<?= site_url('C_anggota') ?>" class="nav-link <?php if (isset($mn_anggota)) echo $mn_anggota ?>">
                <i class="nav-icon fas fa-user"></i>
                <p>
                    Data Anggota
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= site_url('C_konfirmasi') ?>" class="nav-link <?php if (isset($mn_konfirmasi)) echo $mn_konfirmasi ?>">
                <i class="nav-icon fas fa-check"></i>
                <p>
                    Konfirmasi Anggota
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= site_url('C_petugas') ?>" class="nav-link <?php if (isset($mn_petugas)) echo $mn_petugas ?>">
                <i class="nav-icon fas fa-male"></i>
                <p>
                    Data Petugas
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= site_url('C_kegiatan') ?>" class="nav-link <?php if (isset($mn_kegiatan)) echo $mn_kegiatan ?>">
                <i class="nav-icon fas fa-tasks"></i>
                <p>
                    Data Kegiatan
                </p>
            </a>
        </li>

    <?php } else if ($level == 4) { ?>
        <li class="nav-item">
            <a href="<?= site_url('C_laporan') ?>" class="nav-link <?php if (isset($mn_laporan)) echo $mn_laporan ?>">
                <i class="nav-icon fas fa-file"></i>
                <p>
                    Laporan
                </p>
            </a>
        </li>

    <?php } else if ($level == 5) { ?>
        <li class="nav-item">
            <a href="<?= site_url('C_laporan/laporan_keuangan') ?>" class="nav-link <?php if (isset($mn_laporan_keuangan)) echo $mn_laporan_keuangan ?>">
                <i class="nav-icon fas fa-file"></i>
                <p>
                    Laporan Keuangan
                </p>
            </a>
        </li>
    <?php } ?>
</ul>