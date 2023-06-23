<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard | BNKP</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="<?= base_url('assets/') ?>dist/img/bnkp.jpg">



    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>plugins/font-awesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>plugins/fontawesome-free/css/all.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>plugins/toastr/toastr.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
</head>
<?php
$d = $this->db->get_where('level_user', ['id' => $this->session->userdata('level')])->row();
$level = $d->nama_level;
?>

<body class="hold-transition text-sm sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-light navbar-danger">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto navbar-danger">
                <a href="<?= site_url('C_login/logout') ?>" class="btn btn-lg btn-dark"><i class="fas fa-sign-out-alt"></i> Logout </a>

                <!-- Messages Dropdown Menu -->

                <!-- Notifications Dropdown Menu -->

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar elevation-4 sidebar-light-danger">
            <!-- Brand Logo -->
            <a href="#" class="brand-link navbar-danger">
                <img src="<?= base_url('assets/') ?>/dist/img/bnkp.jpg" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-dark">BNKP</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?php echo base_url('assets/') ?>dist/img/default.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><b><?= $this->session->userdata('nama_user') ?></b></a>
                        <a href="#" class="d-block"><?= $level ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2 ">
                    <?php $this->load->view('template/V_menu', $menu); ?>
                </nav>
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1><?= $judul_halaman ?></h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <?php $this->load->view('_helper_flash_message'); ?>