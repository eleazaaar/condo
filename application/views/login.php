<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Azure</title>
    <link href="<?=base_url()?>/assets-all/img/logo.jpg" rel="icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/login.css">
</head>
<body>
    <div class="content">
        <div class="content-body">
            <div class="container">
                <form class="modal-content animate" action="<?= site_url('Page/admin') ?>" method="post">
                    <div class="container-content" style="background: #FFF;">
                        <div class="imgcontainer">
                            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                            <img src="<?=base_url('assets-all/img/avatar.png')?>" alt="Avatar" class="avatar" style="width: 25%">
                        </div>
        
                        <div class="container">
                            <label for="email"><b>Email</b></label>
                            <input type="text" placeholder="Enter Email" name="email" required>
            
                            <label for="password"><b>Password</b></label>
                            <input type="password" placeholder="Enter Password" name="password" required>
                                
                            <button type="submit">Login</button>
                        </div>
        
                        <div class="container" style="background-color:#f1f1f1">
                            <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                            <span class="psw"><a href="#">Forgot password?</a></span>
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