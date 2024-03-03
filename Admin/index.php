<?php
session_start();
ob_start();
include "../model/connect.php";
include "model/user.php";
include "model/hoadon.php";
include "model/product.php";
include "../model/product.php";
include "../model/blog.php";
include "view/header.php";
if (isset($_REQUEST['page'])) {
    $page = $_REQUEST['page'];
    switch ($page) {
        case 'user':
            include 'view/user.php';
            break;
        case 'sanpham':
            include 'view/themsp.php';
            break;
        case 'xoa':
            if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
                // Nhận ID từ yêu cầu get
                $id = $_GET['id'];
                $conn = conectdb();
                $sql = "DELETE FROM user WHERE id =" . $id;
                $conn->exec($sql);
            }
            break;
        case 'xoasp':
            // var_dump($_GET['id']);
            if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
                // Nhận ID từ yêu cầu get
                $id = $_GET['id'];
                $conn = conectdb();
                $sql = "DELETE FROM sanpham WHERE id =" . $id;
                $conn->exec($sql);
                //echo json_encode(['status' => 1,'msg'=> 'Xoa khong thanh cong']);
            } 
            break;
        case 'home':
            include 'view/home.php';
            break;
        case 'themuser':
            include 'view/themuser.php';
            break;
        case 'addsp':
            include 'view/sanpham.php';
            break;
        case 'addprd':
            if (isset($_POST['push']) && $_SERVER["REQUEST_METHOD"] == "POST") {
                $tenSanPham = $_POST["tensp"];
                $tinhTrang = $_POST["tinhTrang"];
                $danhMuc = $_POST["danhMuc"];
                $nhaCungCap = $_POST["nhaCungCap"];
                $giaBan = $_POST["giaBan"];
                $mota = $_POST['hiddenMota'];
                $soLuong = $_POST["soLuong"];


                $errors = array();

                if (empty($tenSanPham)) {
                    $errors['tensp'] = "Vui lòng nhập Tên sản phẩm.";
                }

                if ($tinhTrang == "-- Chọn tình trạng --") {
                    $errors['tinhTrang'] = "Vui lòng chọn Tình trạng.";
                }

                if ($danhMuc == "-- Chọn danh mục --") {
                    $errors['danhMuc'] = "Vui lòng chọn Danh mục.";
                }
                if (empty($soLuong)) {
                    $errors['soLuong'] = "Vui lòng nhập Số lượng.";
                }

                if ($nhaCungCap == "-- Chọn nhà cung cấp --") {
                    $errors['nhaCungCap'] = "Vui lòng chọn Nhà cung cấp.";
                }

                if (empty($giaBan)) {
                    $errors['giaBan'] = "Vui lòng nhập Giá bán.";
                }


                if (empty($errors)) {
                    $target_dir = "../uploadsPr/";
                    $file_name = basename($_FILES['ImageUpload']['name']);
                    $target_file = $target_dir . $file_name;
                    $file_tmp = $_FILES['ImageUpload']['tmp_name'];

                    // Kiểm tra loại file và kích thước
                    $allowed_types = array('jpg', 'jpeg', 'png', 'gif');
                    $file_extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                    if (!in_array($file_extension, $allowed_types)) {
                        $errors['file'] = "Chỉ chấp nhận file ảnh định dạng JPG, JPEG, PNG, GIF.";
                    } elseif ($_FILES['ImageUpload']['size'] > 5000000) { // Giới hạn kích thước 5MB
                        $errors['file'] = "Kích thước file quá lớn. Vui lòng chọn file nhỏ hơn.";
                    } else {
                        move_uploaded_file($file_tmp, $target_file);
                        insert_sp($tenSanPham, $tinhTrang, $danhMuc, $nhaCungCap, $giaBan, $soLuong, $mota, $target_file);
                    }
                }
            }
            include 'view/themsp.php';
            break;
        case 'addaccount':
            if (isset($_POST['save']) && ($_POST['save'])) {
                $user = $_POST['name'];
                $pass = md5($_POST['pass']);
                $email = $_POST['email'];
                $address = $_POST['address'];
                $sdt = $_POST['sdt'];
                $tk = $_POST['tk'];
                $role = $_POST['role'];
                $kq = login($tk, md5($pass));
                if ($_POST['pass'] != "" && $_POST['email'] != "" && $_POST['tk'] != "" && $_POST['name'] != "") {
                    if (count($kq) > 0) {
                        $account = "Tài khoản đã tồn tại";
                    } else {
                        if (!preg_match("/^[a-zA-Z0-9 ]*$/", $tk)) {
                            $kytu = "Tài khoản không chứa ký tự đặt biệt";
                        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            $textEmail = "Email phải có @, gmail và .com";
                        } else if (!preg_match("/^\d{10}$/", $sdt)) {
                            $textSdt = "Số điện thoại phải có đúng 10 chữ số";
                        } else if ($_POST['role'] === "") {
                            $errorrole = "Vui lòng chọn vai trò";
                        }
                        else {
                            // Nếu điều kiện đều hợp lệ, tiến hành thêm dữ liệu vào cơ sở dữ liệu
                            if (isset($_FILES['img']['name']) && $_FILES['img']['name'] != "") {
                                $img = basename($_FILES['img']['name']);
                                $dir = "../uploads/";
                                $show = $dir . $img;
                                move_uploaded_file($_FILES['img']['tmp_name'], $show);
                              
                            }
                            // Gọi hàm insert_useradmin để thêm dữ liệu vào cơ sở dữ li ệu
                            
                            insert_useradmin($user, $pass, $email, $img, $sdt, $tk, $role, $address);
                        }
                    }
                } else {
                    $error = "Điền đầy đủ thông tin";
                }
            }
            ;
            include 'view/user.php';
            break;
        case 'bangsp':
            include 'view/tablesp.php';
            break;
        case 'addst':
            $errors = array();
            if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['nhacungcap'])) {
                $supplier = $_POST['nhacungcap'];
                ob_clean();
                // tránh gọi header 
                header('Content-Type: application/json');

                if (!empty($supplier)) {
                    insert_sup($supplier);
                    $response = array('status' => 'success', 'message' => 'nhà cung cấp đã được thêm thành công.');
                    echo json_encode($response);

                } else {
                    $response = array('status' => 'error', 'message' => 'Vui lòng nhập nhà cung cấp.');
                    echo json_encode($response);

                }
            }
            break;
        case 'add':
            if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['newCategory'])) {
                $danhmuc = $_POST['newCategory'];
                ob_clean(); // Clear output buffer

                header('Content-Type: application/json');
                if (!empty($danhmuc)) {
                    // Thực hiện thêm danh mục mới vào cơ sở dữ liệu
                    insert_category($danhmuc);
                    // Trả về phản hồi thành công nếu muốn
                    $response = array('status' => 'success', 'message' => 'Danh mục đã được thêm thành công.');
                    echo json_encode($response);
                } else {
                    // Trả về thông báo lỗi nếu danh mục trống
                    $response = array('status' => 'error', 'message' => 'Vui lòng nhập tên danh mục.');
                    echo json_encode($response);
                }
            }
            break;
        case 'addtt':
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tinhTrangValue'])) {
                $tinhTrangValue = $_POST['tinhTrangValue'];
                ob_clean(); // Clear output buffer
                header('Content-Type: application/json');

                if (!empty($tinhTrangValue)) {

                    $response = array('status' => 'success', 'message' => 'Thành công');
                    echo json_encode($response);
                    insert_tt($tinhTrangValue);

                } else {

                    $error = array('status' => 'error', 'message' => 'vui lòng nhập tình trạng');

                    echo json_encode($error);
                }
            }
            break;
        case 'upduser':
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['page']) && $_GET['page'] === 'upduser') {

                if (
                    isset($_POST['userId']) &&
                    isset($_POST['userName']) &&
                    isset($_POST['userPhone']) &&
                    isset($_POST['userEmail']) &&
                    isset($_POST['taik'])
                ) {

                    $id = $_POST['userId'];
                    $userName = $_POST['userName'];
                    $userPhone = $_POST['userPhone'];
                    $userEmail = $_POST['userEmail'];
                    $taik = $_POST['taik'];

                    if (isset($_FILES['img']['name']) && $_FILES['img']['name'] != "") {
                        $imguser = basename($_FILES['img']['name']);
                        $dir = "../uploads/";
                        $show = $dir . $imguser;
                        move_uploaded_file($_FILES['img']['tmp_name'], $show);
                    }
                    updateuser($id, $userName, $userPhone, $userEmail, $taik, $imguser);

                }
            }
            include 'view/user.php';
            break;
        case 'updsp':
           
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['page']) && $_GET['page'] === 'updsp') {
                if (
                    isset($_POST['id']) &&
                    isset($_POST['ten']) &&
                    isset($_POST['gia']) &&
                    isset($_POST['soluong']) &&
                    isset($_POST['view'])
                ) {

                    $id = $_POST['id'];
                    $tensp = $_POST['ten'];
                    $gia = $_POST['gia'];
                    $soLuong = $_POST['soluong'];
                    $view = $_POST['view'];

                    if (isset($_FILES['img']['name']) && $_FILES['img']['name'] != "") {
                        $imgsp = basename($_FILES['img']['name']);
                        $dir = "../uploadsPr/";
                        $show = $dir . $imgsp;
                        move_uploaded_file($_FILES['img']['tmp_name'], $show);
                    }
                    updatesp($id, $tensp, $gia, $soLuong, $view, $imgsp);
                }
            }
            include "view/tablesp.php";
            break;
        default:
            include 'view/home.php';
    }
} else {
    include 'view/home.php';
}
?>