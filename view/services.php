<!-- Start Hero Section -->
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                <div class="intro-excerpt">
                        <h1>Dịch Vụ</h1>
                        <p class="mb-4">Dịch vụ nội thất chúng tôi cam kết mang đến cho bạn không gian sống hoàn hảo và đáng mơ ước. Với đội ngũ thiết kế chuyên nghiệp, chúng tôi tận hưởng việc tạo ra các không gian độc đáo và phong cách, phù hợp với sở thích và yêu cầu của khách hàng. Dịch vụ nội thất của chúng tôi đảm bảo chất lượng, sự sáng tạo và sự hài lòng tuyệt đối.</p>
                        <p><a href="" class="btn btn-secondary me-2">Mua Ngay</a><a href="#" class="btn btn-white-outline">Khám phá</a></p>
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

<div class="why-choose-section">
    <div class="container">
        
        
        <div class="row my-5">
            <div class="col-6 col-md-6 col-lg-3 mb-4">
                <div class="feature">
                    <div class="icon">
                        <img src="Assets/images/truck.svg" alt="Image" class="imf-fluid">
                    </div>
                    <h3>Vận chuyển nhanh &amp;  miễn phí</h3>
                    <p>Miễn phí vận chuyển cho các đơn có giá trị từ 1.500.000đ </p>
                </div>
            </div>

            <div class="col-6 col-md-6 col-lg-3 mb-4">
                <div class="feature">
                    <div class="icon">
                        <img src="Assets/images/bag.svg" alt="Image" class="imf-fluid">
                    </div>
                    <h3>Dễ dàng mua sắm</h3>
                    <p>Có thể thanh toán khi nhận hàng hoặc thanh toán qua trực tuyến. </p>
                </div>
            </div>

            <div class="col-6 col-md-6 col-lg-3 mb-4">
                <div class="feature">
                    <div class="icon">
                        <img src="Assets/images/support.svg" alt="Image" class="imf-fluid">
                    </div>
                    <h3>Hỗ trợ 24/7</h3>
                    <p>Luôn tư vấn nhiệt tình, giải quyết vấn đề một cách nhanh chóng. </p>
                </div>
            </div>

            <div class="col-6 col-md-6 col-lg-3 mb-4">
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
</div>
<!-- End Why Choose Us Section -->

<!-- Start Product Section -->
<div class="product-section pt-0">
    <div class="container">
        <div class="row">

            <!-- Start Column 1 -->
            <div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
                <h2 class="mb-4 section-title">Được chế tạo với vật liệu tuyệt vời.</h2>
                <p class="mb-4">Được chế tạo với vật liệu tuyệt vời, nội thất hiện đại mang đến sự sang trọng và tinh tế cho không gian sống. Với việc sử dụng các vật liệu như gỗ, kim loại và kính, nội thất hiện đại không chỉ đẹp mắt mà còn rất bền và dễ bảo quản. Nhờ vào sự kết hợp hài hòa giữa các yếu tố thiết kế và chất liệu, nội thất hiện đại tạo nên một không gian sống đẳng cấp và đáng mơ ước. Bạn có thể tận dụng những vật liệu tuyệt vời này để thiết kế nội thất hiện đại theo ý muốn của mình. </p>
                <p><a href="#" class="btn">Khám phá</a></p>
            </div> 
            <!-- End Column 1 -->

           <!-- Start Column 2 -->
           <?php
					$topview = view_top();
					foreach($topview as $top) {
						echo '
						<div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
						<a class="product-item" href="#">
							<img src="uploadsPr/'.$top['img'].'" class="img-fluid product-thumbnail">
							<h3 class="product-title">'.$top['ten'].'</h3>
							<strong class="product-price">' . number_format($top['gia'], 0, ',', '.') . ' VNĐ</strong>


							<span class="icon-cross">
								<img src="Assets/images/cross.svg" class="img-fluid">
							</span>
						</a>
					</div> 
						';
					}
					?>
            <!-- End Column 2 -->
        </div>
    </div>
</div>
<!-- End Product Section -->



<<!-- Start Testimonial Slider -->
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