<?php
$from_date = new DateTime($from);
$to_date = new DateTime($to);

$days_between = $to_date->diff($from_date)->format('%a');
?>
<section class="section">
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">CHECK YOUR SCHEDULE DETAILS</h1>
            <div class="row">
                <div class="col-xl-6 col-md-6 col-sm-12 rounded shadow p-5 mb-4">
                    <h3><?= $name ?></h3>
                    <p><?= $description ?></p>
                    <div class="row col-12">
                        <div class="col-4">
                            <i class="fas fa-hotel" style="font-size:0.75rem;"></i>&nbsp;<span style="font-size:0.75rem;"><?= $f_size ?> sqm</span>
                        </div>
                        <div class="col-4">
                            <i class="fas fa-thumbs-up" style="font-size:0.75rem;"></i></i>&nbsp;<span style="font-size:0.75rem;">Good for <?= $good_for ?></span>
                        </div>
                        <div class="col-4">
                            <i class="fas fa-users" style="font-size:0.75rem;"></i></i>&nbsp;<span style="font-size:0.75rem;">Max of <?= $max_of ?></span>
                        </div>
                    </div>
                    <hr>
                    <h4>DATE</h4>
                    <p><?= date('F j, Y', strtotime($from)) . ' to ' . date('F j, Y', strtotime($to)) ?></p>
                </div>
                <div class="col-xl-4 col-md-4 offset-xl-1 offset-md-1 col-sm-12 rounded shadow p-5 mb-4">
                    <table>
                        <tr>
                            <td>Price</td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td><?= number_format($price, 2) ?></td>
                        </tr>
                        <tr>
                            <td>No. of Days</td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td><?= $days_between ?></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <hr>
                            </td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td><?= number_format($price * $days_between, 2); ?></td>
                        </tr>
                    </table>

                    <input type="button" value="FINISH" class="form-control my-4 bg-success text-white" id="reserve_schedule" data-id="<?= $id ?>">
                </div>

            </div>
        </div>
    </div>
</section>
<form id="schedule_detail_form" action="<?= site_url('user/save_schedule') ?>" method="POST">
    <input type="hidden" name="unit_id" id="unit_id">
    <input type="hidden" name="from" id="from">
    <input type="hidden" name="to" id="to">
</form>