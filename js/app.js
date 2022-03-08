import { products } from "./data.js";

// alert when add product
function alert(type = "suscess", icon = '<i class="fa-solid fa-check"></i>', title = "Thêm vào giỏ hàng") {
    const alertsElement = document.querySelector(".alerts");
    const alertElement = document.createElement("div");
    alertElement.classList.add("alert");
    alertElement.classList.add(`${type}`);
    alertElement.innerHTML = `
    ${icon}
    <p>${title}</p>
    <span class="countdown countdown--${type}"></span>
    `;
    alertsElement.appendChild(alertElement);
    setTimeout(() => {
        alertElement.style.animation = "slide_hide 2s ease forwards";
    }, 4000);
    setTimeout(() => {
        alertElement.remove();
    }, 6000);
}
// search
const data = products.reduce((cur, product) => {
    return cur.concat(product.data);
}, []);
const searchList = document.querySelector(".nav-search--list");
const searchInput = document.querySelector(".nav-search--wrap input");
searchInput.oninput = (e) => {
    const value = e.target.value.trim().toLowerCase();
    let html = "";
    if (value) {
        html =
            data
                .filter((item) => item.name.toLowerCase().includes(value))
                .reduce((cur, item) => {
                    return (
                        cur +
                        `<div class="nav-search--item">
                            <img
                            src="${item.img}"
                            alt=""
                            />
                            <span> ${item.name}</span>
                        </div>`
                    );
                }, "") ||
                        `<div class="nav-search--empty">
                            <img src="./asset/img/nocart.png" alt="">
                            <span>Không có sản phẩm phù hợp</span>
                        </div>`;
    }
    searchList.innerHTML = html;
};

// nav
window.addEventListener("scroll", function (event) {
    document.querySelector(".nav").classList.toggle("nav-scroll", this.scrollY > 70);
});

//scrollToTop
document.querySelector(".support-toTo").addEventListener("click", () =>
    window.scrollTo({
        top: 0,
        behavior: "smooth",
    })
);

// dropdown
const menuIcon = document.querySelector('.nav-menu > i');
const dropdownElement = document.querySelector('.dropdown');
const dropdownBodyElement = document.querySelector(".dropdown-body");
menuIcon.onclick = () => {
    Object.assign(dropdownElement.style, {
        opacity: '1',
        visibility: 'visible'
    });
    dropdownBodyElement.style.transform = 'translateX(0%)';
    
    //đóng menu
    document.querySelector('.dropdown-overlay').onclick = (e) => {
        Object.assign(dropdownElement.style, {
            opacity: '0',
            visibility: 'hidden'
        });
        dropdownBodyElement.style.transform = 'translateX(-100%)';  
    }
}
export { alert };
