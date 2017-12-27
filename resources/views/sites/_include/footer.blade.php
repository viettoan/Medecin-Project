<footer>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <h5 class='title'><i class="fa fa-home">&nbsp;&nbsp;</i>PHÒNG KHÁM MIKA</h5>
                <ul>
                    <li><i class="fa fa-map-marker">&nbsp;&nbsp;</i>Địa chỉ: Chúc Sơn - Chương Mỹ - Hà Nội</li>
                    <li><i class="fa fa-clock-o">&nbsp;&nbsp;</i>Giờ làm việc: Từ 8:30 - 20:00</li>
                    <li><i class="fa fa-volume-control-phone">&nbsp;&nbsp;</i>Hotline: 111111111111</li>
                    <li><i class="fa fa-envelope-o">&nbsp;&nbsp;</i>Email: kingofthenorth@gmail.com</li>
                </ul>
                <h6>
                    <i class="fa fa-phone-square">&nbsp;</i> TỔNG ĐÀI CHĂM SÓC KHÁCH HÀNG:
                    <h6><strong>9083.2323.223</strong></h6>
                </h6>
            </div >
            <div class="col sm-3">
                <iframe id='facebook' src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FVui-l%C3%A0-ch%C3%ADnh-328549040576766%2F&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=178392078930244" height='300px' style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
            </div>
            <div class="col-sm-5">
                <iframe id='google-map'
                height="300px"
                frameborder="0" style="border:0"
                src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAO63kLiZuw39FmCvpLmuTVD-RvtuRtFmU
                &q=Space+Needle,Seattle+WA" allowfullscreen>
            </iframe>
        </div>
    </div>
    <div class="row">
        <!-- Form -->
        <div class="nb-form">
            <p class="title">Để lại tin nhắn cho phòng khám</p>
            <img src="images/messages-icon.png" alt="" class="user-icon">
            <p class="message">Số điện thoại liên hệ: <strong>093858503</strong></p>

            <form method="POST" action="{{ route('contact.store') }}">
                {{ csrf_field() }}
                <input type="text" name="name" placeholder="Vui lòng nhập họ tên" required>
                <input type="email" name="email" placeholder="Địa chỉ email" required>
                <input type="tel" name="phone" placeholder="Số điện thoại" required>
                <textarea name="content" placeholder="Lời nhắn của bạn" required></textarea>
                <input type="submit" value="Gửi">
            </form>
        </div>
    </div>
</div>
</footer>
