<?php
  function getall_blog()
  {
      $conn = conectdb();
      $stmt = $conn->prepare("SELECT * FROM blog ORDER BY id DESC limit 3");
      $stmt->execute();
      // giá trị trả về là mảng PDO::FETCH_ASSOC
      $bl = $stmt->fetchAll();
      return $bl;
  }
?>