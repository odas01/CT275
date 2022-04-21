$(document).ready(function () {
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
