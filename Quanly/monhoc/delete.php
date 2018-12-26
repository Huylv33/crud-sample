<?php

require_once "../config.php";
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  mysqli_query($conn, "delete from monhoc where mamonhoc=$id");
  mysqli_close($conn);
} 
else if (isset($_POST['delete'])) {
  $idArr = isset($_POST['check']) ? $_POST['check'] : array();
  foreach ($idArr as $id) {
    mysqli_query($conn, "delete from monhoc where mamonhoc=$id");
  }
  mysqli_close($conn);
}
header("Location: dsmon.php");
?>