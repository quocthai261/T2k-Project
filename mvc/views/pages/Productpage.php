<div class="row justify-content-center" style="height: 30px">
    <ul class="nav justify-content-center">
        <li class="nav-item justify-content-center">
            <a class="nav-link active" style="color: #a0a0a0; font-size: 14px;" href="http://localhost/t2k/Home">Trang chủ</a>
        </li>
        <span class="nav-item space" style="padding: 8px 2px; color: #a0a0a0; font-size: 14px;">/</span>
        <li class="nav-item trangsuc">
            <p style="padding: 8px 16px; font-size: 14px;">Trang sức</p>
        </li>
    </ul>
</div>
<!-- Slider (Carousel) -->
<br style="clear:both;">
<div class="row" id="slider">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li id="circle" data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li id="circle" data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li id="circle" data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li id="circle" data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            <li id="circle" data-target="#carouselExampleIndicators" data-slide-to="4"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://cdn.pnj.io/images/promo/143/Tabsale_T11_Chung-banner_peformance_1972x640CTA.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://cdn.pnj.io/images/promo/143/LDP-CT-STYLE-RETAIL_1972x640CTA.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://cdn.pnj.io/images/promo/142/Banner_ngoc_trai_scheme_1972x640CTA.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://cdn.pnj.io/images/promo/141/egift_banner_2022_1972x640CTA.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://cdn.pnj.io/images/promo/141/PNJ_FastBanner_1972x640CTA.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
            <span class="carousel-control-prev-icon" style="color: black;" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </button>
    </div>
</div>
<!-- ============ -->
<!-- Trending  -->
<div class="row-btn" id="row-btn">
    <div class="navbar-item2  col-md-4 col-lg-2 mt-3 ">
        <button type="submit" name="keyword" value="vàng" class="btn btn"><span> Trang Sức <br> Đính Kim Cương</span></button>
    </div>
    <div class="navbar-item2  col-md-4 col-lg-2 mt-3">
        <button type="submit" name="keyword" value="" class="btn btn"><span>Trang sức<br>Đính Đá Quý</span></button>
    </div>
    <div class="navbar-item2  col-md-4 col-lg-2 mt-3">
        <button type="submit" name="keyword" value="" class="btn btn"><span>Trang sức<br>Đính Ngọc Trai</span></button>
    </div>
    <div class="navbar-item2  col-md-4 col-lg-2 mt-3">
        <button type="submit" name="keyword" value="" class="btn btn"><span>Trang sức<br>Không Đính Đá</span></button>
    </div>
</div>
<!-- ============ -->
<!-- Product-Card -->
<?php
$obj = json_decode($data['DB']);
if (count($obj) > 0) { ?>
    <?php if (isset($data['Key'])) { ?>
        <h3>Kết quả tìm kiếm cho "<?php echo "<span style='color:#ef5777;'>" . $data['Key'] . "</span>" ?>" là :</h3>
    <?php } ?>
    <div class="row">
        <?php
        for ($i = 0; $i < count($obj); $i++) {
            if(isset($_SESSION['user_id']))
            $link = "http://localhost/t2k/Cart/Addtocart/". $obj[$i]->product_id ."/". $obj[$i]->product_name ."/". $obj[$i]->product_price ."";
        else 
            $link = "http://localhost/t2k/Cart";
        $img =  $obj[$i]->product_img ;
        ?>
            <form class="col-md-3 col-sm-6 my-4" method="post" action="http://localhost/t2k/Cart/AddToCart/">
                <div class="product-grid" style="border-radius:15px ;">
                    <div class="product-image">
                        <a href="http://localhost/t2k/Detail/ShowDetail/<?= $obj[$i]->product_id ?>">
                            <img class="pic-1" src="<?= $obj[$i]->product_img ?>">
                        </a>
                        <ul class="social">
                            <li><a href="http://localhost/t2k/Detail/ShowDetail/<?= $obj[$i]->product_id ?>" data-tip="Quick View"><i class="fa fa-search"></i></a></li>
                            <li><a href="http://localhost/t2k/Detail/ShowDetail/<?= $obj[$i]->product_id ?>" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
                            <li><a href="<?=$link?>" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                        <span class="product-new-label">Sale</span>
                        <span class="product-discount-label">5%</span>
                    </div>
                    <ul class="rating mb-4" style="margin-bottom:1.5rem ;">
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star"></li>
                    </ul>
                    <div class="product-content">
                        <h3 class="title" ><a href="http://localhost/t2k/Detail/ShowDetail/<?= $obj[$i]->product_id ?>" ><?= $obj[$i]->product_name ?></a></h3>
                        <div class="price"><?= number_format($obj[$i]->product_price) ?> VNĐ
                            <span><?= number_format(($obj[$i]->product_price) / 0.95) ?> VNĐ</span>
                        </div>
                        <a class="add-to-cart" href="<?=$link?>">+ Add To Cart</a>
                        <!-- <button class="btn" type="submit" name="addtocart" data-tip="Add to Cart">+ Add To Cart</button> -->
                    </div>
                </div>
            </form>
        <?php } ?>
    </div>
    <form action="" method="post" class="Page-Number mt-5">
        <input type="submit" name="page" class="page-number" value="1">
        <input type="submit" name="page" class="page-number" value="2">
        <input type="submit" name="page" class="page-number" value="3">
    </form>
<?php } else { ?>
    <h2 style="color:red; text-align: center;">Không tìm thấy sản phẩm !</h2> <?php } ?>