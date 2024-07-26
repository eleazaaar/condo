<?php $unit = $data[0]; ?>
<section class="section">
    <div class="card info-card">
        <div class="card-body">
            <h5 class="card-title">Write a Feedback</h5>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <img src="data:<?= $unit->mime ?>;base64,<?= $unit->img_data ?>" class="img-fluid" alt='thumbnail'>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12">
                    <h5><?= $unit->name ?></h5>
                    <p><?= $unit->description ?></p>
                    <p><?= $unit->remarks ?></p>
                    <p>From&nbsp;&nbsp;<?= $unit->from_date ?></p>
                    <p>To&nbsp;&nbsp;<?= $unit->to_date ?></p>
                </div>
            </div>
            <div class="col-12">
                <form id="feedback-form">
                    <input type="hidden" name="schedule_id" value="<?= $schedule_id?>">
                    <div class="form-group">
                        <label for="rating">Rating</label>
                        <select class="star-rating" name="rating">
                            <option value="">Select a rating</option>
                            <option value="5">Excellent</option>
                            <option value="4">Very Good</option>
                            <option value="3">Average</option>
                            <option value="2">Poor</option>
                            <option value="1">Terrible</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pros">Pros</label>
                        <textarea class="form-control" name="pros" id="pros"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="cons">Cons</label>
                        <textarea class="form-control" name="cons" id="cons"></textarea>
                    </div>
                    <div class="form-group mt-4">
                        <input type="submit" class="btn btn-success" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>