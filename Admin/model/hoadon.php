<?php
    function getall_hd(){
        $conn = conectdb();
        $stmt = $conn->prepare("SELECT u.ten, hd.id, hd.tongtien, hd.tinhtrang FROM hoadon hd JOIN user u ON hd.fk_user = u.id ORDER BY hd.id DESC limit 4");
        $stmt->execute();
        // giá trị trả về là mảng PDO::FETCH_ASSOC
        $kq = $stmt->fetchAll();
        return $kq;
    }

    function getall_tabel(){
        $conn = conectdb();
        $stmt = $conn->prepare("SELECT * FROM sanpham ");
        $stmt->execute();
        // giá trị trả về là mảng PDO::FETCH_ASSOC
        $sp = $stmt->fetchAll();
       return $sp;
    }

    function getall_category(){
        $conn = conectdb();
        $stmt = $conn->prepare("SELECT * FROM danhmuc ");
        $stmt->execute();
        // giá trị trả về là mảng PDO::FETCH_ASSOC
        $kqdanhmuc = $stmt->fetchAll();
       return $kqdanhmuc;
    }

    function insert_sp($tenSanPham,$tinhTrang,$danhMuc,$nhaCungCap,$giaBan,$soLuong,$mota,$target_file){
        $conn = conectdb();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO sanpham (`ten`, `gia`, `soluong`,`tinhtrang`, `id_dm`, `nhacungcap`, `mota`,`img`) 
                            VALUES ('$tenSanPham','$giaBan','$soLuong','$tinhTrang','$danhMuc','$nhaCungCap','$mota','$target_file')";
    
    $conn->exec($sql);
    }

    function option_status()
    {
        $conn = conectdb();
        $stmt = $conn->prepare("SELECT DISTINCT * FROM tinhtrang");
        $stmt->execute();
        $option = $stmt->fetchAll();
        return $option;
    }

    function option_supplier()
    {
        $conn = conectdb();
        $stmt = $conn->prepare("SELECT DISTINCT * FROM nhacungcap");
        $stmt->execute();
        $supplier = $stmt->fetchAll();
        return $supplier;
    }

    function option_category(){
        $conn = conectdb();
        $stmt = $conn->prepare("SELECT DISTINCT * FROM danhmuc");
        $stmt->execute();
        $category = $stmt->fetchAll();
        return $category;
    }
    
   
?>
