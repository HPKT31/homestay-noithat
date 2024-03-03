<div class="grid">
    <div class="container">
        <div class="forgot_center_form">
            <div class="forgot_Password_form">
            <a href="index.php?page=dangnhap" class="back_login-icon">
                <i class="fa-solid fa-arrow-left-long"></i>
            </a>
                <?php
                if (isset($_POST['new_btn']) && $_POST['new_btn']) {
                    $newpass = md5($_POST['passnew']);
                    $repass = md5($_POST['Repass']);
                    // $kq = OTP($code);
                    // echo var_dump($kq);
                    $error_null = "Vui lòng nhập mật khẩu";
                    if ($_POST['passnew'] != $_POST['Repass']) {
                        $error = "Mật khẩu xác nhận không chính xác";
                    } else {
                        forgetPass($newpass, $_SESSION['email']);
                        header('location: index.php?page=dangnhap');
                    }
                }
                ?>
                <form action="" method="post">
                    <h1 class="forgot_name">ĐỔI MẬT KHẨU</h1>
                    <div class="forgot_email margin-20">
                        <label for="">Mật khẩu mới:</label>
                        <input type="password" name="passnew" id=""
                            value="">
                            <div class="error">
                                <?php
                                if(isset($_POST['new_btn']) && ($_POST['new_btn'])){
                                    if($_POST['passnew'] === "") {
                                        echo ' <p class="error_text"> ' . $error_null . '</p>';
                                    }else if (isset($error)) {
                                        echo ' <p class="error_text">' . $error . '</p>';
                                    } else {
                                        unset($error);
                                        unset($error_null);
                                    }
                                }
                                ?>
                            </div>
                    </div>
                    <div class="forgot_email">
                        <label for="">Xác nhận mật khẩu mới:</label>
                        <input type="password" name="Repass" id=""
                            value="">
                        <div class="error">
                            <?php
                            if(isset($_POST['new_btn']) && ($_POST['new_btn'])){
                                if(($_POST['Repass'] === "")) {
                                    echo ' <p class="error_text">' . $error_null . '</p>';
                                }
                                else if (isset($error)) {
                                    echo ' <p class="error_text">' . $error . '</p>';
                                }else {
                                    unset($error);
                                    unset($error_null);
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="forgot_btn-otp">
                        <input type="submit" value="Xác Nhận" name="new_btn">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>