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

            <div class="main">
                <div class="row">
                    <div class="col-lg-5">
                        <form action="#" method="post" name="contact" >
                            <div class="form_group">
                                <label for="name" class="form_label">Họ tên</label>
                                <input type="text" name="name">
                            </div>
                            <div class="form_group">
                                <label for="email" class="form_label">Email</label>
                                <input type="text" name="email">
                            </div>
                            <div class="form_group">
                                <label for="phone" class="form_label">Điện thoại</label>
                                <input type="text" name="phone">
                            </div>
                            <div class="form_group">
                                <label for="title" class="form_label">Tiêu đề</label>
                                <input type="text" name="title">
                            </div>
                            <div class="form_group">
                                <label for="des" class="form_label">Nội dung</label>
                                <textarea type="text" name="des" cols="30" rows="4" placeholder=""> </textarea>
                            </div>
                            <button type="submit">Submit</button>
                        </form>
                    </div>
                    <div class="col-lg-7"></div>
                </div>
            </div>
            
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