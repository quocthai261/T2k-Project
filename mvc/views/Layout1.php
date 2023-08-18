<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Owl-carousel -->
    <link rel="stylesheet" href="/t2k/public/other/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="/t2k/public/other/owlcarousel/assets/owl.theme.default.min.css">
    <script src="https://jquery.com/"></script>
    <script src="/t2k/public/other/owlcarousel/owl.carousel.min.js"></script>
    <style> <?php require_once "./public/css/test.css" ?> </style>
    <style> <?php require_once "./public/css/test1.css" ?></style>
    <style> <?php require_once "./public/css/product-card.css" ?> </style>
    <script src="/t2k/public/js/ajax_updatecart.js"></script>

    <title>T2K - Hệ thống phân phối trang suất hàng đầu Việt Nam</title>
</head>

<body>
    <div class="container">

        <!-- Nav-bar -->
        <nav class="navbar navbar-expand-lg navbar-light" style="padding: 8px 8px 8px 0;">
            <a class="navbar-brand" href="http://localhost/t2k/Home"><img style="width: 80px;" src="/t2k/public/image/Logo.jpg" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item ml-3">
                        <a class="nav-link" id="item" href="http://localhost/t2k/Product">Trang sức <span class="sr-only">(current)</span></a>
                    </li>
                    <!-- <li class="nav-item ml-3">
                        <a class="nav-link" id="item" href="http://localhost/t2k/Test/">Tìm Kiếm</a>
                    </li> -->
                    <li class="nav-item ml-3">
                        <a class="nav-link" id="item" href="http://localhost/t2k/About/">Về chúng tôi</a>
                    </li>
                </ul>
                <!-- action="http://localhost/t2k/Product/Search" -->
                <div class="nav-right col-lg-7 col-md-12">
                    <form action="http://localhost/t2k/Product/Search" method="post" class="d-flex nav-right col-7 col-xs-12 ">
                        <input value="" id="keyword" name="keyword" class="form-control" placeholder="Tìm kiếm nhanh" aria-label="Search">
                        <button class="btn" id="btnsearch" name="btn_search" type="submit"><i class="fa fa-search form-control-feedback"></i></button>
                    </form>
                    <a href="http://localhost/t2k/Cart" class="cart-icon ml-3 ">
                        <i class="fa-solid fa-cart-shopping icon-nav"></i>
                    </a>
                    <!-- ====== User icon -->
                    <?php require_once "./mvc/views/blocks/" . $data["User"] . ".php" ?>
                </div>
        </nav>
        <!-- Content -->
        <?php require_once "./mvc/views/pages/" . $data["Page"] . ".php" ?>
        <!--Footer start-->
        <footer>
            <div class="footer-wrap">
                <div class="container first_class">
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <p>T2K - Hệ thống phân phối trang suất hàng đầu Việt Nam. Sứ mạng của chúng tôi là đem đến khách hàng những gì tinh túy nhất.</p>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <form class="newsletter">
                                <input type="text" placeholder="Email Address">
                                <button class="newsletter_submit_btn" type="submit"><i class="fa fa-paper-plane"></i></button>
                            </form>

                        </div>
                        <div class="col-md-4 col-sm-6 d-none d-lg-block">
                            <div class="col-md-12">
                                <div class="standard_social_links">
                                    <div>
                                        <li class="round-btn btn-facebook"><a href="#"><i class="fab fa-facebook-f"></i></a>

                                        </li>
                                        <li class="round-btn btn-linkedin"><a href="#"><i class="fab fa-linkedin-in" aria-hidden="true"></i></a>

                                        </li>
                                        <li class="round-btn btn-twitter"><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a>

                                        </li>
                                        <li class="round-btn btn-instagram"><a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a>

                                        </li>
                                        <li class="round-btn btn-whatsapp"><a href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a>

                                        </li>
                                        <li class="round-btn btn-envelop"><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a>

                                        </li>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-12">
                                <h3 style="text-align: right;">Stay Connected</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="second_class ">
                    <div class="container second_class_bdr">
                        <div class="row">
                            <div class="col-md-4 col-sm-6">
                                <div class="footer-logo"><img src="/t2k/public/image/T2Km1.jpg" style="width:15%;" alt="logo">
                                </div>
                                <p>T2K là một thương hiệu mới trong ngành công nghiệp kinh doanh trang sức. 
                                Với mẫu mã đa dạng và giá cả cạnh tranh, chúng tôi cam kết sẽ cho khách hàng tận hưởng dịch vụ mua sắm tót nhất.</p>
                            </div>
                            <div class="col-md-4 col-sm-6 d-none d-lg-block">
                                <h3>Quick LInks</h3>
                                <ul class="footer-links">
                                    <li><a href="#">Home</a>
                                    </li>
                                    <li><a href="#">About us</a>
                                    </li>
                                    <!-- <li><a href="#">Triedge Partners</a> -->
                                    </li>
                                    <li><a href="#">Contact Us</a>
                                    </li>
                                    <li><a href="#" target="_blank">Terms &amp; Conditions</a>
                                    </li>
                                    <li><a href="#" target="_blank">Privacy Policy</a>
                                    </li>
                                    <!-- <li><a href="#">Sitemap</a> -->
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-4 col-sm-6 d-none d-lg-block">
                                <h3>OUR SERVICES</h3>
                                <ul class="footer-category">
                                    <li><a href="#">Fresher Jobs</a>
                                    </li>
                                    <li><a href="#">InternEdge - Internships &amp; Projects </a>
                                    </li>
                                    <li><a href="#">Resume Edge - Resume Writing Services</a>
                                    </li>
                                    <li><a href="#">Readers Galleria - Curated Library</a>
                                    </li>
                                    <li><a href="#">Trideus - Campus Ambassadors</a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="coppyright-row">

                        <div class="container-fluid">
                            <div class="copyright"> Copyright 2022 | All Rights Reserved by T2K</div>
                        </div>

                    </div>
                </div>
            </div>
        </footer>
        <!--Plugin-->
        <script>
            // $(document).ready(function() {
            //     $(".owl-carousel").owlCarousel();
            // });
            jQuery(".owl-carousel").owlCarousel({
                items: 3,
                loop: true,
                nav: false,
                responsive: {
                    0: {
                        items: 3,
                        stagePadding: 0
                    },
                    600: {
                        items: 4,
                        stagePadding: 0
                    },
                    1000: {
                        items: 5,
                        stagePadding: 0
                    }
                }
            });
        </script>
    </div>
</body>

</html>