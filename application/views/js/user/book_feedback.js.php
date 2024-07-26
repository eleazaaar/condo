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
                if (!res.length) {
                    $("#unit-container").html('<p>No record found</p>');
                } else {
                    $("#unit-container").html('');
                    $.each(res, (i, r) => {
                        const thumbnail = r['unit_thumbnail'] ? `<img src="data:${r['mime']};base64,${r['unit_thumbnail']}" class="img-fluid" alt='thumbnail'>` : '';
                        var footer = '';

                        if (r['rate'] == null) {
                            footer = `
                                <div class="card-footer">
                                    <form action="<?= site_url('user/write_feedback') ?>" method="POST">
                                        <input type="hidden" name="schedule_id" value="${r['schedule_id']}">
                                        <input type="Submit" class="btn btn-info" value="Write a Feedback">
                                    </form>
                                </div>
                            `;
                        } else {
                            footer = `
                                <div class="card-footer">
                                
                                </div>
                            `;
                        }
                        $("#unit-container").append(`
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
                                        <form action="<?= site_url('user/write_feedback') ?>" method="POST">
                                            <input type="hidden" name="schedule_id" value="${r['schedule_id']}">
                                            <input type="Submit" class="btn btn-info" value="Write a Feedback">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        `);
                    })
                }
            })

        $('.star-rating').val('4')
        const stars = new StarRating('.star-rating',{
            readonly: true,
            clearable: false,
        });
    });
</script>