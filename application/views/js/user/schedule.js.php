<script>
    $(() => {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            selectable: true,
            headerToolbar: {
                left: 'prev,next',
                center: 'title',
                right: 'today'
            },
            // height:600,
            contentHeight: 300,
            select: function(info) {
                $('#from').val(info.startStr);
                $('#to').val(info.endStr);
            }
        });

        calendar.render();
    });
</script>