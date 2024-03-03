<div class="grid">
    <div class="container">
        <div class="forgot_center_form">
            <div class="forgot_Password_form">
                <a href="index.php?page=dangnhap" class="back_login-icon">
                    <i class="fa-solid fa-arrow-left-long"></i>
                </a>
                <?php
                if (isset($_POST['otp_btn']) && $_POST['otp_btn']) {
                    $code = $_POST['code'];
                    if (empty($code)) {
                        $hallow = "Yêu cầu nhập mã OTP";
                    } else {
                        $kq = OTP($code);
                        if (count($kq) == 1) {
                            header('location: index.php?page=reset');
                        } else {
                            $otpError = "Mã OTP không chính xác";
                        }
                    }
                }
                ?>
                <form action="" method="post">
                    <h1 class="forgot_name">Nhập OTP</h1>
                    <div class="forgot_form">
                        <div class="forgot_email">
                            <label for="">Nhập mã OTP:</label>
                            <input type="text" name="code" id="" class="in_email">
                        </div>
                        <div class="forgot_btn">
                            <input type="submit" value="Gửi" name="otp_btn">
                        </div>
                    </div>
                    <div class="error">
                        <?php
                        if (isset($otpError)) {
                            echo '<p class="error_text">' . $otpError . '</p>';
                        } else {
                            unset($otpError);
                        }
                        ?>

                        <?php
                        if (isset($hallow)) {
                            echo '<p class="error_text">' . $hallow . '</p>';
                        } else {
                            unset($hallow);
                        }
                        ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>