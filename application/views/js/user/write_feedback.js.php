<script>
    $(() => {
        const stars = new StarRating('.star-rating',{
            readonly: true,
            clearable: false,
        });

        $('#feedback-form').on('submit', e => {
            e.preventDefault();
            const _this = $(e.currentTarget);

            $.ajax({
                url: "<?= site_url('user/save_feedback')?>",
                method: 'POST',
                dataType: 'JSON',
                data: _this.serialize()
            })
            .then( res =>{
                if(res.status==200){
                    Swal.fire({
                        icon: res.icon,
                        title: res.title,
                        html: res.message
                    })
                    .then( () =>{
                        window.location.replace(res.url);
                    })
                }else{
                    Swal.fire({
                        icon: res.icon,
                        title: res.title,
                        html: res.message
                    })
                }
            })
        })
    });
</script>