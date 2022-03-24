<?php
session_start();
include '../connect.php';
include '../array.php';
$result = mysqli_query($conn, 'select * from product where id = ' . $_GET['id']);
$product = mysqli_fetch_array($result);
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
    <link rel="stylesheet" href="../asset/css/detail.css" />
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
    <title><?= $product['name'] ?></title>
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
                    <a href="./index.php">
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
            <div class="main">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="main__img">
                            <img src=".<?= $product['img'] ?>" alt="" />
                        </div>
                        <div class="main__parameter">
                            Màn hình: 14.0 inch, 1920 x 1080 Pixels, IPS, 60 Hz, 250 nits, IPS LCD <br />
                            CPU: Intel, Core i5, 1135G7 <br />
                            RAM: 8 GB, DDR4, 3200 MHz <br />
                            Ổ cứng: SSD 512 GB <br />
                            Đồ họa: Intel Iris Xe Graphics <br />
                            Hệ điều hành: Windows 11 Home <br />
                            Trọng lượng: 1.4 kg <br />
                            Kích thước: 324 x 215.6 x 17.9 mm
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="main__detail">
                            <div class="main__detail-wrap">
                                <h4 class="main__detail-name">
                                    <?= $product['name'] ?>
                                </h4>

                                <div class="main__detail-descoration">
                                    ASUS VivoBook A415EA-EB1471W có thiết kế đẹp mắt, trẻ trung với màn hình IPS 14 inch Full HD và cấu hình mạnh, phù hợp cho nhiều nhu cầu sử dụng như làm việc văn phòng hay xử lý đồ họa, render video
                                    cơ bản.
                                </div>
                                <div class="main__detail-price">
                                    <p class="main__detai-price--new"><?= number_format($product['price'], 0, ".", ".") ?>₫</p>
                                    <p class="main__detai-price--old">
                                        <?php
                                        $oldPrice = round(($product['price'] / (100 - $product['percent']) * 100) / 1000) * 1000;
                                        echo number_format($oldPrice, 0, ".", ".") . '₫';
                                        ?>
                                    </p>
                                    <div class="main__detail-price--percent">
                                        <span><?= $product['percent'] ?></span>%
                                    </div>
                                </div>

                                <form action="cart.php?action=add" method="post">
                                    <div class="main__detail-quanlity">
                                        <span>
                                            <i class="fa-solid fa-minus"></i>
                                        </span>
                                        <input type="number" value="1" min="1" name="quantity[<?= $product['id'] ?>]" />
                                        <span><i class="fa-solid fa-plus"></i></span>
                                    </div>
                                    <button class="main__detail-buy"><i class="fa-solid fa-cart-shopping"></i>Add to cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>

        <div class="footer">
            <div class="container footer-list">
                <div class="footer-info row">
                    <div class="footer-wrap footer-wrap--contact col-lg-4 col-sm-6 col-12">
                        <img src="../asset/img/navbar/logo.png" alt="" />
                        <div>
                            <img src="../asset/img/footer-contact.png" alt="" />
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
                        <h5 class="footer-title">Phương thức thanh toán</h5>
                        <div class="footer-content">
                            <img src="../asset/img/payment.png" alt="" />
                        </div>
                    </div>
                    <div class="footer-wrap col-lg-4 col-sm-6 col-12">
                        <h5 class="footer-title">Kết nối với chúng tôi</h5>
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
                <img src="../asset/img/footer-fun.png" alt="" />
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
            <a href="https://goo.gl/maps/Dz13FPdKpy37769C6" class="support- tem">
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script type="module" src="../js/app.js"></script>
    <script type="module" src="../js/detail.js"></script>
</body>

</html>