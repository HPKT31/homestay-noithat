<!-- Start Hero Section -->
  <div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Chi Tiết Sản Phẩm</h1>
							</div>
						</div>
						<div class="col-lg-7">
						</div>
					</div>
				</div>
		</div>
		<!-- End Hero Section -->
  <!-- start product details -->  
<div class="container_main">
          <div class="row">
            <div class="col-md-6">
              <div id="slider" class="owl-carousel product-slider">
            <div class="item">
            <?php
              $kq = Product_Details();
              foreach ($kq as $product){
              echo '
                  <img src="Assets/images/'.$product['img'].'" class="img-fluid product-thumbnail">
              ';
            }
                ?>
            
            </div>
          </div>
          <div id="thumb" class="owl-carousel product-thumb">
            <div class="item">
            <?php
              $kq = Product_Details();
              foreach ($kq as $product){
              echo '
                  <img src="Assets/images/'.$product['img'].'" class="img-fluid product-thumbnail">
              ';
              echo '
                  <img src="Assets/images/'.$product['img'].'" class="img-fluid product-thumbnail">
              ';
              echo '
                  <img src="Assets/images/'.$product['img'].'" class="img-fluid product-thumbnail">
              ';
              echo '
                  <img src="Assets/images/'.$product['img'].'" class="img-fluid product-thumbnail">
              ';
            }
                ?>
            </div>
          </div>
            </div>
            <div class="col-md-6">
              <div class="product-dtl">
                <div class="product-info">
                  <div class="product-name">
                  <?php
              $kq = Product_Details();
              foreach ($kq as $product){
              echo '
              <h3 class="product-title">'.$product['ten'].'</h3>
              ';
            }
                ?>
                  </div>
                  <div class="reviews-counter">
                <div class="rate">
                    <input type="radio" id="star5" name="rate" value="5" checked />
                    <label for="star5" title="text">5 stars</label>
                    <input type="radio" id="star4" name="rate" value="4" checked />
                    <label for="star4" title="text">4 stars</label>
                    <input type="radio" id="star3" name="rate" value="3" checked />
                    <label for="star3" title="text">3 stars</label>
                    <input type="radio" id="star2" name="rate" value="2" />
                    <label for="star2" title="text">2 stars</label>
                    <input type="radio" id="star1" name="rate" value="1" />
                    <label for="star1" title="text">1 star</label>
                  </div>
                <span>
                <?php
              $kq = Product_Details();
              foreach ($kq as $product){
              echo '
              '.$product['view'].'
              ';
            }
                ?>Reviews</span>
              </div>
                  <div class="product-price-discount">
                  <?php
              $kq = Product_Details();
              foreach ($kq as $product){
              echo '
              '. number_format($product['gia'], 0, ',', '.') .'
              ';
            }
                ?> VNĐ</span>
              </div>
                  </div>
                </div>
                <p>
                <?php
              $kq = Product_Details();
              foreach ($kq as $product){
              echo '
              '.$product['mota'].'
              ';
            }
                ?>
                </p>
                <p> Phân loại: ghế phòng khách, ghế</p>
                <div class="product-count">
                  <form action="#" class="display-flex_detail">
                    <div class="qtyminus">-</div>
                    <input type="text" name="quantity" value="1" class="qty">
                    <div class="qtyplus">+</div>
                  </form>
                  <div class="btn_product-detail">
                    <form action="#" class="display-flex_detail" id="quantityForm">
                        <div class="qtyminus qty-adjust" onclick="decrement()">-</div>
                        <input type="number" name="quantity" value="1" class="qty" id="quantity">
                        <div class="qtyplus qty-adjust" onclick="increment()">+</div>
                    </form>
                    <form action="index.php?page=checkout" method="post">
                          <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                          <input type="hidden" name="img" value="<?php echo $product['img']; ?>">
                          <input type="hidden" name="ten" value="<?php echo $product['ten']; ?>">
                          <input type="hidden" name="gia" value="<?php echo $product['gia']; ?>">
                          <input type="hidden" name="quantity" value="1" class="qty" id="quantity">
                          <button type="submit" class="round-black-btn" name="buynow" value="BuyNow">Mua ngay</button>
                      </form>
                      <form action="index.php?page=addcart" method="post">
                          <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                          <input type="hidden" name="img" value="<?php echo $product['img']; ?>">
                          <input type="hidden" name="ten" value="<?php echo $product['ten']; ?>">
                          <input type="hidden" name="gia" value="<?php echo $product['gia']; ?>">
                          <input type="hidden" name="quantity" value="1" class="qty" id="quantity">
                          <button type="submit" class="round-black-btn" name="sub" value="AddToCart">Thêm vào Giỏ hàng</button>
                      </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class=" container_main conproduct-info-tabs">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Mô tả</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
            <?php
              $kq = Product_Details();
              foreach ($kq as $product){
              echo '
              '.$product['gioithieu'].'
              ';
            }
                ?>
            </div>
        </div>
      </div>
</div>
<!-- end product details -->
<!-- start Related products -->
  <h3 class="Related">SẢN PHẨM LIÊN QUAN </h3>
<div class="Related product-section container row  ">
<?php
					$topview = Related_products();
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
</div>
<!-- end Related products -->
<script>
    // JavaScript for Quantity Adjustment
    function updateQuantity() {
        var quantityInput = document.getElementById('quantity');
        var quantityValue = parseInt(quantityInput.value);
        document.getElementById('quantityForm').elements.namedItem('quantity').value = quantityValue;
    }

    function increment() {
        var quantityInput = document.getElementById('quantity');
        var currentQuantity = parseInt(quantityInput.value);
        quantityInput.value = currentQuantity + 1;
        updateQuantity();
    }

    function decrement() {
        var quantityInput = document.getElementById('quantity');
        var currentQuantity = parseInt(quantityInput.value);
        if (currentQuantity > 1) {
            quantityInput.value = currentQuantity - 1;
            updateQuantity();
        }
    }
</script>