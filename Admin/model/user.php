<?php 
    function getall_user(){
        $conn = conectdb();
        $stmt = $conn->prepare("SELECT * FROM user where fk_role = 2 ORDER BY id DESC limit 5");
        $stmt->execute();
        // giá trị trả về là mảng PDO::FETCH_ASSOC
        $kq = $stmt->fetchAll();
        return $kq;
    }

    function user_new(){
        $conn = conectdb();
        $stmt = $conn->prepare("SELECT * FROM user where fk_role = 2 ORDER BY id DESC limit 5");
        $stmt->execute();
        // giá trị trả về là mảng PDO::FETCH_ASSOC
        $kq = $stmt->fetchAll();
        return $kq;
    }
   
    function login($user, $pass)
    {
        $conn = conectdb();
        $stmt = $conn->prepare("SELECT * FROM user Where taik = '" . $user . "' AND pass = '" . $pass . "' ");
        $stmt->execute();
        // giá trị trả về là mảng PDO::FETCH_ASSOC
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq = $stmt->fetchAll();
        return $kq;
    }
    function insert_useradmin($user,$pass, $email, $img, $sdt, $tk, $role,$address){
        $conn = conectdb();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if($img != ""){
            $sql = "INSERT INTO `user`(`ten`,`taik`, `email`, `pass`, `img`,`sdt`,`fk_role`,`address`) 
            VALUES ('$user','$tk', '$email', '$pass', '$img','$sdt','$role','$address')";
        }else{
            $sql = "INSERT INTO `user`(`taik`, `email`, `pass`, `img`,`sdt`, `fk_role`,`address`) 
            VALUES ('$user','$tk', '$email', '$pass', '53.jpg','$sdt','$role','$address')";
        }
       
        $conn->exec($sql);
    }

            
    function updateuser($id,$userName, $userPhone, $userEmail, $taik,$imguser) {
        $conn = conectdb();
    
        try {
            $stmt = $conn->prepare("UPDATE user SET ten = :userName, sdt = :userPhone, email = :userEmail, taik = :taik, img = :img WHERE id = :id ");

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':userName', $userName);
        $stmt->bindParam(':userPhone', $userPhone);
        $stmt->bindParam(':userEmail', $userEmail);
        $stmt->bindParam(':taik', $taik);
        $stmt->bindParam(':img', $imguser);
       

        $stmt->execute();
        echo "Dữ liệu đã được cập nhật thành công!";
    } catch(PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
    }
    
        $conn = null;
    }
    

    

    
    
    
    
