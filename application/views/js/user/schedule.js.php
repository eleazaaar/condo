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
                    },
                    beforeSend: () => {
                        $('#units-container').html('<div class="text-center"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div>');
                    }
                })
                .then(response => {
                    $('#units-container').html('');

                    $.each(response,(i,r)=>{
                        const thumbnail = r['unit_thumbnail'] ? `<img src="data:${r['mime']};base64,${r['unit_thumbnail']}" class="img-fluid" alt='thumbnail'>` : '';
                        $('#units-container').append(`
                            <div class="col-xl-4 col-md-6 col-sm-12 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title"><a href="#" class="">${r['name']}</a></h4>
                                        <div class="service-item position-relative">
                                            ${thumbnail}
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
                                            <input type="button" class="btn btn-secondary view-unit" data-id="${r['id']}" data-description="${r['description']}" value="View">
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
            
            if(!$("#from").val() || !$('#to').val()){
                alert('Please select date schedule');
                return;
            }

            $('#schedule_detail_form').find('#unit_id').val(_this.data('id'));
            $('#schedule_detail_form').find('#from').val($("#from").val());
            $('#schedule_detail_form').find('#to').val($("#to").val());
            
            $('#schedule_detail_form').submit();
        });

        $(document).on('click','.view-unit', (e)=>{
            const _this = $(e.currentTarget);
            const id = _this.data('id');
            const description = _this.data('description');

            $('#viewUnitModal').modal('toggle');
            $(".modal-title").text(description);
            $.ajax({
                url: '<?= site_url('Units_/getUnitsGallery') ?>',
                method: 'POST',
                dataType: 'HTML',
                data: {id: id},
                beforeSend: function() {
                    $("#viewUnitModal").find("div[tag='display']").html('<div class="text-center"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div>');
                },
                success: function(data) {
                    $("#viewUnitModal").find("div[tag='display']").html(data);
                }
            })
        });

        $(document).on('click','.my_unit_image', e => {
            const _this = $(e.currentTarget);

            const newWindow = window.open();
            newWindow.document.write('<img src="' + _this.find('img').attr('src') + '" alt="Base64 Image" style="height:100vh;">');
            newWindow.document.title = "Base64 Image";
            newWindow.document.close();
        })

    });
</script>