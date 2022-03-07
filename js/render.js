import { products } from './data.js';

//list product
products.forEach((product) => {
    const productWrap = document.querySelector(
        `#${product.type} .product-wrap`
    );
    let html = '';
    html = product.data.reduce((cur, item) => {
        return (
            cur +`        
        <div class="col-lg-3 col-sm-4 col-6">
        <div class="product-item">
            <div class="product-percent">
                <span>-8%</span>
            </div>
            <div class="product-img">
                <img
                    src="${item.img}"
                    alt=""
                />
            </div>
            <div class="product-body">
                <p class="product-name">
                ${item.name}
                </p>
                <div class="product-price">
                    <span
                        class="product-price--new"
                        >${item.price}₫</span
                    >

                    <span
                        class="product-price--old"
                    >
                    </span>
                </div>
            </div>
            <div class="product-bottom">
                <div
                    class="add-cart product-bottom--img"
                >
                    <div></div>
                </div>
                <div
                    class="product-bottom--img"
                >
                    <div></div>
                </div>
                <div
                    class="product-bottom--img"
                >
                    <div></div>
                </div>
            </div>
        </div>
    </div>`
        );
    }, '');
    productWrap.innerHTML = html;
});


const productItems = document.querySelectorAll(".product-item");

// old price
const oldPrice = {
    remainPrice(newPrice, percent) {
        let price = (newPrice / (100 + percent)) * 100;
        return (parseInt(price)/10000).toFixed()*10000;
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

//set quanlity
function printQuanlity() {
    const quanlityElement = document.querySelector(".nav-cart--quanlity");
    quanlityElement.innerHTML = localStorage.getItem("quanlity") ?? 0;
}
printQuanlity();


export {productItems, oldPrice, printQuanlity}