<?php

require_once "../config.php";
if (isset($_GET['mmh']) && isset($_GET['mgv'])) {
  $mmh = $_GET['mmh'];
  $mgv = $_GET['mgv'];
  mysqli_query($conn, "delete from giangvien_monhoc where magiangvien=$mgv and mamonhoc=$mmh");
  mysqli_close($conn);

} else if (isset($_POST['delete'])) {
  $idArr = isset($_POST['check']) ? $_POST['check'] : array();
  foreach ($idArr as $id) {
    $words =  explode(" ",$id);
    
    if (!mysqli_query($conn, "delete from giangvien_monhoc where magiangvien=$words[0] and mamonhoc=$words[1]")) {
      echo mysqli_error($conn);
    }
  }
  mysqli_close($conn);
}
header("Location: gvmh.php");
?>