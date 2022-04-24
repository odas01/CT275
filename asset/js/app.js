$(document).ready(function () {
    //search
    const searchList = document.querySelector('.search__list');
    const searchInput = document.querySelector('.search__wrap input');
    searchInput.oninput = (e) => {
        const value = e.target.value.trim().toLowerCase();
        let html = '';
        if (value) {
            html =
                products
                    .filter((item) => item.name.toLowerCase().includes(value))
                    .reduce((cur, item) => {
                        return (
                            cur +
                            `<a href="detail.php?id=${item.id}" class="search__item d-flex align-items-center">
                            <img
                            src=".${item.img}"
                            alt=""
                            />
                            <span> ${item.name}</span>
                        </a>`
                        );
                    }, '') ||
                `<div class="search__empty flex-column d-flex justify-content-center align-items-center">
                            <img src="../asset/img/cart/nocartt.png" alt="">
                            <span>Không có sản phẩm phù hợp</span>
                        </div>`;
        }
        searchList.innerHTML = html;
    };

    //scrollToTop
    const scrollToTop = document.querySelector('.support__toTop');
    scrollToTop.addEventListener('click', () =>
        window.scrollTo({
            top: 0,
            behavior: 'smooth',
        })
    );

    window.addEventListener('scroll', () => {
        scrollToTop.classList.toggle('fadee', window.scrollY > 100);
    });

    //dropdown
    const menuMobile = $('.menu__mobile');
    const dropdown = $('.dropdown');
    const dropdownBody = $('.dropdown__body');
    $(menuMobile).click(function () {
        $(dropdown).css({
            opacity: '1',
            visibility: 'visible',
        });
        $(dropdownBody).css('transform', 'translateX(0%)');

        $('.dropdown__overlay').click(function (e) {
            e.stopPropagation();
            dropdown.css({
                opacity: '0',
                visibility: 'hidden',
            });
            $(dropdownBody).css('transform', 'translateX(-100%)');
        });
    });

    //tooltips
    document.querySelectorAll(".support__item-img").forEach((tooltip) => new bootstrap.Tooltip(tooltip));

    //miniCart
    let bool = false;
    $('.miniCart__icon').click(function (e) {
        e.stopPropagation();
        if(!bool)
            $('.miniCart').css('animation', 'showLeft 0.7s ease forwards');
        else   
            $('.miniCart').css('animation', 'hideRight 0.6s ease forwards');
        bool=!bool;
    });
});



