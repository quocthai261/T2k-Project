
    $(document).ready(function() {
        $('#btnedit').on('click', function() {
            var name = $('#name').val();
            var phone = $('#phone').val();
            var address = $('#address').val();
            var id = $('#id').val();
            $.post("http://localhost/t2k/Ajax/editUser", {
                name: name,
                phone: phone,
                address: address,
                id: id
            }, function(data) {
                alert('Cập nhật thông tin thành công');
            });
        });
    });
