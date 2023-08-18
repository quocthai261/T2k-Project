$(document).ready( function() {
    $('#btnregister').on('click',function() {
        var fullname = $('#fullname').val();
        var phonenum = $('#phonenum').val();
        var username = $('#username').val();
        var password = $('#password').val();
        var address = $('#address').val();
        
        if (fullname == "" || username == "" || password == "" || phonenum == "" || address == "")
            alert ("Chưa điền đủ thông tin");
        else {
            $.post("http://localhost/t2k/Ajax/addUser",
                {fullname:fullname,phonenum:phonenum,username:username,password:password,address:address},
                function(data){
                alert('Đăng ký thành công');
                window.location.replace("http://localhost/t2k/Login");
                fetch_data();
                
            });
        }
    });
});