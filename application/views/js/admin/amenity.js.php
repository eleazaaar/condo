<script>
    $(() => {
        const amenity_tbl = new DataTable('#amenity-tbl', {
            order: [],
            scrollX:true,
            ajax: {
                url: "<?= site_url('admin_/ssp_amenity'); ?>",
                method: 'POST',
                error: function(err) {
                    console.log(err);
                }
            },
            processing: true,
            serverSide: true,
            rowCallback: (row, data) => {
                $(row).on('click', '.edit_amenity', e => {
                    const _this = $(e.currentTarget);

                    $('#add_amenity_form').find('#id').val(_this.data('id'));
                    $('#add_amenity_form').find('#name').val(_this.data('name'));
                    $('#amenityModal').modal('toggle');
                })
            }
        });

        $('#add_amenity_form').on('submit', e => {
            e.preventDefault();

            $.ajax({
                    url: "<?= site_url('admin_/save_amenity') ?>",
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
                            amenity_tbl.ajax.reload(false, null);
                            $('#amenityModal').modal('hide');
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