<div class="container">
		<div class="account_infor-card">
			<div class="account_infor">
				<div class="account_infor-content-header text-center dis-none1 dis-block">
					<h2>Thông tin của tôi</h2>
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
					<h2>Thông tin của tôi</h2>
				</div>
				<?php
				$id = $_SESSION['idsuser'];
				$infor = getinfor($id);
				foreach($infor as $us){
					echo '
					<form action="index.php?page=updateinfor" method="post" autocomplete="off" enctype="multipart/form-data">
					<div class="card-body_infor">
					<input type="hidden" name="id" value="'.$us['id'].'">
						<div class="form-group">
							<label for="username">Họ và tên:</label>
							<input type="text" name="name" class="form-control" id="username" value="'.$us['ten'].'">';
							if(isset($nameErr)){
								echo '<font color="red">'.$nameErr.'</font>';
							}else {
								unset($nameErr);
							}
					echo '
						</div>
						<div class="form-group dis-none1 dis-block">
							<label for="pass" style="margin-right:10px;">Mật khẩu:</label>
							<a href="index.php?page=infor" class="pass_account-infor">'.str_repeat('*',strlen($us['pass'])).'
								<a href="" class="pass_account-link" style="color:greend;">Thay đổi</a>
							</a>
						</div>
						<div class="form-group">
							<label for="email">Email:</label>
							<input type="email" class="form-control" name="email" id="email" value="'.$us['email'].'">';
							if(isset($emailErr)){
								echo '<font color="red">'.$emailErr.'</font>';
							}else {
								unset($emailErr);
							}
					echo '
						</div>
						<div class="form-group">
							<label for="address">Địa chỉ:</label>
							<input type="text" class="form-control" name="address" id="address" value="'.$us['address'].'">
						</div>
						<div class="form-group">
							<label for="phone">Số điện thoại:</label>
							<input type="tel" class="form-control" name="phone" id="phone" value="'.$us['sdt'].'">';
							if(isset($phoneErr)){
								echo '<font color="red">'.$phoneErr.'</font>';
							}else {
								unset($phoneErr);
							}
					echo '
					</div>
						<div class="form-group margin-20 display-flex">
							<label for="">Ảnh đại diện:</label>
							<input type="file" class="account_infor-content-img" name="Image">
							<input type="hidden" class="account_infor-content-img" name="imgfile" value="'.$us['img'].'">
						</div>
					</div>
					<div class="account_infor-content-btn">
						<button class="btn btn-primary" name="updateInforUser" value="Lưu">Lưu</button>
					</div>
				</form>
					';
				}
				?>
			</div>
		</div>
	</div>