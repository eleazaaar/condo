<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Azure</title>
    <link href="<?= base_url() ?>/assets-all/img/logo.jpg" rel="icon">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url() ?>/assets-admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets-admin/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets-admin/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css'); ?>">
    <!-- Template Main CSS File -->
    <link href="<?= base_url() ?>/assets-admin/css/style.css" rel="stylesheet">
</head>

<body style="background: #37517e;">
    <div class="content">
        <div class="content-body">
            <div class="container col-lg-8 col-md-8 col-sm-12" style="height: 100vh;">
                <div class="h-100 d-flex align-items-center">
                    <div class="col-12">
                        <div class="row animate rounded shadow p-4" style="background-color: #FFF;">
                            <h1>VERIFY YOUR ACCOUNT</h1>
                            <p>Your auto-generated password has been sent to your email.</p>
                            <hr>
                            <form id="verify-user-form" method="POST">
                                <input type="hidden" name="email" value="<?= $this->session->userdata('email'); ?>">
                                <div class="form-group">
                                    <label for="password">Current Password</label>
                                    <input type="password" class="form-control" name="password" id="password">
                                </div>
                                <div class="form-group">
                                    <label for="new_password">New Password</label>
                                    <input type="password" class="form-control" name="new_password" id="new_password">
                                </div>
                                <div class="form-group">
                                    <label for="confirm_password">Confirm Password</label>
                                    <input type="password" class="form-control" name="confirm_password" id="confirm_password">
                                </div>
                                <div class="form-group my-2">
                                    <button type="submit" class="btn btn-success shadow">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<script src="<?= base_url() ?>/assets-admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
<script src="<?= base_url('assets/plugins/jquery-ui/jquery-ui.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/popper.min.js') ?>"></script>
<script src="<?= base_url('assets/js/sweetalert.js') ?>"></script>
<!-- Template Main JS File -->
<script src="<?= base_url() ?>/assets-admin/js/main.js"></script>

<script>
    $(document).ready(() => {
        $('#verify-user-form').on('submit', (e) => {
            e.preventDefault();

            const _this = $(e.currentTarget);

            Swal.showLoading();
            $.ajax({
                    url: "<?= site_url('auth_/verify_user') ?>",
                    dataType: 'JSON',
                    method: 'POST',
                    data: _this.serialize()
                })
                .then((res) => {
                    if (res.status == 200) {
                        window.location.replace(res.url);
                    } else {
                        Swal.fire({
                            icon: res.icon,
                            title: res.title,
                            html: res.message
                        });
                    }
                })
        });
    });
</script>