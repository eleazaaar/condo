<script>
    $(() => {
        const book_tbl = new DataTable('#book-tbl', {
            scrollX: true,
            ajax: {
                url: "<?= site_url('user/ssp_book'); ?>",
                method: 'POST'
            },
            order: [],
            processing: true,
            serverSide: true
        });
    });
</script>