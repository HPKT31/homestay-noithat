<div class="container">
    <div class="account_infor-card">
        <div class="account_infor">
            <div class="account_infor-content-header text-center dis-none1 dis-block">
                <h2>Đổi mật khẩu</h2>
            </div>
            <div class="account_infor-top">
                <div class="account_infor-top-img">
                    <img src="<?php echo "uploads/".$_SESSION['img']; ?>" alt="">
                </div>
                <div class="account_infor-top-name">
                    <h5><?php echo $_SESSION['ten']; ?></h5>
                    <a class="account_infor-top-set dis-none" href="">
                        <i class="fa-solid fa-gears "></i>
                        <span class="">Sửa thông tin</span>
                    </a>
                </div>
            </div>
            <div class="account_infor-bottom dis-none">
                <h6 class="account_infor-bottom-name">Thông tin của tôi</h6>
                <ul class="account_infor-bottom-list">
                    <li>
                        <a class="forcus-red account_infor-bottom-link" href="index.php?page=clickinfor">Hồ sơ</a>
                    </li>
                    <li>
                        <a class="account_infor-bottom-link" href="index.php?page=infor">Đổi mật khẩu</a>
                    </li>
                    <li>
                        <a class="account_infor-bottom-link" href="">Đơn của tôi</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="account_infor-content">
            <div class="account_infor-content-header text-center dis-none">
                <h2>Đổi mật khẩu</h2>
            </div>
            <form action="index.php?page=changepass" method="post">
                <div class="card-body_infor">
                    <div class="form-group">
                        <label for="pass_old">Mật khẩu cũ:</label>
                        <input name="pass_old" type="password" class="form-control" id="pass_old"
                            placeholder="Nhập mật khẩu cũ">
                        <div class="error">
                            <?php
                        if(isset($errorPass)){
                            echo '<font color="red">'.$errorPass.'</font>';
                        }else {
                            unset($errorPass);
                        }
                        if(isset($errorold)){
                            echo '<font color="red">'.$errorold.'</font>';
                        }else {
                            unset($errorold);
                        }
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pass_new">Mật khẩu mới:</label>
                        <input name="pass_new" type="password" class="form-control" id="pass_new"
                            placeholder="Nhập mật khẩu mới">
                        <div class="error">
                            <?php
                        if(isset($errorpn)){
                            echo '<font color="red">'.$errorpn.'</font>';
                        }else {
                            unset($errorpn);
                        }
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="again_pass">Xác nhận mật khẩu:</label>
                        <input name="again_pass" type="password" class="form-control" id="again_pass"
                            placeholder="Xác nhận mật khẩu">
                            <div class="error">
                            <?php
                            if(isset($errorNot)){
								echo '<font color="red">'.$errorNot.'</font>';
							}else {
								unset($errorNot);
							}
                            if(isset($errorag)){
                                echo '<font color="red">'.$errorag.'</font>';
                            }else {
                                unset($errorag);
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="account_infor-content-btn">
                    <input type="submit" name="btn-forgot_change" class="btn btn-primary" value="Đổi mật khẩu">
                </div>
            </form>
        </div>
    </div>
</div>