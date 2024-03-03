<?php 
    function insert_user($name, $username, $password, $email, $img){
        $conn = conectdb();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if($img != ""){
            $sql = "INSERT INTO `user`(`ten`, `taik`, `email`, `pass`, `img`, `fk_role`) 
            VALUES ('user', '$username', '$email', '$password', '$img', '2')";
        }else{
            $sql = "INSERT INTO `user`(`ten`, `taik`, `email`, `pass`, `img`, `fk_role`) 
            VALUES ('user', '$username', '$email', '$password', '53.jpg', '2')";
        }
       
        if ($conn->exec($sql) == TRUE) {
            header('location: index.php?page=dangnhap');
            // echo 'thanh cong';
        }
    }

    function getUser($username){
        $conn = conectdb();
        $stmt = $conn->prepare("SELECT * FROM user WHERE taik=? ");
        $stmt->bindParam(1,$username);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq = $stmt->fetchAll();
        return $kq;
    }

    function login($user, $pass)
{
    $conn = conectdb();
    $stmt = $conn->prepare("SELECT * FROM user Where taik = '" . $user . "' AND pass = '" . $pass . "' ");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}

function getemail($email){
    $conn=conectdb();
    $stmt = $conn->prepare("SELECT * FROM  user WHERE email=? ");
    $stmt->bindParam(1,$email);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}

function ChangePass($id, $pass) {
    $conn = conectdb();

    try {
        $stmt = $conn->prepare("UPDATE user SET pass = :pass WHERE id = :id ");

    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':pass', $pass);
    $stmt->execute();
    // echo "Dữ liệu đã được cập nhật thành công!";
} catch(PDOException $e) {
    echo "Lỗi: " . $e->getMessage();
}

    $conn = null;
}

function CheckPass($id, $pass)
{
    $conn = conectdb();
    $stmt = $conn->prepare("SELECT * FROM user Where id = '" . $id . "' AND pass = '" . $pass . "' ");
    $stmt->execute();
    // giá trị trả về là mảng PDO::FETCH_ASSOC
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}

function getinfor($id){
    $conn = conectdb();
    $stmt = $conn->prepare("SELECT * FROM user Where id = " . $id);
    $stmt->execute();
    $userinfor = $stmt->fetchAll();
    return $userinfor;
}

function update_user($id, $name, $address, $email, $phone, $img){
    $conn = conectdb();
    $sql = "UPDATE user SET ten = '".$name."', address = '".$address."', email = '".$email."' , img = '".$img."' , sdt = '".$phone."' WHERE id=".$id;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}
?>