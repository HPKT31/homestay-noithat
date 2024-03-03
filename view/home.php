<!-- Start Hero Section -->
			<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>NỘI THẤT HIỆN ĐẠI<span clsas="d-block">THIẾT KẾ SANG TRỌNG </span></h1>
								<p class="mb-4">Nội thất của HomeStyle có thể mang đến những nguồn cảm hứng và nét sinh động hoặc cũng có thể mang đến sự gần gũi, ấm cúng cho không gian nhà của bạn. HomeStyle luôn là lựa chọn hàng đầu của mọi nhà.</p>
								<p><a href="" class="btn btn-secondary me-2">Mua Ngay </a><a href="#" class="btn btn-white-outline">Khám Phá</a></p>
							</div>
						</div>
						<div class="col-lg-7">
							<div class="hero-img-wrap">
								<img src="Assets/images/couch.png" class="img-fluid">
							</div>
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->

		<!-- Start Product Section -->
		<div class="product-section">
			<div class="container">
				<div class="row">

					<!-- Start Column 1 -->
					<div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
						<h2 class="mb-4 section-title" style="vertical-align: inherit;">Được tạo ra bằng chất liệu tuyện vời.</h2>
						<p class="mb-4">Chúng tôi luôn ưu tiên lựa chọn chất liệu tốt nhất nhằm mang đến cho mọi người sản phẩm không những đẹp mà còn chất lượng.</p>
						<p><a href="shop.html" class="btn">Khám phá</a></p>
					</div> 
					<!-- End Column 1 -->
					<!-- Start Column 2 -->
					<?php
					$topview = view_top();
					foreach($topview as $top) {
						echo '
						<div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
						<form action="index.php?page=addcart" method = "post">
							<input type = "hidden" name="id" value="'.$top['id'].'">
							<input type = "hidden" name="img" value="'.$top['img'].'">
							<input type = "hidden" name="ten" value="'.$top['ten'].'">
							<input type = "hidden" name="gia" value="'.$top['gia'].'">
							<a class="product-item" href="index.php?page=Product Details">
								<img src="uploadsPr/'.$top['img'].'" class="img-fluid product-thumbnail">
								<h3 class="product-title">'.$top['ten'].'</h3>
								<strong class="product-price">' . number_format($top['gia'], 0, ',', '.') . ' VNĐ</strong>
								<button class="icon-cross" type="submit" name="sub" value="AddToCart">
									<img src="Assets/images/cross.svg" class="img-fluid">
								</button>
							</a>
						</form>
						</div> 
						';
					}
					?>
					<!-- End Column 2 -->

				</div>
			</div>
		</div>
		<!-- End Product Section -->

		<!-- Start Why Choose Us Section -->
		<div class="why-choose-section">
			<div class="container">
				<div class="row justify-content-between">
					<div class="col-lg-6">
						<h2 class="section-title">Tại sao chọn chúng tôi?</h2>
						<p>Bởi vì chúng tôi luôn đáp ứng đủ các điều kiện sau đây:</p>

						<div class="row my-5">
							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="Assets/images/truck.svg" alt="Image" class="imf-fluid">
									</div>
									<h3>Vận chuyển nhanh &amp;  miễn phí</h3>
									<p>Miễn phí vận chuyển cho các đơn có giá trị từ 1.500.000đ </p>
								</div>
							</div>

							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="Assets/images/bag.svg" alt="Image" class="imf-fluid">
									</div>
									<h3>Dễ dàng mua sắm</h3>
									<p>Có thể thanh toán khi nhận hàng hoặc thanh toán qua trực tuyến. </p>
								</div>
							</div>

							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="Assets/images/support.svg" alt="Image" class="imf-fluid">
									</div>
									<h3>Hỗ trợ 24/7</h3>
									<p>Luôn tư vấn nhiệt tình, giải quyết vấn đề một cách nhanh chóng. </p>
								</div>
							</div>

							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="Assets/images/return.svg" alt="Image" class="imf-fluid">
									</div>
									<h3>Trả đổi miễn phí </h3>
									<p>Cho các đơn hàng bị lỗi từ nhà thiết kế trong vòng 7 ngày từ khi nhận hàng.</p>
								</div>
							</div>

						</div>
					</div>

					<div class="col-lg-5">
						<div class="img-wrap">
							<img src="Assets/images/why-choose-us-img.jpg" alt="Image" class="img-fluid">
						</div>
					</div>

				</div>
			</div>
		</div>
		<!-- End Why Choose Us Section -->

		<!-- Start We Help Section -->
		<div class="we-help-section">
			<div class="container">
				<div class="row justify-content-between">
					<div class="col-lg-7 mb-5 mb-lg-0">
						<div class="imgs-grid">
							<div class="grid grid-1"><img src="Assets/images/img-grid-1.jpg" alt="Untree.co"></div>
							<div class="grid grid-2"><img src="Assets/images/img-grid-2.jpg" alt="Untree.co"></div>
							<div class="grid grid-3"><img src="Assets/images/img-grid-3.jpg" alt="Untree.co"></div>
						</div>
					</div>
					<div class="col-lg-5 ps-lg-5">
					<h2 class="section-title mb-4">Chúng tôi giúp bạn thiết kế nội thất hiện đại</h2>
						<p>Chúng tôi có thể giúp bạn thiết kế nội thất hiện đại. Với sự kết hợp giữa sự sáng tạo và chất lượng, chúng tôi sẽ tạo ra không gian sống đẹp và tiện nghi cho bạn. Chúng tôi sẽ tư vấn và đáp ứng các yêu cầu của bạn để tạo ra một không gian sống phù hợp với phong cách và sở thích của bạn. Hãy để chúng tôi giúp bạn biến ước mơ về một ngôi nhà hiện đại thành hiện thực.</p>

						<ul class="list-unstyled custom-list my-4">
							<li>Giới thiệu về thiết kế nội thất hiện đại</li>
							<li>Các yếu tố quan trọng trong thiết kế nội thất hiện đại</li>
							<li>Thiết kế nội thất hiện đại cho căn hộ nhỏ</li>
							<li>Thiết kế nội thất hiện đại cho phòng ngủ</li>
						</ul>
						<p><a herf="#" class="btn">Khám phá</a></p>
					</div>
				</div>
			</div>
		</div>
		<!-- End We Help Section -->

		<!-- Start Popular Product -->
		<div class="popular-product">
			<div class="container">
				<div class="row">

					<div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
						<div class="product-item-sm d-flex">
							<div class="thumbnail">
								<img src="Assets/images/product-1.png" alt="Image" class="img-fluid">
							</div>
							<div class="pt-3">
								<h3>Nordic Chair</h3>
								<p>Sản phẩm Nordic Chair là một dòng ghế được thiết kế theo phong cách Bắc Âu cao cấp....</p>
								<p><a href="index.php?page=Product Details">Đọc Thêm</a></p>
							</div>
						</div>
					</div>

					<div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
						<div class="product-item-sm d-flex">
							<div class="thumbnail">
								<img src="Assets/images/product-2.png" alt="Image" class="img-fluid">
							</div>
							<div class="pt-3">
								<h3>Kruzo Aero Chair</h3>
								<p>Sản phẩm Kruzo Aero Chair là một dòng ghế hiện đại và tiện ích. Ghế được thiết kế....</p>
								<p><a href="index.php?page=Product Details">Đọc Thêm</a></p>
							</div>
						</div>
					</div>

					<div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
						<div class="product-item-sm d-flex">
							<div class="thumbnail">
								<img src="Assets/images/product-3.png" alt="Image" class="img-fluid">
							</div>
							<div class="pt-3">
								<h3>Ergonomic Chair</h3>
								<p>Sản phẩm Ergonomic Chair là một dòng ghế được thiết kế với mục đích tạo ra sự thoải mái và hỗ trợ cho người sử dụng....</p>
								<p><a href="index.php?page=Product Details">Đọc Thêm</a></p>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
		<!-- End Popular Product -->

		<!-- Start Testimonial Slider -->
		<div class="testimonial-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 mx-auto text-center">
						<h2 class="section-title">Bình Luận</h2>
					</div>
				</div>

				<div class="row justify-content-center">
					<div class="col-lg-12">
						<div class="testimonial-slider-wrap text-center">

							<div id="testimonial-nav">
								<span class="prev" data-controls="prev"><span class="fa fa-chevron-left"></span></span>
								<span class="next" data-controls="next"><span class="fa fa-chevron-right"></span></span>
							</div>

							<div class="testimonial-slider">
								
								<div class="item">
									<div class="row justify-content-center">
										<div class="col-lg-8 mx-auto">

											<div class="testimonial-block text-center">
												<blockquote class="mb-5">
													<p>&ldquo;“Tôi vừa mới xây nhà nên còn nhiều đồ cần mua đa số là nội thất .Vì thế tui lên mạng tìm những nơi bán nội thất .Thật tình cờ khi tôi thấy thương hiệu HomeStyle này.Tôi click vào và xem thử thì thấy ở đâu có rất nhiều đồ nội thất đẹp mà còn rẻ .Tôi cũng đã có những trải nghiệm tốt với dịch vụ ở đây vì thế tôi khuyên mọi người nên mua cùng tôi để trang trí trong căn nhà của mình.&rdquo;</p>
												</blockquote>

												<div class="author-info">
													<div class="author-pic">
														<img src="Assets/images/person-1.png" alt="Maria Jones" class="img-fluid">
													</div>
													<h3 class="font-weight-bold">Hồ Khải Vy</h3>
													<span class="position d-block mb-3"> CEO,Công ty TNHH 1 thành viên</span>
												</div>
											</div>

										</div>
									</div>
								</div> 
								<!-- END item -->

								<div class="item">
									<div class="row justify-content-center">
										<div class="col-lg-8 mx-auto">

											<div class="testimonial-block text-center">
												<blockquote class="mb-5">
													<p>&ldquo;“Tôi vừa mới xây nhà nên còn nhiều đồ cần mua đa số là nội thất .Vì thế tui lên mạng tìm những nơi bán nội thất .Thật tình cờ khi tôi thấy thương hiệu HomeStyle này.Tôi click vào và xem thử thì thấy ở đâu có rất nhiều đồ nội thất đẹp mà còn rẻ .Tôi cũng đã có những trải nghiệm tốt với dịch vụ ở đây vì thế tôi khuyên mọi người nên mua cùng tôi để trang trí trong căn nhà của mình.&rdquo;</p>
												</blockquote>

												<div class="author-info">
													<div class="author-pic">
														<img src="Assets/images/person-1.png" alt="Maria Jones" class="img-fluid">
													</div>
													<h3 class="font-weight-bold">Maria Jones</h3>
													<span class="position d-block mb-3"> CEO,Công ty TNHH 1 thành viên</span>
												</div>
											</div>

										</div>
									</div>
								</div> 
								<!-- END item -->

								<div class="item">
									<div class="row justify-content-center">
										<div class="col-lg-8 mx-auto">

											<div class="testimonial-block text-center">
												<blockquote class="mb-5">
													<p>&ldquo;“Tôi vừa mới xây nhà nên còn nhiều đồ cần mua đa số là nội thất .Vì thế tui lên mạng tìm những nơi bán nội thất .Thật tình cờ khi tôi thấy thương hiệu HomeStyle này.Tôi click vào và xem thử thì thấy ở đâu có rất nhiều đồ nội thất đẹp mà còn rẻ .Tôi cũng đã có những trải nghiệm tốt với dịch vụ ở đây vì thế tôi khuyên mọi người nên mua cùng tôi để trang trí trong căn nhà của mình.&rdquo;</p>
												</blockquote>

												<div class="author-info">
													<div class="author-pic">
														<img src="Assets/images/person-1.png" alt="Maria Jones" class="img-fluid">
													</div>
													<h3 class="font-weight-bold">Maria Jones</h3>
													<span class="position d-block mb-3"> CEO,Công ty TNHH 1 thành viên</span>
												</div>
											</div>

										</div>
									</div>
								</div> 
								<!-- END item -->

							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Testimonial Slider -->

		<!-- Start Blog Section -->