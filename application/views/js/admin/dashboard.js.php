<script>
    $(() => {
        $.ajax({
                url: "<?= site_url('admin_/get_recent_check_in_check_out') ?>",
                dataType: "JSON",
            })
            .then(response => {
                $('.recent-activity').html('');
                $.each(response.data, (i, d) => {
                    const color = d.status == 'Check-In' ? 'text-success' : 'text-danger';
                    const time_diff = d.day_diff == 0 ? (d.hour_diff == 0 ? d.minute_diff + ' mins ago' : d.hour_diff + ' hrs ago') : d.day_diff + ' days ago';
                    $('.recent-activity').append(`
                        <div class="activity-item d-flex">
                            <div class="activite-label">${time_diff}</div>
                            <i class='bi bi-circle-fill activity-badge ${color} align-self-start'></i>
                            <div class="activity-content">
                                ${d.unit_name} ${d.status}
                            </div>
                        </div><!-- End activity item-->
                    `);
                })
            })
            .fail((jqXHR) => {
                Swal.fire({
                    icon: 'error',
                    title: 'Error Occured',
                    html: jqXHR,
                });
            });

        $.ajax({
                url: "<?= site_url('admin_/get_no_book_today') ?>",
                dataType: "JSON",
            })
            .then(response => {
                $('#book_today').html(response.data.book_today);
            })
            .fail((jqXHR) => {
                Swal.fire({
                    icon: 'error',
                    title: 'Error Occured',
                    html: jqXHR,
                });
            });

        $.ajax({
                url: "<?= site_url('admin_/get_no_customer_per_year') ?>",
                dataType: "JSON",
            })
            .then(response => {
                $('#customer_no').html(response.data.customer_no);
            })
            .fail((jqXHR) => {
                Swal.fire({
                    icon: 'error',
                    title: 'Error Occured',
                    html: jqXHR,
                });
            });

        $.ajax({
                url: "<?= site_url('admin_/get_revenue_per_month') ?>",
                dataType: "JSON",
            })
            .then(response => {
                $('#revenue').html(response.data.revenue);
            })
            .fail((jqXHR) => {
                Swal.fire({
                    icon: 'error',
                    title: 'Error Occured',
                    html: jqXHR,
                });
            });

        const booking_tbl = new DataTable('#book-tbl', {
            scrollX: true,
            ajax: {
                url: "<?= site_url('admin_/ssp_recent_book'); ?>",
                method: 'POST'
            },
            order: [],
            processing: true,
            serverSide: true,
        });
    });
</script>