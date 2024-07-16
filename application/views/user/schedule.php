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

    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="viewUnitModal" aria-hidden="true" id="viewUnitModal">
        <div class="modal-dialog modal-lg modal-dialog-centered" style="max-width: 75%">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title">Modal title</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="min-height: 500px;">
                    <div tag="display">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</section>