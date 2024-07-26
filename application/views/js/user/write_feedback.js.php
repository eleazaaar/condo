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
                                    <div class="card-footer">
                                        <div class="d-flex align-items-cente">
                                            Ratings&nbsp;&nbsp;
                                            <select class="star-rating" data-value="${r['rate']}" disabled>
                                                <option value="">Select a rating</option>
                                                <option value="5">Excellent</option>
                                                <option value="4">Very Good</option>
                                                <option value="3">Average</option>
                                                <option value="2">Poor</option>
                                                <option value="1">Terrible</option>
                                            </select>
                                        </div>
                                        <div class="row mt-4">
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    <i class="fas fa-smile me-1"></i>
                                                    <div class="container">
                                                        <div class="text-container">
                                                            ${r['pros']}
                                                        </div>
                                                        <button class="show-more btn btn-light">Show More</button>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <i class="fas fa-frown me-1"></i>
                                                    <div class="container">
                                                        <div class="text-container">
                                                            ${r['cons']}
                                                        </div>
                                                        <button class="show-more btn btn-light">Show More</button>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            `;
                        }
                        $("#unit-container").append(`
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
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
        const stars = new StarRating('.star-rating',{
            readonly: true,
            clearable: false,
        });
    });
</script>