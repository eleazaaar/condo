<script>
    $(() => {
        $('#reserve_schedule').on('click', (e) => {
            const _this = $(e.currentTarget);

            if (!"<?=$from?>" || !"<?=$to?>") {
                alert('Please select date schedule');
                return;
            }

            $('#schedule_detail_form').find('#unit_id').val(_this.data('id'));
            $('#schedule_detail_form').find('#from').val("<?=$from?>");
            $('#schedule_detail_form').find('#to').val("<?=$to?>");
            
            $('#schedule_detail_form').submit();

            // $.ajax({
            //         url: "<?= site_url('user/save_schedule') ?>",
            //         method: 'POST',
            //         dataType: 'JSON',
            //         data: {
            //             from: $('#from').val(),
            //             to: $('#to').val(),
            //             unit_id: _this.data('id'),
            //         }
            //     })
            //     .then(res => {
            //         Swal.fire({
            //             icon: res.icon,
            //             title: res.title,
            //             text: res.message
            //         })
            //     })
        });
    });
</script>