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
                    console.log(123);
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

export { alert };
