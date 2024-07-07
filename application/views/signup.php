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
                                <input type="text" placeholder="Enter Name" name="fname" required>
                            </div>
                            <div class="col-4">
                                <label for="mname"><b>Middle Name</b></label>
                                <input type="text" placeholder="Enter Name" name="mname" required>
                            </div>
                            <div class="col-4">
                                <label for="lname"><b>Last Name</b></label>
                                <input type="text" placeholder="Enter Name" name="lname" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-8">
                                <label for="email"><b>Email</b></label>
                                <input type="text" placeholder="Enter Email" name="email" required>
                            </div>
                            
                            <div class="col-4">
                                <label for="mobile"><b>Mobile Number</b></label>
                                <input type="text" placeholder="Enter Mobile" name="mobile" required>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-12">
                                <label for="psw"><b>Password</b></label>
                                <input type="password" placeholder="Enter Password" name="psw" required>
                            </div>
                        </div>

                        <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

                        <div class="clearfix">
                            <button type="button" class="cancelbtn">Cancel</button>
                            <button type="submit" class="signupbtn">Sign Up</button>
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