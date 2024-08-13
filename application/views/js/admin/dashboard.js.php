<script>
    $(() => {
        var calendrical = [];
        const update_calendar_book_list_by_year_month = (month, year) => {
            $.ajax({
                    url: "<?= site_url('admin_/get_book_list_by_year_month') ?>",
                    dataType: "JSON",
                    method: 'POST',
                    data: {
                        month: month,
                        year: year,
                    }
                })
                .then(response => {
                    if (response.status == 200) {
                        if (!calendrical.includes(`${year}-${month}`)) {
                            calendar.addEventSource(response.data);
                            calendrical.push(`${year}-${month}`);
                        }
                    } else {
                        console.error(response.message);
                    }
                })
                .fail((jqXHR) => {
                    console.log(jqXHR);
                });
        }

        var calendarEl = document.getElementById('calendar');

        const today = new Date();

        const c_year = today.getFullYear();
        const c_month = String(today.getMonth() + 1).padStart(2, '0'); // Months are zero-based
        const c_day = String(today.getDate()).padStart(2, '0');

        const formattedDate = `${c_year}-${c_month}-${c_day}`;

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            initialDate: formattedDate,
            eventColor: 'green',
            eventDidMount: function(info) {
                $(info.el).tooltip({
                    title: info.event.extendedProps.description,
                    placement: 'top',
                    trigger: 'hover',
                    container: 'body'
                });
            },
            events: update_calendar_book_list_by_year_month(c_month, c_year)
        });

        calendar.render();

        // Add click event for the 'prev' button
        $(document).on('click', '.fc-prev-button', function() {
            var date = calendar.getDate();
            var month = date.getMonth() + 1; // 0-based month, so +1
            var year = date.getFullYear();

            update_calendar_book_list_by_year_month(month, year);
        });

        // Add click event for the 'next' button
        $(document).on('click', '.fc-next-button', function() {
            var date = calendar.getDate();
            var month = date.getMonth() + 1; // 0-based month, so +1
            var year = date.getFullYear();

            update_calendar_book_list_by_year_month(month, year);
        });

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