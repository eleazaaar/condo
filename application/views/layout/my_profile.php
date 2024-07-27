<section class="section">
    <div class="card info-card">
        <div class="card-body">
            <h5 class="card-title">Your Information</h5>
            <form id="my_information" method="post">
                <div class="row form-group">
                    <div class="col-4">
                        <label for="fname">First name</label>
                        <input type="text" class="form-control" id="fname" name="fname" value="<?=$datas['fname'] ?? $datas['fname']?>">
                    </div>
                    <div class="col-4">
                        <label for="mname">Middle name</label>
                        <input type="text" class="form-control" id="mname" name="mname" value="<?=$datas['lname'] ?? $datas['lname']?>">
                    </div>
                    <div class="col-4">
                        <label for="lname">Last name</label>
                        <input type="text" class="form-control" id="lname" name="lname" value="<?=$datas['lname'] ?? $datas['lname']?>">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-8">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="<?=$datas['email'] ?? $datas['email']?>">
                    </div>
                    <div class="col-4">
                        <label for="contact_number">Mobile Number</label>
                        <input type="text" class="form-control" id="contact_number" name="contact_number" value="<?=$datas['contact_number'] ?? $datas['contact_number']?>">
                    </div>
                </div>

                <div class="password_div" style="display: none">
                    <div class="row form-group">
                        <div class="col-4">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" value="">
                        </div>
                    </div>

                    <div class="row form-group"> 
                        <div class="col-4">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" value="">
                        </div>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-3">
                        <button type="button" class="btn btn-primary" id="change_password" style="width:100%">Change Password</button>
                        <button type="button" class="btn btn-danger" id="cancel_change_password" style="width:100%; display: none">Cancel</button>
                    </div>
                    <div class="col-6"></div>
                    <div class="col-3">
                        <button type="submit" class="btn btn-success" id="save_profile" style="width:100%">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>