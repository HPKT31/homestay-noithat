		<?php
			
		?>
		<!-- Start Hero Section -->
        <div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Cửa Hàng</h1>
							</div>
						</div>
						<div class="col-lg-7">
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->
<div class="container">
	<div class="row">
		<div class="kind_product">
		<form method="post" action="">
			<label for="category"></label>
			<select class="select-category" id="category" name="category">				
				<option value="">Danh Mục</option>
				<?php
                  $category = category_product();
                  foreach ($category as $dm) { ?>
                    <option value="<?php echo $dm['id_danhmuc']; ?>">
                      <?php echo $dm['ten']; ?>
                    </option>
                  <?php } ?>
			</select>

			<label for="priceRange"></label>
			<select class="select-category" id="priceRange" name="priceRange">				
				<option value="">Khoảng Giá</option>
				<option value="1000000-1500000">1.000.000 VNĐ - 1.500.000 VNĐ</option>
			</select>

			<button class="btn btn-kind_category" type="submit" name="filter" value="filter">
				<i class="fa-solid fa-filter"></i>
			</button>
		</form>
		</div>
	</div>
</div>
		<?php
		  if(isset($_POST['filter'])){
			$whereClause = "";
			if($_POST['priceRange'] == '' && $_POST['category'] != ''){
				$category = $_POST['category'];
				$whereClause .= "id_dm = '$category'";
			}
			if($_POST['priceRange'] != '' && $_POST['category'] == ''){
				$priceRange = explode('-', $_POST['priceRange']);
				$minPrice = $priceRange[0];
				$maxPrice = $priceRange[1];
				$whereClause .= "gia BETWEEN $minPrice AND $maxPrice";
			}
			if($_POST['priceRange'] != '' && $_POST['category'] != ''){
				$category = $_POST['category'];
				$priceRange = explode('-', $_POST['priceRange']);
				$minPrice = $priceRange[0];
				$maxPrice = $priceRange[1];
				$whereClause .= "id_dm = '$category'" . "AND gia BETWEEN $minPrice AND $maxPrice";
			}
			if($_POST['category'] == '' && $_POST['priceRange'] == ''){
				echo 
				'
				<div class="untree_co-section product-section before-footer-section">
					<div class="container">
						  <div class="row">
							<h2 class="text-center">Tất cả sản phẩm</h2>';
						$conn = conectdb();
						if(isset($_REQUEST['pagi'])){
							$offset = ($_REQUEST['pagi']-1)*8;
						}
						else $offset = 0;
						$stmt = $conn->query("SELECT * FROM sanpham limit 8 offset $offset");
						foreach($stmt as $product){
								echo '
								<div class="col-12 col-md-4 col-lg-3 mb-5">
								<form action="index.php?page=addcart" method = "post">							
									<input type = "hidden" name="id" value="'.$product['id'].'">
									<input type = "hidden" name="img" value="'.$product['img'].'">
									<input type = "hidden" name="ten" value="'.$product['ten'].'">
									<input type = "hidden" name="gia" value="'.$product['gia'].'">
									<a class="product-item" href="index.php?page=Product Details">
										<img src="uploadsPr/'.$product['img'].'" class="img-fluid product-thumbnail">
										<h3 class="product-title">'.$product['ten'].'</h3>
										<strong class="product-price">' . number_format($product['gia'], 0, ',', '.') . ' VNĐ</strong>
										<button class="icon-cross" type="submit" name="sub" value="AddToCart">
											<img src="Assets/images/cross.svg" class="img-fluid">
										</button>	
									</a>							
								</form>  	
								</div>
								';
							}
						echo '
						</div>
						  </div>
				';
				echo '
				<div class="text-center load_page load-dis">';
				$rows = $conn->query("SELECT count(*) FROM sanpham")->fetchColumn();
				$total_pages = ceil($rows/8);
				if(isset($_GET['pagi'])){
					$pagi = $_GET['pagi'];
				}else{
					$pagi = 1;
				}
					$next = $pagi + 1;
					$prev = $pagi - 1;
				if($total_pages > 8){
			
				}
				if($pagi > 1){ echo '<a class="pagi_load pagi-icon" href="index.php?page=shop&pagi='.$prev.'"><i class="fa-solid fa-chevron-left"></i></a>';}
				for($i = 1; $i <= $total_pages; $i++){ 
					if($i == $pagi){
						echo '<li class="pagi_load active_pr">
							<a class="pagi_load bg-active" href="index.php?page=shop&pagi='.$i.'">'.$i.'</a>
						</li>';
					}else{
					echo '<a class="pagi_load clone-pagi" href="index.php?page=shop&pagi='.$i.'">'.$i.'</a>';}
				}
				if($pagi < $total_pages){ echo '<a class="pagi_load  pagi-icon" href="index.php?page=shop&pagi='.$next.'"><i class="fa-solid fa-chevron-right"></i></a>';}
				echo '
				</div>
				</div>
				</div>
				';
			}
			if($whereClause != ""){				
						$filter = filter($whereClause);
						if(!empty($filter)){
							echo '
			<div class="untree_co-section product-section before-footer-section">
				<div class="container">
					<div class="row">
						<h2 class="text-center">Các Sản Phẩm</h2>';
						foreach($filter as $product){
						echo '
						<div class="col-12 col-md-4 col-lg-3 mb-5">
						<form action="index.php?page=addcart" method = "post">							
							<input type = "hidden" name="id" value="'.$product['id'].'">
							<input type = "hidden" name="img" value="'.$product['img'].'">
							<input type = "hidden" name="ten" value="'.$product['ten'].'">
							<input type = "hidden" name="gia" value="'.$product['gia'].'">
							<a class="product-item" href="index.php?page=Product Details">
								<img src="uploadsPr/'.$product['img'].'" class="img-fluid product-thumbnail">
								<h3 class="product-title">'.$product['ten'].'</h3>
								<strong class="product-price">' . number_format($product['gia'], 0, ',', '.') . ' VNĐ</strong>
								<button class="icon-cross" type="submit" name="sub" value="AddToCart">
									<img src="Assets/images/cross.svg" class="img-fluid">
								</button>	
							</a>							
						</form>  	
						</div>
						';
						}
						echo '
					</div>
					
				</div>
			 ';
			 echo '
		<div class="text-center load_page load-dis">';
		$conn = conectdb();
		$rows = $conn->query("SELECT count(*) FROM sanpham")->fetchColumn();
		$total_pages = ceil($rows/8);
		if(isset($_GET['pagi'])){
			$pagi = $_GET['pagi'];
		}else{
			$pagi = 1;
		}
			$next = $pagi + 1;
			$prev = $pagi - 1;
		if($total_pages > 8){
	
		}
		if($pagi > 1){ echo '<a class="pagi_load pagi-icon" href="index.php?page=shop&pagi='.$prev.'"><i class="fa-solid fa-chevron-left"></i></a>';}
		for($i = 1; $i <= $total_pages; $i++){ 
			if($i == $pagi){
				echo '<li class="pagi_load active_pr"><a class="pagi_load bg-active" href="index.php?page=shop&pagi='.$i.'">'.$i.'</a></li>';
			}else{
			echo '<a class="pagi_load clone-pagi" href="index.php?page=shop&pagi='.$i.'">'.$i.'</a>';}
		}
		if($pagi < $total_pages){ echo '<a class="pagi_load  pagi-icon" href="index.php?page=shop&pagi='.$next.'"><i class="fa-solid fa-chevron-right"></i></a>';}
		echo '
		</div>
			
		</div>
		</div>
		';
			}else{
				echo '
				<div class="container">
					<p class="error_text error_center">Không tìm thấy sản phẩm</p>
					<div class="filter_hallow-parent">
						<img class="filter_hallow" src="https://lanhuonglip.com/assets/images/cart_empty.png"></img>
					</div>
				</div>';
			}
		}
	}else {
		echo 
		'
		<div class="untree_co-section product-section before-footer-section">
		    <div class="container">
		      	<div class="row">
					<h2 class="text-center">Tất cả sản phẩm</h2>';
				$conn = conectdb();
                if(isset($_REQUEST['pagi'])){
                    $offset = ($_REQUEST['pagi']-1)*8;
                }
                else $offset = 0;
                $stmt = $conn->query("SELECT * FROM sanpham limit 8 offset $offset");
                foreach($stmt as $product){
						echo '
						<div class="col-12 col-md-4 col-lg-3 mb-5">
						<form action="index.php?page=addcart" method = "post">							
							<input type = "hidden" name="id" value="'.$product['id'].'">
							<input type = "hidden" name="img" value="'.$product['img'].'">
							<input type = "hidden" name="ten" value="'.$product['ten'].'">
							<input type = "hidden" name="gia" value="'.$product['gia'].'">
							<a class="product-item" href="index.php?page=Product Details">
								<img src="uploadsPr/'.$product['img'].'" class="img-fluid product-thumbnail">
								<h3 class="product-title">'.$product['ten'].'</h3>
								<strong class="product-price">' . number_format($product['gia'], 0, ',', '.') . ' VNĐ</strong>
								<button class="icon-cross" type="submit" name="sub" value="AddToCart">
									<img src="Assets/images/cross.svg" class="img-fluid">
								</button>	
							</a>							
                    	</form>  	
						</div>
						';
					}
				echo '
				</div>
		      	</div>';

		    
		echo '
		<div class="text-center load_page load-dis">';
		$rows = $conn->query("SELECT count(*) FROM sanpham")->fetchColumn();
		$total_pages = ceil($rows/8);
		if(isset($_GET['pagi'])){
			$pagi = $_GET['pagi'];
		}else{
			$pagi = 1;
		}
			$next = $pagi + 1;
			$prev = $pagi - 1;
		if($total_pages > 8){
	
		}
		if($pagi > 1){ echo '<a class="pagi_load pagi-icon" href="index.php?page=shop&pagi='.$prev.'"><i class="fa-solid fa-chevron-left"></i></a>';}
		for($i = 1; $i <= $total_pages; $i++){ 
			if($i == $pagi){
				echo '<li class="pagi_load active_pr">
					<a class="pagi_load bg-active" href="index.php?page=shop&pagi='.$i.'">'.$i.'</a>
				</li>';
			}else{
			echo '<a class="pagi_load clone-pagi" href="index.php?page=shop&pagi='.$i.'">'.$i.'</a>';}
		}
		if($pagi < $total_pages){ echo '<a class="pagi_load  pagi-icon" href="index.php?page=shop&pagi='.$next.'"><i class="fa-solid fa-chevron-right"></i></a>';}
		echo '
		</div>
		</div>
		</div>
		';
	}
		?>