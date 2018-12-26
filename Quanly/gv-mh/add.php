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
  $mgv = isset($_POST['mgv']) ? $_POST['mgv'] : "";
  $mmh = isset($_POST['mmh']) ? $_POST['mmh'] : "";
  $date = isset($_POST['date']) ? $_POST['date'] : "";

  // $name = chuanHoaTen($name);
  $sql = "Insert into giangvien_monhoc values('$mgv','$mmh','$date');";

  if (!mysqli_query($conn, $sql)) {
    echo $sql . " " . mysqli_error($conn);
  }
  mysqli_close($conn);
}
header("Location: gvmh.php");
?>