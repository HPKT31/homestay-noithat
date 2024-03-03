<?php 
    function insert_sup($supplier){
        $conn = conectdb();
           $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sql = " INSERT INTO `nhacungcap` (`ten`) VALUES ('$supplier')";
            $conn->exec($sql);
                // echo"ok";
           
            
        }

    function insert_category($danhmuc){
        $conn = conectdb();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = " INSERT INTO `danhmuc` (`ten`) VALUES ('$danhmuc')";
                
                    $conn->exec($sql);
        }
            
    function insert_tt($tt){
        $conn = conectdb();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = " INSERT INTO `tinhtrang` (`tentt`) VALUES ('$tt')";
                
                    $conn->exec($sql);
        }

        function  updatesp($id,$tensp,$gia,$soLuong,$view,$imgsp){
            $conn = conectdb();
            try {
                $stmt = $conn->prepare("UPDATE sanpham 
                                        SET ten = :ten, gia = :gia, 
                                       soluong = :soluong, view = :view, img = :img
                                    WHERE id = :id ");
    
            $stmt->bindParam(':id',$id);
            $stmt->bindParam(':ten',$tensp);
            $stmt->bindParam(':gia',$gia);
            $stmt->bindParam(':soluong',$soLuong);
            $stmt->bindParam(':view',$view);
            $stmt->bindParam(':img',$imgsp);
            $stmt->execute();
            echo "Dữ liệu đã được cập nhật thành công!";
        } catch(PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
        
            $conn = null;
        }
?>