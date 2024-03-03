<?php
function insert_contact($fname, $lname, $email, $mes)
{
    $conn = conectdb();
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO `contact`(`firstname`, `lastname`, `email`, `Message`) 
        VALUES ('$fname', '$lname', '$email', '$mes')";
    if ($conn->exec($sql)) {
        echo ' <script>
                    alert ("Bạn đã gửi thông tin thành công"); 
            </script>
                '
        ;
        header('location: index.php?page=home');
    } 
}
?>