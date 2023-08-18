$(document).ready(function() {
    //========= Cập nật số lượng
    function edit_data(id1, id2, text) {
        // alert ("Đã nhận");
        $.post("http://localhost/t2k/Ajax/editQuantity", {
                id_user: id1,
                id_pro: id2,
                text: text,
                field: "product_quantity"
            },
            function(data) {
                alert('Cập nhật số lượng thành công');
                fetch_data();
            });
    }
    //========== Xóa một sản phẩm
    $('.delete').on('click', function() {
        alert('Sản phẩm đã xóa khỏi giỏ hàng');
    })
    //========== Blur (Bấm ở một chổ bất kỳ)
    $(document).on('blur', '.product_quantity', function() {
        var id_user = $('#user_id').text();
        var id_pro = $(this).data('id_pro');
        var text = $(this).text();

        edit_data(id_user, id_pro, text);
        window.location.replace("http://localhost/t2k/Cart")
        fetch_data();
        
    })
    
    
    
})