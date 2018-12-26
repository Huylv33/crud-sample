<?php
require_once "../config.php";
function chuanHoaTen($name)
{
  $name = ucwords($name);
  $name = trim($name);
  $words = explode(" ", $name);
  //var_dump($words);
  $tenchuanhoa = "";
  for ($i = 0; $i < count($words); $i++) {
    $tenchuanhoa .= $words[$i] . " ";
  }
  return $tenchuanhoa;
}

if (isset($_POST['edit'])) {
  $oldId = $_GET['id'];
  $newId = isset($_POST['id']) ? $_POST['id'] : "";
  $newName = isset($_POST['name']) ? $_POST['name'] : "";
  $newName = chuanHoaTen($newName);
  $sql = "update giangvien set magiangvien = '$newId', tengiangvien = '$newName' where magiangvien=$oldId";
  if (!mysqli_query($conn,$sql)) {
    echo mysqli_error($conn); 
  }
  mysqli_close($conn);
  header("Location: ../index.php");
}
if (isset($_GET['id']) && isset($_GET['name'])) {
  $id = $_GET['id'];
  $name = $_GET['name'];
}
else {
  header("Location: ../index.php");
}
?>
<form method="post" action="edit.php?id=<?php echo $id; ?>">
  <input type="text" value="<?php echo $id?>" name="id">
  <input type="text" value="<?php echo $name ?>" name="name">
  <input type="submit" name="edit" value="Edit">
</form>