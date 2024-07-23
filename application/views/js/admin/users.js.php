<script>
    $(() => {
        const user_tbl = new DataTable('#user-tbl', {
            order: [],
            scrollX: true,
            ajax: {
                url: "<?= site_url('admin_/ssp_user'); ?>",
                method: 'POST',
                error: function(err) {
                    console.log(err);
                }
            },
            processing: true,
            serverSide: true,
            rowCallback: (row, data) => {
                $(row).on('click', '.edit_user', e => {
                    const id = $(e.currentTarget).data('id');

                    $.ajax({
                            url: "<?= site_url('admin_/get_user') ?>",
                            method: "POST",
                            dataType: "JSON",
                            data: {
                                id: id
                            }
                        })
                        .then(response => {
                            if (response.status == 200) {
                                const data = response.data;
                                $('#add_user_form').find('#id').val(id);
                                $('#add_user_form').find('#fname').val(data.fname);
                                $('#add_user_form').find('#lname').val(data.lname);
                                $('#add_user_form').find('#mname').val(data.mname);
                                $('#add_user_form').find('#email').val(data.email);
                                $('#add_user_form').find('#contact_number').val(data.contact_number);
                                $('#add_user_form').find('#user_type').val(data.user_type);
                                $('#userModal').modal('toggle');
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

        $('#add_user_form').on('submit', e => {
            e.preventDefault();

            $.ajax({
                    url: "<?= site_url('admin_/save_user') ?>",
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
                            user_tbl.ajax.reload(false, null);
                            $('#userModal').modal('hide');
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