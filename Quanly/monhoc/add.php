<?php
require_once "../config.php";
// function chuanHoaTen($name)
// {
//   $name = ucwords($name);
//   $name = trim($name);
//   $words = explode(" ", $name);
//   var_dump($words);
//   $tenchuanhoa = "";
//   for ($i = 0; $i < count($words); $i++) {
//     $tenchuanhoa .= $words[$i] . " ";
//   }
//   return $tenchuanhoa;
// }
if (isset($_POST['add'])) {
  $name = isset($_POST['name']) ? $_POST['name'] : "";
  $id = isset($_POST['id']) ? $_POST['id'] : "";
  // $name = chuanHoaTen($name);
  $sql = "Insert into monhoc(mamonhoc,tenmonhoc) values('$id','$name');";
  
  if (!mysqli_query($conn, $sql)) {
    echo $sql. " ".mysqli_error($conn);
  }
  mysqli_close($conn);
}
header("Location: dsmon.php");
?>