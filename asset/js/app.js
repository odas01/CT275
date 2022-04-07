$(document).ready(function () {
    //search
    const searchList = document.querySelector('.search-list');
    const searchInput = document.querySelector('.search-wrap input');
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
                            `<a href="detail.php?id=${item.id}" class="search-item">
                            <img
                            src=".${item.img}"
                            alt=""
                            />
                            <span> ${item.name}</span>
                        </a>`
                        );
                    }, '') ||
                `<div class="search-empty">
                            <img src="../asset/img/cart/nocartt.png" alt="">
                            <span>Không có sản phẩm phù hợp</span>
                        </div>`;
        }
        searchList.innerHTML = html;
    };

    //scrollToTop
    const scrollToTop = document.querySelector('.support-toTo');
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
    const menuMobile = $('.menu-mobile');
    const dropdown = $('.dropdown');
    const dropdownBody = $('.dropdown-body');
    $(menuMobile).click(function () {
        $(dropdown).css({
            opacity: '1',
            visibility: 'visible',
        });
        $(dropdownBody).css('transform', 'translateX(0%)');

        $('.dropdown-overlay').click(function (e) {
            e.stopPropagation();
            dropdown.css({
                opacity: '0',
                visibility: 'hidden',
            });
            $(dropdownBody).css('transform', 'translateX(-100%)');
        });
    });

    //tooltips
    document.querySelectorAll(".support-item--img").forEach((tooltip) => new bootstrap.Tooltip(tooltip));
});



