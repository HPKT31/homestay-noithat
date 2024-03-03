<div class="product-section">
<h2 class="text-center ">Sản phẩm tìm kiếm được</h2>
    <div class="container">
        <div class="row">
            <?php
            foreach ($searchpr as $product) {
                echo '
 
            <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                <form action="index.php?page=addcart" method = "post">
                    <input type = "hidden" name="id" value="' . $product['id'] . '">
                    <input type = "hidden" name="img" value="' . $product['img'] . '">
                    <input type = "hidden" name="ten" value="' . $product['ten'] . '">
                    <input type = "hidden" name="gia" value="' . $product['gia'] . '">
                    <a class="product-item" href="index.php?page=Product Details">
                        <img src="uploadsPr/' . $product['img'] . '" class="img-fluid product-thumbnail">
                        <h3 class="product-title">' . $product['ten'] . '</h3>
                        <strong class="product-price">' . number_format($product['gia'], 0, ',', '.') . ' VNĐ</strong>
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
    </div>
</div>