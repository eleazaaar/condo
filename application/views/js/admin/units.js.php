<script>
    $(() => {

        $('#amenities').select2({
            dropdownParent: $("#unitsModal"),
            multiple: true,
            ajax: {
                url: "<?= site_url('extension/get_amenities_select2') ?>",
                dataType: 'JSON',
                data: (d) => {
                    var q = {
                        search: d.term
                    }
                    return q;
                },
                method: 'POST',
                processResults: function(data) {
                    return {
                        results: data
                    };
                },
                delay: 500
                // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
            }
        });

        const set_amenities = () => {
            $.ajax({
                url: "<?= site_url('extension/get_amenities_select2') ?>",
                method: "POST",
                dataType: "json",
                success: function(data, status) {
                    if (status === "success") {
                        if (data.length > 0) {
                            for (let i = 0; i < data.length; i++) {
                                // console.log(data[i]);
                                try {
                                    const temp = (data[i].id).replace('-', 'a');
                                    $('#amenities').append('<option value="' + data[i].id + '" data-select2-id="select2-data-' + temp + '-5pp0">' + data[i].text + '</option>');
                                } catch (e) {
                                    const temp = (data[i].id);
                                    $('#amenities').append('<option value="' + data[i].id + '" data-select2-id="select2-data-' + temp + '-5pp0">' + data[i].text + '</option>');
                                }
                            }
                        } else {
                            console.log("Unexpected response from server");
                        }

                    } else {
                        console.log("Error in making the request");
                    }
                },
                error: function(xhr, textStatus, errorThrown) {
                    console.log("Error: " + textStatus + " - " + errorThrown);
                }
            });
        }

        set_amenities();

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
                            console.log(response.data.amenities);
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

                                $('#add_units_form').find('#amenities').val(data.amenities).trigger('change');

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

            var fileData = $('#pictures').prop('files');
            var formData = new FormData();

            formData.append('data', $(e.currentTarget).serialize());
            for (var i = 0; i < fileData.length; i++) {
                formData.append("files[]", fileData[i]);
            }

            $.ajax({
                    url: "<?= site_url('admin_/save_units') ?>",
                    method: "POST",
                    dataType: "JSON",
                    data: formData,
                    processData: false,
                    contentType: false
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