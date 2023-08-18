    <h1 class="cart-tag">Giỏ hàng</h1>
    <h2 class="d-none">ID giỏ hàng: <span id="user_id"><?= $_SESSION['user_id'] ?></span> </h2>
    <div class="content">
        <table class="table">
            <tr>
                <th class="col-1">STT</th>
                <th class="col-4">Tên sản phẩm</th>
                <th class="col-2">Số lượng</th>
                <th class="col-1">Giá</th>
                <th class="col-2">Thành tiền</th>
                <th class="col-2">Quản lý</th>
            </tr>
            <?php $obj = json_decode($data['DB']);
            if (count($obj) > 0) {
                $num = 1;
                $sumprice = 0;
                for ($i = 0; $i < count($obj); $i++) {
                    $price = (int)$obj[$i]->product_quantity * (int) $obj[$i]->price;
                    $sumprice += $price;
            ?>
                    <tr>
                        <td><?= $num++ ?></td>
                        <td class="title">
                            <img src=" <?= $obj[$i]->product_img ?>" alt="">
                            <a style="color:#000 ;" href="http://localhost/t2k/Detail/ShowDetail/<?= $obj[$i]->product_id ?>"><?= $obj[$i]->product_name ?></a>
                        </td>

                        <td class="product_quantity" data-id_pro="<?= $obj[$i]->product_id ?>" contenteditable><?= $obj[$i]->product_quantity ?></td>

                        <td><?= number_format((int)$obj[$i]->price) ?></td>
                        <td><?= number_format($price) ?></td>
                        <td>
                            <form method="post" action="http://localhost/t2k/Cart/DeleteCartItem">
                                <input type="hidden" name="id_user" value="<?= $_SESSION['user_id'] ?>">
                                <input type="hidden" name="id_pro" value="<?= $obj[$i]->product_id ?>">
                                <button type="submit" name="btnhello" class="btn delete"><i class="fa-solid fa-circle-xmark"></i></button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
                <tr>
                    <td class="tt-price" style="color:#ea2b44" colspan="4">Tổng thanh toán: </td>
                    <td class="tt-price-number"><?= number_format($sumprice) ?>đ</td>
                    <td id="echo"></td>
                </tr>
            <?php } else { ?>
                <tr>
                    <td colspan="6" style="color: #ea2b44;">
                        <h3 class="stastus-cart">Giỏ hàng trống</h3>
                    </td>
                </tr>
                <tr>
                    <td colspan="4">Tổng thanh toán: </td>
                    <td>...</td>
                </tr>
            <?php } ?>

        </table>

        <div class="row-f">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link f-link" href="http://localhost/t2k/Product">Tiếp tục mua hàng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link f-link" href="http://localhost/t2k/Order/Crea">Đặt Hàng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link f-link" href="http://localhost/t2k/Cart/DeleteCart">Xóa giỏ hàng</a>
                </li>
            </ul>
        </div>
    </div>