const productItems = document.querySelectorAll(".product-item");

// old price
const oldPrice = {
    remainPrice(newPrice, percent) {
        let price = (newPrice / (100 + percent)) * 100;
        return parseInt(price);
    },
    convertStringToNum(string) {
        let arrString = string.split("");
        while (arrString.indexOf(".") !== -1) {
            arrString.splice(arrString.indexOf("."), 1);
        }
        arrString.pop();
        return parseInt(arrString.join(""));
    },
    convertNumToString(num) {
        let result = num.toString().split("").reverse();
        let count = result.length / 3 - 1;
        let index = -1;
        while (count > 0) {
            result.splice((index += 4), 0, ".");
            count--;
        }
        return result.reverse().join("") + "₫";
    },
    start() {
        productItems.forEach((productItem) => {
            let percentElement = productItem.querySelector(".product-percent span");
            let priceNewElement = productItem.querySelector(".product-price--new");
            let oldPriceElement = productItem.querySelector(".product-price--old");
            let percent = parseInt(percentElement.innerHTML);
            let priceNew = this.convertStringToNum(priceNewElement.innerHTML);
            let oldPrice = this.convertNumToString(this.remainPrice(priceNew, percent));
            oldPriceElement.innerHTML = oldPrice;
        });
    },
};
oldPrice.start();

//create Storage
function createStorage(key) {
    const store = JSON.parse(localStorage.getItem(key)) ?? {};
    const save = () => {
        localStorage.setItem(key, JSON.stringify(store));
    };
    return {
        get(key) {
            return store[key];
        },
        set(key, value) {
            store[key] = value;
            save();
        },
        remove(key) {
            delete store[key];
            save();
        },
    };
}

// toast
function alert(type, title = "Thành công", icon, message = "Đã thêm vào giỏ hàng ") {
    const alert = document.querySelector("#alert");
    if (alert) {
        const toast = document.createElement("div");
        toast.classList.add("alert", type);
        toast.innerHTML = `
        <div class="alert-icon ${icon}">
            <i class="far fa-check-circle"></i>
        </div>
        <div class="alert-body">
            <h3 class="alert-title">${title}</h3>
            <span class="alert-msg">${message}</span>
        </div>`;

        alert.appendChild(toast);
        setTimeout(() => {
            alert.removeChild(toast);
        }, 3100);
    }
}

// add product to storage
(function addProduct() {
    const cartStorage = createStorage("product");
    productItems.forEach((productItem, index) => {
        // init product
        const img = productItem.querySelector(".product-img img").src;
        const name = productItem.querySelector(".product-name").innerText;
        const price = oldPrice.convertStringToNum(productItem.querySelector(".product-price--new").innerHTML);
        const objProduct = { id: index, img, name, price };

        // add product
        productItem.querySelector(".add-cart").onclick = () => {
            let productListStorage = JSON.parse(localStorage.getItem("product")) ?? [];
            let quanlity;
            if (!productListStorage[index]) {
                alert();
                cartStorage.set(index, JSON.stringify(objProduct));
                
                //set quanlity
                quanlity = Object.keys(JSON.parse(localStorage.getItem("product"))).length;
                localStorage.setItem("quanlity", quanlity);
                printQuanlity();
            } else {
                alert("alert--error", "Thất bại", "alert-icon--error", "Sản phẩm đã có trong giỏ hàng");
            }
        };
    });
})();

//set quanlity
function printQuanlity() {
    const quanlityElement = document.querySelector(".nav-cart--quanlity");
    quanlityElement.innerHTML = localStorage.getItem("quanlity") ?? 0;
}
printQuanlity();

// nav
window.addEventListener("scroll", () => {
    const nav = document.querySelector(".nav");
    const main = document.querySelector(".main");
    nav.classList.toggle("nav-fixed", window.scrollY > 0);
    main.classList.toggle("main-margin", window.scrollY > 0);
});
