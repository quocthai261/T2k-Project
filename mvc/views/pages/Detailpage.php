<?php
$obj = json_decode($data['DB']);
if (count($obj) > 0) { ?>
    <div class="container mt-5 mb-5">
        <div class="card">
            <div class="row g-0">
                <div class="col-md-12 col-lg-6 border-end" style="user-select: none;">
                    <div class="d-flex flex-column justify-content-center">
                        <div class="main_image"> <img data-img="<?= $obj[0]->product_img ?>" src="<?= $obj[0]->product_img ?>" id="addimg" width="350">
                        </div>
                        <div class="thumbnail_images">
                            <ul id="thumbnail">
                                <li><img onclick="changeImage(this)" src="<?= $obj[0]->product_img ?>" width="75">
                                </li>
                                <li><img onclick="changeImage(this)" src="/t2k/public/image/id<?= $obj[0]->product_id ?>-1.jpg" width="75">
                                </li>
                                <li><img onclick="changeImage(this)" src="/t2k/public/image/id<?= $obj[0]->product_id ?>-2.jpg" width="75">
                                </li>
                                <li><img onclick="changeImage(this)" src="/t2k/public/image/id<?= $obj[0]->product_id ?>-3.jpg" width="75">
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="return">
                    <a href="http://localhost/t2k/Product"><i class="fa-regular fa-circle-left"></i></a>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="p-3 right-side">
                        <div class="d-flex align-items-center">
                            <img id="_3hs" src="/t2k/public/image/icon-3h.svg" alt="">
                            <h4 id="addname" data-name="<?= $obj[0]->product_name ?>" class="title" style="padding-left: 5px;"><?= $obj[0]->product_name ?></h4>
                        </div>
                        <div class="content">
                            <p id="addid" data-id="<?= $obj[0]->product_id ?>">Mã: <?= $obj[0]->product_code ?></p>
                            <?php if (isset($_SESSION['user_id'])) {
                                echo   '<input type="hidden" id="addiduser" value="' . $_SESSION['user_id'] . '">';
                            } ?>
                        </div>

                        <div style="font-size: 1rem; font-weight: 700;" class="product-price">
                            <p style="color: #d62435; margin-bottom: 0;
                                        text-decoration: line-through;" class="last-price"><?= number_format(($obj[0]->product_price) / 0.95) ?> VNĐ</p>
                            <p style="color: #005cb8; font-size: 30px;" id="addprice" data-price="<?= $obj[0]->product_price ?>" class="new-price"><span><?= number_format($obj[0]->product_price) ?> VNĐ (sale 5%)</span></p>
                        </div>
                        <div class="Chosing mt-2" style="position: relative;"> <span style="font-size: 16px; font-weight: 400;">Chọn kích cỡ:</span>
                            <div class="Size">
                                <form method="post">
                                    <input id="10" name="option" type="radio" value="10">
                                    <label for="10">10</label>
                                    <input id="11" name="option" type="radio" value="11">
                                    <label for="11">11</label>
                                    <input id="12" name="option" type="radio" value="12">
                                    <label for="12">12</label>
                                    <input id="13" name="option" type="radio" value="13">
                                    <label for="13">13</label>
                                    <input id="14" name="option" type="radio" value="14">
                                    <label for="14">14</label>
                                </form>
                            </div>
                            <p>
                                <a class="guide-link" data-bs-toggle="collapse" href="#collapse" role="button" aria-expanded="false" aria-controls="collapse">
                                    Hướng dẫn chọn kích cỡ
                                </a>
                                <a class="guide-close collapse" id="collapse" data-bs-toggle="collapse" href="#collapse" aria-expanded="true" role="button"><i class="fa-solid fa-xmark"></i></a>
                            </p>
                            <div class="collapse" id="collapse">
                                <div class="guide-body">
                                    <h5>Hướng dẫn đo size nhẫn</h5>
                                    <div class="step1">
                                        <p>1. Dùng dây đo quấn quanh khớp
                                            tay, đánh dấu vị trí cắt nhau</p>
                                        <img style="height: 44px; padding-left: 10px;" src="/t2k/public/image/do-duong-kinh.png" alt="">
                                    </div>
                                    <div class="step2">
                                        <p>2. Dùng thước đo chiều dài của dây
                                            vừa đo được (đơn vị cm)</p>
                                        <img style=" height: 25px; padding-left: 10px; margin-top: 10px;" src="/t2k/public/image/do-chieudai-cua-day.png" alt="">
                                    </div>
                                    <div class="measure">Kích thước bạn đo được là:
                                        <input type="text" id="size-input" autocomplete="off"> cm <br>
                                        <span style="font-style: italic; font-size: 13px;">(Ví dụ: 4.7)</span>
                                        <br><span>Size nhẫn của bạn là: <span id="result"></span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="wrapper mt-3" style="border: 1px solid black;">
                            <span class="minus">–</span>
                            <span id="quatity" name="quatity" class="number">1</span>
                            <span class="add">+</span>
                        </div>


                        <div class="row col-12" id="notice">
                            <div class="notice col-12 mt-3 mb-3">
                                <div class="top col-12">
                                    <p style="margin:0 ; padding-left: 10px;">Ưu đãi:</p>
                                </div>
                                <div class="bot col-12">
                                    <span><i class="fa-solid fa-circle-check" style="margin-right: 5px ;"></i>Nhập mã
                                        <span style="font-weight: 500; color:brown;">QRPAYPNJ</span> giảm đến 499k khi
                                        thanh toán <a href="">VNPAY-QR</a></span> <br>
                                    <span><i class="fa-solid fa-circle-check" style="margin-right: 5px ;"></i>Miễn phí
                                        vận chuyển khi mua trực tuyến</a></span>
                                </div>
                            </div>
                        </div>
                        <form method="post" class="buttons gap-2 col-12">
                            <!-- <input type="number" id="quatity" name="quatity" min="0" value="1"> -->

                            <button type="submit" id="addtocart" class="btn btn1 col-lg-12 col-12"><i class="fa-solid fa-cart-shopping" style="margin-right: 10px;"></i>MUA NGAY</button>
                            <button class="btn btn2 col-lg-12 col-12"><i class="fa-solid fa-basket-shopping" style="margin-right: 10px;"></i>
                                MUA TẠI CỬA HÀNG</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion mt-5">
            <div class="card-descriptions mt-2">
                <div class="card-header">
                    <a class="btn-btn collapsed" data-bs-toggle="collapse" href="#collapse_1" role="button" aria-expanded="false" aria-controls="collapse_1">
                        Thông số
                        <span><i class="fas"></i></span>
                    </a>
                </div>
            </div>
            <div class="collapse" id="collapse_1">
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">Tên sản phẩm: <?= $obj[0]->product_name ?></li>
                        <li class="list-group-item list-group-item-secondary">Xuất xứ: Việt Nam</li>
                        <li class="list-group-item ">Chất liệu: <?php
                                                                if ($obj[0]->material_id == 1) {
                                                                    echo "Vàng";
                                                                } elseif ($obj[0]->material_id == 2) {
                                                                    echo "Bạc";
                                                                } else {
                                                                    echo "Bạch kim";
                                                                } ?></li>
                        <li class="list-group-item list-group-item-secondary">Giới tính: Unisex</li>
                        <li class="list-group-item ">Mã sản phẩm: <?= $obj[0]->product_code ?></li>
                    </ul>
                </div>
            </div>

            <div class="card-descriptions mt-2">
                <div class="card-header">
                    <a class="btn-btn collapsed" data-bs-toggle="collapse" href="#collapse_2" role="button" aria-expanded="false" aria-controls="collapse_2">
                        Mô tả sản phẩm
                        <span><i class="fas"></i></span>
                    </a>
                </div>
            </div>
            <div class="collapse" id="collapse_2">
                <div class="card-body">
                    <p>Với kiểu dáng thời thượng cùng những viên đá đính xung quanh bề mặt chiếc nhẫn trên chất liệu
                        bạc 92.5,
                        PNJSilver mang đến chiếc nhẫn với vẻ đẹp trẻ trung nhưng không kém phần phá cách, giúp các cô
                        gái trông
                        thật nổi bật.</p>
                    <p>PNJSilver hiểu rằng, các cô gái luôn có đặc quyền được làm đẹp và tỏa sáng để tạo nên phong
                        cách riêng
                        của chính mình. Để thỏa sức sáng tạo với lựa chọn riêng của từng cô gái, nàng có thể kết hợp
                        nhiều items
                        khác để dễ dàng mix&match với nhau tùy theo cá tính thời trang và luôn refresh diện mạo mỗi ngày
                        nhé.</p>
                </div>
            </div>


            <div class="card-descriptions mt-2">
                <div class="card-header">
                    <a class="btn-btn collapsed" data-bs-toggle="collapse" href="#collapse_4" role="button" aria-expanded="false" aria-controls="collapse_4">
                        Câu hỏi thường gặp
                        <span><i class="fas"></i></span>
                    </a>
                </div>
            </div>
            <div class="collapse" id="collapse_4">
                <div class="card-body">
                    <div class="item">
                        <h3>Mua Online có ưu đãi gì đặc biệt cho tôi?</h3>
                        <p>PNJ mang đến nhiều trải nghiệm mua sắm hiện đại khi mua Online:
                            <br> - Ưu đãi độc quyền Online với hình thức thanh toán đa dạng.
                            <br> - Đặt giữ hàng Online, nhận tại cửa hàng.
                            <br> - Miễn phí giao hàng từ 1-7 ngày trên toàn quốc và giao hàng trong 3 giờ tại một số khu
                            vực trung
                            tâm với các sản phẩm có gắn nhãn 3 giờ.
                            <br> - Trả góp 0% lãi suất với đơn hàng từ 3
                            triệu.
                            <br> - Làm sạch trang sức trọn đời, khắc tên miễn phí theo yêu cầu (tùy kết cấu sản phẩm) và
                            chính sách bảo hành,
                            đổi trả dễ dàng tại hệ thống PNJ trên toàn quốc.
                            <br> PNJ hân hạnh phục vụ quý khách qua Hotline
                            <a href="tel:1800545457" style="font-weight:600;color:#2e74b5;">1800 5454 57
                            </a> (08:00-21:00, miễn phí cuộc gọi).
                        </p>
                    </div>
                    <div class="item">
                        <h3>Nếu đặt mua Online mà sản phẩm không đeo vừa thì có được đổi không?</h3>
                        <p>PNJ có chính sách thu đổi trang sức vàng trong vòng 48 giờ, đổi ni/ size trang sức bạc trong
                            vòng 72 giờ. Quý khách sẽ được áp dụng đổi trên hệ thống PNJ toàn quốc.</p>
                    </div>
                    <div class="item">
                        <h3>Sản phẩm đeo lâu có xỉn màu không, bảo hành như thế nào?</h3>
                        <p>Do tính chất hóa học, sản phẩm có khả năng oxy hóa, xuống màu. PNJ có chính sách bảo hành
                            miễn phí về lỗi kỹ thuật, nước xi:
                            <br>- Trang sức vàng: 6 tháng.
                            <br>- Trang sức bạc: 3 tháng.
                            <br>Ngoài ra, PNJ cũng cung cấp dịch vụ siêu âm làm sạch bằng máy chuyên dụng (siêu âm,
                            không xi)
                            miễn phí trọn đời tại hệ thống cửa hàng.
                        </p>
                    </div>
                    <div class="item">
                        <h3>Tôi muốn xem trực tiếp, cửa hàng nào còn hàng?</h3>
                        <p>Với hệ thống cửa hàng trải rộng khắp toàn quốc, quý khách vui lòng liên hệ Hotline
                            <a href="tel:1800545457" style="font-weight:600;color:#2e74b5;">1800 5454 57
                            </a>
                            (08:00-21:00, miễn phí cuộc gọi) để kiểm tra cửa hàng còn hàng và tư vấn chương trình khuyến
                            mãi Online trước khi đến cửa hàng.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="mt-5 text-center">Có thể bạn quan tâm</h2>
        <div class="row-card-rec d-flex justify-content-center mt-5 " style="margin-left: -20px; user-select: none;">
            <?php $obj2 = json_decode($data['DB2']);
            $index = (int)($data['rd_img']);
            for ($i = 0; $i < 4; $i++) {
                $num = $index + $i;
                if ($num >= 30) {
                    $num = $i;
                } ?>

                <div class="card-rec col-lg-3">
                    <a href="http://localhost/t2k/Detail/ShowDetail/<?= $obj2[$num]->product_id ?>">
                        <img src="<?= $obj2[$num]->product_img ?>" alt="">
                        <div class="card-rec-title"><?= $obj2[$num]->product_name ?></div>
                        <div class="card-rec-price"><?= number_format($obj2[$num]->product_price) ?></div>
                    </a>
                </div>
            <?php } ?>


        </div>
    <?php }
        $obj3 = json_decode($data['DB3']) ;?>
    <form class="cart-button">
        <a href="http://localhost/t2k/Cart"><i class="fa-solid fa-cart-shopping"></i></a>
        <span class="quantity"><?=count($obj3)?></span>
    </form>