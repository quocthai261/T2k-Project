<h1 class="order-tag">Đơn hàng</h1>
<hr>
<div class="content">
    <?php
    $obj_user = json_decode($data['DB_user']);
    $obj_cart = json_decode($data['DB_cart']);
    if (count($obj_user) > 0 && count($obj_cart) > 0) {
    ?>
        <h3 class="inf-user">Thông tin người mua</h3><br>
        <div class="name-u userf">
            <h4 style="text-align: start; width: 120px;">Họ và tên: </h4>
            <span class="infu"><?= $obj_user[0]->fullname ?></span>
        </div>
        <div class="phone-num-u userf">
            <h4 style="text-align: start; width: 120px;">Liên hệ: </h4>
            <span class="infu"><?= $obj_user[0]->user_phone ?></span>
        </div>
        <div class="addr-u userf">
            <h4 style="text-align: start; width: 120px;">Địa chỉ:</h4>
            <span class="infu"><?= $obj_user[0]->user_address ?></span>
        </div>
        <!-- ================================================== -->
        <h3 class="inf-order">Thông tin sản phẩm</h3>
        <table class="table">
            <tr>
                <th class="col-1">STT</th>
                <th class="col-7">Tên sản phẩm</th>
                <th class="col-2">Số lượng</th>
                <th class="col-2">Thành tiền</th>
            </tr>
            <?php
            $num = 1;
            $sumprice = 0;
            for ($i = 0; $i < count($obj_cart); $i++) {
                $price = (int)$obj_cart[$i]->product_quantity * (int) $obj_cart[$i]->price;
                $sumprice += $price; ?>
                <tr>
                    <td><?= $num++ ?></td>
                    <td class="title">
                        <img src=" <?= $obj_cart[$i]->product_img ?>" alt="">
                        <a style="color:#000 ;" href="http://localhost/t2k/Detail/ShowDetail/<?= $obj[$i]->product_id ?>"><?= $obj_cart[$i]->product_name ?></a>
                    </td>
                    <td><?= $obj_cart[$i]->product_quantity ?></td>
                    <td><?= number_format($price) ?></td>
                </tr>

            <?php } ?>
            <tr>
                <td class="tt-price-order" colspan="3">Tổng giá trị đơn hàng: </td>
                <td class="tt-price-number-order"><?= number_format($sumprice) ?>đ</td>
            </tr>
            <tr>
                <td class="stastus" colspan="2">Trạng thái: </td>
                <td id="order_mess" colspan="2"><span class="stastus-payment" style="text-align: center; color: #EB6440;">Chưa thanh toán</span></td>
            </tr>
        </table>
        <input type="hidden" id="id_us" value="<?= $obj_user[0]->user_id ?>">
        <div style="text-align: center;" class="invoke">
            <input style="width: 155px;" data-price="<?= $sumprice ?>" name="btn_invoke" id="btn_invoke" class="btn btn-primary" type="button" value="Thanh toán">
        </div>
    <?php } else
        echo '<h3 class="stastus-order">Chưa có đơn hàng</h3>';
    ?>
</div>