$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function removeProduct(id, url){
    if(confirm('Are you sure you want to remove')){
        $.ajax({
            type:'DELETE',
            datatype: 'JSON',
            data: {id},
            url: url,
            success: function(result){
                if(result.error==false){
                    alert(result.message);
                    location.reload();
                }else{
                    alert('Xoá lỗi! Vui lòng thử lại');
                }
            }
        })
    }
}