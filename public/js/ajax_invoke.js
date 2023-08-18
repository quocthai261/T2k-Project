$(document).ready(function() {
    $('#btn_invoke').on('click',function() {
        var price = $(this).data('price');
        var id_us = $('#id_us').val();
        $('#order_mess').html('Đã thanh toán');
        $.post("http://localhost/t2k/Ajax/deleteallCart",{invoke:"check",id_us : id_us},function(data) {
            alert(data);
        });
        
        $.post("http://localhost/t2k/Ajax/addOrder", {
        invoke:"check",
        price:price,
        id_us : id_us },
        function(data){
            window.location.replace("http://localhost/t2k/Order/History");
            fetch_data();
        })
    }); 
});