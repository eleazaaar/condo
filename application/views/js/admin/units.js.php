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
        });

        $('#add_units_form').on('submit', e => {
            e.preventDefault();
            console.log($(e.currentTarget).serialize());
            $.ajax({
                    url: "<?= site_url('admin_/add_units') ?>",
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
                        })
                })
                .fail((jqXHR, textStatus) => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error Occured',
                        html: textStatus,
                    })
                })
        })
    });
</script>