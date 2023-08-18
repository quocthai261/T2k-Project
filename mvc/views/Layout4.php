<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/de5c23955f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.css">
    <link rel="stylesheet" href="/t2k/public/css/detail-product.css">
    <!-- <link rel="stylesheet" href="/t2k/public/css/return.css"> -->
    <title>Document</title>
</head>

<body>
    <?php require_once "./mvc/views/pages/" . $data["Page"] . ".php" ?>
    <!-- Đổi main_image -->
    <script>
        function changeImage(element) {

            var main_prodcut_image = document.getElementById('addimg');
            main_prodcut_image.src = element.src;
        }
    </script>
    <!-- Auto chọn size  -->
    <script>
        var arr_size = [
            [4.7, 4.9, 5, 5.2, 5.3, 5.4, 5.5, 5.6, 5.7, 5.8, 5.9, 6, 6.1],
            [7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 19, 20]
        ]
        document.getElementById('size-input').onkeyup = function() {

            for (var i = 0; i < arr_size[0].length; i++) {
                if (document.getElementById('size-input').value == arr_size[0][i]) {
                    document.getElementById('result').innerHTML = arr_size[1][i]
                    break
                }
                if (document.getElementById('size-input').value == "") {
                    document.getElementById('result').innerHTML = ""
                    break
                }
            }
        }
    </script>
    <!-- Chọn só lượng -->
    <script>
        const add = document.querySelector(".add");
        minus = document.querySelector(".minus");
        number = document.querySelector(".number");
        let a = 1;
        add.addEventListener("click", () => {
            a++;
            a = (a < 10) ? +a : a;
            number.innerText = a;
        });
        minus.addEventListener("click", () => {
            if (a > 1) {
                a--;
                a = (a < 10) ? +a : a;
                number.innerText = a;
            }
        });
    </script>
    <!-- Ajax thêm vào giỏ hàng -->
    <script>
        $(document).ready(function() {
            $('#addtocart').on('click', function() {
                var id_user = $('#addiduser').val();
                var id_pro = $('#addid').data('id');
                var name = $('#addname').data('name');
                var price = $('#addprice').data('price');
                var image = $('#addimg').data('img');
                var quatity = $('#quatity').text();

                if (!id_user) {
                    alert ('Vui lòng đăng nhập');
                }
                    
                else {
                    $.post("http://localhost/t2k/Ajax/addtoCart", {
                            id_user: id_user,
                            id_pro: id_pro,
                            name: name,
                            price: price,
                            quantity: quatity,
                            image: image
                        },
                        function(data) {
                            //alert(data);
                            alert('Thêm vào giỏ hàng thành công')
                            fetch_data();
                        });
                }
            });

            fetch_data();
        })
    </script>
</body>

</html>