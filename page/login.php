<?php
session_start();
ob_start();
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
    <link rel="stylesheet" href="../asset/css/style.css">
    <link rel="stylesheet" href="../asset/css/signup.css">

    <!-- font family -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet" />

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Computers</title>
</head>
<body>

    <div class="app">
        <div class="main">
            <a href="./index.php" class="logo">
                <img src="../asset/img/navbar/logo.png" alt="">
            </a>
            <div class="form">
                <?php
                if (!empty($_GET) && ($_GET['action'] == 'reg')) {
                    if (isset($_POST['username']) && isset($_POST['phone']) && isset($_POST['password']) && isset($_POST['email'])) {
                        $query = "INSERT INTO `user` (`id`, `fullname`, `phone`, `password`, `email`) VALUES (NULL, '{$_POST['username']}', '{$_POST['phone']}', '{$_POST['password']}', '{$_POST['email']}');";
                        $result = mysqli_query($conn, $query);
                        sleep(1);
                        header("Location: ./login.php");
                    } else {
                ?>
                        <form action="./login.php?action=reg" class="form__main" method="post" name="reg">
                            <h2 class="form__title">Đăng ký</h2>
                            <div class="form__group">
                                <input type="text" name="username" placeholder="Họ tên">
                                <span class="form__message"></span>
                            </div>
                            <div class="form__group">
                                <input type="text" name="phone" placeholder="Số điện thoại">
                                <span class="form__message"></span>
                            </div>
                            <div class="form__group">
                                <input type="email" name="email" placeholder="Email">
                                <span class="form__message"></span>
                            </div>
                            <div class="form__group">
                                <input type="password" name="password" placeholder="Mật khẩu">
                                <span class="form__message"></span>
                            </div>
                            <div class="form__group">
                                <input type="password" name="confirm_password" placeholder="Nhập lại mật khẩu">
                                <span class="form__message"></span>
                            </div>
                            <div class="form__signin">
                                <span>Bạn đã có tài khoản? </span>
                                <a href="./login.php">Đăng nhập</a>
                            </div>

                            <button name="submit" class="btn btn-primary ms-3 mt-3"> Đăng ký</button>
                            <button class="btn btn-secondary mt-3">Trở về</button>
                        </form>
                    <?php
                    }
                } else {
                    if (isset($_POST['email']) && isset($_POST['password'])) {
                        sleep(1);
                        header("Location: ./index.php?action=login&&email={$_POST['email']}");
                    } else {
                    ?>
                        <form action="./login.php?action=login" class="form__main" method="post" name="login">
                            <h2 class="form__title">Đăng nhập</h2>
                            <div class="form__group">
                                <input type="email" name="email" placeholder="Email">
                                <span class="form__message"></span>
                            </div>
                            <div class="form__group">
                                <input type="password" name="password" placeholder="Mật khẩu">
                                <span class="form__message"></span>
                            </div>
                            <div class="form__signin">
                                <span>Bạn chưa có tài khoản? </span>
                                <a href="./login.php?action=reg">Đăng ký</a>
                            </div>

                            <button name="submit" class="btn btn-primary ms-3 mt-3"> Đăng nhập</button>
                            <button class="btn btn-secondary mt-3">Trở về</button>
                        </form>
                <?php
                    }
                }   ?>

                <div class="form__overlay"></div>
            </div>
        </div>
    </div>



    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script type="module" src="../asset/js/form.js"></script>

</body>

</html>