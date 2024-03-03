<div class="login_big">
            <div class="login_menu">
                <h1 class="big_title-login">ĐĂNG NHẬP</h1>
                <form action="index.php?page=login" method="post" autocomplete="off">
                    <div class="form">
                        <label for="">Tài Khoản:</label>
                        <input type="text" name="user" placeholder="Nhập tài khoản">
                    </div>
                    <div class="form">
                        <label for="">Mật Khẩu:</label>
                        <input type="password" name="pass" placeholder="Nhập mật khẩu">
                    </div>
                    <div class="back_login">
                        <a href="index.php?page=forgot">Quên mật khẩu</a>
                        <span>Chưa có <a href="index.php?page=dangky" name="">Tài khoản</a>?</span>
                    </div>
                    <div class="error">
                        <?php
                        if (isset($error)) {
                            echo '
                            <p class="error_text">' . $error . '</p>
                            ';
                        } else {
                            unset($error);
                        }

                        if (isset($account)) {
                            echo '
                            <p class="error_text">' . $account . '</p>
                            ';
                        } else {
                            unset($account);
                        }
                        ?>
                    </div>
                    <div class="btn_login">
                        <input class="btn_signup btn btn-primary" type="submit" value="Đăng Nhập" name="login">
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