<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Giỏ Hàng</h1>
							</div>
						</div>
						<div class="col-lg-7">
							
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->

		

		<div class="untree_co-section before-footer-section">
            <div class="container">
              <div class="row mb-5">
                <form class="col-md-12" method="post">
                  <div class="site-blocks-table">
                    <table class="table">
                      <thead>
                        <tr>
                          <th class="product-thumbnail">Hình Sản Phẩm</th>
                          <th class="product-name">Tên Sản Phẩm</th>
                          <th class="product-price">Giá</th>
                          <th class="product-quantity">Số Lượng</th>
                          <th class="product-total">Tổng</th>
                          <th class="product-remove">Xóa</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      $totalAll = 0;
                        if (isset($_SESSION['viewcart']) && is_array($_SESSION['viewcart'])) {
                            foreach ($_SESSION['viewcart'] as $item) {                                                        
                                extract($item);
                                $totalAll += $total;                          
                                echo '
                                    <tr>
                                        <td class="product-thumbnail">
                                            <img src="uploadsPr/' . $img . '" alt="Image" class="img-fluid">
                                        </td>
                                        <td class="product-name">
                                            <h2 class="h5 text-black">' . $ten . '</h2>
                                        </td>
                                        <td>' .number_format($gia, 0, ',', '.') . ' VNĐ </td>
                                        <td>
                                            <form method="post">
                                            <div class="input-group mb-3 d-flex align-items-center quantity-container" style="max-width: 120px;">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-outline-black decrease" onclick="updateCart(' . $id . ', \'decrease\')">-</button>
                                                </div>
                                                <input type="text" class="form-control text-center quantity-amount" value="' . $soluong . '" data-id="' . $id . '" name="quantity" readonly>
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-black increase" onclick="updateCart(' . $id . ', \'increase\')">+</button>
                                                </div>
                                            </div>
                                                <input type="hidden" name="id" value="' . $id . '">
                                            </form>
                                        </td>
                                        <td class="total" data-id="' . $id . '">' .number_format($total, 0, ',', '.') . ' VNĐ </td>
                                        <td><a href="index.php?page=removecart&id=' . $id . '" class="btn btn-black btn-sm">X</a></td>
                                    </tr>  
                                ';                        
                            }
                        }

                      ?>
                      <script>
                          function updateCart(productId, action) {
                              // Tạo một đối tượng XMLHttpRequest
                              var xhttp = new XMLHttpRequest();

                              // Xác định hành động và sản phẩm cần cập nhật
                              var params = 'id=' + productId + '&action=' + action;

                              // Gửi yêu cầu POST đến một tệp xử lý PHP để cập nhật giỏ hàng
                              xhttp.open('POST', 'index.php?page=count', true);
                              xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

                              xhttp.onreadystatechange = function() {
                                  if (this.readyState === 4 && this.status === 200) {
                                      // Cập nhật giao diện khi đã nhận phản hồi từ server
                                      // Ví dụ: có thể cập nhật số lượng sản phẩm mà không cần load lại trang
                                      // Đoạn mã để cập nhật giao diện ở đây
                                      var responseData = JSON.parse(this.responseText);
                                      var totalElement = document.getElementById('totalAll');
                                      if (totalElement) {
                                          totalElement.innerText = responseData.totalAll;
                                      }
                                  }
                              };

                              // Gửi yêu cầu đến server
                              xhttp.send(params);
                          }
                      </script>
                      </tbody>
                    </table>
                  </div>
                </form>
              </div>
        
              <div class="row">
                <div class="col-md-6">
                  <div class="row mb-5">
                    <div class="col-md-6 mb-3 mb-md-0">
                      <a href="index.php?page=cart">
                        <button class="btn btn-black btn-sm btn-block">Cập nhật giỏ hàng</button>
                      </a>
                    </div>
                    <div class="col-md-6">
                      <a href="index.php?page=shop">                      
                        <button class="btn btn-outline-black btn-sm btn-block">Tiếp tục mua sắm</button>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 pl-5">
                  <div class="row justify-content-end">
                    <div class="col-md-7">
                      <div class="row">
                        <div class="col-md-12 text-right border-bottom mb-5">
                          <h3 class="text-black h4 text-uppercase">Tổng số giỏ hàng</h3>
                        </div>
                      </div>
                      <div class="row mb-5">
                        <div class="col-md-6">
                          <span class="text-black">Tổng</span>
                        </div>
                        <div class="col-md-6 text-right">
                          <strong class="text-black" id="totalAll"> <?php echo number_format($totalAll, 0, ',', '.' )?> VND</strong>
                        </div>
                      </div>
        
                      <div class="row">
                        <div class="col-md-12">
                   
                        <a href="index.php?page=checkout">
                          <button class="btn btn-black btn-lg py-3 btn-block">Thanh Toán</button>
                        </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>