<?php
if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = array(
        'id' => '',
        'name' => '',
    );
}

if (!empty($_GET['action'])) {
    switch ($_GET['action']) {
        case 'login':
            $query = "SELECT * FROM `user` WHERE `email` LIKE '{$_GET['email']}'";
            $result = mysqli_query($conn, $query);
            $fullname = mysqli_fetch_array($result);

            $_SESSION['user']['name'] = $fullname['fullname'];
            $_SESSION['user']['id'] = $fullname['id'];



            $result = mysqli_query($conn, "SELECT `product_id`
            FROM `cart`
            INNER JOIN `product`
            ON `cart`.`product_id` = `product`.`id`
            WHERE `cart`.`user_id` = {$_SESSION['user']['id']}");
            $carts = array();
            while ($row = mysqli_fetch_array($result)) {
                $carts[] = $row['product_id'];
            }
            $_SESSION['cart'] = $carts;

            header('Location: ./index.php');
            break;
        case 'logout':
            unset($_SESSION['user']);
            unset($_SESSION['cart']);
            header('Location: ./index.php');
            break;
    }
}
?>
<div class="header">
    <div class="menu-mobile">
        <div class="menu-mobile--img">
            <img src="../asset/img/navbar/menu.png" alt="" />
        </div>

        <div class="dropdown">
            <div class="dropdown-overlay"></div>
            <div class="dropdown-body">
                <div class="dropdown--list">
                    <div class="dropdown--top">
                        <?php if (!empty($_SESSION['user']['name'])) { ?>
                            <div class="dropdown__user">
                                <div class="dropdown__user-infor">
                                    <img src="../asset/img/navbar/user_mobile2.jfif" alt="">
                                    <span>Tiến Thành</span>
                                </div>
                                <a href="./index.php?action=logout" class="dropdown__user-logout">
                                    Logout
                                </a>
                            </div>
                        <?php } else { ?>
                            <i class="far fa-user"></i>
                            <a href="./login.php">Login</a>
                        <?php } ?>
                    </div>
                    <div class="dropdown--main">
                        <a href="">HOME</a>
                        <a href="">CONTACT</a>
                        <a href="">SUPPORT</a>
                    </div>
                    <div class="dropdown--bottom">
                        <a href="">Phone: <span>0329881171</span></a>
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
    <a href="tel:0329881181" class="phone">
        <div class="phone__img">
            <img src="../asset/img/navbar/phone.png" alt="" />
        </div>
        <span>0329881171</span>
    </a>
    <a href="<?= isset($_SESSION['cart']) ? "cart.php" : "login.php" ?>" class="header__cart">
        <div class="header__cart-icon">
            <img src="../asset/img/cart/cart.png" alt="" />
        </div>
        <span class="position-absolute  top-0 start-100 translate-middle badge rounded-pill bg-info">
            <?= isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0 ?>
        </span>
    </a>

    <div class="header__user">
        <?php if (!empty($_SESSION['user']['name'])) { ?>
            <div class="header__user-login">
                <div class="header__user-login--img">
                    <img src="../asset/img/navbar/user.png" alt="">
                </div>
                <span><?= $_SESSION['user']['name'] ?></span>
                <ul class="header__user-menu">
                    <li class="header__user-item"><a href="./index.php?action=logout">Đăng xuất</a></li>
                </ul>
            </div>

        <?php } else { ?>
            <a href="../page/login.php" class="header__user-link">
                <span>Đăng nhập</span>
            </a>
        <?php
        }
        ?>
    </div>
</div>