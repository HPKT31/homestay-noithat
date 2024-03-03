<div class="main">
        <div class="signup_big">
            <div class="login_menu">
                <form action="index.php?page=signup" method="post" autocomplete="off" enctype="multipart/form-data">
                    <h1 class="big_title-login">ĐĂNG KÝ TÀI KHOẢN</h1>
                    <div class="form">
                        <label for="">Tài Khoản:</label>
                        <input type="text" name="user" placeholder="Nhập tài khoản">
                        <div class="error">
                            <?php
                            if (isset($kytu)) {
                                echo '
                            <p class="error_text">' . $kytu . '</p>
                            ';
                            } else {
                                unset($kytu);
                            }
                            ?>
                        </div>
                    </div>
                    <div class="form">
                        <label for="">Email:</label>
                        <input type="text" name="email" placeholder="Nhập email">
                        <div class="error">
                            <?php
                            if (isset($textEmail)) {
                                echo '
                                <p class="error_text">' . $textEmail . '</p>
                                ';
                            } else {
                                unset($textEmail);
                            }
                            ?>
                        </div>
                    </div>
                    <div class="form">
                        <label for="">Mật Khẩu:</label>
                        <input type="password" name="pass" placeholder="Nhập mật khẩu">
                    </div>
                    <div class="form">
                        <label for="">Xác Nhận Mật Khẩu:</label>
                        <input type="password" name="pass2" placeholder="Nhập mật khẩu">
                    </div>
                    <div class="error">
                        <?php
                        if (isset($trungmk)) {
                            echo '
                            <p class="error_text">' . $trungmk . '</p>
                            ';
                        } else {
                            unset($trungmk);
                        }
                        ?>
                    </div>
                    <div class="back_login">
                        <input type="file" name="img" id="" placeholder="Chọn ảnh đại diện">
                        <span>Đã có <a href="index.php?page=dangnhap" name="">Tài khoản</a>?</span>
                    </div>

                    <div class="error">
                            <?php
                            if (isset($text)) {
                                echo '
                            <p class="error_text">' . $text . '</p>
                            ';
                            } else {
                                unset($text);
                            }
                            ?>
                    </div>

                    <div class="error">
                            <?php
                            if (isset($tontai)) {
                                echo '
                            <p class="error_text">' . $tontai . '</p>
                            ';
                            } else {
                                unset($tontai);
                            }
                            ?>
                        </div>

                    <div class="btn_login">
                        <input class="btn_signup btn btn-primary" type="submit" value="TẠO TÀI KHOẢN" name="signup">
                    </div>
                </form>
                <div class="connect_social">
                    <div class="connect_social-name">
                        <div class="connect_social-item">
                            <span class="">Hoặc</span>
                        </div>
                    </div>
                    <div class="social_icon">
                        <a href="" class="">
                            <i class="fa-brands fa-google-plus-g"></i>
                            <span>Google</span>
                        </a>
                        <a href="" class="">
                            <i class="fa-brands fa-facebook"></i>
                            <span>Facebook</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>