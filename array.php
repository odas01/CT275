<script>
    <?php
    include '../connect.php';

    //product
    $products = mysqli_query($conn, 'SELECT * FROM `product`');
    $string = '';
    while ($row = mysqli_fetch_array($products)) {
        $string .= "{
                        id :{$row['id']},
                        name :'{$row['name']}',
                        price :{$row['price']},
                        img :'{$row['img']}'
                        },";
    }

    echo 'const products = [' . $string . '];
    ';

    
    //phone
    $users = mysqli_query($conn, 'SELECT `id`, `phone`, `email`, `password` FROM `user` ');
    $string = '';
    while ($row = mysqli_fetch_array($users)) {
        $string .= "{
            id:{$row['id']},
            phone:{$row['phone']},
            email: '{$row['email']}',
            password: '{$row['password']}',
        },";
    }
    echo 'const users = [' . chop($string, ",") . ']';
    ?>
</script>