<script>
    $(()=>{
        const accomodation_tbl = new DataTable('#accomodation-tbl',{
            order:[],
            ajax: {
                url: "<?= site_url('admin_/ssp_units'); ?>",
                method: 'POST',
                error:function(err){
                    console.log(err);
                }
            },
            processing: true,
            serverSide: true,
        })
    });
</script>