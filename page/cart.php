<?php
session_start();

include '../connect.php';
include '../array.php';

//giỏ hàng có sản phẩm?
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_GET['action'])) {
    function update_cart($add = false)
    {
        foreach ($_POST['quantity'] as $id => $quantity) {
            if ($quantity == 0) {
                unset($_SESSION['cart'][$id]);
            } else {
                if ($add) {
                    $_SESSION['cart'][$id] += $quantity;
                } else {
                    $_SESSION['cart'][$id] = $quantity;
                }
            }
        }
    }
    switch ($_GET['action']) {
        case 'add':
            update_cart(true);
            header('Location: ./cart.php');
            break;
        case 'delete':
            if (isset($_GET['id'])) {
                unset($_SESSION['cart'][$_GET['id']]);
                header('Location: ./cart.php');
            }
            break;
        case 'submit':
            if (isset($_POST['order-user'])) {


                if (!empty($_POST['quantity'])) {
                    update_cart();
                    $products = mysqli_query($conn, "SELECT * FROM `product` WHERE `id` IN (" . implode(",", array_keys($_SESSION['cart'])) . ")");
                    $total = 0;
                    $array = [];
                    while ($row = mysqli_fetch_array($products)) {
                        $total += $row['price'] * $_POST['quantity'][$row['id']];
                        $array[$row['id']] = $row;
                    }
                    //tien ship
                    $total += $_POST['shipping'] * 1000;

                    // ma giam gia
                    $total -= (($_POST['code'] ? (int) $_POST['code'] : 0) / 111) * 7000;

                    // inserOrder table
                    $insertOrder = mysqli_query(
                        $conn,
                        "INSERT INTO `order` (`id`, `name`, `address`, `phone`, `total`, `note`, `shipping`, `code`) VALUES (NULL, '{$_POST['name']}', '{$_POST['address']}', '{$_POST['phone']}', '{$total}', '{$_POST['note']}', '{$_POST['shipping']}', '{$_POST['code']}')"
                    );

                    // insertCart table
                    $orderID = $conn->insert_id;
                    $insertString = "";
                    foreach ($array as $id => $product) {
                        $insertString .= "(NULL, '{$orderID}', '{$product['id']}', '{$product['price']}', '{$_POST['quantity'][$product['id']]}'),";
                    }
                    $insertString = chop($insertString, ',');
                    $inserCart = mysqli_query($conn, "INSERT INTO `cart` (`id`, `order_id`, `product_id`, `price`, `quanlity`) VALUES {$insertString}");

                    unset($_SESSION['cart']);
                    header('Location: ./cart.php');
                }
            }
            break;
    }
}

//render sản phẩm trong SESSION
if (!empty($_SESSION['cart'])) {
    $result = mysqli_query($conn, "SELECT * FROM `product` WHERE `id` IN (" . implode(",", array_keys($_SESSION['cart'])) . ")");
} else {
    $result = [];
}
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
    <link rel="stylesheet" href="../asset/css/cart.css" />
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
    <title>Cart</title>
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
                                        <a href="">₫ăng nhập</a>
                                        <a href="">₫ăng ký</a>
                                    </div>
                                </div>
                                <div class="dropdown--main">
                                    <a href="">Trang chủ</a>
                                    <a href="">Liên hệ</a>
                                    <a href="">Hỗ trợ</a>
                                </div>
                                <div class="dropdown--bottom">
                                    <a href="">₫iện thoại:
                                        <span>0329881171</span></a>
                                    <a href="">Email:
                                        <span>lntthanh3317@gmail.com</span></a>
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
                    <div class="header__cart-quanlity"><?= $_SESSION['cart'] ? count($_SESSION['cart']) : 0 ?></div>
                </a>

                <div class="header__user">
                    <a href="" class="header__user-link">
                        <span>₫ăng nhập</span>
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
        </div>

        <div class="main">
            <div class="container">
                <form action="cart.php?action=submit" method="post" class="cart">
                    <div class="row">
                        <div class="col-lg-8 cart__left">
                            <h4 class="cart__title">Shopping cart</h4>
                            <?php if (!empty($_SESSION['cart'])) { ?>
                                <div class="cart__detail">
                                    <div class="cart__detail-title">
                                        <span>Chi tiết sản phẩm</span>
                                        <span>Số lượng</span>
                                        <span>Đơn giá</span>
                                        <span>Tổng</span>
                                    </div>

                                    <?php if (!empty($result)) {
                                        $num = 1;
                                        $quanlity = 0;
                                        $total = 0;
                                        while ($row = mysqli_fetch_array($result)) { ?>
                                            <div class="cart__detail-list">
                                                <div class="cart__detail-item" data-index="${item.id}">
                                                    <div class="cart__detail-info">
                                                        <div class="cart__detail-img">
                                                            <img src=".<?= $row['img'] ?>" alt="" />
                                                        </div>
                                                        <span class="cart__detail-name">
                                                            <?= $row['name'] ?>
                                                        </span>
                                                    </div>
                                                    <div class="cart__detail-quanlity">
                                                        <div class="btn-down">
                                                            <i class="fa-solid fa-minus"></i>
                                                        </div>
                                                        <input class="quanlity" type="number" value="<?= $_SESSION['cart'][$row['id']] ?>" name="quantity[<?= $row['id'] ?>]"></inp>
                                                        <div class="btn-up">
                                                            <i class="fa-solid fa-plus"></i>
                                                        </div>
                                                    </div>
                                                    <span class="cart__detail-price"><?= number_format($row['price'], 0, ".", ".") ?>₫</span>
                                                    <span class="cart__detail-total"><?= number_format($row['price'] * $_SESSION['cart'][$row['id']], 0, ".", ".") ?>₫</span>
                                                    <a href="cart.php?action=delete&id=<?= $row['id'] ?>" class="cart__detail-delete">
                                                        <i class="fa-solid fa-trash-can"></i>
                                                    </a>
                                                </div>
                                            </div>
                                    <?php
                                            $quanlity += $_SESSION['cart'][$row['id']];
                                            $total += $row['price'] * $_SESSION['cart'][$row['id']];
                                            $num++;
                                        }
                                    } ?>
                                </div>
                                <a href="./index.php" class="cart__empty-return">
                                    <svg stroke="currentColor" fill="none" stroke-width="0" viewBox="0 0 24 24" class="" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"></path>
                                    </svg>
                                    Tiếp tục mua hàng</a>
                            <?php } else { ?>
                                <div class="cart__empty">
                                    <div class="cart__empty-img">
                                        <img src="../asset/img/cart/noCart.png" alt="" />
                                    </div>
                                    <span class="cart__empty-message">Bạn chưa mua sản phẩm nào</span>
                                    <a href="./index.php" class="cart__empty-return">
                                        <svg stroke="currentColor" fill="none" stroke-width="0" viewBox="0 0 24 24" class="" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"></path>
                                        </svg>
                                        Tiếp tục mua hàng</a>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="col-lg-4">
                            <div class="cart__total">
                                <h4 class="cart__title">Total</h4>
                                <div class="cart__total-info">
                                    <div class="cart__total-top">
                                        <span></span>
                                        <span>₫</span>
                                    </div>
                                    <div class="cart__total-shipping">
                                        <label for="shipping">Phương thức vận chuyển</label>
                                        <select id="shipping" name="shipping">
                                            <option value="0">
                                                Bình thường - 0₫ - trên 6
                                                ngày
                                            </option>
                                            <option value="10">
                                                Tiết kiệm - 10.000₫ - 3/6
                                                ngày
                                            </option>
                                            <option value="30">
                                                Hỏa tốc - 30.000₫ - 1 ngày
                                            </option>
                                            <option value="20">
                                                Nhanh - 20.000₫ - 2/3 ngày
                                            </option>
                                        </select>
                                    </div>
                                    <div class="cart__total-code">
                                        <label for="code">Mã giảm giá</label>
                                        <input type="text" name="code" placeholder="Enter 111 or 222 or 333... for discount" />
                                        <span class="cart__total-message"></span>
                                    </div>

                                    <div class="cart__total-price--total">
                                        <span>Tổng tiền:</span>
                                        <span></span>
                                    </div>
                                    <?php
                                    if (!isset($_POST['shipping'])) {
                                        $_POST['shipping'] = 0;
                                    }
                                    $_POST['shipping'] = 0;
                                    ?>
                                    <div class="cart__total-buy">MUA</div>
                                </div>
                            </div>
                        </div>

                        <div class="cart__user">
                            <div class="cart__user-wrap">
                                <h4 class="cart__user-title">Địa chỉ đặt hàng</h4>
                                <div class="cart__user-item">
                                    <input type="text" name="name" placeholder="Họ và tên">
                                </div>
                                <div class="cart__user-item">
                                    <input type="text" name="phone" placeholder="Số điện thoại">
                                </div>
                                <div class="cart__user-item">
                                    <input name="address" type="text" placeholder="Tỉnh/Thành phố, Quận/Huyện, Phương/Xã">
                                </div>
                                <div class="cart__user-item">
                                    <textarea name="note" cols="30" rows="3" placeholder="Ghi chú"></textarea>
                                </div>
                                <div class="cart__user-btn">
                                    <span>TRỞ LẠI</span>
                                    <input type="submit" name="order-user" value="HOÀN THÀNH">
                                </div>
                            </div>
                            <div class="cart__user-overlay"></div>
                        </div>
                    </div>
                </form>
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
                        <p>
                            <i class="fas fa-map-marker-alt"></i> Khu
                            II, ₫ường 3/2, phường Xuân Khánh, quận Ninh
                            Kiều, thành phố Cần Thơ, Việt Nam
                        </p>
                        <p>
                            <i class="fas fa-envelope"></i>ct18816dhct06@student.ctu.edu.vn
                        </p>
                    </div>
                </div>
                <div class="footer-wrap col-lg-4 col-sm-6 col-12">
                    <h5 class="footer-title">Hỗ trợ khách hàng</h5>
                    <div class="footer-content">
                        <p>Gửi yêu cầu bảo hành</p>
                        <p>Gửi yêu cầu ₫ổi trả</p>
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
                        ₫ăng ký nhận khuyến mãi
                    </h5>
                    <div class="footer-content">
                        <input type="text" placeholder="@gmail.com" />
                        <button>₫ăng ký</button>
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
                Chat với Tiến Thành ₫ể ₫ược tư vấn
            </div>
        </a>
        <a href="https://goo.gl/maps/Dz13FPdKpy37769C6" class="support-item">
            <div class="support-item--img">
                <img src="../asset/img/support/place.svg" alt="" />
            </div>
            <div class="support-item--content">
                ktxB, ₫ại học Cần Thơ
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


    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script type="module" src="../js/app.js"></script>
    <script type="module" src="../js/cart.js"></script>

</body>

</html>