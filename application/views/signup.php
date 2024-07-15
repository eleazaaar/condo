<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Azure</title>
    <link href="<?=base_url()?>/assets-all/img/logo.jpg" rel="icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/signup.css">
</head>
<body>
    <div class="content">
        <div class="content-body">
            <div class="container">
                <form class="modal-content animate" action="<?= site_url('Page/login') ?>" style="border:1px solid #ccc;">
                    <div class="container-content" style="background: #FFF;">
                        <h1>Sign Up</h1>
                        <p>Please fill in this form to create an account.</p> <hr>

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
                                <label for="mobile"><b>Mobile Number</b></label>
                                <input type="text" name="mobile" required>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-12">
                                <label for="password"><b>Password</b></label>
                                <input type="password" name="password" required>
                            </div>
                        </div>

                        <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

                        <div class="clearfix" align="center">
                            <a class="btn btn-danger" href="<?=site_url('Page/login')?>" style="width: 49%">Cancel</a>
                            <a class="btn btn-success" id="signup" style="width: 49%">Sign Up</a>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(function() {
        var loader = '<div class="loader"><svg viewBox="0 0 140 140" width="140" height="140"><g class="outline"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="rgba(0,0,0,0.1)" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round"></path></g><g class="circle"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="#71BBFF" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-dashoffset="200" stroke-dasharray="300"></path></g></svg></div>';

        $("#signup").click(function() {
            data = {
                fname: $("input[name='fname']").val(),
                mname: $("input[name='mname']").val(),
                lname: $("input[name='lname']").val(),
                email: $("input[name='email']").val(),
                mobile: $("input[name='mobile']").val(),
                password: $("input[name='password']").val()
            }
            $.ajax({
                url: "<?= site_url('Authentication/signUp') ?>",
                type: "POST",
                dataType: "JSON",
                data: {data: data},
                beforeSend: function () {
                    Swal.showLoading();
                },
                success: function(response) {
                    Swal.fire({
                        icon: response.icon,
                        title: response.title,
                        html: response.html
                    }).then(() => {
                        if (response.code) {
                            window.location = "<?= site_url('Page/login') ?>";
                        }
                    })
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error Occured',
                        html: textStatus,
                    });
                }
            })
        })
    })
</script>