<div class="footer">
    <div class="container footer-list">
        <div class="footer-info row">
            <div class="footer-wrap footer-wrap--contact col-lg-4 col-sm-6 col-12">
                <img src="../asset/img/navbar/logo.png" alt="" />
                <div>
                    <img src="../asset/img/footer/footer-contact.png" alt="" />
                    <span>Hợp tác với chúng tôi</span>
                </div>
            </div>
            <div class="footer-wrap col-lg-4 col-sm-6 col-12">
                <h5 class="footer-title">Về chúng tôi</h5>
                <div class="footer-content">
                    <p><i class="fas fa-map-marker-alt"></i> Khu II, đường 3/2, phường Xuân Khánh, quận Ninh Kiều, thành phố Cần Thơ, Việt Nam</p>
                    <p><i class="fas fa-envelope"></i>ct18816dhct06@student.ctu.edu.vn</p>
                </div>
            </div>
            <div class="footer-wrap col-lg-4 col-sm-6 col-12">
                <h5 class="footer-title">Hỗ trợ khách hàng</h5>
                <div class="footer-content">
                    <p>Gửi yêu cầu bảo hành</p>
                    <p>Gửi yêu cầu đổi trả</p>
                    <p>
                        P. Hỗ trợ khách hàng:
                        <span>lntthanh3317@gmail.com</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="footer-contact row">
            <div class="footer-wrap col-lg-4 col-sm-6 col-12">
                <h5 class="footer-title">
                    Phương thức thanh toán
                </h5>
                <div class="footer-content">
                    <img src="../asset/img/footer/payment.png" alt="" />
                </div>
            </div>
            <div class="footer-wrap col-lg-4 col-sm-6 col-12">
                <h5 class="footer-title">
                    Kết nối với chúng tôi
                </h5>
                <div class="footer-content footer-content--contact d-flex">
                    <div class="footer-content--icon">
                        <i class="fa-brands fa-facebook"></i>
                    </div>
                    <div class="footer-content--icon">
                        <i class="fa-brands fa-twitter"></i>
                    </div>
                    <div class="footer-content--icon">
                        <i class="fa-brands fa-youtube"></i>
                    </div>
                    <div class="footer-content--icon">
                        <i class="fa-brands fa-instagram"></i>
                    </div>
                    <div class="footer-content--icon">
                        <i class="fa-brands fa-google"></i>
                    </div>
                </div>
            </div>

            <div class="footer-wrap col-lg-4 col-sm-12 col-12">
                <h5 class="footer-title">
                    Đăng ký nhận khuyến mãi
                </h5>
                <div class="footer-content">
                    <input type="text" placeholder="@gmail.com" />
                    <button>Đăng ký</button>
                </div>
            </div>
        </div>
        <div class="footer-license">
            <p>© Bản quyền thuộc về <b> lntthanh3317</b></p>
        </div>
    </div>
    <div class="footer-fun">
        <img src="../asset/img/footer/footer-fun.png" alt="" />
    </div>
</div>


<script>
    if ($("body").width() <= 740) {
        $('.footer-info .footer-wrap').each((index, item) => {
            $($(item).children()[0]).click(function () {
                const content = $(this).siblings();
                content.toggleClass('footer-content-hide');
            })
        })
    }
</script>