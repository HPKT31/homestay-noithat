<?php
    // include_once "../view/Mailer.php";
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
?>
<div class="grid">
    <div class="container">
        <div class="forgot_center_form">
            <div class="forgot_Password_form">
                <a href="index.php?page=dangnhap" class="back_login-icon">
                    <i class="fa-solid fa-arrow-left-long"></i>
                </a>
                <?php
                if (isset($_POST['forgot_btn']) && ($_POST['forgot_btn'])) {
                    $_SESSION['email'] = $_POST['email'];
                    $kq = getemail($_SESSION['email']);
                    $error_null = "Vui lòng nhập email";
                    if (count($kq) < 1) {
                        $error = "Email chưa đăng ký";
                    } else {
                        $code = substr(md5(rand(0, 999999)), 0, 6);
                        updateOTP($code, $_SESSION['email']);
                        //Load Composer's autoloader
                        require 'PHPMailer/src/PHPMailer.php';
                        require 'PHPMailer/src/SMTP.php';
                        require 'PHPMailer/src/Exception.php';

                        //Create an instance; passing `true` enables exceptions
                        $mail = new PHPMailer(true);

                        try {
                            //Server settings
                            $mail->SMTPDebug = SMTP::DEBUG_SERVER; //Enable verbose debug output
                            $mail->isSMTP(); //Send using SMTP
                            $mail->CharSet = 'utf-8';
                            $mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
                            $mail->SMTPAuth = true; //Enable SMTP authentication
                            $mail->Username = 'quaysjeu@gmail.com'; //SMTP username
                            $mail->Password = 'mydh teva sdqg luqx'; //SMTP password
                            $mail->SMTPSecure = 'ssl'; //Enable implicit TLS encryption
                            $mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                
                            //Recipients
                            $mail->setFrom('quaysjeu@gmail.com', 'Lê Đăng Khoa');
                            // $mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
                            $mail->addAddress($_SESSION['email']); //Name is optional
                            // $mail->addReplyTo('info@example.com', 'Information');
                            // $mail->addCC('cc@example.com');
                            //$mail->addBCC('bcc@example.com');
                
                            //Attachments
                            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
                
                            //Content
                            $mail->isHTML(true); //Set email format to HTML
                            $mail->Subject = 'Mã OTP';
                            $mail->Body = "{$code}";
                            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                
                            $mail->send();
                            header('location: index.php?page=OTP');
                        } catch (Exception $e) {
                            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                        }
                    }
                }
                ?>
                <form action="" method="post">
                    <h1 class="forgot_name">QUÊN MẬT KHẨU</h1>
                    <div class="forgot_form">
                        <div class="forgot_email">
                            <label for="">Nhập email:</label>
                            <input placeholder="Nhập email của bạn" class="in_email" type="text" name="email" id=""
                                value="">
                        </div>
                        <div class="forgot_btn">
                            <input type="submit" value="Gửi" name="forgot_btn">
                        </div>
                    </div>
                    <div class="error_email">
                        <?php
                            if(isset($_POST['forgot_btn']) && ($_POST['forgot_btn'])){
                                if($_SESSION['email'] === "") {
                                    echo ' <p>' . $error_null . '</p>';
                                }
                                else if (isset($error)) {
                                    echo ' <p>' . $error . '</p>';
                                }
                            }
                        ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>