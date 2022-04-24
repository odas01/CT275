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
    <link rel="stylesheet" href="../asset/css/home.css">

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
            <?php include "../partials/category.php"; ?>  
            
            <?php include "../partials/slider.php"; ?>

            <div class="main">
                <div class="product" id="laptop" data-aos="fade-up" data-aos-duration="1000">
                    <h2 class="product__title">LAPTOP</h2>
                    <div class="product__list">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="banner">
                                    <div class="banner__item">
                                        <img src="../asset/img/laptop/banner2.png" alt="" />
                                    </div>
                                    <div class="banner__item">
                                        <img src="../asset/img/laptop/banner1.png" alt="" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="row product__wrap">
                                    <?php
                                    $query = 'SELECT * FROM `product` WHERE `type_id` = 1 limit 8';
                                    if ($result = mysqli_query($conn, $query)) {
                                        while ($row = mysqli_fetch_array($result)) { ?>
                                            <div class='col-lg-3 col-sm-4 col-6 '>
                                                <a class='product__item' href='detail.php?id=<?= $row['id'] ?>' >
                                                    <div class='product__percent'>
                                                        <span>-<?= $row['percent'] ?>%</span>
                                                    </div>
                                                    <div class='product__img'>
                                                        <img src='.<?= $row['img'] ?>' alt='' />
                                                    </div>
                                                    <div class='product__body'>
                                                        <p class='product__name'>
                                                            <?= $row['name'] ?>
                                                        </p>
                                                        <div class='product__price'>
                                                            <span class='product__price-new'>
                                                                <?= number_format($row['price'], 0, ".", ".") ?>₫
                                                            </span>

                                                            <span class='product__price-old'>
                                                                <?= old_price($row['price'], $row['percent']) ?>
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
                <div class="product" id="pc" data-aos="flip-left" data-aos-duration="1000">
                    <h2 class="product__title">PC / MÁY BÀN</h2>
                    <div class="product__list">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="row product__wrap">
                                    <?php
                                    $query = 'SELECT * FROM `product` WHERE `type_id` = 2 limit 8';
                                    if ($result = mysqli_query($conn, $query)) {
                                        while ($row = mysqli_fetch_array($result)) { ?>
                                            <div class='col-lg-3 col-sm-4 col-6 '>
                                                <a class='product__item' href='detail.php?id=<?= $row['id'] ?>'>
                                                    <div class='product__percent'>
                                                        <span>-<?= $row['percent'] ?>%</span>
                                                    </div>
                                                    <div class='product__img'>
                                                        <img src='.<?= $row['img'] ?>' alt='' />
                                                    </div>
                                                    <div class='product__body'>
                                                        <p class='product__name'>
                                                            <?= $row['name'] ?>
                                                        </p>
                                                        <div class='product__price'>
                                                            <span class='product__price-new'>
                                                                <?= number_format($row['price'], 0, ".", ".") ?>₫
                                                            </span>

                                                            <span class='product__price-old'>
                                                                <?= old_price($row['price'], $row['percent']) ?>
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

                            <div class="col-lg-3">
                                <div class="banner">
                                    <div class="banner__item">
                                        <img src="../asset/img/pc/banner2.png" alt="" />
                                    </div>
                                    <div class="banner__item">
                                        <img src="../asset/img/pc/banner1.jpg" alt="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product" id="ram" data-aos="flip-right" data-aos-duration="1000">
                    <h2 class="product__title">RAM</h2>
                    <div class="product__list">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="banner">
                                    <div class="banner__item">
                                        <img src="../asset/img/ram/banner1.jpeg" alt="" />
                                    </div>
                                    <div class="banner__item">
                                        <img src="../asset/img/ram/banner2.jpeg" alt="" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="row product__wrap">
                                    <?php
                                    $query = 'SELECT * FROM `product` WHERE `type_id` = 3 limit 8';
                                    if ($result = mysqli_query($conn, $query)) {
                                        while ($row = mysqli_fetch_array($result)) { ?>
                                            <div class='col-lg-3 col-sm-4 col-6 '>
                                                <a class='product__item' href='detail.php?id=<?= $row['id'] ?>'>
                                                    <div class='product__percent'>
                                                        <span>-<?= $row['percent'] ?>%</span>
                                                    </div>
                                                    <div class='product__img'>
                                                        <img src='.<?= $row['img'] ?>' alt='' />
                                                    </div>
                                                    <div class='product__body'>
                                                        <p class='product__name'>
                                                            <?= $row['name'] ?>
                                                        </p>
                                                        <div class='product__price'>
                                                            <span class='product__price-new'>
                                                                <?= number_format($row['price'], 0, ".", ".") ?>₫
                                                            </span>

                                                            <span class='product__price-old'>
                                                                <?= old_price($row['price'], $row['percent']) ?>
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
            </div>

            <?php include "../partials/brand.php"; ?>
            <?php include "../partials/support.php"; ?>
        
        </div>

        <?php include "../partials/footer.php"; ?>

    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- aos -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <script type="module" src="../asset/js/app.js"></script>

    <script>
        document.querySelectorAll(".product__item").forEach((tooltip) => {
            new bootstrap.Tooltip(tooltip, {
                html: true
            });
        });
    </script>
</body>

</html>