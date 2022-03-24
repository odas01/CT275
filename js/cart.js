import { oldPrice } from './render.js';
$(document).ready(function () {
    const productItems = $('.cart__detail-item');
    const total = document.querySelector(
        '.cart__total-price--total span:last-child'
    );
    const sumQuanlity = document.querySelector(
        '.cart__total-top span:first-child'
    );
    const sumPrice = document.querySelector('.cart__total-top span:last-child');

    const cartInfor = {
        quanlity: quanlityOfProduct,
        price: priceOfProduct,
        shipping: 0,
        code: 0,
    };
    // FUNCTION
    function changeQuantity(type, eUpdate, price, total) {
        let newQuanlity;
        if (type === 'increase') {
            newQuanlity = +eUpdate.val() + 1;
        } else if (type === 'decline') {
            newQuanlity = +eUpdate.val() - 1;
        }
        eUpdate.val(newQuanlity);
        total.innerHTML = oldPrice.convertNumToString(
            oldPrice.convertStringToNum(price.innerHTML) * +eUpdate.val()
        );
        renderTotal();
    }

    function alert(type, message) {
        const alerts = $('<div>');
        alerts.addClass('alerts');
        const imgSrc = type
            ? '../asset/img/check.png'
            : '../asset/img/warning.png';
        const html = `
        <div class="alert">
            <div class="alert__img">
                <img src="${imgSrc}" alt="" />
            </div>
            <span class="alert__message">${message}</span>
        </div>
        `;
        alerts.html(html);
        $('body').append(alerts);
        setTimeout(() => {
            alerts.remove();
        }, 1500);
    }

    function quanlityOfProduct() {
        return Array.from(productItems).reduce(
            (cur, productItem) =>
                cur + +productItem.querySelector('.quanlity').value,
            0
        );
    }

    function priceOfProduct() {
        return Array.from(productItems).reduce((cur, productItem) => {
            let price = productItem.querySelector(
                '.cart__detail-total'
            ).innerHTML;
            return cur + oldPrice.convertStringToNum(price);
        }, 0);
    }

    function renderTotal() {
        sumQuanlity.innerHTML = `SỐ LƯỢNG: ${cartInfor.quanlity()}`;
        sumPrice.innerHTML = `${oldPrice.convertNumToString(
            cartInfor.price()
        )}`;

        const lastPrice =
            cartInfor.price() + cartInfor.shipping - cartInfor.code;
        total.innerHTML = oldPrice.convertNumToString(lastPrice);
    }
    renderTotal();

    function codeFunc(code) {
        return code % 111 === 0 && code < 1000 ? (code / 111) * 7000 : 0;
    }

    function shippingFunc(shipping) {
        switch (shipping) {
            case 10:
                return 10000;
            case 20:
                return 20000;
            case 30:
                return 30000;
            default:
                return 0;
        }
    }

    function messCode(code) {
        const messCode = document.querySelector('.cart__total-message');
        messCode.innerHTML =
            code > 0 ? 'Mã giảm giá hợp lệ' : 'Mã giảm giá không hợp lệ!';

        messCode.classList.toggle('cart__total-message--error', !code);
    }

    function validate(e) {
        const input = e.target;
        let valid = true;
        switch ($(input).attr('name')) {
            case 'name':
                valid = $(input).val() === '' || $(input).val().length < 10;
                break;
            case 'phone':
                let regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
                let phone = $(input).val();
                valid = !regex.test(phone);
                break;
            case 'address':
                valid = $(input).val() === '' || $(input).val().length < 10;
                break;
            case 'note':
                valid = $(input).val() === '' || $(input).val().length < 2;
                break;
        }
        $(input).toggleClass('cart__user-message', valid);
        return valid;
    }

    // HANDLE EVENT
    // thay đổi số lượng
    Array.from(productItems).forEach((productItem) => {
        const price = productItem.querySelector('.cart__detail-price');
        const total = productItem.querySelector('.cart__detail-total');
        const quanlity = $(
            productItem.querySelector('.cart__detail-quanlity')
        ).children();

        $(quanlity[2]).click((e) => {
            changeQuantity('increase', $(quanlity[1]), price, total);
        });

        $(quanlity[0]).click((e) => {
            if (+$(quanlity[1]).val() > 0) {
                changeQuantity('decline', $(quanlity[1]), price, total);
            }
        });
    });

    // tiền ship
    document.getElementById('shipping').onchange = (e) => {
        cartInfor.shipping = shippingFunc(+e.target.value);
        renderTotal();
    };

    // mã giảm giá
    const inputCode = document.querySelector('.cart__total-code input');
    inputCode.oninput = (e) => {
        const code = codeFunc(+inputCode.value);
        cartInfor.code = code;
        messCode(code);
        renderTotal();
    };

    // mở form
    $('.cart__total-buy').click(function (e) {
        if ($('.header__cart-quanlity').text() == 0) {
            alert(false, 'Vui lòng thêm sản phẩm vào giỏ hàng!');
        } else {
            cartUser.css('display', 'block');
            inputs.each((index, input) => {
                $(input).keyup(validate);
            });
        }
    });

    // đóng form
    $($('.cart__user-btn').children()[0]).click(function (e) {
        cartUser.css('display', 'none');
    });

    // form
    const formUser = $('.cart');
    const cartUser = $('.cart__user');
    const inputs = $('.cart__user-item').children();
    formUser.submit(function (e) {
        let isErrorForm = false;
        inputs.each((index, input) => {
            const valid = validate({ target: input });

            if (valid) {
                isErrorForm = true;
            }
        });
        if (!isErrorForm) {
            alert(true, 'Đơn hàng đã được khởi tạo thành công');
            setTimeout(() => {
                formUser[0].submit();
            }, 3000);
        } else {
            e.preventDefault();
            alert(false, 'Vui lòng điền đầy đủ thông tin');
        }
    });
});
