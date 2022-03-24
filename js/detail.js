
$(document).ready(function () {
    const newPrice = $('.main__detai-price--new')[0];
    const percent = +$('.main__detail-price--percent').children('span').text();

    const quanlity = $('.main__detail-quanlity').children();
    $(quanlity[2]).click((e) => {
        let newQuanlity = +$(quanlity[1]).val() + 1;
        $(quanlity[1]).val(newQuanlity);
    });

    $(quanlity[0]).click((e) => {
        if (+$(quanlity[1]).val() > 0) {
            let newQuanlity = +$(quanlity[1]).val() - 1;
            $(quanlity[1]).val(newQuanlity);
        }
    });
});
