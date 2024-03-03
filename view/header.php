<!doctype html>
<html lang="en">

</html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Untree.co">
	<link rel="shortcut icon" href="favicon.png">

	<meta name="description" content="" />
	<meta name="keywords" content="bootstrap, bootstrap4" />

	<!-- Bootstrap CSS -->
	<link href="Assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
	<link href="Assets/css/tiny-slider.css" rel="stylesheet">
	<link href="Assets/css/style.css" rel="stylesheet">
	<link href="Assets/css/product-details.css" rel="stylesheet">
	<title>Nội Thất HomeStyle </title>
</head>

	
<body>

	<!-- Start Header/Navigation -->
	<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">
		<div class="container">
			<a class="navbar-brand" href="index.php?page=home">
				<img src="Assets/images/logo.png" alt="">
			</a>

			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni"
				aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>




			<div class="collapse navbar-collapse" id="navbarsFurni">
				<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
					<li class="nav-item active">
						<a class="nav-link" href="index.php?page=home">Trang Chủ</a>
					</li>
					<li><a class="nav-link" href="index.php?page=shop">Cửa Hàng</a></li>
					<li><a class="nav-link" href="index.php?page=about">Giới Thiệu</a></li>
					<li><a class="nav-link" href="index.php?page=services">Dịch Vụ</a></li>
					<li><a class="nav-link" href="index.php?page=contact">Liên Hệ</a></li>

				</ul>
				<div class="col-auto">
                <div class="container">
                    <form action="index.php?page=search" method="post" id="searchForm" >
						<div class="input-group mb-3 search_gr">
							<input name="search" type="text" class="form-control d-none in-search" id="searchInput" placeholder="Search...">
                            <button class="btn_search btn " type="button" id="searchButton">
                                <i class="fa-solid fa-magnifying-glass" id="searchIcon"></i>
                            </button>
                        </div>
                    </form>
                </div>
            	</div>
				
				<ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
					
					<li class="custom-navbar-cta_list">
						<a class="nav-link" href="index.php?page=admin">
							<img src="Assets/images/user.svg">
						</a>
						<!-- <input type="checkbox" id="drop-2" /> -->
						<ul class="account_list">
							<?php
							if (isset($_SESSION['ten']) && isset($_SESSION['img'])) {
								echo '
								<li class="item_account">
									<div class="item_account-img">
										<img src="uploads/' . $_SESSION['img'] . '" alt="" class="">
									</div>
									<div class="account_menu">
										<div class="name_link-account">
											<a href="index.php" class=" account_link">' . $_SESSION['ten'] . '</a>
										</div>	
										<div class="account">
											<ul class="information">
												<li class="">
													<a href="index.php?page=clickinfor" class="">Thông tin tài khoản</a>
												</li>
												<li class="">
													<a href="index.php?page=exit" class="active">Thoát</a>
												</li>
											</ul>
										</div>
									</div>
								</li>';
							} else if (isset($_SESSION['userAdmin']) && ($_SESSION['userAdmin'] != "")) {
								echo '  
									<li class="item_account">
										<a href="admin.php" class="">
											<div class="item_account-img">
												<img src="https://i.pinimg.com/564x/df/ce/a7/dfcea7989195d3273c2bcb367fca0a83.jpg" alt="" class="">
											</div>
										</a>
										<div class="account_menu">
											<div class="name_link-account">
												<a href="admin.php" class=" account_link">' . $_SESSION['userAdmin'] . '</a>
											</div>
											<div class="account">
												<ul class="information">
													<li class="">
														<a href="../furniture-homestyle-master/Admin/index.php" class="">Quản trị</a>
													</li>
													<li class="">
														<a href="index.php?page=exit" class="active">Thoát</a>
													</li>
												</ul>
											</div>
										</div>
									</li>';
							} else {
								?>
									<ul class="bor-left_menu">
										<li class="bor-left">
											<a href="index.php?page=dangnhap" class="login">Đăng nhập</a>
										</li>
										<li class="bor-left">
											<a href="index.php?page=dangky" class="signup">Đăng ký</a>
										</li>
									</ul>
							<?php } ?>
						</ul>
					</li>
					
					<li><a class="nav-link" href="index.php?page=cart"><img src="Assets/images/cart.svg"></a></li>
				</ul>


			</div>
		</div>

	</nav>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
		$(document).ready(function () {
			$('#searchButton').click(function () {
				$('#searchInput').toggleClass('d-none').focus();
				if ($('#searchInput').hasClass('d-none')) {
					if ($('#searchInput').val().trim() !== '') {
                    $('#searchForm').submit();
                }
				}
			});
		});
	</script>


	<!-- End Header/Navigation -->
</body>