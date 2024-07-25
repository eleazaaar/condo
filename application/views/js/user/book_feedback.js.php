<script>
    $(() => {
        $.ajax({
                url: '<?= site_url('user/get_checkout_book') ?>',
                method: 'POST',
                dataType: 'JSON',
                beforeSend: function() {
                    $("#unit-container").html('<div class="text-center"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div>');
                },
            })
            .then(res => {

            })
    });
</script>