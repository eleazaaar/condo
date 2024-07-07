<div class="pagetitle">
    <h1>Amenity</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Amenity</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"></h5>
            <div class="row">
                <div class="col-12 mb-4">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#amenityModal">
                        Add Amenity
                    </button>
                </div>
                <div class="col-12" style="overflow-x: auto;">
                    <table id="amenity-tbl" class="table table-bordered" style="overflow: auto;">
                        <thead>
                            <tr>
                                <th>Name</th>
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
    $this->load->view('admin/modal/add_amenity');
?>