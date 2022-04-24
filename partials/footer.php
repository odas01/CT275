<div class="footer">
    <div class="container footer__list">
        <div class="footer__info row">
            <div class="footer__wrap footer__wrap-contact col-lg-4 col-sm-6 col-12">
                <img src="../asset/img/navbar/logo.png" alt="" />
                <div>
                    <img src="../asset/img/footer/footer-contact.png" alt="" />
                    <span>Hợp tác với chúng tôi</span>
                </div>
            </div>
            <div class="footer__wrap col-lg-4 col-sm-6 col-12">
                <h5 class="footer__title">Về chúng tôi <i class=""></i></h5>
                <div class="footer__content">
                    <p><i class="fas fa-map-marker-alt"></i> Khu II, đường 3/2, phường Xuân Khánh, quận Ninh Kiều, thành phố Cần Thơ, Việt Nam</p>
                    <p><i class="fas fa-envelope"></i>ct18816dhct06@student.ctu.edu.vn</p>
                </div>
            </div>
            <div class="footer__wrap col-lg-4 col-sm-6 col-12">
                <h5 class="footer__title">Hỗ trợ khách hàng <i class=""></i> </h5>
                <div class="footer__content">
                    <p>Gửi yêu cầu bảo hành</p>
                    <p>Gửi yêu cầu đổi trả</p>
                    <p>
                        P. Hỗ trợ khách hàng:
                        <span>lntthanh3317@gmail.com</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="footer__contact row">
            <div class="footer__wrap col-lg-4 col-sm-6 col-12">
                <h5 class="footer__title">
                    Phương thức thanh toán
                </h5>
                <div class="footer__content">
                    <img src="../asset/img/footer/payment.png" alt="" />
                </div>
            </div>
            <div class="footer__wrap col-lg-4 col-sm-6 col-12">
                <h5 class="footer__title">
                    Kết nối với chúng tôi
                </h5>
                <div class="footer__content footer__content-contact d-flex">
                    <div class="footer__content-icon">
                        <i class="fa-brands fa-facebook"></i>
                    </div>
                    <div class="footer__content-icon">
                        <i class="fa-brands fa-twitter"></i>
                    </div>
                    <div class="footer__content-icon">
                        <i class="fa-brands fa-youtube"></i>
                    </div>
                    <div class="footer__content-icon">
                        <i class="fa-brands fa-instagram"></i>
                    </div>
                    <div class="footer__content-icon">
                        <i class="fa-brands fa-google"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer__license">
            <p>© Bản quyền thuộc về <b> lntthanh3317</b></p>
        </div>
    </div>
    <div class="footer__fun">
        <img src="../asset/img/footer/footer-fun.png" alt="" />
    </div>
</div>


<script>
    if ($("body").width() <= 740) {
        $('.footer__info .footer__wrap').each((index, item) => {
            const title = $(item).children()[0];
            const angle = $(title).children();
            angle.prop('class', 'fa-solid fa-angle-down');
            $(title).click(function() {
                const content = $(this).siblings();
                content.toggleClass('footer__content-hide');
                angle.toggleClass('fa-angle-left');
            });
        })
    }
</script>