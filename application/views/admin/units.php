<div class="pagetitle">
    <h1>Units</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Units</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"></h5>
            <div class="row">
                <div class="col-12 mb-4">
                    <button type="button" id="btn_add_units_modal" class="btn btn-primary" data-action="add" data-bs-toggle="modal" data-bs-target="#unitsModal">
                        Add Units
                    </button>
                </div>
                <div class="col-12" style="overflow-x: auto;">
                    <table id="accomodation-tbl" class="table table-bordered" style="overflow: auto;">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Room No.</th>
                                <th>Floor No.</th>
                                <th>Floor Size</th>
                                <th>Good For</th>
                                <th>Max Of</th>
                                <th>Remarks</th>
                                <th>Control</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
    $this->load->view('admin/modal/add_units');
?>