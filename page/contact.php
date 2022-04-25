<?php
session_start();
ob_start();
include '../connect.php';
include '../array.php';
include '../function.php';

if (!empty($_GET) && $_GET['action'] == 'submit') {
    $query = "INSERT INTO `contact` (`id`, `name`, `phone`, `email`, `title`, `description`) 
   VALUES (NULL, '{$_POST['name']}', '{$_POST['phone']}', '{$_POST['email']}', '{$_POST['title']}', '{$_POST['des']}');";
    mysqli_query($conn, $query);
    sleep(1);
    header('Location: ./contact.php');
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
    <link rel="stylesheet" href="../asset/css/contact.css">

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
                <div class="row">
                    <div class="col-lg-5 col-sm-5">
                        <form class="form__main" action="contact.php?action=submit" method="post" name="contact">
                            <div class="form__group mb-3">
                                <label for="name" class="form_label">Họ tên</label>
                                <input class="d-block mt-2 " type="text" name="name" rule="required">
                                <span class="form__message"></span>
                            </div>
                            <div class="form__group mb-3">
                                <label for="email" class="form_label">Email</label>
                                <input class="d-block mt-2 " type="text" name="email" rule="required|email">
                                <span class="form__message"></span>
                            </div>
                            <div class="form__group mb-3">
                                <label for="phone" class="form_label">Điện thoại</label>
                                <input class="d-block mt-2 " type="text" name="phone" rule="required|number|minLength:10">
                                <span class="form__message"></span>
                            </div>
                            <div class="form__group mb-3">
                                <label for="title" class="form_label">Tiêu đề</label>
                                <input class="d-block mt-2" type="text" name="title" rule="required">
                                <span class="form__message"></span>
                            </div>
                            <div class="form__group mb-3">
                                <label for="des" class="form_label">Nội dung</label>
                                <textarea class="d-block mt-2" type="text" name="des" cols="30" rows="4"></textarea>
                                <span class="form__message"></span>
                            </div>
                            <button class="btn" type="submit">Submit</button>
                        </form>
                    </div>
                    <div class="col-lg-7 col-sm-7">

                        <div class="location">
                            <h4>Cửa hàng tại Cần Thơ</h4>
                            <p>Địa chỉ: 123 ktxB đại học Cần Thơ, Phường Xuân Khánh, Quận Ninh Kiều, Thành phố Cần Thơ, Việt Nam</p>
                            <p>Điện thoại: 0927123578</p>
                            <p>
                                <b>Mở cửa: </b>8h đến 20h, từ thứ 3 đến thứ 7
                            </p>
                        </div>
                        <div class="map">
                            <iframe class="w-100" 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3928.841518408634!2d105.76842661461575!3d10.029933692830687!2m3!1f0!2f0!3f0!
                            3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a0895a51d60719%3A0x9d76b0035f6d53d0!2zxJDhuqFpIGjhu41jIEPhuqduIFRoxqE!5e0!3m2!1svi!2s!4v1650553658210!5m2!1svi!2s" 
                            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <!-- sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.8/dist/sweetalert2.all.min.js"></script>

    <script type="module" src="../asset/js/app.js"></script>
    <script type="module" src="../asset/js/form.js"></script>
</body>

</html>