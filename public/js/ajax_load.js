$(document).ready(function() {    
    
    // Edit trường product_name
    $(document).on('blur','.productname',function(){
        var id = $(this).data('id_pro2');
        var text = $(this).text();
        edit_data(id,text,"product_name");
    })

    // Edit trường product_price
    $(document).on('blur','.productprice',function(){
        var id = $(this).data('id_pro3');
        var text = $(this).text();
        edit_data(id,text,"product_price");
    })
    // Cập nhật data
    function edit_data(id,text,field) {
        // alert (id + "/" + text +"/"+ field);
        $.post("http://localhost/t2k/Ajax/editProduct", {
                   id : id,
                   text : text,
                   field : field
                },
                function(data){
                    alert('Cập nhật sản phẩm thành công');
                    fetch_data();
                });
    }
    // Load data
    function load_data() {
        $.post("http://localhost/t2k/Ajax/LoadDB", function(data){
            $("#display").html(data);
            fetch_data();
        });
    }
    load_data();
    // Xóa data
    $(document).on('click','.btn_delete',function() {
        var id = $(this).data('id_pro');
        $.post("http://localhost/t2k/Ajax/deleteProduct",{id:id},function(data){
            alert('Đã xóa');
            fetch_data();
        })
    });
    // Tạo data
    $('#btnadd').on('click', function() {
        var name = $('#name').val();
        var image = $('#image').val();
        var price = $('#price').val();
        if (name == "" || image == "" || price == "")
            alert("Vui lòng điền đủ thông tin sản phẩm");
        else {
            $.post("http://localhost/t2k/Ajax/addProduct", {
                   name:name,
                   image:image,
                   price:price
                },
                function(data){
                    alert('Thêm sản phẩm thành công');
                    fetch_data();
                });
        }
    });
});