<script>
    $(() => {
        const book_tbl = new DataTable('#book-tbl', {
            ajax: {
                url: "<?= site_url('admin_/ssp_customer_book'); ?>",
                method: 'POST'
            },
            order: [],
            processing: true,
            serverSide: true,
            rowCallback: (row,data)=>{
                $(row).on('click', '.btn-edit-status', e =>{
                    const _this = $(e.currentTarget);

                    $.ajax({
                        url: "<?= site_url('admin_/get_booked_details')?>",
                        method: 'POST',
                        dataType:'JSON',
                        data:{
                            id: _this.parent().data('id')
                        }
                    })
                    .then(response=>{
                        if(response.status==200){
                            const data =response.data;
                            console.log(data.status);
                            $('#edit-unit-status-form').find('#status').val(data.status);
                            $('#edit-unit-status-form').find('#unit_name').val(data.unit_name);
                            $('#edit-unit-status-form').find('#room_no').val(data.room_no);
                            $('#edit-unit-status-form').find('#floor_no').val(data.floor_no);
                            $('#edit-unit-status-form').find('#floor_size').val(data.f_size);
                            $('#edit-unit-status-form').find('#customer_name').val(data.customer_name);
                            $('#edit-unit-status-form').find('#from_date').val(data.from_date);
                            $('#edit-unit-status-form').find('#to_date').val(data.to_date);
                        }
                    })
                });
            }
        });
    });
</script>