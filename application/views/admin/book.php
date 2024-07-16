<section class="section">
    <div class="card info-card">
        <div class="card-body">
            <h5 class="card-title">Booked Units</h5>
            <div class="row">
                <table id="book-tbl" class="display table table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Customer Name</th>
                            <th>Unit</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Control</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="editUnitModal" tabindex="-1" role="dialog" aria-labelledby="editUnitModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUnitModalLabel">BOOK UNIT DETAILS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form id="edit-unit-status-form">
                    <input type="hidden" id="unit_id">
                    <div class="form-group">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-control">
                            <?php
                                foreach(status_list() as $s):
                            ?>
                                <option value="<?=$s?>"><?=$s?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="unit_name" class="form-label">Unit Name</label>
                        <input type="text" id="unit_name" class="form-control" disabled>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group">
                                <label for="room_no">Room No.</label>
                                <input type="text" class="form-control" id="room_no" name="room_no" disabled>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group">
                                <label for="floor_no">Floor No.</label>
                                <input type="number" class="form-control" id="floor_no" name="floor_no" disabled>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group">
                                <label for="floor_size">Floor Size</label>
                                <input type="number" step=".1" class="form-control" id="floor_size" name="floor_size" disabled>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="customer_name" class="form-label">Customer Name</label>
                        <input type="text" id="customer_name" class="form-control" disabled>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="from_date">From</label>
                                <input type="text" class="form-control" id="from_date" name="from_date" disabled>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="to_date">To</label>
                                <input type="text" class="form-control" id="to_date" name="to_date" disabled>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="save-book-status">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>