<?php 
    function getall_bill()
    {
        $conn = conectdb();
        $stmt = $conn->prepare("SELECT * FROM hoadon ORDER BY id DESC limit 8");
        $stmt->execute();
        $kq = $stmt->fetchAll();
        return $kq;
    }

    function Coupon($code){
        $conn = conectdb();
        $stmt = $conn->prepare("SELECT * FROM khuyenmai WHERE makm = '$code'");
        $stmt->execute();
        $coupon = $stmt->fetchAll();
        return $coupon;
    }
?>