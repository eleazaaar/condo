<script>
    $(() => {
        $('#change_password').on('click', function(e) {
            $(".password_div").show();
            $("#cancel_change_password").show();
            $("#change_password").hide();
        });

        $('#cancel_change_password').on('click', function(e) {
            $(".password_div").hide();
            $("#cancel_change_password").hide();
            $("#change_password").show();

            $("#password").val('');
            $("#confirm_password").val('');
        });

        $('#my_information').on('submit', e => {
            e.preventDefault();

            var site = "<?= $this->session->userdata('userlevel') == "1" ? site_url('app/update_profile') : site_url('user/update_profile') ?>";

            $.ajax({
                url: site,
                type: "POST",
                dataType: "JSON",
                data: $(e.currentTarget).serialize(),
                beforeSend: function() {
                    Swal.showLoading();
                },
                success: function(data) {
                    Swal.fire({
                        icon: data.icon,
                        title: data.title,
                        html: data.message,
                    })
                }
            });
        });
    });
</script>