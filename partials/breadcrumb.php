<?php
$breadcrumb = '';
switch (curPageName()) {
    case "detail.php":
        $breadcrumb = $product['name'];
        break;
    case "cart.php":
        $breadcrumb = 'Giỏ hàng';
        break;
    case "contact.php":
        $breadcrumb = 'Liên hệ';
        break;
}
if (!empty($breadcrumb)) {
?>
    <nav aria-label="breadcrumb" style="--bs-breadcrumb-divider: '>';">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Trang chủ</li>
            <li class="breadcrumb-item active" aria-current="page"><?= $breadcrumb ?></li>
        </ol>
    </nav>

<?php } ?>