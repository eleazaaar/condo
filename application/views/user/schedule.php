<section class="section">
    <div class="container">
        <div class="row">
            <h1>Schedule</h1>
            <div class="col-12 mb-4">
                <div class="row col-6">
                    <div class="col-6">
                        <label for="from">From</label>
                        <input type="text" class="form-control" id="from" readonly>
                    </div>
                    <div class="col-6">
                        <label for="to">To</label>
                        <input type="text" class="form-control" id="to" readonly>
                    </div>
                </div>
            </div>
            <div class="col-12 mb-4">
                <div id="calendar"></div>
            </div>
            <div class="row" id="units-container">
                
            </div>
        </div>
    </div>
    <form id="schedule_detail_form" action="<?= site_url('user/preview_schedue_details')?>" method="POST">
        <input type="hidden" name="unit_id" id="unit_id">
        <input type="hidden" name="from" id="from">
        <input type="hidden" name="to" id="to">
    </form>
</section>