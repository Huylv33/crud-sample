<?php
require_once "../config.php";
// function chuanHoaTen($name)
// {
//   $name = ucwords($name);
//   $name = trim($name);
//   $words = explode(" ", $name);
//   //var_dump($words);
//   $tenchuanhoa = "";
//   for ($i = 0; $i < count($words); $i++) {
//     $tenchuanhoa .= $words[$i] . " ";
//   }
//   return $tenchuanhoa;
// }

if (isset($_POST['edit'])) {
  $oldMgv = $_GET['mgv'];
  $oldMmh = $_GET['mmh'];
  $newMgv = isset($_POST['mgv']) ? $_POST['mgv'] : "";
  $newMmh = isset($_POST['mmh']) ? $_POST['mmh'] : "";
  $newDate = isset($_POST['date']) ? $_POST['date'] : "";
  // $newName = chuanHoaTen($newName);
  $sql = "update giangvien_monhoc set mamonhoc = '$newMmh', 
  magiangvien = '$newMgv', ngaybatdau='$newDate'
  where mamonhoc=$oldMmh and 
  magiangvien=$oldMgv";
  if (!mysqli_query($conn, $sql)) {
    echo mysqli_error($conn);
  }
  mysqli_close($conn);
  header("Location: gvmh.php");
}
if (isset($_GET['mgv']) && isset($_GET['mmh']) && isset($_GET['date'])) {
  $mgv = $_GET['mgv'];
  $mmh = $_GET['mmh'];
  $date = $_GET['date'];
} else {
  header("Location: gvmh.php");
}
?>
<form method="post" action="edit.php?mgv=<?php echo $mgv; ?>&mmh=<?php echo $mmh; ?>&date=<?php echo $date ?>">
  <input type="text" value="<?php echo $mgv ?>" name="mgv">
  <input type="text" value="<?php echo $mmh ?>" name="mmh">
  <input type="date" value="<?php echo $date ?>" name="date">
  <input type="submit" name="edit" value="Edit">
</form>
