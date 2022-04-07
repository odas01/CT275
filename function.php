<?php 
//page hiện tại
function curPageName(){
    return substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);
}

//thay đổi số lượng
function update_cart(){
    foreach ($_POST['quantity'] as $id => $quantity) {
        if(empty($_SESSION['cart'][$id])){
            $_SESSION['cart'][$id] = 0;
        }
        $_SESSION['cart'][$id] += $quantity;
    }
}

function old_price($price , $percent){
    $oldPrice = round((($price / (100 - $percent)) * 100) / 1000) * 1000;
    return number_format($oldPrice, 0, ".", ".") . '₫';
}

function total_price($total, $shipping, $code){
    $shipping *= 1000;
    $code = (($code ? (int) $code : 0) / 111) * 7000;
    return $total + $shipping - $code;
}

