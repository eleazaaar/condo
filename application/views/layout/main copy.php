<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title . ' | Civil Registry Department' ?></title>
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/img/crd-40x40.ico'); ?>">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css'); ?>">
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abril+Fatface">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alef"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url("assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css"); ?>">
    
    <link rel="stylesheet" href="<?= base_url('assets/plugins/select2/css/select2.min.css'); ?>">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css'); ?>">

    <link rel="stylesheet" href="<?= base_url('assets/css/styles.css'); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/css/adminlte.min.css'); ?>">

    <script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/jquery-ui/jquery-ui.min.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/inputmask/jquery.inputmask.js'); ?>"></script>
    <script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/popper.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/sweetalert.js') ?>"></script>
    
    <script src="<?= base_url('assets/plugins/select2/js/select2.min.js') ?>"></script>
    <!-- DataTables  & Plugins -->
    <script src="<?= base_url('assets/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/jszip/jszip.min.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/pdfmake/pdfmake.min.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/pdfmake/vfs_fonts.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/datatables-buttons/js/buttons.html5.min.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/datatables-buttons/js/buttons.print.min.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/datatables-buttons/js/buttons.colVis.min.js'); ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/js/adminlte.min.js'); ?>"></script>
    <script>
        const site_url = "<?= site_url('/');?>";
        const Toast = Swal.mixin({
            allowOutsideClick: false,
        });
    </script>
</head>

<body class="hold-transition sidebar-mini sidebar-collapse">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fa fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link url-redirect" data-url="<?= $this->encryption->encrypt('admin/dashboard') ?>" data-title="Dashboard">
                <img src="<?= base_url('assets/img/crd_logo.png'); ?>" alt="CRD Logo" class="brand-image img-circle elevation-3">
                <span class="brand-text font-weight-light">C R D</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <div class="elevation-3 p-1 c-bg-secondary" style="width:33px;height:33px;border-radius:100%;text-align: center;">
                            <p><?php
                                $name = $this->session->userdata('userfullname') ?? '';
                                if (!empty($name)) {
                                    $name = explode(' ', $name);
                                    $initial = $name[0][0] ?? '';
                                    $initial .= $name[1][0] ?? '';
                                    echo $initial;
                                } else {
                                    echo 'G';
                                }
                                ?></p>
                        </div>
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?= $this->session->userdata('userfullname'); ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item url-redirect" data-url="<?= $this->encryption->encrypt('admin/dashboard') ?>" data-title="Transaction">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-home"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item url-redirect" data-url="<?= $this->encryption->encrypt('admin/transaction') ?>" data-title="Transaction">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-receipt"></i>
                                <p>Transaction</p>
                            </a>
                        </li>
                        <?php
                        if ($this->auth->is_admin()) :
                            ?>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-cogs"></i>
                                    <p>
                                        Configuration
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item url-redirect" data-url="<?= $this->encryption->encrypt('admin/users') ?>" data-title="Users">
                                        <a href="#" class="nav-link">
                                            <i class="nav-icon fas fa-users"></i>
                                            <p>Users</p>
                                        </a>
                                    </li>
                                    <li class="nav-item url-redirect" data-url="<?= $this->encryption->encrypt('admin/relationship') ?>" data-title="Relationship">
                                        <a href="#" class="nav-link">
                                            <i class="nav-icon fas fa-praying-hands"></i>
                                            <p>Relationship</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>
                        <?php if ($this->auth->is_login()) : ?>
                            <li class="nav-item" id="logout">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-sign-out-alt"></i>
                                    <p>Logout</p>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
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
                            <h1><?= $title ?? ''; ?></h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid" id='app'>
                    <?php
                    $this->load->view($url);
                    ?>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer text-center">
            <img src="<?= base_url('assets/img/it_logo.webp'); ?>" alt="IT LOGO - xed" class="my-4" style="height:10svh;">
            <strong>Copyright &copy; 2024 City of Caloocan - ITDO</strong> All rights reserved.
        </footer>
        <form action="<?= site_url('auth_/logout'); ?>" id="form-logout" method="POST" hidden></form>
        <form action="<?= site_url('app'); ?>" id="form-url" method="POST" hidden>
            <input type="hidden" name="url">
            <input type="hidden" name="title">
        </form>
    </div>
    <!-- ./wrapper -->
    <script>
        $(document).ready(() => {
            $('.url-redirect').click((e) => {
                var data_url = $(e.currentTarget).data('url');
                var data_title = $(e.currentTarget).data('title');
                $('#form-url').find('input[name="url"]').val(data_url);
                $('#form-url').find('input[name="title"]').val(data_title);
                $('#form-url').submit();
            });
            $('#logout').on('click', (e) => {
                $('#form-logout').submit();
            });
        })
    </script>
</body>

</html>