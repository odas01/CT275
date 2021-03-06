<?php
session_start();
ob_start();
include '../connect.php';
include '../array.php';
include '../function.php';

$userID = $_SESSION['user']['id'];

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        // them san pham
        case 'add':
            $newPd = array_keys($_POST['quantity'])[0];
            $arrCart = array_keys($_SESSION['cart']);

            if (!in_array($newPd, $arrCart)) {
                $result = mysqli_query($conn, "SELECT  `price` FROM `product` WHERE `id` = {$newPd}");
                $price = mysqli_fetch_array($result);
                mysqli_query(
                    $conn,
                    "INSERT INTO `cart` (`id`, `user_id`, `product_id`, `price`, `quantity`) VALUES
                (NULL, '{$userID}', '{$newPd}', '{$price['price']}', '{$_POST['quantity'][$newPd]}');"
                );

                update_cart();
            } else {
                update_cart();
                mysqli_query(
                    $conn,
                    "UPDATE `cart` SET `quantity` = {$_SESSION['cart'][$newPd]}  WHERE `cart`.`id` = (
                        SELECT `id` FROM `cart` WHERE `user_id` = $userID AND `product_id` = $newPd
                    )"
                );
            }
            header('Location: ./cart.php');
            break;

        // xoa san pham
        case 'delete':
            unset($_SESSION['cart'][$_GET['id']]);
            mysqli_query($conn, "delete from `cart` where `product_id`={$_GET['id']} and `user_id`={$userID} ;");
            if (count($_SESSION['cart']) == 0) {
                $_SESSION['cart'] = [];
            }
            header('Location: ./cart.php');
            break;

        // mua hang
        case 'submit':
            if (!empty($_POST['quantity'])) {
                $products = mysqli_query($conn, "SELECT * FROM `product` WHERE `id` IN (" . implode(",", array_keys($_SESSION['cart'])) . ")");
                $total = 0;
                $array = [];
                while ($row = mysqli_fetch_array($products)) {
                    $total += $row['price'] * $_POST['quantity'][$row['id']];
                    $array[$row['id']] = $row;
                }
                $total = total_price($total, $_POST['shipping'], $_POST['code']);

                //order
                mysqli_query(
                    $conn,
                    "INSERT INTO `order` (`id`,`user_id`, `name`, `address`, `phone`, `total`, `note`, `ship`, `code`) VALUES 
                    (NULL, {$userID}, '{$_POST['name']}', '{$_POST['address']}', '{$_POST['phone']}', '{$total}', '{$_POST['note']}'
                    ,'{$_POST['shipping']}', '{$_POST['code']}')"
                );

                //order detail
                $orderID = $conn->insert_id;
                $insertString = "";
                foreach ($array as $id => $product) {
                    $insertString .= "(NULL, '{$orderID}', '{$product['id']}', '{$product['price']}', '{$_POST['quantity'][$product['id']]}'),";
                }

                $insertString = chop($insertString, ',');
                mysqli_query($conn, "INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `price`, `quantity`) VALUES {$insertString}");

                //delete cart
                mysqli_query($conn, "delete from `cart` where `user_id`={$userID} ;");
                $_SESSION['cart'] = [];
                sleep(2);
                header('Location: ./cart.php');
            }
            break;
    }
    ob_end_flush();
}

//render s???n ph???m tr??n sql
$result = mysqli_query(
    $conn,
    "SELECT *
    FROM `cart`
    INNER JOIN `product`
    ON `cart`.`product_id` = `product`.`id`
    WHERE `cart`.`user_id` = {$userID}"
);
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
    <link rel="stylesheet" href="../asset/css/login.css" />

    <!-- font family -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet" />

    <!-- icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Your Cart</title>
</head>

<body>
    <div class="app">
        <?php include "../partials/header.php"; ?>
        <div class="container">
            <?php include "../partials/breadcrumb.php"; ?>

            <div class="main">
                <form action="cart.php?action=submit" method="post" class="cart form__main" name="cart">
                    <div class="row">
                        <div class="col-lg-8 cart__left">
                            <h4 class="cart__title">GI??? H??NG</h4>
                            <?php if (!empty($_SESSION['cart'])) { ?>
                                <div class="cart__detail">
                                    <div class="cart__detail-title">
                                        <span>Chi ti???t s???n ph???m</span>
                                        <span>S??? l?????ng</span>
                                        <span>????n gi??</span>
                                        <span>T???ng</span>
                                    </div>
                                    <div class="cart__detail-list">
                                        <?php if (!empty($result)) {
                                            while ($row = mysqli_fetch_array($result)) { ?>
                                                <div class="cart__detail-item" data-index="<?= $row['id'] ?>">
                                                    <div class="cart__detail-info">
                                                        <div class="cart__detail-img">
                                                            <img src=".<?= $row['img'] ?>" alt="" />
                                                        </div>
                                                        <span class="cart__detail-name">
                                                            <?= $row['name'] ?>
                                                        </span>
                                                    </div>
                                                    <div class="cart__detail-body">
                                                        <div class="cart__detail-quanlity">
                                                            <div class="btn-down">
                                                                <i class="fa-solid fa-minus"></i>
                                                            </div>
                                                            <input class="quanlity" type="number" value="<?= $row['quantity'] ?>" name="quantity[<?= $row['id'] ?>]"></inp>
                                                            <div class="btn-up">
                                                                <i class="fa-solid fa-plus"></i>
                                                            </div>
                                                        </div>
                                                        <span class="cart__detail-price"><?= number_format($row['price'], 0, ".", ".") ?>???</span>
                                                        <span class="cart__detail-total"><?= number_format($row['price'] * $row['quantity'], 0, ".", ".") ?>???</span>
                                                        <span class="cart__detail-delete" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $row['id'] ?>" data-bs-toggle="tooltip" data-bs-placement="right" title="X??a s???n ph???m">
                                                            <i class="fa-solid fa-trash-can"></i>
                                                        </span>
                                                        <div class="modal fade" id="exampleModal<?= $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">C???nh b??o</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        B???n c?? ch???c ch???n x??a s???n ph???m?
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tr??? v???</button>

                                                                        <a href="cart.php?action=delete&id=<?= $row['id'] ?>">
                                                                            <button type="button" class="btn btn-primary">X??a
                                                                            </button>
                                                                        </a>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        <?php }
                                        } ?>
                                    </div>
                                </div>
                                <a href="./home.php" class="cart__empty-return">
                                    <svg stroke="currentColor" fill="none" stroke-width="0" viewBox="0 0 24 24" class="" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"></path>
                                    </svg>
                                    Ti???p t???c mua h??ng</a>
                            <?php } else { ?>
                                <div class="cart__empty">
                                    <div class="cart__empty-img">
                                        <img src="../asset/img/cart/noCart.png" alt="" />
                                    </div>
                                    <span class="cart__empty-message">B???n ch??a mua s???n ph???m n??o</span>
                                </div>
                            <?php } ?>
                            <a href="./home.php" class="cart__empty-return">
                                <svg stroke="currentColor" fill="none" stroke-width="0" viewBox="0 0 24 24" class="" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"></path>
                                </svg>
                                Ti???p t???c mua h??ng</a>
                        </div>
                        <div class="col-lg-4">
                            <div class="cart__total">
                                <h4 class="cart__title">T???NG TI???N</h4>
                                <div class="cart__total-info">
                                    <div class="cart__total-top">
                                        <span></span>
                                        <span>???</span>
                                    </div>
                                    <div class="cart__total-shipping">
                                        <label for="shipping">Ph????ng th???c v???n chuy???n</label>
                                        <select id="shipping" name="shipping">
                                            <option value="0">
                                                B??nh th?????ng - 0??? - tr??n 6
                                                ng??y
                                            </option>
                                            <option value="10">
                                                Ti???t ki???m - 10.000??? - 3/6
                                                ng??y
                                            </option>
                                            <option value="30">
                                                H???a t???c - 30.000??? - 1 ng??y
                                            </option>
                                            <option value="20">
                                                Nhanh - 20.000??? - 2/3 ng??y
                                            </option>
                                        </select>
                                    </div>
                                    <div class="cart__total-code">
                                        <label for="code">M?? gi???m gi??</label>
                                        <input type="text" name="code" placeholder="Enter 111 or 222 or 333... for discount" />
                                        <span class="cart__total-message"></span>
                                    </div>

                                    <div class="cart__total-price--total">
                                        <span>T???NG TI???N:</span>
                                        <span></span>
                                    </div>
                                    <div class="cart__total-buy">MUA</div>
                                </div>
                            </div>
                        </div>

                        <div class="cart__user">
                            <div class="cart__user-wrap">
                                <h4 class="cart__user-title">?????a ch??? ?????t h??ng</h4>
                                
                                <div class="cart__user-item form__group">
                                    <input type="text" name="name" placeholder="H??? v?? t??n" rule="required">
                                    <span class="form__message"></span>
                                </div>
                                <div class="cart__user-item form__group ">
                                    <input type="text" name="phone" placeholder="S??? ??i???n tho???i"  rule="required|number|minLength:10">
                                    <span class="form__message"></span>
                                </div>
                                <div class="cart__user-item form__group">
                                    <input name="address" type="text" placeholder="T???nh/Th??nh ph???, Qu???n/Huy???n, Ph????ng/X??"  rule="required|minLength:10">
                                    <span class="form__message"></span>
                                </div>
                                <div class="cart__user-item form__group">
                                    <textarea name="note" cols="30" rows="3" placeholder="Ghi ch??"></textarea>
                                    <span class="form__message"></span>
                                </div>
                                <div class="cart__user-btn">
                                    <span>TR??? L???I</span>
                                    <input type="submit" name="order-user" value="HO??N TH??NH">
                                </div>
                                
                            </div>
                            <div class="cart__user-overlay"></div>
                        </div>
                    </div>
                </form>

                <?php include "../partials/support.php"; ?>
            </div>
        </div>

        <?php include "../partials/footer.php"; ?>
    </div>


    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.8/dist/sweetalert2.all.min.js"></script>

    <script type="module" src="../asset/js/app.js"></script>
    <script type="module" src="../asset/js/cart.js"></script>
    <script type="module" src="../asset/js/form.js"></script>

</body>

</html>