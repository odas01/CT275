export const productItems = document.querySelectorAll('.product-item');
// old price
export const oldPrice = {
    remainPrice(newPrice, percent) {
        let price = (newPrice / (100 - percent)) * 100;
        return (parseInt(price) / 10000).toFixed() * 10000;
    },
    convertStringToNum(string) {
        let arrString = string.split('');
        while (arrString.indexOf('.') !== -1) {
            arrString.splice(arrString.indexOf('.'), 1);
        }
        arrString.pop();
        return parseInt(arrString.join(''));
    },
    convertNumToString(num) {
        let result = num.toString().split('').reverse();
        let count = result.length / 3 - 1;
        let index = -1;
        while (count > 0) {
            result.splice((index += 4), 0, '.');
            count--;
        }
        return result.reverse().join('') + '₫';
    },
    start() {
        productItems.forEach((productItem) => {
            let percentElement = productItem.querySelector(
                '.product-percent span'
            );
            let priceNewElement = productItem.querySelector(
                '.product-price--new'
            );
            let oldPriceElement = productItem.querySelector(
                '.product-price--old'
            );

            // percentElement.innerHTML = parseInt(Math.random() * 15) + '%';
            let percent = parseInt(percentElement.innerHTML);
            let priceNew = this.convertStringToNum(priceNewElement.innerHTML);
            let oldPrice = this.convertNumToString(
                this.remainPrice(priceNew, percent)
            );
            oldPriceElement.innerHTML = oldPrice;
        });
    },
};