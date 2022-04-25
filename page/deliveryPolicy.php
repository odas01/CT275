<?php
session_start();
ob_start();
include '../connect.php';
include '../array.php';
include '../function.php';
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
    <link rel="stylesheet" href="../asset/css/deliveryPolicy.css">

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
        <?php include "../partials/header.php"; ?>
        <div class="container">
            <?php include "../partials/breadcrumb.php"; ?>

            <div class="main">
                <h4 class="title">
                    CHÍNH SÁCH GIAO HÀNG
                </h4>

                <div class="policy">
                    <div class="policy__wrap">
                        <h5 class="policy__title">I. Chính sách giao hàng tại khu vực TP. Cần Thơ</h5>
                        <div class="policy__body">
                            <div class="policy__content">
                                <p>– Đơn hàng trên 300.000đ: miễn phí giao hàng.</p>
                                <p>– Đơn hàng dưới 300.000đ: phụ thu 15.000đ phí giao hàng.</p>
                            </div>
                            <div class="policy__time">** Thời gian giao hàng được thông báo trong quá trình đặt đơn hàng
                                tại website tùy vào địa chỉ nhận hàng mà quý khách cung cấp.</div>
                        </div>
                    </div>
                    <div class="policy__wrap">
                        <h5 class="policy__title">II. Chính sách giao hàng tại khu vực TP. Hồ Chí Minh</h5>
                        <div class="policy__body">
                            <div class="policy__content">
                                <p>– Đơn hàng trên 300.000đ: phụ thu 10.000đ phí giao hàng.</p>
                                <p>– Đơn hàng dưới 300.000đ: phụ thu 25.000đ phí giao hàng.</p>
                            </div>
                            <div class="policy__time">** Thời gian giao hàng được thông báo trong quá trình đặt đơn hàng
                                tại website tùy vào địa chỉ nhận hàng mà quý khách cung cấp.</div>
                        </div>
                    </div>
                    <div class="policy__wrap">
                        <h5 class="policy__title">III. Chính sách giao hàng với địa chỉ không thuộc khu vực Tp. Hồ Chí Minh, Tp. Cần Thơ:</h5>
                        <div class="policy__body">
                            <div class="policy__content">
                                <p>– Đơn hàng trên 300.000đ: miễn phí giao hàng.</p>
                                <p>– Đơn hàng dưới 300.000đ: phụ thu 20.000đ phí giao hàng.</p>
                                <p>– Chính sách giao hàng áp dụng từ thứ 2 đến thứ 7 trừ Chủ Nhật và ngày lễ</p>
                                <p>– Các mốc thời gian trên đây là thời gian dự kiến, trong một số trường hợp đặc biệt do yếu tố khách quan, đơn hàng của quý khách có thể được giao
                                    chậm hơn tối đa 1 ngày so với thời gian dự kiến.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php include "../partials/brand.php"; ?>
            <?php include "../partials/support.php"; ?>
        </div>

        <?php include "../partials/footer.php"; ?>

    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="../asset/js/app.js"></script>
</body>

</html>