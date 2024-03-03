<?php
session_start();
ob_start();
include "model/connect.php";
include "model/product.php";
include "model/blog.php";
include "model/contact.php";
include "model/user.php";
include "model/forgotPass.php";
include "model/bill.php";



include "view/header.php";
if (isset($_REQUEST['page'])) {
    $page = $_REQUEST['page'];
    switch ($page) {
        case 'about':
            include "view/about.php";
            break;
        case 'clickinfor':
            include "view/inforUser.php";
            break;
        case 'infor':
            include "view/inforPass.php";
            break;
        case 'reset':
            include "view/rePass.php";
            break;
        case 'OTP':
            include "view/OTP.php";
            break;
        case 'shop':
            include "view/product.php";
            break;
        case 'contact':
            include "view/contact.php";
            break;
        case 'cart':
            include "view/cart.php";
            break;
        case 'services':
            include "view/services.php";
            break;
        case 'forgot':
            include "view/forgot.php";
            break;
        case 'dangky':
            include "view/signup.php";
            break;
        case 'dangnhap':
            include "view/login.php";
            break;
        case 'addcart':
            if (isset($_POST['sub'])) {
                $id = $_POST['id'];
                $name = $_POST['ten'];
                $price = $_POST['gia'];
                $img = $_POST['img'];
                $count = 1;
                $productExists = false;
                foreach ($_SESSION['viewcart'] as &$item) {
                    if ($item['id'] == $id) {
                        // Sản phẩm đã tồn tại, tăng số lượng
                        $item['soluong']++;
                        $item['total'] = $item['soluong'] * $item['gia'];
                        $productExists = true;
                        break;
                    }
                }
                if (!$productExists) {
                    $total = $count * $price;
                    $sp = ['id' => $id, 'ten' => $name, 'img' => $img, 'gia' => $price, 'soluong' => $count,'total' => $total];
                    $_SESSION['viewcart'][] = $sp;
                }
                header('location: index.php?page=cart');
            }
            break;
        case 'count':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                ob_clean();
                header('Content-Type: application/json');
                if (isset($_POST['id']) && isset($_POST['action'])) {
                    $productId = $_POST['id'];
                    $action = $_POST['action'];
                    foreach ($_SESSION['viewcart'] as &$item) {
                        if ($item['id'] == $productId) {
                            if ($action === 'increase') {
                                $item['soluong']++;
                            } elseif ($action === 'decrease' && $item['soluong'] > 1) {
                                $item['soluong']--;                                
                            }
                            $item['total'] = $item['soluong'] * $item['gia'];
                        }
                    }
                }
            }
            break;
        case 'add':
            if (isset($_POST['add']) && ($_POST['add'])) {
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $email = $_POST['email'];
                $mes = $_POST['message'];

                if ($_POST['fname'] != "" && $_POST['lname'] != "" && $_POST['email'] != "") {
                    insert_contact($fname, $lname, $email, $mes);
                }
            }
            break;
        case 'signup':
            if (isset($_POST['signup']) && ($_POST['signup'])) {
                $username = $_POST['user'];
                $email = $_POST['email'];
                $password = md5($_POST['pass']);
                $password2 = md5($_POST['pass2']);
                $kq = getUser($username);

                if ($_POST['user'] != "" && $_POST['email'] != "" && $_POST['pass'] != "" && $_POST['pass2'] != "") {
                    if (count($kq) == 1) {
                        $tontai = "Tài Khoản đã tồn tại";
                    } else if (!preg_match("/^[a-zA-Z0-9 ]*$/", $username)) {
                        $kytu = "Tài khoản không chứa ký tự đặt biệt";
                    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $textEmail = "Email phải có @, gmail và .com";
                    } else if ($_POST['pass'] != $_POST['pass2']) {
                        $trungmk = "Mật khẩu không giống nhau";
                    } else {
                        if (isset($_FILES['img']['name']) != "") {
                            $img = basename($_FILES['img']['name']);
                            $dir = "uploads/";
                            $show = $dir . $img;
                            move_uploaded_file($_FILES['img']['tmp_name'], $show);
                            insert_user($name, $username, $password, $email, $img);
                        }
                    }
                } else {
                    $text = "Điền đầy đủ thông tin";
                }
            }
            ;
            include "view/signup.php";
            break;
        case 'changepass':
            if (isset($_POST['btn-forgot_change']) && ($_POST['btn-forgot_change'])) {
                $oldPass = $_POST['pass_old'];
                $newPass = md5($_POST['pass_new']);
                $againPass = $_POST['again_pass'];
                $kq = CheckPass($_SESSION['idsuser'], md5($oldPass));
                if ($_POST['pass_old'] == "") {
                    $errorold = "Vui lòng nhập đầy đủ thông tin";
                } else if ($oldPass != "" && $newPass != "" && $againPass != "") {
                    if (count($kq) == 1) {
                        if ($_POST['pass_new'] === $_POST['again_pass']) {
                            if (!isset($error)) {
                                ChangePass($_SESSION['idsuser'], $newPass);
                                echo '<script> confirm("Bạn đã thay đổi mật khẩu thành công") </script>';
                                include 'view/inforUser.php';
                                break;
                            }
                        } else {
                            $errorNot = "Mật khẩu xác nhận không trùng khớp";
                        }
                    } else {
                        $errorPass = "Mật khẩu không chính xác";
                    }
                }
                if ($_POST['pass_new'] == "") {
                    $errorpn = "Vui lòng nhập đầy đủ thông tin";
                }
                if ($_POST['again_pass'] == "") {
                    $errorag = "Vui lòng nhập đầy đủ thông tin";
                }
            }
            ;
            include "view/inforPass.php";
            break;
        case 'login':
            if (isset($_POST['login']) && ($_POST['login'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $kq = login($user, md5($pass));
                if ($_POST['user'] != "" && $_POST['pass'] != "") {
                    if (count($kq) == 1) {
                        $role = $kq[0]['fk_role'];
                        if ($role == 1) {
                            $_SESSION['role'] = $role;
                            $_SESSION['idAdmin'] = $kq[0]['id'];
                            $_SESSION['userAdmin'] = $kq[0]['taik'];
                            $_SESSION['imgAdmin'] = $kq[0]['img'];
                            header('location: Admin/index.php');
                        } else {
                            $_SESSION['role'] = $role;
                            $_SESSION['idsuser'] = $kq[0]['id'];
                            $_SESSION['username'] = $kq[0]['taik'];
                            $_SESSION['ten'] = $kq[0]['ten'];
                            $_SESSION['img'] = $kq[0]['img'];
                            header('location: index.php');
                        }
                    } else {
                        $account = "Tài khoản không tồn tại";
                    }
                } else {
                    $error = "Điền đầy đủ thông tin";
                }
            }
            ;
            include "view/login.php";
            break;
        case 'exit':
            unset($_SESSION['role']);
            unset($_SESSION['img']);
            unset($_SESSION['idsuser']);
            unset($_SESSION['username']);
            unset($_SESSION['idAdmin']);
            unset($_SESSION['userAdmin']);
            unset($_SESSION['viewcart']);
            header('location: index.php');
            break;
        case 'removecart':
            if (isset($_GET['id'])) {
                $productId = $_GET['id'];
                if (isset($_SESSION['viewcart']) && is_array($_SESSION['viewcart'])) {
                    foreach ($_SESSION['viewcart'] as $key => $item) {
                        if ($item['id'] == $productId) {
                            unset($_SESSION['viewcart'][$key]);
                        }
                    }
                }
            }
            header('location: index.php?page=cart');
            break;
            case 'checkout':
                if (isset($_POST['buynow']) || isset($_POST['sub'])) {
                    $id = $_POST['id'];
                    $name = $_POST['ten'];
                    $price = $_POST['gia'];
                    $img = $_POST['img'];
                    $count = $_POST['quantity'];              
                    $productIndex = -1;   
                    if (isset($_SESSION['viewcart'])) {
                        foreach ($_SESSION['viewcart'] as $index => $item) {
                            if ($item['id'] == $id) {
                                $productIndex = $index;
                                break;
                            }
                        }
                    }
                    if ($productIndex !== -1) {
                        $_SESSION['viewcart'][$productIndex]['soluong'] += $count;
                        $_SESSION['viewcart'][$productIndex]['total'] = $_SESSION['viewcart'][$productIndex]['soluong'] * $price;
                    } else {
                        $total = $count * $price;
                        $totalAll += $total;
                        $sp = ['id' => $id, 'ten' => $name, 'img' => $img, 'gia' => $price, 'soluong' => $count, 'total' => $total];
                        $_SESSION['viewcart'][] = $sp;
                    }
                }               
                include "view/checkout.php";
                break;                
        case 'thankyou':
            unset($_SESSION['viewcart']);
            include "view/thankyou.php";
            break;
        case 'checksale':
            if(isset($_POST['apply'])){
                if($_POST['c_code'] != ""){
                    $code = $_POST['c_code'];
                    $countcode = Coupon($code);
                    if($countcode) {
                        $getcode = Coupon($code);
                        foreach ($getcode as $getcd){
                            $totalAllsale = 0;
                            foreach ($_SESSION['viewcart'] as $item) {                                                    
                                extract($item);
                                $item['total'] = $item['soluong'] * $item['gia'];        
                                $totalAllsale += $item['total'] * ($getcd['phantramkm']/100);                      
                            }
                        }
                    }else{
                        $error = "Mã giảm giá không tồn tại";
                    }
                }else{
                    $error =  "Vui lòng nhập mã";
                }
                }
            include "view/checkout.php";
            break;
        case 'Product Details':
            include "view/Product Details.php";
            break;
        case 'updateinfor':
            if (isset($_POST['updateInforUser'])) {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $phone = $_POST['phone'];

                if ($name != "" && $email != "") {
                    if (!preg_match('/^[A-Za-zÀ-ỹƠơÁáẮắẤấẾếÔôẾếỐốỨứÙùỲỳÝýĐđ\s]*$/u', $name)) {
                        $nameErr = "Vui lòng nhập đúng tên của bạn";
                    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $emailErr = "Định dạng email không hợp lệ";
                    } else if ($phone != "") {
                        if (!preg_match('/^[0-9]{10}$/', $phone)) {
                            $phoneErr = "Vui lòng nhập số điện thoại của bạn";
                        }
                    }
                    if (isset($_FILES['Image']['name']) && $_FILES['Image']['name'] != "") {
                        $img = basename($_FILES['Image']['name']);
                        $dir = "uploads/";
                        $show = $dir . $img;
                        move_uploaded_file($_FILES['Image']['tmp_name'], $show);

                    } else {
                        $img = $_POST['imgfile'];
                    }
                    $_SESSION['img'] = $img;
                    $_SESSION['ten'] = $name;
                    update_user($id, $name, $address, $email, $phone, $img);
                }
                if ($name == "") {
                    $nameErr = "Vui lòng không để trống";
                }
                if ($email == "") {
                    $emailErr = "Vui lòng không để trống";
                }
            }
            include 'view/inforUser.php';
            break;
        case 'search':
            if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
                $search = $_POST['search'];
                if ($_POST['search'] != "") {
                    $searchpr = searchbox($search);
                    include "view/search.php";
                }
            }
            break;
        default:
            include "view/home.php";
            break;
    }
} else {
    include "view/home.php";
}
include "view/footer.php";
?>