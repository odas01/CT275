<?php
session_start();
include '../connect.php';
include '../array.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

    <!-- css -->
    <link rel="stylesheet" href="../asset/css/style.css" />
    <link rel="stylesheet" href="../asset/css/home.css">
    <link rel="stylesheet" href="../asset/css/responsive.css" />

    <!-- font family -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet" />

    <!-- icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

    <!-- aos -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Computers</title>
</head>

<body>
    <div class="app">
        <div class="container">
            <div class="header">
                <div class="menu-mobile">
                    <i class="fa-solid fa-bars"></i>

                    <div class="dropdown">
                        <div class="dropdown-overlay"></div>
                        <div class="dropdown-body">
                            <div class="dropdown--list">
                                <div class="dropdown--top">
                                    <i class="far fa-user"></i>
                                    <div>
                                        <a href="">Đăng nhập</a>
                                        <a href="">Đăng ký</a>
                                    </div>
                                </div>
                                <div class="dropdown--main">
                                    <a href="">Trang chủ</a>
                                    <a href="">Liên hệ</a>
                                    <a href="">Hỗ trợ</a>
                                </div>
                                <div class="dropdown--bottom">
                                    <a href="">Điện thoại: <span>0329881171</span></a>
                                    <a href="">Email: <span>lntthanh3317@gmail.com</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="logo">
                    <a href="index.php">
                        <img src="../asset/img/navbar/logo.png" alt="" />
                    </a>
                </div>
                <div class="search">
                    <div class="search-wrap">
                        <input type="text" placeholder="Nhập tên sản phẩm cần tìm..." />
                        <div class="search-btn">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>
                        <div class="search-list"></div>
                    </div>
                </div>
                <a href="cart.php" class="header__cart">
                    <div class="header__cart-icon">
                        <img src="../asset/img/cart.png" alt="" />
                    </div>
                    <div class="header__cart-quanlity"><?= isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0 ?></div>
                </a>

                <div class="header__user">
                    <a href="" class="header__user-link">
                        <span>Đăng nhập</span>
                    </a>
                </div>
            </div>
            <div class="category">
                <div class="category-wrap">
                    <div class="category-item">
                        <i class="fa-solid fa-bars"></i>
                        <span>Danh mục sản phẩm</span>
                        <div class="category-item--list">
                            <div class="category-item--wrap">
                                <img src="../asset/img/category/laptop.png" alt="" />
                                <a href="#pc"> Laptop </a>
                            </div>
                            <div class="category-item--wrap">
                                <img src="../asset/img/category/pc.png" alt="" />
                                <a href="#pc"> PC </a>
                            </div>
                            <div class="category-item--wrap">
                                <img src="../asset/img/category/keyboard.png" alt="" />
                                <a href="#pc"> Phụ kiện Laptop/PC </a>
                            </div>
                            <div class="category-item--wrap">
                                <img src="../asset/img/category/usb.png" alt="" />
                                <a href="#pc"> USB </a>
                            </div>
                        </div>
                    </div>
                    <div class="category-item">
                        <a href="">Trang chủ</a>
                    </div>
                    <div class="category-item">
                        <a href="">Liên hệ</a>
                    </div>
                    <div class="category-item">
                        <a href="">Hỗ trợ</a>
                    </div>
                </div>
            </div>
            <div class="main">
                <div class="row">
                    <div class="slider col-lg-8 col-sm-12 col-12">
                        <div class="slider-top">
                            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="../asset/img/slide/slide1.jpg" class="d-block w-100" alt="..." />
                                    </div>
                                    <div class="carousel-item">
                                        <img src="../asset/img/slide/slide2.jpg" class="d-block w-100" alt="..." />
                                    </div>
                                    <div class="carousel-item">
                                        <img src="../asset/img/slide/slide3.png" class="d-block w-100" alt="..." />
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                        <div class="slide-bootom">
                            <div class="slide-bottom--pd">
                                <div class="slide-img">
                                    <img class="slide--hover" src="../asset/img/slide/slide7.png" alt="" />
                                </div>
                            </div>
                            <div class="slide-bottom--pd">
                                <div class="slide-img">
                                    <img class="slide--hover" src="../asset/img/slide/slide8.png" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12 col-12">
                        <div class="slide-right">
                            <div class="slide-right--pd">
                                <div class="slide-img">
                                    <img class="slide--hover" src="../asset/img/slide/slide5.png" alt="" />
                                </div>
                            </div>
                            <div class="slide-right--pd">
                                <div class="slide-img">
                                    <img class="slide--hover" src="../asset/img/slide/slide6.gif" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product" id="laptop" data-aos="fade-up">
                    <h2 class="product-title">LAPTOP</h2>
                    <div class="product-list">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="banner">
                                    <div class="banner-item">
                                        <img src="../asset/img/laptop/banner2.png" alt="" />
                                    </div>
                                    <div class="banner-item">
                                        <img src="../asset/img/laptop/banner1.png" alt="" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="row product-wrap">
                                    <?php
                                    $query = 'SELECT * FROM `product` WHERE `id` <= 8';
                                    if ($result = mysqli_query($conn, $query)) {
                                        while ($row = mysqli_fetch_array($result)) { ?>
                                            <div class='col-lg-3 col-sm-4 col-6 '>
                                                <a class='product-item' href='detail.php?id=<?= $row['id'] ?>' data-index={}>
                                                    <div class='product-percent'>
                                                        <span><?= $row['percent'] ?>%</span>
                                                    </div>
                                                    <div class='product-img'>
                                                        <img src='.<?= $row['img'] ?>' alt='' />
                                                    </div>
                                                    <div class='product-body'>
                                                        <p class='product-name'>
                                                            <?= $row['name'] ?>
                                                        </p>
                                                        <div class='product-price'>
                                                            <span class='product-price--new'><?= number_format($row['price'], 0, ".", ".") ?>₫</span>

                                                            <span class='product-price--old'>
                                                                <?php
                                                                $oldPrice = round((($row['price'] / (100 - $row['percent'])) * 100) / 1000) * 1000;
                                                                echo number_format($oldPrice, 0, ".", ".") . '₫';
                                                                ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                    <?php }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product" id="pc" data-aos="fade-right">
                    <h2 class="product-title">PC / MÁY BÀN</h2>
                    <div class="product-list">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="row product-wrap">
                                    <?php
                                    $query = 'SELECT * FROM `product` WHERE `id` BETWEEN 9 AND 16';
                                    if ($result = mysqli_query($conn, $query)) {
                                        while ($row = mysqli_fetch_array($result)) { ?>
                                            <div class='col-lg-3 col-sm-4 col-6 '>
                                                <a target="_blank" class='product-item' href='detail.php?id=<?= $row['id'] ?>' data-index={}>
                                                    <div class='product-percent'>
                                                        <span><?= $row['percent'] ?>%</span>
                                                    </div>
                                                    <div class='product-img'>
                                                        <img src='.<?= $row['img'] ?>' alt='' />
                                                    </div>
                                                    <div class='product-body'>
                                                        <p class='product-name'>
                                                            <?= $row['name'] ?>
                                                        </p>
                                                        <div class='product-price'>
                                                            <span class='product-price--new'><?= number_format($row['price'], 0, ".", ".") ?>₫</span>

                                                            <span class='product-price--old'>
                                                                <?php
                                                                $oldPrice = round((($row['price'] / (100 - $row['percent'])) * 100) / 1000) * 1000;
                                                                echo number_format($oldPrice, 0, ".", ".") . '₫';
                                                                ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <!-- <div class='product-bottom'>
                                                        <div class='add-cart product-bottom--img'>
                                                            <div></div>
                                                        </div>
                                                        <div class='product-bottom--img'>
                                                            <div></div>
                                                        </div>
                                                        <div class='product-bottom--img'>
                                                            <div></div>
                                                        </div>
                                                    </div> -->
                                                </a>

                                            </div>
                                    <?php }
                                    }
                                    ?>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="banner">
                                    <div class="banner-item">
                                        <img src="../asset/img/pc/banner2.png" alt="" />
                                    </div>
                                    <div class="banner-item">
                                        <img src="../asset/img/pc/banner1.jpg" alt="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="pagatation">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="#">Previous</a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link text-secondary" href="#">2</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link text-secondary" href="#">3</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>

                <div class="brand">
                    <h5 class="brand-title">
                        CÁC NHÃN HIỆU ĐƯỢC ƯA CHUỘNG
                    </h5>
                    <div class="brand-list">
                        <div class="brand-item">
                            <img src="../asset/img/brand/samsung.png" alt="" />
                        </div>
                        <div class="brand-item">
                            <img src="../asset/img/brand/asus.jpg" alt="" />
                        </div>
                        <div class="brand-item">
                            <img src="../asset/img/brand/crucial.png" alt="" />
                        </div>
                        <div class="brand-item">
                            <img src="../asset/img/brand/intel.png" alt="" />
                        </div>
                        <div class="brand-item">
                            <img src="../asset/img/brand/msi.jpg" alt="" />
                        </div>
                        <div class="brand-item">
                            <img src="../asset/img/brand/apple.jpg" alt="" />
                        </div>
                        <div class="brand-item">
                            <img src="../asset/img/brand/kingston.png" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer">
            <div class=" container footer-list">
                <div class="footer-info row">

                    <div class="footer-wrap footer-wrap--contact col-lg-4 col-sm-6 col-12">
                        <img src="../asset/img/navbar/logo.png" alt="">
                        <div>
                            <img src="../asset/img/footer-contact.png" alt="">
                            <span>Hợp tác với chúng tôi</span>
                        </div>
                    </div>
                    <div class="footer-wrap col-lg-4 col-sm-6 col-12">
                        <h5 class="footer-title">Về chúng tôi</h5>
                        <div class="footer-content">
                            <p><i class="fas fa-map-marker-alt"></i> Khu II, đường 3/2, phường Xuân Khánh, quận Ninh Kiều, thành phố Cần Thơ, Việt Nam</p>
                            <p><i class="fas fa-envelope"></i>ct18816dhct06@student.ctu.edu.vn</p>
                        </div>
                    </div>
                    <div class="footer-wrap col-lg-4 col-sm-6 col-12">
                        <h5 class="footer-title">Hỗ trợ khách hàng</h5>
                        <div class="footer-content">
                            <p>Gửi yêu cầu bảo hành</p>
                            <p>Gửi yêu cầu đổi trả</p>
                            <p>
                                P. Hỗ trợ khách hàng:
                                <span>lntthanh3317@gmail.com</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="footer-contact row">
                    <div class="footer-wrap col-lg-4 col-sm-6 col-12">
                        <h5 class="footer-title">
                            Phương thức thanh toán
                        </h5>
                        <div class="footer-content">
                            <img src="../asset/img/payment.png" alt="" />
                        </div>
                    </div>
                    <div class="footer-wrap col-lg-4 col-sm-6 col-12">
                        <h5 class="footer-title">
                            Kết nối với chúng tôi
                        </h5>
                        <div class="footer-content footer-content--contact d-flex">
                            <div class="footer-content--icon">
                                <i class="fa-brands fa-facebook"></i>
                            </div>
                            <div class="footer-content--icon">
                                <i class="fa-brands fa-twitter"></i>
                            </div>
                            <div class="footer-content--icon">
                                <i class="fa-brands fa-youtube"></i>
                            </div>
                            <div class="footer-content--icon">
                                <i class="fa-brands fa-instagram"></i>
                            </div>
                            <div class="footer-content--icon">
                                <i class="fa-brands fa-google"></i>
                            </div>
                        </div>
                    </div>

                    <div class="footer-wrap col-lg-4 col-sm-12 col-12">
                        <h5 class="footer-title">
                            Đăng ký nhận khuyến mãi
                        </h5>
                        <div class="footer-content">
                            <input type="text" placeholder="@gmail.com" />
                            <button>Đăng ký</button>
                        </div>
                    </div>
                </div>
                <div class="footer-license">
                    <p>© Bản quyền thuộc về <b> lntthanh3317</b></p>
                </div>
            </div>
            <div class="footer-fun">
                <img src="../asset/img/footer-fun.png" alt="">
            </div>
        </div>

        <div class="support">
            <a href="https://www.facebook.com/o.das1vs5" target="_blank" class="support-item">
                <div class="support-item--img">
                    <img src="../asset/img/support/mess.svg" alt="" />
                </div>
                <div class="support-item--content">
                    Chat với Tiến Thành để được tư vấn
                </div>
            </a>
            <a href="https://goo.gl/maps/Dz13FPdKpy37769C6" class="support-item">
                <div class="support-item--img">
                    <img src="../asset/img/support/place.svg" alt="" />
                </div>
                <div class="support-item--content">
                    ktxB, đại học Cần Thơ
                </div>
            </a>
            <a href="" class="support-item">
                <div class="support-item--img">
                    <img src="../asset/img/support/ship.svg" alt="" />
                </div>
                <div class="support-item--content">
                    Giao hàng toàn quốc, tận nơi miễn phí
                </div>
            </a>
            <a href="tel:0329881171" class="support-item">
                <div class="support-item--img">
                    <img src="../asset/img/support/phone.svg" alt="" />
                </div>
                <div class="support-item--content">0329881171</div>
            </a>

            <div class="support-toTo">
                <i class="fa-solid fa-chevron-up"></i>
                <i class="fa-solid fa-chevron-up"></i>
            </div>
        </div>

    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- aos -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script type="module" src="../js/app.js"></script>-
</body>

</html>