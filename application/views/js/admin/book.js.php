<script>
    $(() => {
        const book_tbl = new DataTable('#book-tbl', {
            ajax: {
                url: "<?= site_url('admin_/ssp_customer_book'); ?>",
                method: 'POST'
            },
            order: [],
            processing: true,
            serverSide: true
        });
    });
</script>