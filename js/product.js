import {createStorage} from './storage.js'
import {productItems, oldPrice,printQuanlity} from './render.js'
import {alert} from './app.js'

function addProduct() {
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
                alert('warning','<i class="fa-solid fa-circle-exclamation"></i>', 'Đã có trong giỏ hàng');
            }
        };
    });
};

addProduct()