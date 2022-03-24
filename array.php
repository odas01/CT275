<?php

include '../connect.php';

$array = mysqli_query($conn, 'SELECT * FROM `product`');
?>
<script>
    <?php
    $string = '';
    while ($row = mysqli_fetch_array($array)) {
        $string .= "{
                        id :{$row['id']},
                        name :'{$row['name']}',
                        price :{$row['price']},
                        img :'{$row['img']}'
                        },";
    }

    echo 'const products = [' . $string . '];';
    ?>
</script>