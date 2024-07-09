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

                $.ajax({
                    url: "<?= site_url('user/get_available_units')?>",
                    method: 'POST',
                    dataType:'JSON',
                    data:{
                        from: info.startStr,
                        to:info.endStr
                    }
                })
                .then(response => {
                    $('#units-container').html('');

                    $.each(response,(i,r)=>{
                        $('#units-container').append(`
                            <div class="col-xl-4 col-md-6 col-sm-12 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title"><a href="#" class="">${r['name']}</a></h4>
                                        <div class="service-item position-relative">
                                            <img src="http://localhost/condo//assets-all/img/LOBBY LOUNGE.jpg" class="img-fluid">
                                            <p>${r['description']}</p>
                                            <p>${r['remarks']}</p>
                                            <div class="row col-12">
                                                <div class="col-4">
                                                    <i class="fas fa-hotel" style="font-size:0.75rem;"></i>&nbsp;<span style="font-size:0.75rem;">${r['f_size']} sqm</span>
                                                </div>
                                                <div class="col-4">
                                                    <i class="fas fa-thumbs-up" style="font-size:0.75rem;"></i></i>&nbsp;<span style="font-size:0.75rem;">Good for ${r['good_for']}</span>
                                                </div>
                                                <div class="col-4">
                                                    <i class="fas fa-users" style="font-size:0.75rem;"></i></i>&nbsp;<span style="font-size:0.75rem;">Max of ${r['max_of']}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <input type="button" class="btn btn-secondary view-unit" data-id="${r['id']}" value="View">
                                            <input type="button" class="btn btn-success reserve-unit" data-id="${r['id']}" value="Reserve">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `);
                    });
                })
            }
        });

        calendar.render();

        $(document).on('click','.reserve-unit', (e)=>{
            const _this = $(e.currentTarget);
            
        })
    });
</script>