(function renderProduct() {
    const dataStorage = JSON.parse(localStorage.getItem('product')) ?? {};
    const arr = [];
    Object.keys(dataStorage).forEach((index) => {
        arr.push(JSON.parse(dataStorage[index]));
    });
})();
