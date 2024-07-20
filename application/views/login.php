<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Azure</title>
    <link href="<?=base_url()?>/assets-all/img/logo.jpg" rel="icon">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

</head>

<body style="background: #37517e;">
    <div class="content">
        <div class="content-body">
            <div class="container">
                <form class="animate" id="login-form" method="post">
                    <div class="container" style="background: #FFF; width: 50%;">
                        <div class="imgcontainer">
                            <img src="<?= base_url('assets-all/img/avatar.png') ?>" alt="Avatar" class="avatar" style="width: 25%">
                        </div>

                        <div class="container">
                            <label for="email"><b>Email</b></label>
                            <input type="text" placeholder="Enter Email" name="email" required>

                            <label for="password"><b>Password</b></label>
                            <input type="password" placeholder="Enter Password" name="password" required>

                            <button type="submit">Login</button>
                        </div>

                        <div class="container" style="background-color:#f1f1f1">
                            <a class="btn btn-danger btn-block" href="<?= site_url('') ?>" style="width: 25%">Cancel</a>
                            <span class="psw">
                                <a href="#" data-toggle="modal" data-target="#forgotPasswordModal">Forgot password?</a> | <a href="<?=site_url('signup')?>">Create new Account</a>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<div class="modal fade" id="forgotPasswordModal" aria-labelledby="forgotPasswordModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="forgotPasswordModalLabel">Recover Account</h5>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" id="id">
                <div class="form-group">
                    <label for="recover_email">Email</label>
                    <input type="text" class="form-control" id="recover_email">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>

<script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
<script src="<?= base_url('assets/plugins/jquery-ui/jquery-ui.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/sweetalert.js') ?>"></script>

<script>
    $(document).ready(() => {
        $('#login-form').on('submit', (e) => {
            e.preventDefault();

            const _this = $(e.currentTarget);
            $.ajax({
                    url: "<?= site_url('auth_/sign_in') ?>",
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
                        })
                    }
                })
        })
    });
</script>