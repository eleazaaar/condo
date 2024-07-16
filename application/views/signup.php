<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Azure</title>
    <link href="<?= base_url() ?>/assets-all/img/logo.jpg" rel="icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/signup.css">
</head>

<body>
    <div class="content">
        <div class="content-body">
            <div class="row m-auto" style="width: 80vw;">
                <form class="modal-content animate" id="signup-form" style="border:1px solid #ccc;">
                    <div class="container-content" style="background: #FFF;">
                        <h1>Sign Up</h1>
                        <p>Please fill in this form to create an account.</p>
                        <hr>

                        <div class="row">
                            <div class="col-4">
                                <label for="fname"><b>First Name</b></label>
                                <input type="text" name="fname" required>
                            </div>
                            <div class="col-4">
                                <label for="mname"><b>Middle Name</b></label>
                                <input type="text" name="mname" required>
                            </div>
                            <div class="col-4">
                                <label for="lname"><b>Last Name</b></label>
                                <input type="text" name="lname" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-8">
                                <label for="email"><b>Email</b></label>
                                <input type="text" name="email" required>
                            </div>

                            <div class="col-4">
                                <label for="contact_no"><b>Mobile Number</b></label>
                                <input type="text" placeholder="Enter Mobile" name="contact_no" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <label for="password"><b>Password</b></label>
                                <input type="password" placeholder="Enter Password" name="password" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="password_confirm"><b>Confirm Password</b></label>
                            <input type="password" placeholder="Enter Password" name="password_confirm" required>
                        </div>

                        <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

                        <div class="row col-12">
                            <div class="col-6">
                                <a class="btn btn-danger btn-block" href="<?= site_url('Page/login') ?>">Cancel</a>
                            </div>
                            <div class="col-6">
                                <input type="submit" class="btn btn-success btn-block" value="Sign Up">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>

<script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
<script src="<?= base_url('assets/plugins/jquery-ui/jquery-ui.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/sweetalert.js') ?>"></script>

<script>
    $(document).ready(() => {
        $('#signup-form').on('submit', (e) => {
            e.preventDefault();

            const _this = $(e.currentTarget);
            $.ajax({
                    url: "<?= site_url('auth_/sign_up') ?>",
                    dataType: 'JSON',
                    method: 'POST',
                    data: _this.serialize()
                })
                .then((res) => {
                    Swal.fire({
                            icon: res.icon,
                            title: res.title,
                            html: res.message
                        })
                        .then((r) => {
                            if (res.status == 200) {
                                window.location.replace("<?= site_url('page/login') ?>");
                            }
                        });
                })
        })
    });
</script>