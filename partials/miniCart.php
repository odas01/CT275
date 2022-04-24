<div class="miniCart pb-1 px-3 pt-2">
    <div class="miniCart__box d-flex flex-column h-100">
        <h4>Giỏ hàng (<?= isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0 ?>)</h4>
        <?php if (!empty($_SESSION['cart'])) { ?>
            <div class="miniCart__list d-flex flex-column mt-1">
                <?php
                $result = mysqli_query(
                    $conn,
                    "SELECT *
                FROM `cart`
                INNER JOIN `product`
                ON `cart`.`product_id` = `product`.`id`
                WHERE `cart`.`user_id` = {$_SESSION['user']['id']}"
                );

                while ($row = mysqli_fetch_array($result)) {
                ?>

                    <div class="miniCart__item  d-flex align-items-center">
                        <div class="miniCart__item-img">
                            <img src=".<?= $row['img'] ?>" class="w-100" alt="">
                        </div>
                        <div class="miniCart__item-name ms-3"><?= $row['name'] ?></div>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="miniCart__link d-flex justify-content-center">
                <a href="./cart.php">Xem</a>
            </div>
        <?php } else { ?>

            <div class="miniCart__empty w-100 ">
                <img class="w-100" src="../asset/img/cart/noCart.png" alt="">
            </div>
        <?php } ?>
    </div>
</div>