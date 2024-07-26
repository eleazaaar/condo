<?php $unit = $data[0];?>
<section class="section">
    <div class="card info-card">
        <div class="card-body">
            <h5 class="card-title">Write a Feedback</h5>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <img src="data:<?= $unit->mime?>;base64,<?= $unit->img_data?>" class="img-fluid" alt='thumbnail'>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12">
                    <h5><?= $unit->name?></h5>
                    <p><?= $unit->description?></p>
                    <p><?= $unit->remarks?></p>
                    <p>From&nbsp;&nbsp;<?= $unit->from_date?></p>
                    <p>To&nbsp;&nbsp;<?= $unit->to_date?></p>
                </div>
            </div>
            <div class="col-12">
                <form action="">

                </form>
            </div>
        </div>
    </div>
</section>