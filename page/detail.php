<?php
ob_start();
session_start();
include '../connect.php';
include '../array.php';
include '../function.php';

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
        <?php include "../partials/header.php"; ?>
        <div class="container">
            <?php include "../partials/breadcrumb.php"; ?>

            <div class="main">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="main__img">
                            <img src=".<?= $product['img'] ?>" alt="" />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="main__detail">
                            <div class="main__detail-wrap">
                                <h4 class="main__detail-name">
                                    <?= $product['name'] ?>
                                </h4>

                                <div class="main__detail-descoration">
                                    <?= str_replace(',', '<br>', $product['detail']) ?>
                                </div>
                                <div class="main__detail-price">
                                    <p class="main__detai-price--new">
                                        <?= number_format($product['price'], 0, ".", ".") ?>₫
                                    </p>
                                    <p class="main__detai-price--old">
                                        <?= old_price($product['price'], $product['percent']) ?>
                                    </p>
                                    <div class="main__detail-price--percent">
                                        <span><?=- $product['percent'] ?></span>%
                                    </div>
                                </div>

                                <form action=" <?= isset($_SESSION['cart']) ? "cart.php?action=add" : "login.php" ?>" method="post">
                                    <div class="main__detail-quanlity">
                                        <span>
                                            <i class="fa-solid fa-minus"></i>
                                        </span>
                                        <input type="number" value="1" min="1" name="quantity[<?= $product['id'] ?>]" />
                                        <span><i class="fa-solid fa-plus"></i></span>
                                    </div>
                                    <button class="main__detail-buy"><i class="fa-solid fa-cart-shopping"></i>THÊM VÀO GIỎ HÀNG</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php include "../partials/support.php"; ?>
        </div>

        <?php include "../partials/footer.php"; ?>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script type="module" src="../asset/js/app.js"></script>
    <script type="module" src="../asset/js/detail.js"></script>
</body>

</html>