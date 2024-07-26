<section class="section">
    <div class="card info-card">
        <div class="card-body">
            <h5 class="card-title">Your Feedback</h5>
            <div class="row" id="unit-container">
            </div>
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
                            <div class="row">
                                <p>Ratings</p>
                                <select class="star-rating" disabled>
                                    <option value="">Select a rating</option>
                                    <option value="5">Excellent</option>
                                    <option value="4">Very Good</option>
                                    <option value="3">Average</option>
                                    <option value="2">Poor</option>
                                    <option value="1">Terrible</option>
                                </select>
                            </div>
                            <div class="row">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <i class="fas fa-smile me-1"></i>
                                        <div class="container">
                                            <div class="text-container">
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis optio explicabo qui modi amet laborum illo atque vero facere repudiandae, porro velit nostrum nisi sed expedita repellat, excepturi vel cumque nobis deserunt pariatur! Tenetur quaerat illo facilis animi modi corrupti ea laborum sed possimus magni. Vitae consequuntur optio facere animi!
                                            </div>
                                            <button class="show-more btn btn-light">Show More</button>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <i class="fas fa-frown me-1"></i>
                                        <div class="container">
                                            <div class="text-container">
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis optio explicabo qui modi amet laborum illo atque vero facere repudiandae, porro velit nostrum nisi sed expedita repellat, excepturi vel cumque nobis deserunt pariatur! Tenetur quaerat illo facilis animi modi corrupti ea laborum sed possimus magni. Vitae consequuntur optio facere animi!
                                            </div>
                                            <button class="show-more btn btn-light">Show More</button>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>