<?php 
     function getall_product()
    {
        $conn = conectdb();
        $stmt = $conn->prepare("SELECT * FROM sanpham ORDER BY id DESC limit 8");
        $stmt->execute();
        $kq = $stmt->fetchAll();
        return $kq;
    }

    function view_top()
    {
        $conn = conectdb();
        $stmt = $conn->prepare("SELECT * FROM sanpham ORDER BY view DESC limit 3");
        $stmt->execute();
        $topview = $stmt->fetchAll();
        return $topview;
    }


    function Product_Details()
    {
        $conn = conectdb();
        $stmt = $conn->prepare("SELECT * FROM sanpham ORDER BY id  limit 1 ");
        $stmt->execute();
        $kq = $stmt->fetchAll();
        return $kq;
    }
    function Related_products()
    {
        $conn = conectdb();
        $stmt = $conn->prepare("SELECT * FROM sanpham ORDER BY id  limit 4 ");
        $stmt->execute();
        $kq = $stmt->fetchAll();
        return $kq;
    }

    function code_sale(){
        $conn = conectdb();
        $stmt = $conn->prepare("SELECT * FROM code");
        $stmt->execute();
        $code = $stmt->fetchAll();
        return $code;
    }

    function searchbox($search){
        $conn = conectdb();
        $query = $conn->prepare("SELECT * FROM sanpham WHERE ten LIKE '%$search%' limit 4");
        $query->execute();
        $searchpr = $query->fetchAll();
        return $searchpr;
    }

    
    function filter($whereClause){
        $conn = conectdb();
        if(isset($_REQUEST['pagi'])){
            $offset = ($_REQUEST['pagi']-1)*8;
        }
        else $offset = 0;
        $stmt = $conn->query("SELECT * FROM sanpham WHERE $whereClause limit 8 offset $offset");
        $stmt->execute();
        $filter = $stmt->fetchAll();
        return $filter;
    }

    function category_product(){
        $conn = conectdb();
        $stmt = $conn->prepare("SELECT DISTINCT * FROM danhmuc");
        $stmt->execute();
        $category = $stmt->fetchAll();
        return $category;
    }
    
?>
