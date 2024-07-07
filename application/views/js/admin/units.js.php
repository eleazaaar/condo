<script>
    $(() => {
        const accomodation_tbl = new DataTable('#accomodation-tbl', {
            order: [],
            ajax: {
                url: "<?= site_url('admin_/ssp_units'); ?>",
                method: 'POST',
                error: function(err) {
                    console.log(err);
                }
            },
            processing: true,
            serverSide: true,
            rowCallback: (row, data) => {
                $(row).on('click', '.edit_units', e => {
                    const id = $(e.currentTarget).data('id');

                    $.ajax({
                            url: "<?= site_url('admin_/get_units') ?>",
                            method: "POST",
                            dataType: "JSON",
                            data: {
                                id: id
                            }
                        })
                        .then(response => {
                            if (response.status == 200) {
                                const data = response.data;
                                $('#add_units_form').find('#unit_id').val(id);
                                $('#add_units_form').find('#name').val(data.name);
                                $('#add_units_form').find('#description').val(data.description);
                                $('#add_units_form').find('#room_no').val(data.room_no);
                                $('#add_units_form').find('#floor_no').val(data.floor_no);
                                $('#add_units_form').find('#floor_size').val(data.f_size);
                                $('#add_units_form').find('#good_for').val(data.good_for);
                                $('#add_units_form').find('#max_of').val(data.max_of);
                                $('#add_units_form').find('#remarks').val(data.remarks);

                                $('#unitsModal').modal('toggle');
                            } else {
                                Swal.fire({
                                    icon: response.icon,
                                    title: response.title,
                                    html: response.message,
                                });
                            }
                        })
                        .fail((jqXHR, textStatus) => {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error Occured',
                                html: textStatus,
                            });
                        });
                })
            }
        });

        $('#add_units_form').on('submit', e => {
            e.preventDefault();

            $.ajax({
                    url: "<?= site_url('admin_/save_units') ?>",
                    method: "POST",
                    dataType: "JSON",
                    data: $(e.currentTarget).serialize()
                })
                .then(response => {
                    Swal.fire({
                            icon: response.icon,
                            title: response.title,
                            text: response.message,
                        })
                        .then(() => {
                            accomodation_tbl.ajax.reload(false, null);
                            $('#unitsModal').modal('hide');
                        });
                })
                .fail((jqXHR, textStatus) => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error Occured',
                        html: textStatus,
                    });
                });
        });

    });
</script>